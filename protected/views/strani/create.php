<?php
$this->breadcrumbs=array(
	'Strani'=>array('index'),
	'Dodaj',
);

$this->menu=array(
	array('label'=>'List Strani', 'url'=>array('index')),
	array('label'=>'Manage Strani', 'url'=>array('admin')),
);
?>

<h1>Dodaj Stran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>