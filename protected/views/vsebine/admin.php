<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('index'),
	'Pregled vsebin',
);

$this->menu=array(
	array('label'=>'List Vsebine', 'url'=>array('index')),
	array('label'=>'Create Vsebine', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vsebine-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pregled vsebin</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vsebine-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
//		'introtext',
//		'fulltext',
		'state',
//		'sectionid',
//		'catid',
//		'author',
		'created',
		'imported',
//		'checked_out',
//		'checked_out_time',
//		'edited',
//		'edited_by',
//		'publish_up',
//		'publish_down',
//		'tags',
		'site_id',
		'stran.naslov',
//		'start_date',
//		'end_date',
//		'import_checksum',
//		'original_changed',
//		'export_checksum',
//		'global_id',
//		'params',
//		'vir_url',
//		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
