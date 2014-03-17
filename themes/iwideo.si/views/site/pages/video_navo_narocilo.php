<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','VIDEO NAVODILA')=>array('/site/page', 'view'=>'video_navodila'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr />
<center><h1>VIDEO NAVODILA</h1>
<h2>Velikanska dodana vrednost. Majhna cena.<h2></center>
<hr />
<?php echo $this->renderPartial('/narocanje/_video_navodila'); ?>