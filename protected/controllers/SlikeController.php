<?php

class SlikeController extends Controller
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
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'naloziSliko', 'naloziSlikoIzUrl', 'popup', 'obrezi'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
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
		$model=new Slike;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slike']))
		{
			$model->attributes=$_POST['Slike'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slike']))
		{
			$model->attributes=$_POST['Slike'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('Slike');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slike('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slike']))
			$model->attributes=$_GET['Slike'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Slike::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='slike-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionNaloziSliko(){
			foreach ($_FILES["images"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$filename = $_FILES["images"]["name"][$key];
					//echo  $_FILES["images"]["tmp_name"][$key];
					//move_uploaded_file( $_FILES["images"]["tmp_name"][$key], Yii::app()->basePath.'/../slike/' . $_FILES['images']['name'][$key]);
					if($slika=Slike::model()->findByAttributes(array('ime_slike'=>$filename))){
						$msg="Slika z imenom $filename že obstaja na strežniku";
						echo CJSON::encode(array($slika, $msg));
					}else{
						move_uploaded_file( $_FILES["images"]["tmp_name"][$key], Yii::app()->params['imgDir'].$filename);
					//shrani v bazo
						$model=new Slike;
						$model->url=Yii::app()->params['imgUrl'].$filename;
						$model->pot=Yii::app()->params['imgDir'];
						$model->ime_slike=$filename;
						
						// naredi slicico
						$model->slikca();
						
						if($model->save()){
							//echo $model->url2; 
							$msg="";
							echo CJSON::encode(array($model, $msg));
						}
					}
				}
			}
			
			
			
			//echo "<h2>Successfully Uploaded Images</h2>";
			
//			$uploadedFile=CUploadedFile::getInstanceByName('files[0]');
//			echo "ha";print_r($uploadedFile);
//			$filepath = Yii::app()->basePath.'/../slike/'.$uploadedFile;
//			$uploadedFile->saveAs($filepath);  
			
	}
	
	public function actionNaloziSlikoIzUrl(){
		if(!class_exists('WideImage', false)) 
				require_once Yii::app()->basePath.'/vendors/wideimage/WideImage.php';
				//shrani na disk
		$url=$_POST['image_url'];	
		$filename=basename($url);
		
		if($slika=Slike::model()->findByAttributes(array('ime_slike'=>$filename))){
			$msg="Slika z imenom $filename že obstaja na strežniku";
			echo CJSON::encode(array($slika, $msg));
		}else{
			//load
			$img=WideImage::load($url)->saveToFile((Yii::app()->params['imgDir'].$filename));
			
			//shrani v bazo
			$model=new Slike;
			$model->url=Yii::app()->params['imgUrl'].$filename;
			$model->pot=Yii::app()->params['imgDir'];
			$model->ime_slike=$filename;
			
			// naredi slicico
			$model->slikca();
			if($model->save()){
				$msg="";
				echo CJSON::encode(array($model, $msg));
			}else echo "Prišlo je do napake pri shranjevanju v bazo";
		}
		
	}
	
	public function actionPopup($id) {
		
		$model=$this->loadModel($id);
		
        // Ajax Validation enabled
        //$this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add 
        // new jon.
        $flag=true;
//        if(isset($_POST['Slike']))
//        {       $flag=false;
//            $model->attributes=$_POST['Job'];
// 
//            if($model->save()) {
//                //Return an <option> and select it
//                            echo CHtml::tag('option',array (
//                                'value'=>$model->jid,
//                                'selected'=>true
//                            ),CHtml::encode($model->jdescr),true);
//                        }
//         }
         if($flag) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery-ui.css'] = false;
              $this->renderPartial('popup',array('model'=>$model,),false,true);
         }
        }
	
	public function actionObrezi($id){
		$model=$this->loadModel($id);
		if(!class_exists('WideImage', false)) 
				require_once Yii::app()->basePath.'/vendors/wideimage/WideImage.php';
				//shrani na disk
		
//		$url=$_POST['image_url'];
//		$filename=basename($url);
//		
//		if($slika=Slike::model()->findByAttributes(array('ime_slike'=>$filename))){
//			$msg="Slika z imenom $filename že obstaja na strežniku";
//			echo CJSON::encode(array($slika, $msg));
//		}else{
//			//load
			$filename=basename($model->url);
			
			WideImage::load(str_replace(' ', '%20', Yii::app()->params['imgDir'].'tmp/'.$filename))
				->crop($_POST['x1'], $_POST['y1'], $_POST['width'], $_POST['height'])
				->resize(265, 177, 'outside')				
				->saveToFile(Yii::app()->params['imgDir'].'slikce/'.$filename);
				
			unlink(Yii::app()->params['imgDir'].'tmp/'.$filename);
// $img=WideImage::load($model->url)->saveToFile((Yii::app()->params['imgDir'].$filename));
//			
//			//shrani v bazo
//			$model=new Slike;
//			$model->url=Yii::app()->params['imgUrl'].$filename;
//			$model->pot=Yii::app()->params['imgDir'];
//			$model->ime_slike=$filename;
//			
//			// naredi slicico
//			$model->slikca();
//			if($model->save()){
//				$msg="";
//				echo CJSON::encode(array($model, $msg));
//			}else echo "Prišlo je do napake pri shranjevanju v bazo";
//		}
		//print_r($_POST);
	}
	
}
