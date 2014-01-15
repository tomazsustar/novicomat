<?php
$this->breadcrumbs=array(
	'Vsebine'=>array('adminIndex'),
	'Dodaj prispevek',
);

$this->menu=array(
	array('label'=>'Prispevki', 'url'=>array('adminIndex')),
	array('label'=>'Urejanje vsebin', 'url'=>array('admin')),
);
?>

<h1>Dodaj prispevek</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers)); ?>
