<?php Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/assets/vsebine_form.js',
	CClientScript::POS_HEAD
	);
	?>
<?php 

 

	//Yii::app()->clientScript->registerScript('import-global-vars',$s, CClientScript::POS_HEAD );?>

<div class="form">

<?php 

$form=$this->beginWidget('ZActiveForm', array(
	'id'=>'vsebine-form',
	'enableAjaxValidation'=>false,
	'focus' => '#Vsebine_title',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
      //'clientOptions' => array(
      //                  'validateOnSubmit' => true,
      //                  'beforeValidate' => 'js:beforeValidate',
       //         ),
)); ?>
<?php if($model->virLink):?>
	<p class="note">Vir: <?php echo $model->virLink;?>, 
				uvožen: <?php echo $model->imported;?>, 
				datum izvirnika: <?php $model->created;?></p>
<?php endif;?>

	<?php echo $form->errorSummary(array_merge(array($model),$validatedMembers)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('style'=>'width:100%;', 'tabindex'=>1) ); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div id="popup"></div>

	
    	



	<?php 


	$memberFormConfig = array(
      'elements'=>array(
        'naslov'=>array(
            'type'=>'text',
			'style'=>'width:230px',
        ),
        'zacetek'=>array(
            'type'=>'application.extensions.timepicker.EJuiDateTimePicker',
            	'options' => array(
     		 // 'ampm' => true,
		//'stepMinute' => 10,
		//'appendText'=>'dd.MM.LLLL UU:mm',
		'alwaysSetTime'=> false,
		'timeFormat' => 'hh:mm',
		'dateFormat' => 'dd.mm.yy',
		'showHour' => false,
		'showMinute' => false,
	       //'timeOnly' => true,
	       //'onSelect'=>"js:function(dateText, inst){calendarSelect(dateText, inst);}",
		// 'onClose'=>"js:function(dateText, inst){".$onchange.";}",
	    ),
	),
        'konec'=>array(
		'type'=>'application.extensions.timepicker.EJuiDateTimePicker',
            	'options' => array(
     		 // 'ampm' => true,
		//'stepMinute' => 10,
		//'appendText'=>'dd.MM.LLLL UU:mm',
		'alwaysSetTime'=> false,
		'timeFormat' => 'hh:mm',
		'dateFormat' => 'dd.mm.yy',
		'showHour' => false,
		'showMinute' => false,
	       //'timeOnly' => true,
	       //'onSelect'=>"js:function(dateText, inst){calendarSelect(dateText, inst);}",
		// 'onClose'=>"js:function(dateText, inst){".$onchange.";}",
	    ),
	),

 	/*'id_vsebine'=>array(
            'type'=>'text',
            'maxlength'=>40,
        ),*/
	'lokacija'=>array(
            'type'=>'text',
			'style'=>'width:230px',
            //'maxlength'=>,
        ),/*
	'id_lokacija'=>array(
            'type'=>'text',
            'maxlength'=>40,
        ),*/
    ));	
	
	$this->widget('ext.multimodelform.MultiModelForm',array(
	'tableView' => true,
        'id' => 'id_jajca', //the unique widget id
        'formConfig' => $memberFormConfig, //the form configuration array
        'model' => $member, //instance of the form model
 		'addItemText' => 'Dodaj dogodek',
		'removeText' => 'Odstrani',
        //if submitted not empty from the controller,
        //the form will be rendered with validation errors
        'validatedItems' => $validatedMembers,
 		
        //array of member instances loaded from db
        'data' => $member->findAll('id_vsebine=:groupId', array(':groupId'=>$model->id)),
	//'hideCopyTemplate' => false, //should be set to false

	'jsAfterNewId' => MultiModelForm::afterNewIdDateTimePicker($memberFormConfig['elements']['zacetek']),
	'onAddItemClick' => 'kopirajNaslov();',
	//'jsAfterClone' => 'alert(this);'
		'options'=>array('clearInputs'=>false),
    ));


