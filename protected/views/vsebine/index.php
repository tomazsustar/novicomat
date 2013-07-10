<?php
$this->breadcrumbs=array(
	'Vsebine',
);

$this->menu=array(
	array('label'=>'Dodaj prispevek', 'url'=>array('create')),
	array('label'=>'Urejanje vsebin', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
);
?>

<?php Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/assets/vsebine_index.js',
	CClientScript::POS_HEAD
	);
	?>
	
	<h1>Vsebine</h1>

<?php if(Yii::app()->user->checkAccess('admin')):?>
<?php 

	$ids="";
	$names="";
	$strani= Strani::model()->findAllByAttributes(array('state'=>1));
	foreach ($strani as $stran) {
		$ids.=$stran->id;
		$names.="'$stran->naslov'";
		if($stran!= end($strani)){
			$ids.=',';
			$names.=',';
		}
	}
 $s="var importSiteIds = new Array($ids); 
	 var importSiteNames = new Array($names);
	";

	Yii::app()->clientScript->registerScript('import-global-vars',$s, CClientScript::POS_HEAD );
?>

<div class="import-form" style="width:100%;height:30px;">
	<?php echo CHtml::button("Osveži", array('onclick'=>'js:osvezi()', 'style'=>'float:left'));?>
	<?php echo CHtml::button("Uvozi", array('onclick'=>'js:uvoz()', 'style'=>'float:left'));?>
	<?php $this->widget('zii.widgets.jui.CJuiProgressBar', array(
	    'id'=>'progress',
	    'value'=>0,
	    'htmlOptions'=>array(
	        'style'=>'width:200px; height:20px; float:left; display:none;'
	    ),
	));?>
</div>

<div id="import-report">
 
</div>
<?php endif;?>

<?php 
//echo Yii::app()->user->id;
$this->widget('zii.widgets.CListView', array(
	'id'=>'vsebine-list-view',
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
//	 'sortableAttributes'=>array(
//		'title',
//	     'imported',   
//		 'created',
//	   	
//    ),
    'pager'=>array(
        'class'=>'ext.yiinfinite-scroll.YiinfiniteScroller',
        'contentSelector' => '#vsebine-list-view div.items',
        'itemSelector' => 'div.view',
    )
)); ?>
