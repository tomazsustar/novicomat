<?php
$this->breadcrumbs=array(
	'Portalis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Portali', 'url'=>array('index')),
	array('label'=>'Manage Portali', 'url'=>array('admin')),
);
?>

<h1>Create Portali</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>