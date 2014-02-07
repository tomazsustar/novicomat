<?php
$this->pageTitle=Yii::app()->name . ' - VIDEO NAVODILA';
$this->breadcrumbs=array(
        Yii::t('ui','VIDEO NAVODILA')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'vide_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>VIDEO NAVODILA</h1>
<h2>Velikanska dodana vrednost. Majhna cena.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'video_navodila_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'video navodila video',
				'limit'=>1
			
			)); 
			?>
	<div class="pred_list">
        <div><span>
			<ol>
				<li>scenarij</li>
				<li>režija</li>
				<li>snemanje</li>
				<li>montaža</li>
				<li>grafika</li>
				<li>licenčna glasba</li>
			</ol>
			<p id="cena">od 340 €</p>
		</span>
			
		</div>
	</div>
<hr />
<center><h2>Ko enkrat vidiš, je tako preprosto.<h2></center>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'video_navodila_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'video navodila vsebine',
				'limit'=>5
			
			)); ?>
