<?php

class RutineController extends Controller
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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('rutine'),
				//'roles'=>array('admin'),
				'users'=>array('admin'),
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
	public function actionRutine(){
		
		if(isset($_POST['RBAC']))
			$this->RBAC();	
		
			if(Yii::app()->user->checkAccess('admin')) echo "admin";
			if(Yii::app()->user->checkAccess('avtor')) echo "avtor";
			
		$this->render('rutine');
	}
		
	protected function RBAC(){
		
		
		$auth=Yii::app()->authManager;
		$auth->clearAll();
 		
		$auth->createOperation('urejanjeNovic','update a post');
		
		$bizRule='return Yii::app()->user->id==$params["created_by"];'; // urejanje pravic
		$task=$auth->createTask('urejanjeSvojihNovic','update a post by author himself',$bizRule);
		$task->addChild('urejanjeNovic');
		
		$auth->createTask('vseMoznostiUrejevalnika');
		
		//$bizRule='return !in_array(Yii::app()->user->name, array("admin", "Brozzy"));';
		$role=$auth->createRole('avtor', 'avtor');
		$role->addChild('urejanjeSvojihNovic');
				
		// in_array(Yii::app()->user->username, array("admin", "Brozzy"));
		//$bizRule='return in_array(Yii::app()->user->name, array("admin", "Brozzy"));';
		$role=$auth->createRole('admin', 'admin user');
		$role->addChild('avtor');
		$role->addChild('urejanjeNovic');
		$role->addChild('vseMoznostiUrejevalnika');
		
		foreach (Portali::model()->findAll() as $portal){
			$portal->createRoles();
		}
		
		$auth->assign('admin',Users::model()->getID('admin'));
//		$auth->assign('admin',Users::model()->getID('Brozzy'));
		
		
	}
}
