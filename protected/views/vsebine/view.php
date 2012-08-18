<?php
$this->breadcrumbs=array(
	'Vsebines'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Vsebine', 'url'=>array('index')),
	array('label'=>'Create Vsebine', 'url'=>array('create')),
	array('label'=>'Update Vsebine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vsebine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vsebine', 'url'=>array('admin')),
);
?>

<h1>View Vsebine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'introtext',
		'fulltext',
		'state',
		'sectionid',
		'catid',
		'author',
		'created',
		'imported',
		'checked_out',
		'checked_out_time',
		'edited',
		'edited_by',
		'publish_up',
		'publish_down',
		'tags',
		'site_id',
		'start_date',
		'end_date',
		'import_checksum',
		'original_changed',
		'export_checksum',
		'global_id',
		'params',
		'vir_url',
		'event_cat',
		'frontpage',
		'lokacija',
	),
)); ?>
