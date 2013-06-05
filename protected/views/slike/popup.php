<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'popup',
                'options'=>array(
                    'title'=>Yii::t('slika','Obreži sliko'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_crop', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>