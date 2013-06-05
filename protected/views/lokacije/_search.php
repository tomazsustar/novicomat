<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ulica'); ?>
		<?php echo $form->textField($model,'ulica',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'h_st'); ?>
		<?php echo $form->textField($model,'h_st',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postna_st'); ?>
		<?php echo $form->textField($model,'postna_st',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'posta'); ?>
		<?php echo $form->textField($model,'posta',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dod_naslov'); ?>
		<?php echo $form->textArea($model,'dod_naslov',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'drzava'); ?>
		<?php echo $form->textField($model,'drzava',array('size'=>60,'maxlength'=>265)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_vsebine'); ?>
		<?php echo $form->textField($model,'id_vsebine'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kontakt'); ?>
		<?php echo $form->textArea($model,'kontakt',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_stars'); ?>
		<?php echo $form->textField($model,'id_stars'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rezervacije'); ?>
		<?php echo $form->textField($model,'rezervacije'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'izbira'); ?>
		<?php echo $form->textField($model,'izbira'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->