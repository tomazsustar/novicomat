<?php
$this->pageTitle=Yii::app()->name . ' - POROČNI';
$this->breadcrumbs=array(
        Yii::t('ui','POROČNI')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'porocni_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>POROČNI FILM</h1>
<h2>Ko ženin in nevesta postaneta zvezdi.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'porocni_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'poročni video',
				'limit'=>1
			
			)); 
			?>
	<div class="pred_list">
        <div><span>
			<p id="cena">VKLJUČUJE</p>
			<br />
			<ol>
				<li>snemanje</li>
				<li>montaža</li>
				<li>grafika</li>
				<li>licenčna glasba</li>
			</ol>
			<h4><center>Snemamo z dvema<br />snemalcema<br /></center></h4>
			<p id="cena">od 290 €</p>
		</span>
			
		</div>
	</div>
<hr />
<div class="intro">
<h2><span style="color:#111; font-weight:bold;">Preprosto.</span>Večno. Filmsko.<!--neboldano besedilo--><h2>
</div>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'INFORMATIVNI IZRAČUN', 'url'=>array('/site/page', 'view'=>'porocni_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'porocni_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'porocni vsebine',
				'limit'=>5
			
			)); ?>
