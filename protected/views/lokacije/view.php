<?php
/* @var $this LokacijeController */
/* @var $model Lokacije */

$this->breadcrumbs=array(
	'Lokacijes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lokacije', 'url'=>array('index')),
	array('label'=>'Create Lokacije', 'url'=>array('create')),
	array('label'=>'Update Lokacije', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lokacije', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lokacije', 'url'=>array('admin')),
);
?>

<h1>View Lokacije #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ime_lokacije',
		'ime_prostora',
		'ime_stavbe',
		'ulica_vas',
		'h_st',
		'postna_st',
		'kraj',
		'obcina',
		'drzava',
		'level',
		'parent',
		'geolat',
		'geolng',
		'vsebina_id',
		'uporabnik_id',
		'gln',
		'created',
		'updated',
	),
)); ?>
