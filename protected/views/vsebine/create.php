<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('index'),
	'Dodaj prispevek',
);

$this->menu=array(
	array('label'=>'Prispevki', 'url'=>array('index')),
	array('label'=>'Urejanje vsebin', 'url'=>array('admin')),
);
?>

<h1>Dodaj prispevek</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers)); ?>
