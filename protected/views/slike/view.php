<?php
$this->breadcrumbs=array(
	'Slikes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Slike', 'url'=>array('index')),
	array('label'=>'Create Slike', 'url'=>array('create')),
	array('label'=>'Update Slike', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Slike', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slike', 'url'=>array('admin')),
);
?>

<h1>View Slike #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'url2',
		'opis',
		'title',
		'avtor',
		'datum',
		'tags',
	),
)); ?>
