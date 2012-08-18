<?php
$this->breadcrumbs=array(
	'Tipi Strani'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipiStrani', 'url'=>array('index')),
	array('label'=>'Create TipiStrani', 'url'=>array('create')),
	array('label'=>'Update TipiStrani', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipiStrani', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipiStrani', 'url'=>array('admin')),
);
?>

<h1>View TipiStrani #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'opis',
		'parser',
	),
)); ?>
