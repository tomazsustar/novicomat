<?php
$this->pageTitle=Yii::app()->name . ' - NAROČILO';
$this->breadcrumbs=array(
        Yii::t('ui','POROČNI')=>array('/site/page', 'view'=>'porocni'),
        Yii::t('ui','NAROČILO')
    );
?>
<hr />
<header style="text-align:center;">
<h1>POROČNI FILM - <span style="color:#000176;">INFORMATIVNI IZRAČUN</span></h1>
<h2>Preprosto najlepši. Preprosto najugodnejši.<h2>
</header>
<hr />
<p style="text-align: justify;">Vsak poročni dan, vsak poročni obred in vsaka svatba je zgodba zase. Vsak ustvarjalec
zgodbe ima drugačne želje, drugačne potrebe. Zato smo pripravili različne možnosti izbire, ki
omogočajo da si zagotovite poročni film, ki bo ustrezal vašim željam. V ceno je vključena
izdelava poročnega filma ter arhiv vseh posnetkov nastalih na poroki.</p>
<?php echo $this->renderPartial('/narocanje/_porocni'); ?>