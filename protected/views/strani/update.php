<?php
$this->breadcrumbs=array(
	'Strani'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Strani', 'url'=>array('index')),
	array('label'=>'Create Strani', 'url'=>array('create')),
	array('label'=>'View Strani', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Strani', 'url'=>array('admin')),
);
?>

<h1>Uredi Stran <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>