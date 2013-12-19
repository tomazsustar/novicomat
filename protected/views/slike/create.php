<?php
$this->breadcrumbs=array(
	'Slikes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Slike', 'url'=>array('index')),
	array('label'=>'Manage Slike', 'url'=>array('admin')),
);
?>

<h1>Create Slike</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>