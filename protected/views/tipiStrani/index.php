<?php
$this->breadcrumbs=array(
	'Tipi Strani',
);

$this->menu=array(
	array('label'=>'Create TipiStrani', 'url'=>array('create')),
	array('label'=>'Manage TipiStrani', 'url'=>array('admin')),
);
?>

<h1>Tipi Strani</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
