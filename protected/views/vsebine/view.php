<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('adminIndex'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Vsebine', 'url'=>array('adminIndex')),
	array('label'=>'Dodaj prispevek', 'url'=>array('create')),
	array('label'=>'Uredi prispevek', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Izbriši pispevek', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ali ste prepričani, da želite izbrisati to vsebino?')),
	array('label'=>'Urajanje vsebin', 'url'=>array('admin')),
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
