<?php Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/assets/vsebine_form.js',
	CClientScript::POS_HEAD
	);
	?>

<div class="form">

<?php $form=$this->beginWidget('ZActiveForm', array(
	'id'=>'vsebine-form',
	'enableAjaxValidation'=>false,
	'focus' => '#Vsebine_title',
      //'clientOptions' => array(
      //                  'validateOnSubmit' => true,
      //                  'beforeValidate' => 'js:beforeValidate',
       //         ),
)); ?>

	<p class="note">Vir: <?php echo $model->virLink;?>, 
				uvožen: <?php echo ZDate::formDateTime_php($model->imported);?>, 
				datum izvirnika: <?php echo ZDate::formDateTime_php($model->created)?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('style'=>'width:100%;') ); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<table>
		<tr>
			<td>
				<div class="row" >
					<?php echo $form->labelEx($model,'koledar'); ?>
					<?php echo $form->checkbox($model, 'koledar', array('onchange'=>'checkKoledar()')); ?>
					<?php echo $form->error($model,'koledar'); ?>
				</div>
			</td>
			<td colspan="2">
				<div class="row">
					<?php echo $form->labelEx($model,'koledar_naslov'); ?>
					<?php echo $form->textField($model,'koledar_naslov',array('style'=>'width:100%;') ); ?>
					<?php echo $form->error($model,'koledar_naslov'); ?>
				</div>
			</td>
		
			<td>
				<div class="row" >
					<?php echo $form->labelEx($model,'start_date'); ?>
					<?php //echo ZDate::dbDateTime_php('10.11.2008 14:30')?>
					<?php $form->dateTimePicker($model,'start_date', false, "startDateChanged");?>
					<?php echo $form->error($model,'start_date'); ?>
						
				</div>
			</td>
			<td>
				<div class="row" >
					<?php echo $form->labelEx($model,'end_date'); ?>
					<?php $form->dateTimePicker($model,'end_date', false, "endDateChanged");?>
					<?php echo $form->error($model,'end_date'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row" style="width:60px;" >
					<?php echo $form->labelEx($model,'frontpage'); ?>
					<?php echo $form->checkbox($model, 'frontpage'); ?>
					<?php echo $form->error($model,'frontpage'); ?>
				</div>
			</td>
			<td>
				<div class="row">
					<?php echo $form->labelEx($model,'publish_up'); ?>
					<?php if(trim($model->publish_up)=="" && trim($model->start_date)==""){
						//echo "AAAAAAAA".ZDate::formNow();
							 	$form->dateTimePicker($model,'publish_up', ZDate::formNow());
					}else{ //echo "BBBBBBBBBB";
						$form->dateTimePicker($model,'publish_up');	 
					}?>
					<?php echo $form->error($model,'publish_up'); ?>
				</div>
			</td>
			<td>
				<div class="row">
					<?php echo $form->labelEx($model,'publish_down'); ?>
					<?php $form->dateTimePicker($model,'publish_down');?>
					<?php echo $form->error($model,'publish_down'); ?>
				</div>
			</td>
			<td>
				<div class="row" >
					<?php echo $form->labelEx($model,'show_intro'); ?>
					<?php //echo $form->dropDownList($model, 'catid', array()); ?>
					<?php echo $form->checkbox($model, 'show_intro'); ?>
					<?php echo $form->error($model,'show_intro'); ?>
				</div> 
			</td>
		</tr>
	</table>
	
	

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>		
		<?php //echo $form->textArea($model,'text',array('rows'=>20, 'cols'=>90)); ?>
		<?php echo $form->error($model,'text'); ?>
		<?php 
		$options;
		$form->widget('application.extensions.tinymce.ETinyMce', 
			array('model'=>$model,
				'attribute'=>'text',
			    'editorTemplate'=>'full',			
			)); ?>
	</div>
	
	
		<table>
		<tr>
		<td style="width:400px;">
		
				<div class="row">
					<?php echo $form->labelEx($model,'author_alias'); ?>
					<?php echo $form->textField($model,'author_alias',array('size'=>60,'maxlength'=>256)); ?>
					<br><?php echo $model->getAttributeLabel('author'); ?>:&nbsp;<?php echo $model->author; ?>
					<?php echo $form->error($model,'author_alias'); ?>
				</div>
					
					<div class="row">
						<?php echo $form->labelEx($model,'tags'); ?>
						<?php //echo $form->textField($model,'tags',array('size'=>60)); ?>
						<?php $form->autocompleteField($model,'tags', 'Vsebine/aclist',  array('size'=>60)); ?>
						<?php echo $form->error($model,'tags'); ?>
					</div>
					<div class="row">
						<?php echo $form->labelEx($model,'lokacija'); ?>
						<?php echo $form->textField($model,'lokacija',array('size'=>60)); ?>
						<?php echo $form->error($model,'lokacija'); ?>
					</div>
	
		</td>
		<td>
				<div class="row">
				<?php //echo '<pre>';print_r($expression)?>
					<?php echo $form->labelEx($model,'sectionid'); ?>
					<?php echo $form->dropDownList($model, 'sectionid', CHtml::listData(Sections::model()->findAll(), 'id', 'title'),
									array(
										'ajax' => array(
											'type'=>'POST', //request type
											'url'=>CController::createUrl('Vsebine/loadCategories'), //url to call.
											//Style: CController::createUrl('currentController/methodToCall')
											'update'=>'#Vsebine_catid', //selector to update
											//'data'=>'js:javascript statement' 
											//leave out the data key to pass all form values through
											),
										'prompt'=>'Izberi sekcijo:',
										'onchange' => 'addTagFromSelect(document.getElementById("tags"), this)'
									));  ?>
					<?php echo $form->error($model,'sectionid'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'catid'); ?>
					<?php //echo $form->dropDownList($model, 'catid', array()); ?>
					<?php echo $form->dropDownList($model, 'catid', Categories::listBySection($model->sectionid),
								array('prompt'=>'Izberi kategorijo:',
									'onchange' => 'addTagFromSelect(document.getElementById("tags"), this)')); ?>
					<?php echo $form->error($model,'catid'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'event_cat'); ?>
					<?php //echo $form->dropDownList($model, 'catid', array()); ?>
					<?php echo $form->dropDownList($model, 'event_cat', Categories::listJevCat(),
								array('prompt'=>'Izberi kategorijo:')); ?>
					<?php echo $form->error($model,'event_cat'); ?>
				</div>
			</td>
		</tr>
	</table>
	
	
			
	
						
		
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'introtext'); ?>
		<?php echo $form->textArea($model,'introtext',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'introtext'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fulltext'); ?>
		<?php echo $form->textArea($model,'fulltext',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'fulltext'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>
	*/	?>
	

	

	
	
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imported'); ?>
		<?php echo $form->textField($model,'imported'); ?>
		<?php echo $form->error($model,'imported'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
		<?php echo $form->error($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
		<?php echo $form->error($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edited'); ?>
		<?php echo $form->textField($model,'edited'); ?>
		<?php echo $form->error($model,'edited'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edited_by'); ?>
		<?php echo $form->textField($model,'edited_by'); ?>
		<?php echo $form->error($model,'edited_by'); ?>
	</div>
	*/	?>
	

	

	
    <?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'site_id'); ?>
		<?php echo $form->textField($model,'site_id'); ?>
		<?php echo $form->error($model,'site_id'); ?>
	</div>
    */	?>
    
	

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'import_checksum'); ?>
		<?php echo $form->textField($model,'import_checksum',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'import_checksum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'original_changed'); ?>
		<?php echo $form->textField($model,'original_changed'); ?>
		<?php echo $form->error($model,'original_changed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'export_checksum'); ?>
		<?php echo $form->textField($model,'export_checksum',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'export_checksum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'global_id'); ?>
		<?php echo $form->textField($model,'global_id',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'global_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vir_url'); ?>
		<?php echo $form->textArea($model,'vir_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'vir_url'); ?>
	</div>
    */	?>
    
    <?php echo $form->hiddenField($model, 'state')?>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Shrani'); ?>
		<?php echo CHtml::submitButton('Shrani v Joomlo', array('onclick'=>"$('#Vsebine_state').val(1)", 'name'=>'joomla')); ?>
		<?php echo CHtml::submitButton('Zavrzi', array('onclick'=>"$('#Vsebine_state').val(3)", 'name'=>'zavrzi')); ?>
	</div>
    
 <?php /*
 $js = "function beforeValidate(form) {
   if ( form.data('zavrzi') ) {
        this.validateOnSubmit = false;
        this.beforeValidate = '';
        form.submit();
        return false;
    }
    return true;
}";
Yii::app()->clientScript->registerScript('editprofile-form-beforeValidate', $js);
 */?>   
<?php $this->endWidget(); ?>

</div><!-- form -->