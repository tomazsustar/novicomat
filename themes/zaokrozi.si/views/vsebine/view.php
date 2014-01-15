<?php $this->layout='//layouts/defaultpage'; ?>
<!-- Slide 2 Start -->
<div class="slide" id="slide2" data-slide="1">
    <div class="container clearfix">
        <div id="content">
            <div class="grid_12">
                <h4><span class="boldpurple"><?php echo CHtml::encode($model->title); ?></span></h4>
                 <div class="datenews"><?php echo $model->publish_up->format('j. n. Y'); ?></div>
              	 <?php echo $model->getFullContentHTML(); ?>
          </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- Slide 2 End -->

<?php //TODO potrebujemo dodatne nastavitve pri članku za vsak portal 
if($model->id == 583 || $model->id == 584){
	Yii::import('ext.ZContactFormWidget.ZContactFormWidget');
	$this->widget('ZContactFormWidget');
	}?>