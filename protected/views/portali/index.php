<?php
$this->breadcrumbs=array(
	'Portalis',
);

$this->menu=array(
	array('label'=>'Create Portali', 'url'=>array('create')),
	array('label'=>'Manage Portali', 'url'=>array('admin')),
);
?>

<h1>Portalis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
