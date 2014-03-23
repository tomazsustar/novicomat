<div class="slide10a" id="contact-form-placeholder">

<div class="container clearfix">

<div class="grid_12">
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success successfully">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>
<div class="contact-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'yii-contact-form',
	'action'=>Yii::app()->createUrl(Yii::app()->controller->id. '/contact'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'afterValidate'=>'js:mySubmitFormFunction',
	),
)); ?>

	<!-- p class="note">Fields with <span class="required">*</span> are required.</p -->
	
	<?php //echo $form->errorSummary($model); ?>
	<div class="grid_6">
		<div class="row">
			<?php // echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('placeholder'=>$model->getAttributeLabel('name'))); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	
		<div class="row">
			<?php //echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array('placeholder'=>$model->getAttributeLabel('email'))); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	
		<div class="row">
			<?php //echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject',array('placeholder'=>$model->getAttributeLabel('subject'))); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>
		<?php if(CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php // echo $form->labelEx($model,'verifyCode'); ?>
			<div class="captcha-img">			
			<?php $this->widget('CCaptcha', array('buttonType'=>'button', 'buttonOptions'=>array( 'type'=>'image','src'=>Yii::app()->baseUrl.'/slike/refresh-icon.png', 'title'=>'Hočem drugo kodo'))); ?>
			</div><div class="captcha-field">	
			<?php echo $form->textField($model,'verifyCode', array('placeholder'=>"Prepiši črke iz sličice na levi")); ?>
			<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<!-- div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div -->
			
		</div>
		<?php endif; ?>
	</div>
	<div class="grid_6 omega">
		<div class="row">
			<?php //echo $form->labelEx($model,'body'); ?>
			<?php echo $form->textArea($model,'body',array('placeholder'=>$model->getAttributeLabel('body'))); ?>
			<?php echo $form->error($model,'body'); ?>
		</div>
	
		
	</div>
	<div class="clear"></div>					

		<?php echo CHtml::submitButton('Pošlji', array('class'=>"contact-button")); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="clear"></div>
	<?php if(Yii::app()->controller->id=='vsebine')://if ($this->)?>
	<div class="grid_12">
		<ul class="contact-info">
			<li class="fontawesome-icon icon-envelope"><span> info@zaokrozi.si</span></li>
		</ul>
	</div>
	</div>
	<?php endif;?>
<?php endif; ?>

</div>
</div>