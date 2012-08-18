<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipi-strani-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'opis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parser'); ?>
		<?php echo $form->textArea($model,'parser',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'parser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->