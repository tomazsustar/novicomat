<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','PREDSTAVITVENI')=>array('/site/page', 'view'=>'predstavitveni'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr />
<center><h1>PREDSTAVITVENI VIDEO</h1>
<h2>Hitro. Jasno. Ugodno.<h2></center>
<hr />
<?php echo $this->renderPartial('/narocanje/_predstavitveni'); ?>