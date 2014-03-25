<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','IZOBRAŽEVALNI')=>array('/site/page', 'view'=>'izobrazevalni'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr>
<header style="text-align:center;">
<h1>IZOBRAŽEVALNI VIDEO - <span style="color:#000176;">INFORMATIVNI IZRAČUN</span></h1>
<h2>3 koraki do izračuna.<h2>
</header>
<hr>
<?php echo $this->renderPartial('/narocanje/_izobrazevalni'); ?>