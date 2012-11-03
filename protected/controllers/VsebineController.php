<?php

class VsebineController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				//'users'=>array('*'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'loadCategories', 'zavrzi', 'izvoz', 'aclist'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Vsebine;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if(isset($_POST['zavrzi'])){				
			if($next=$model->getNextID()) $this->redirect(array('update','id'=>$next));
			else $this->redirect(array('index'));
		}
			
		
		$this->saveVsebine($model, 'create');
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$this->saveVsebine($model, 'update');

		
	}
	
	private function saveVsebine(&$model, $action){
		Yii::import('ext.multimodelform.MultiModelForm');

		$member = new Koledar;
		$validatedMembers = array(); //ensure an empty array
		
		if(isset($_POST['Vsebine']))
		{
			$model->attributes=$_POST['Vsebine'];
			
			if(isset($_POST['zavrzi'])){
				if($model->save(false)){
					if($next=$model->getNextID()) $this->redirect(array('update','id'=>$next));
					else $this->redirect(array('index'));
					//$this->redirect(array('index'));
				}
			}else{	
				$MMvalidated = false;
				if(MultiModelForm::validate($member,$validatedMembers,$deleteItems)) $MMvalidated = true;

				if(count($validatedMembers)) $model->koledar=1;
				else $model->koledar=0; //zaradi validacije zapiši, če ima vsebina pripete dogodke.
				
				if($MMvalidated){
					if($model->save()){ //validate detail before saving the master
				
		    				$masterValues = array('id_vsebine'=>$model->id);
						 if (MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues)){
							if(isset($_POST['joomla'])){ 
								//če gre v joomlo
								$this->izvoziVsebino($model);
								if($next=$model->getNextID()) $this->redirect(array('update','id'=>$next));
								else $this->redirect(array('index'));
							}else{
								//samo shrani
								$this->redirect(array('update','id'=>$model->id));
							}
						}
					}
				}else{
					$model->validate();
				}
				
			}
			
		}
		//echo "<pre>";
		//print_r($validatedMembers);
		//echo "</pre>";
		$this->render($action,array(
			'model'=>$model,
			
			//submit the member and validatedItems to the widget in the edit form
			'member'=>$member,
			'validatedMembers' => $validatedMembers,
		));
	}	
	
	public function actionZavrzi($id)
	{
		$model=$this->loadModel($id);
		$model->state=3;	
		//nastavi status na 3 - zavržen
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if($model->update(array('state'))){
			//$this->redirect(array('view','id'=>$model->id));
			echo $model->id;
		}
//		$this->render('update',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Vsebine', 
		   array(
			'criteria'=>array(
		   		'condition'=>'state=0',
		    	'order'=>'created ASC',
		  	)
		  )
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionIzvoz()
	{
		$dataProvider=new CActiveDataProvider('Vsebine', 
		   array(
			'criteria'=>array(
		   		'condition'=>'state=1',
		    	'order'=>'created ASC',
		  	)
		  )
		);
		$this->render('izvoz',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vsebine('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vsebine']))
			$model->attributes=$_GET['Vsebine'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionLoadCategories(){
		//please enter current controller name because yii send multi dim array 
	    $data=Categories::listBySection((int) $_POST['Vsebine']['sectionid']);
	 	echo('<option value="">Izberi kategorijo:</option>');
	    foreach($data as $value=>$name)
	    {
	        echo CHtml::tag('option',
	                   array('value'=>$value),CHtml::encode($name),true);
	                   
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Vsebine::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vsebine-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actions(){
		return array(
			'aclist'=>array(
				'class' => 'application.extensions.EAutoCompleteAction',
				'model' => 'Tags',
				'attribute' => 'tag'
			)
		);
			
	}
	
	
	
}
