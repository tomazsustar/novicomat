<?php

class LokacijeWidget extends CWidget {
	protected $cs;
	
	public function init()
    {
        $this->cs = Yii::app()->getClientScript();
        $this->cs->registerCoreScript('jquery');
    }
 
    public function run()
    {
		$model=new Lokacije;
		
		$this->render('lokacijeCreate',array(
			'model'=>$model,
		));
    }
}

?>