/*
$this->widget('ext.jqrelcopy.JQRelcopy',
                 array(
                       'id' => 'copylink',
                       'removeText' => 'remove' //uncomment to add remove link
                       )
);
<a id="copylink" href="#" rel="div.kopiraj">Copy</a>
*/
?>
<?php /*	
	 <table>
		<tr >
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
</table>
*/ ?>
 
	
	<table>
		<tr>
			<td >
				<?php echo CHTML::label("Naslovna slika", "slika")?>	
				<div id="naslovna_slika" style="width:265px;">
					<?php $form->slike($model->slvs,1, "265px", false);?>
				</div>
				
			</td>
			<td style="vertical-align:top;">
					
				<?php echo $form->labelEx($model,'introtext'); ?>	
				<br>	
				<?php echo $form->textArea($model,'introtext',array('rows'=>10, 'cols'=>40, 'tabindex'=>4)); ?>
				<?php echo $form->error($model,'introtext'); ?>
				
			</td>
			<td>
				<div class="row" style="width:60px;" >
					<?php echo $form->labelEx($model,'frontpage'); ?>
					<?php echo $form->checkbox($model, 'frontpage'); ?>
					<?php echo $form->error($model,'frontpage'); ?>
				</div>
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
				<div class="row">
					<?php echo $form->labelEx($model,'publish_down'); ?>
					<?php $form->dateTimePicker($model,'publish_down');?>
					<?php echo $form->error($model,'publish_down'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				
				<?php //echo $form->labelEx($model,'activeFile'); ?>
				<?php echo CHtml::activeFileField($model,'activeFile',array('style'=>'width:100%;','tabindex'=>2) ); ?>
				
				<?php echo $form->error($model,'activeFile'); ?>
				<div class="row">
					<?php echo $form->labelEx($model,'slika'); ?>
					<?php echo $form->textField($model,'slika',array('style'=>'width:100%;','tabindex'=>3) ); ?>
					<?php echo $form->error($model,'slika'); ?>
				</div>
			</td>
			<td>
				<?php echo CHtml::image(Yii::app()->baseUrl."/slike/ajax-loader.gif",'Nalagam...', array('id'=>'loading-img1','style'=>'display:none;'));?>
			
			</td>
			<td>
			</td>
		</tr>
	</table>
	
	
	<table>
	<tr>
		<td>
			<div class="row">
				<?php echo $form->labelEx($model,'fulltext'); ?>		
				<?php //echo $form->textArea($model,'text',array('rows'=>20, 'cols'=>90)); ?>
				<?php echo $form->error($model,'fulltext'); ?>
				<?php 
				$options;
				if(Yii::app()->user->checkAccess('vseMoznostiUrejevalnika')){
					$form->widget('application.extensions.tinymce.ETinyMce', 
						array('model'=>$model,
							'attribute'=>'fulltext',
						    'editorTemplate'=>'full',	
							'useSwitch'=>false	
						));
				}else{
					$form->widget('application.extensions.tinymce.ETinyMce', 
						array('model'=>$model,
							'attribute'=>'fulltext',
						    'editorTemplate'=>'simple',		
							'useSwitch'=>false	
						));
				} 
					?>
			</div>
			<div class="row">
				<?php echo CHtml::Label('Priponke:', 'priponke', array('style'=>'display:inline;'));?>
				<?php echo CHtml::fileField('priponke','',array('style'=>'display:inline;','multiple'=>'multiple') ); ?>
				<?php echo CHtml::image(Yii::app()->baseUrl."/slike/ajax-loader.gif",'Nalagam...', array('id'=>'loading-img4','style'=>'display:none;'));?>
				<div id="priponke_div" style="float:left;width:100%;margin-bottom:10px">
						<?php $form->priponke($model->slvs);?>
				</div>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'video'); ?>
				<?php echo $form->textField($model,'video',array('size'=>60)); ?>
				<?php echo $form->error($model,'video'); ?>
				<div id="video">
					<?php echo ZVideoHelper::insertVideo($model->video);?>
				</div>
			</div>
			<div class="row">
				<?php echo CHtml::Label('Naloži galerijo:', 'nalozi_galerijo', array('style'=>'display:inline;'));?>
				<?php echo CHtml::fileField('nalozi_galerijo','',array('style'=>'display:inline;', 'multiple'=>'multiple') ); ?>
				<?php echo CHtml::image(Yii::app()->baseUrl."/slike/ajax-loader.gif",'Nalagam...', array('id'=>'loading-img3','style'=>'display:none;'));?>
				<div id="galerija" style="float:left;width:100%;margin-bottom:10px">
						<?php $form->slike($model->slvs,3,'100px');?>
				</div>
			</div>
			
	
			<div class="row">
				<?php echo $form->labelEx($model,'author_alias'); ?>
				<?php echo $form->textField($model,'author_alias',array('size'=>60,'maxlength'=>256)); ?>
				<?php if(Yii::app()->user->checkAccess('admin')):?>
					<br><?php echo $model->getAttributeLabel('author'); ?>:&nbsp;<?php echo $model->author; ?>
				<?php endif;?>
				<?php echo $form->error($model,'author_alias'); ?>
			</div>
			
			<?php 
				$model->checkPortali()
				
