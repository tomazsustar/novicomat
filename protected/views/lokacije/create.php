<?php
$this->breadcrumbs=array(
	'Lokacijes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lokacije', 'url'=>array('index')),
	array('label'=>'Manage Lokacije', 'url'=>array('admin')),
);
?>

<h1>Create Lokacije</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>