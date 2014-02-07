<?php
/**
 * viđet ki potegne novice za trenutni portal, lahko mu določimo tudi tag
 */
//Yii::import('zii.widgets.CPortlet');

class ZContactFormWidget extends CWidget{
	
	
	public function run(){
		//uporabi javascript
		//echo "Widget";
		$baseDir = dirname(__FILE__);
      	$assets = Yii::app()->getAssetManager()->publish($baseDir.DIRECTORY_SEPARATOR.'assets', false, -1, YII_DEBUG);
      	$cs = Yii::app()->getClientScript();
      	$cs->registerCoreScript('jquery');
      	$cs->registerScriptFile($assets.'/contactForm.js' );
      	//echo "Widget";
      	$controller=Yii::app()->getController();
      	$model=new ContactForm();
		$this->render('contactForm', array('model' => $model)); //porini model v view
	}
}