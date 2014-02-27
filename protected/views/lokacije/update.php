<?php
/* @var $this LokacijeController */
/* @var $model Lokacije */

$this->breadcrumbs=array(
	'Lokacijes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lokacije', 'url'=>array('index')),
	array('label'=>'Create Lokacije', 'url'=>array('create')),
	array('label'=>'View Lokacije', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lokacije', 'url'=>array('admin')),
);
?>

<h1>Update Lokacije <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>