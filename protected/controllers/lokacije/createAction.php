<?php

class createAction extends CAction {
    public function run()
    {
        $model=new Lokacije;
		
		$this->render('create',array(
			'model'=>$model,
		));
		
		//$this->redirect(Yii::app()->request->redirect(Yii::app()->request->baseUrl."/lokacije/create"));
    }
}

?>