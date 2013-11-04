<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'strani-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'naslov'); ?>
		<?php echo $form->textField($model,'naslov',array('size'=>60)); ?>
		<?php echo $form->error($model,'naslov'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'home_url'); ?>
		<?php echo $form->textField($model,'home_url',array('size'=>64)); ?>
		<?php echo $form->error($model,'home_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parser'); ?>
		<?php echo $form->dropDownList($model,'parser', $model->getParsersList(), array('prompt'=>'Izberi parser:')); ?>
		<?php echo $form->error($model,'parser'); ?>
	</div>
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->checkbox($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	<div>
	
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'vir_text'); ?>
		<?php echo $form->textField($model,'vir_text',array('size'=>60)); ?>
		<?php echo $form->error($model,'vir_text'); ?>
	</div>
	
	<div class="row">
	<?php //echo '<pre>';print_r($expression)?>
		<?php /* echo $form->labelEx($model,'sectionid'); ?>
		<?php echo $form->dropDownList($model, 'sectionid', CHtml::listData(Sections::model()->findAll(), 'id', 'title'),
						array(
							'ajax' => array(
								'type'=>'POST', //request type
								'url'=>CController::createUrl('Strani/loadCategories'), //url to call.
								//Style: CController::createUrl('currentController/methodToCall')
								'update'=>'#Strani_catid', //selector to update
								//'data'=>'js:javascript statement' 
								//leave out the data key to pass all form values through
								),
							'prompt'=>'Izberi sekcijo:'
						));  ?>
		<?php echo $form->error($model,'sectionid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php //echo $form->dropDownList($model, 'catid', array()); ?>
		<?php echo $form->dropDownList($model, 'catid', Categories::listBySection($model->sectionid),
					array('prompt'=>'Izberi kategorijo:')); ?>
		<?php echo $form->error($model,'catid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_cat'); ?>
		<?php //echo $form->dropDownList($model, 'catid', array()); ?>
		<?php echo $form->dropDownList($model, 'event_cat', Categories::listJevCat(),
					array('prompt'=>'Izberi kategorijo:')); ?>
        <?php echo $form->error($model,'event_cat'); */?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'author_alias'); ?>
	<?php echo $form->textField($model,'author_alias',array('size'=>60,'maxlength'=>256)); ?>
	
	<?php echo $form->error($model,'author_alias'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'last_update_hash'); ?>
		<?php echo $form->textField($model,'last_update_hash',array('size'=>32)); ?>
		<?php echo $form->error($model,'last_update_hash'); ?>
	</div>
	
<?php /* 

<div class="row">
		<?php echo $form->labelEx($model,'last_update'); ?>
		<?php echo $form->textField($model,'last_update'); ?>
		<?php echo $form->error($model,'last_update'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'urnik'); ?>
		<?php echo $form->textField($model,'urnik'); ?>
		<?php echo $form->error($model,'urnik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porocilo'); ?>
		<?php echo $form->textArea($model,'porocilo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'porocilo'); ?>
	</div>
*/?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
