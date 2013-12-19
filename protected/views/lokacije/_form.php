<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lokacije-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'naziv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ulica'); ?>
		<?php echo $form->textField($model,'ulica',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'ulica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_st'); ?>
		<?php echo $form->textField($model,'h_st',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'h_st'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postna_st'); ?>
		<?php echo $form->textField($model,'postna_st',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'postna_st'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posta'); ?>
		<?php echo $form->textField($model,'posta',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'posta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dod_naslov'); ?>
		<?php echo $form->textArea($model,'dod_naslov',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'dod_naslov'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'drzava'); ?>
		<?php echo $form->textField($model,'drzava',array('size'=>60,'maxlength'=>265)); ?>
		<?php echo $form->error($model,'drzava'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_vsebine'); ?>
		<?php echo $form->textField($model,'id_vsebine'); ?>
		<?php echo $form->error($model,'id_vsebine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kontakt'); ?>
		<?php echo $form->textArea($model,'kontakt',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'kontakt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_stars'); ?>
		<?php echo $form->textField($model,'id_stars'); ?>
		<?php echo $form->error($model,'id_stars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rezervacije'); ?>
		<?php echo $form->textField($model,'rezervacije'); ?>
		<?php echo $form->error($model,'rezervacije'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'izbira'); ?>
		<?php echo $form->textField($model,'izbira'); ?>
		<?php echo $form->error($model,'izbira'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->