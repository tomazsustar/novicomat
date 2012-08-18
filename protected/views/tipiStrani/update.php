<?php
$this->breadcrumbs=array(
	'Tipi Strani'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipiStrani', 'url'=>array('index')),
	array('label'=>'Create TipiStrani', 'url'=>array('create')),
	array('label'=>'View TipiStrani', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipiStrani', 'url'=>array('admin')),
);
?>

<h1>Update TipiStrani <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>