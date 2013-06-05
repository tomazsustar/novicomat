<div class="form" id="popupForm">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slike-form',
	'enableAjaxValidation'=>false,
)); 

$size=getimagesize(str_replace(' ', '%20', $model->url));
$width=$size[0]; $height = $size[1];
$scale=1;
$style="";
if($width/$height > 600/401){
	if($width>600){
		$style = 'width:600px';
		$scale = 600/$width;
		
	}
	$initial_width = round(600*$height/401);
	$initial_height = $height;
	
}else{
	if($height>401){
		$style = 'height:401px';
		$scale = 401/$height;
	}
	
	$initial_width = $width;
	$initial_height = round(401*$width/600);
}



$this->widget(
    'ext.imgAreaSelect.JImgAreaSelect',
    array(
        'selector' => 'img#photo',
        'apiVarName' => 'ias',
        // 'selectionAreaBorderAnimated'=>true,
        'options' => array( 
    		'x1'=>'0',
    		'x2'=>$initial_width,
    		'y1'=>'0',
    		'y2'=>$initial_height,
    		'imageWidth'=>$width,
    		'imageHeight'=>$height,
    		'parent'=>'#popup',
            'handles' => 'true',
    		'aspectRatio'=>'265:177',
            'onSelectEnd' => "js: function (img, selection) {
						            $('input[name=\"x1\"]').val(selection.x1);
						            $('input[name=\"y1\"]').val(selection.y1);
						            $('input[name=\"x2\"]').val(selection.x2);
						            $('input[name=\"y2\"]').val(selection.y2); 
						            $('input[name=\"width\"]').val(selection.width);
						            $('input[name=\"height\"]').val(selection.height);            
						        }"
             
        
    	)
    )
);
?>



<?php echo CHtml::image(
				$model->url,     //src
				"uredi slikco", //alt
				array('id'=>'photo', 'style'=>$style)
			); 
			

echo CHtml::hiddenField('x1','0');
echo CHtml::hiddenField('x2',$initial_width);
echo CHtml::hiddenField('y1','0');
echo CHtml::hiddenField('y2',$initial_height);
echo CHtml::hiddenField('width',$initial_width);
echo CHtml::hiddenField('height',$initial_height);		
//echo CHtml::activeHiddenField($model, 'id');		
			
			?>
			

<div class="row buttons">
        <?php echo CHtml::ajaxSubmitButton(Yii::t('slika','Obreži'),CHtml::normalizeUrl(array('slike/obrezi', 'id'=>$model->id)),
        		array(
        			'success'=>'js: function(data) {
                        $("img.slikca-'.$model->id.'").attr("src","'.$model->url2.'?_="+(new Date()).getTime() );
                        $("#popup").dialog("close");
                    }'),
        		array('id'=>'close')); ?>
    </div>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url2'); ?>
		<?php echo $form->textArea($model,'url2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'opis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avtor'); ?>
		<?php echo $form->textField($model,'avtor',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'avtor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datum'); ?>
		<?php echo $form->textField($model,'datum'); ?>
		<?php echo $form->error($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
-->
<?php $this->endWidget(); ?>

</div><!-- form -->