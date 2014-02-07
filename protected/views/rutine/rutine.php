<div class="form" id="popupForm">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slike-form',
	'enableAjaxValidation'=>false,
)); 

?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('RBAC', array('name'=>'RBAC')); ?>
		<?php echo CHtml::submitButton('Generiraj aliase za vse značke', array('name'=>'tags')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->