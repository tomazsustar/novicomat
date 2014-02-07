<?php $this->pageTitle=Yii::app()->name; 
$this->layout='//layouts/defaultpage';
?>

<?php 
//echo Yii::app()->user->id;
$this->widget('zii.widgets.CListView', array(
	'id'=>'vsebine-list-view',
	'dataProvider'=>$dataProvider,
	'itemView'=>'//vsebine/_view',
//	 'sortableAttributes'=>array(
//		'title',
//	     'imported',   
//		 'created',
//	   	
//    ),
//    'pager'=>array(
//        'class'=>'ext.yiinfinite-scroll.YiinfiniteScroller',
//        'contentSelector' => '#vsebine-list-view div.items',
//        'itemSelector' => 'div.view',
//    )
)); ?>