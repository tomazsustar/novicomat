<?php
$this->breadcrumbs=array(
	'Lokacijes',
);

$this->menu=array(
	array('label'=>'Create Lokacije', 'url'=>array('create')),
	array('label'=>'Manage Lokacije', 'url'=>array('admin')),
);
?>

<h1>Lokacijes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
