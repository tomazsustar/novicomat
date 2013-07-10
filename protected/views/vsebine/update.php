<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Uredi',
);

$this->menu=array(
	array('label'=>'Vsebine', 'url'=>array('index')),
	array('label'=>'Dodaj prispevek', 'url'=>array('create')),
	array('label'=>'Pregled pispevka', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Urejanje vsebin', 'url'=>array('admin')),
);
?>

<h1>Uredi: <?php echo $model->title; ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers)); ?>
