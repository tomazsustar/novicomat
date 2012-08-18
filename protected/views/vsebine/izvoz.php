<?php
$this->breadcrumbs=array(
	'Vsebine - Izvoz',
);

$this->menu=array(
	array('label'=>'Create Vsebine', 'url'=>array('create')),
	array('label'=>'Manage Vsebine', 'url'=>array('admin')),
);
?>

<h1>Vsebine - Izvoz</h1>

<?php echo CHtml::beginForm(array('content/izvoziVse'), 'post')?>
<?php echo CHtml::submitButton('Izvozi')?>
<?php echo CHtml::endForm()?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	 'sortableAttributes'=>array(
		'title',
	     'imported',   
		 'created',
	   	
    ),
)); ?>
