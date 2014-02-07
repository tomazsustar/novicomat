<?php
/**
 * viđet ki potegne novice za trenutni portal, lahko mu določimo tudi tag
 */
Yii::import('zii.widgets.CListView');

class ZVsebineListWidget extends CListView{
	//TODO prilagodi, da podpira pagination
	public $tag = false;
	public $limit = 5;
	public $offset = 0;
	public $template = '{items}';
	public $enablePagination = false;
	//public $is_last_item = false;
	
	
	function init(){
//		$cs = Yii::app()->getClientScript();
//      	$cs->registerCoreScript('jquery');
//      	$baseScriptUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets'));
//		$cs->registerScriptFile($baseScriptUrl.'/listview/jquery.yiilistview.js');
		
		
		$this->dataProvider=new CActiveDataProvider('Vsebine', array(
	    	'criteria'=>Vsebine::getCriteriaZaPortal(Yii::app()->name,$this->offset,$this->limit,$this->tag)
	    	));
	    	
	    parent::init();
	}
	
//	public function renderItems()
//	{
//		echo CHtml::openTag($this->itemsTagName,array('class'=>$this->itemsCssClass))."\n";
//		$data=$this->dataProvider->getData();
//		if(($n=count($data))>0)
//		{
//			$owner=$this->getOwner();
//			$render=$owner instanceof CController ? 'renderPartial' : 'render';
//			$j=0;
//			foreach($data as $i=>$item)
//			{
//				$data=$this->viewData;
//				$data['index']=$i;
//				$data['data']=$item;
//				$data['widget']=$this;
//				$owner->$render($this->itemView,$data);
//				if($j++ < $n-1)
//					echo $this->separator;
//				else $this->is_last_item=true;
//			}
//		}
//		else
//			$this->renderEmptyText();
//		echo CHtml::closeTag($this->itemsTagName);
//	}
	
}