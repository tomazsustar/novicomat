<?php
/* @var $this LokacijeController */
/* @var $model Lokacije */

$this->breadcrumbs=array(
	'Lokacijes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Prebrskaj Lokacije', 'url'=>array('index')),
	array('label'=>'Uredi Lokacije', 'url'=>array('admin')),
);
?>

<h1>Ustvari Lokacijo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>