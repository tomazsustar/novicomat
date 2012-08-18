<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Uredi',
);

$this->menu=array(
	array('label'=>'List Vsebine', 'url'=>array('index')),
	array('label'=>'Create Vsebine', 'url'=>array('create')),
	array('label'=>'View Vsebine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vsebine', 'url'=>array('admin')),
);
?>

<h1>Uredi: <?php echo $model->title; ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>