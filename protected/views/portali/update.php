<?php
$this->breadcrumbs=array(
	'Portalis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Portali', 'url'=>array('index')),
	array('label'=>'Create Portali', 'url'=>array('create')),
	array('label'=>'View Portali', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Portali', 'url'=>array('admin')),
);
?>

<h1>Update Portali <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>