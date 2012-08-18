<?php
$this->breadcrumbs=array(
	'Tipi Strani'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipiStrani', 'url'=>array('index')),
	array('label'=>'Manage TipiStrani', 'url'=>array('admin')),
);
?>

<h1>Create TipiStrani</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>