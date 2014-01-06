<?php
$this->pageTitle=Yii::app()->name . ' - Prijava';
$this->breadcrumbs=array(
	'Prijava',
);
?>

<h1>Prijava</h1>

<p>Prosim izpolnite spodnji obrazec z vašim uporabniškim imenom in geslom.</p>
<p>Če uporabniškega imena in gesla še nimate, 
<a href="http://www.zelnik.net/index.php/component/users/?view=registration">
se lahko registrirate tukaj.</a></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Prijava'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
