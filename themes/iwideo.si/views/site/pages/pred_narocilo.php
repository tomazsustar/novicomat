<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','PREDSTAVITVENI')=>array('/site/page', 'view'=>'predstavitveni'),
        Yii::t('ui','NAROČILO')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					//array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'pred_narocilo')),
					),
			)); ?>
		</div>
<hr />
<center><h1>PREDSTAVITVENI VIDEO</h1>
<h2>Hitro. Jasno. Ugodno.<h2></center>
<hr />
<?php echo $this->renderPartial('/narocanje/_predstavitveni'); ?>