//				if($model->isNewRecord && !$model->hasErrors()){
//					
//				}
				
				?>
				
			<div class="row">
				<?php echo $form->labelEx($model,'tags'); ?>
				<?php //echo $form->textField($model,'tags',array('size'=>60)); ?>
				<?php $form->autocompleteField($model,'tags', 'Vsebine/aclist',  array('size'=>60)); ?>
				<?php echo $form->error($model,'tags'); ?>
			</div>
			<div class="row">
				
				<?php 
				if(count($model->portali)){
					echo CHtml::Label('Objavi na:', 'Portali');
					$i=1;
					foreach ($model->portali as $portal){
						$options=array();
						if($portal->tip==2)
							$options['onclick']='addTagFromCbx(document.getElementById("tags"), this, "'.$portal->tag.'")';
						echo CHtml::checkBox("Portali[$portal->id]", $portal->checked, $options).$portal->domena;
						if($i<count($model->portali))echo ', '; $i++;
					}
				}
				?>
			</div>
			<?php /*
			<div class="row">
				<?php echo $form->labelEx($model,'lokacija'); ?>
				<?php echo $form->textField($model,'lokacija',array('size'=>60)); ?>
				<?php echo $form->error($model,'lokacija'); ?>
			</div>
			 */?>
		<?php if(Yii::app()->user->checkAccess('zelnik.net-objava')):?>					
		<table>
			<tr>
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
					</td>
					<td>
						
					
						<div class="row">
							<?php echo $form->labelEx($model,'catid'); ?>
							<?php //echo $form->dropDownList($model, 'catid', array()); ?>
							<?php echo $form->dropDownList($model, 'catid', Categories::listBySection($model->sectionid),
										array('prompt'=>'Izberi kategorijo:',
											'onchange' => 'addTagFromSelect(document.getElementById("tags"), this)')); ?>
							<?php echo $form->error($model,'catid'); ?>
						</div>
					</td>
					<td>
					
						<div class="row">
							<?php echo $form->labelEx($model,'event_cat'); ?>
							<?php //echo $form->dropDownList($model, 'catid', array()); ?>
							<?php echo $form->dropDownList($model, 'event_cat', Categories::listJevCat(),
										array('prompt'=>'Izberi kategorijo:', 'style'=>'width:250px;')); ?>
							<?php echo $form->error($model,'event_cat'); ?>
						</div>
					</td>
				</tr>
			</table>
			<?php endif; //zelnik.net-objava?>
		</td>
		<td>
			<div class="row">
				<?php echo CHtml::Label('Naloži sliko iz URL naslova', 'vstavi_sliko');?>
				<?php echo CHtml::textField('vstavi_sliko','',array('style'=>'width:100%;')); ?>
			</div>
			<?php echo CHtml::Label('Naloži slike iz računalnika', 'vstavi_sliko'); ?>
			<?php echo CHtml::fileField('nalozi_sliko','',array('style'=>'width:100%;', 'multiple'=>'multiple') ); ?>

			<?php //echo $form->labelEx('&nbsp;'); ?>
			<?php echo CHtml::image(Yii::app()->baseUrl."/slike/ajax-loader.gif",'Nalagam...', array('id'=>'loading-img2','style'=>'display:none;'));?>
			<div id="slike">
				<?php $form->slike($model->slvs,2);?>
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
		<?php echo CHtml::submitButton('Objavi/Pošlji v pregled', 			array('onclick'=>"$('#Vsebine_state').val(2)", 'name'=>'objavi')); ?>
		<?php if(Yii::app()->user->checkAccess('admin'))
					echo CHtml::submitButton('Shrani v Joomlo', 	array('onclick'=>"$('#Vsebine_state').val(1)", 'name'=>'joomla')); ?>
		<?php if(Yii::app()->user->checkAccess('admin'))
					echo CHtml::submitButton('Zavrzi', 			array('onclick'=>"$('#Vsebine_state').val(3)", 'name'=>'zavrzi')); ?>
		<?php echo CHtml::submitButton('Prekliči', 			array('name'=>'preklici')); ?>
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
 
 <?php 

 $s="
 	var base_url='".Yii::app()->baseUrl."';
 	var ajax_url_url = '".Yii::app()->createAbsoluteUrl("slike/naloziSlikoIzUrl")."'; 
 	var ajax_url = '".Yii::app()->createAbsoluteUrl("slike/naloziSliko")."'; 
 	var ajax_url_crop = '".Yii::app()->createUrl("slike/popup")."'; 
 	img_count = ".$form->img_count.";
	";
 

	Yii::app()->clientScript->registerScript('import-global-vars',$s, CClientScript::POS_HEAD );?>
<?php $this->endWidget(); ?>

</div><!-- form -->
