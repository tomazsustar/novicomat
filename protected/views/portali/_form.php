<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'portali-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'domena'); ?>
		<?php echo $form->textField($model,'domena',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'domena'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tip'); ?>
		<?php echo $form->textField($model,'tip'); ?>
		<?php echo $form->error($model,'tip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mejli'); ?>
		<?php echo $form->textField($model,'mejli',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'mejli'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
