<?php
$this->breadcrumbs=array(
	'Vsebines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vsebine', 'url'=>array('index')),
	array('label'=>'Manage Vsebine', 'url'=>array('admin')),
);
?>

<h1>Create Vsebine</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers)); ?>
