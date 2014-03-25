<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','OGLASNI')=>array('/site/page', 'view'=>'oglasni'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr />
<header style="text-align:center;">
<h1>TV OGLAS - <span style="color:#000176;">INFORMATIVNI IZRAČUN</span></h1>
<h2>4 koraki do izračuna.<h2>
</header>
<hr />
<?php echo $this->renderPartial('/narocanje/_oglasni'); ?>