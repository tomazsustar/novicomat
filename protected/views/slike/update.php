<?php
$this->breadcrumbs=array(
	'Slikes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Slike', 'url'=>array('index')),
	array('label'=>'Create Slike', 'url'=>array('create')),
	array('label'=>'View Slike', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Slike', 'url'=>array('admin')),
);
?>

<h1>Update Slike <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>