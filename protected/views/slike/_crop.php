<div class="form" id="popupForm">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slike-form',
	'enableAjaxValidation'=>false,
)); 

if(!class_exists('WideImage', false)) 
	require_once Yii::app()->basePath.'/vendors/wideimage/WideImage.php';

$size=getimagesize(str_replace(' ', '%20', $model->url));
$width=$size[0]; $height = $size[1];
	
$scale=1;
$style="";
if($width/$height > 265/177){
	if($width>600){
		$style = 'width:600px';
		
	}
	$initial_width = round(265*$height/177);
	$initial_height = $height;
	$canvas_width = $width;
	$canvas_height = round($width*177/265);
	
}else{
	if($height>401){
		$style = 'height:401px';	}
	
	$initial_width = $width;
	$initial_height = round(177*$width/265);
	$canvas_width = round($height*265/177);
	$canvas_height = $height;
}

$filename=basename($model->url);

$tmp_file=Yii::app()->params['imgDir'].'tmp/'.$filename;
$ext = pathinfo($filename, PATHINFO_EXTENSION);


WideImage::load(str_replace(' ', '%20', $model->url))
	->resizeCanvas($canvas_width, $canvas_height, 'center', 'center', 0xffffff, 'any', true)
	->saveToFile($tmp_file);

$x1=round($canvas_width-$initial_width)/2;
$x2=$x1+$initial_width;
$y1=round($canvas_height-$initial_height)/2;
$y2=$y1+$initial_height;
	
$this->widget(
    'ext.imgAreaSelect.JImgAreaSelect',
    array(
        'selector' => 'img#photo',
        'apiVarName' => 'ias',
        // 'selectionAreaBorderAnimated'=>true,
        'options' => array( 
    		'x1'=>$x1,
    		'x2'=>$x2,
    		'y1'=>$y1,
    		'y2'=>$y2,
    		'imageWidth'=>$canvas_width,
    		'imageHeight'=>$canvas_height,
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
				Yii::app()->params['imgUrl'].'tmp/'.$filename,    //src
				"uredi slikco", //alt
				array('id'=>'photo', 'style'=>$style)
			); 
			

echo CHtml::hiddenField('x1',$x1);
echo CHtml::hiddenField('x2',$x2);
echo CHtml::hiddenField('y1',$y1);
echo CHtml::hiddenField('y2',$y2);
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