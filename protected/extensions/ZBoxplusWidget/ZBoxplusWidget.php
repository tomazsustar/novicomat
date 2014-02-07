<?php
/**
 * viđet ki potegne novice za trenutni portal, lahko mu določimo tudi tag
 */
//Yii::import('zii.widgets.CPortlet');

class ZBoxplusWidget extends CWidget{
	public $theme = 'darksquare'; 
	
	public function run(){
		//TODO parametriziraj še ostale možnosti
		//uporabi javascript
		//echo "Widget";
		$baseDir = dirname(__FILE__);
      	$assets = Yii::app()->getAssetManager()->publish($baseDir.'/assets/popup/', false, -1, YII_DEBUG);
      	$cs = Yii::app()->getClientScript();
      	$cs->registerCssFile($assets.'/css/boxplus.min.css');
      	$cs->registerCssFile($assets.'/css/boxplus.'.$this->theme.'.css');
      	$cs = Yii::app()->getClientScript();
      	$cs->registerCoreScript('jquery');
      	$cs->registerScriptFile($assets.'/js/boxplus.js' );
      	$cs->registerScript("append_boxplus",'
      		$("a[rel=boxplus-slike]").boxplus();
	      	$("#boxplus .boxplus-thumbs").addClass("boxplus-disabled");
			$("#boxplus .boxplus-caption").addClass("boxplus-disabled");
			$("#boxplus .boxplus-stop").addClass("boxplus-disabled");
			$("#boxplus .boxplus-sideways").addClass("boxplus-disabled");
			$("#boxplus .boxplus-thumbs").addClass("boxplus-disabled");
			$("#boxplus .boxplus-stop").addClass("boxplus-disabled");
			$("#boxplus .boxplus-caption").addClass("boxplus-disabled");
      	');
	}
}