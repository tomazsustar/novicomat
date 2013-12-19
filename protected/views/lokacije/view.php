<?php
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
		'naziv',
		'ulica',
		'h_st',
		'postna_st',
		'posta',
		'dod_naslov',
		'drzava',
		'id_vsebine',
		'kontakt',
		'location',
		'id_stars',
		'rezervacije',
		'izbira',
	),
)); ?>
