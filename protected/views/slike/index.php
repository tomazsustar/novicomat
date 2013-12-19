<?php
$this->breadcrumbs=array(
	'Slikes',
);

$this->menu=array(
	array('label'=>'Create Slike', 'url'=>array('create')),
	array('label'=>'Manage Slike', 'url'=>array('admin')),
);
?>

<h1>Slikes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
