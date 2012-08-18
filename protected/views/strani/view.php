<?php
$this->breadcrumbs=array(
	'Strani'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Strani', 'url'=>array('index')),
	array('label'=>'Create Strani', 'url'=>array('create')),
	array('label'=>'Update Strani', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Strani', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Strani', 'url'=>array('admin')),
);
?>

<h1>View Strani #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'home_url',
		'url',
		'parser',
		'last_update',
		'last_update_hash',
		'urnik',
		'porocilo',
		'naslov',
		'vir_text',
		'catid',
		'sectionid',
		'event_cat',
		'author_alias',
		'tags',

	),
)); ?>
