<?php
$this->breadcrumbs=array(
	'Portalis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Portali', 'url'=>array('index')),
	array('label'=>'Create Portali', 'url'=>array('create')),
	array('label'=>'Update Portali', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Portali', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Portali', 'url'=>array('admin')),
);
?>

<h1>View Portali #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'domena',
		'tag',
		'tip',
	),
)); ?>
