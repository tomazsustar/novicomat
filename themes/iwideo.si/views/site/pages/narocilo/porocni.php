<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','POROČNI')=>array('/site/page', 'view'=>'porocni'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr />
<center><h1>POROČNI FILM - INFORMATIVNI IZRAČUN</h1>
<h2>Ko ženin in nevesta postaneta zvezdi.<h2></center>
<hr />
<?php echo $this->renderPartial('/narocanje/_porocni'); ?>