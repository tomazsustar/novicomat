<?php
$this->pageTitle=Yii::app()->name . ' - VIDEO NAVODILA';
$this->breadcrumbs=array(
        Yii::t('ui','VIDEO NAVODILA')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'video_navo_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>VIDEO NAVODILA</h1>
<h2>Velikanska dodana vrednost. Majhna cena.<h2></center>
<!-- uvodni video -->
<div id="player"></div>
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
			<p id="cena">VKLJUČUJE</p>
			<br />
			<ol>
				<li>režija</li>
				<li>snemanje</li>
				<li>montaža</li>
				<li>grafika</li>
				<li>licenčna glasba</li>
			</ol>
			<p id="cena">od 360 €</p>
		</span>
			
		</div>
	</div>
<hr />
<div class="intro">
<h2><span style="color:#111; font-weight:bold;">Ko enkrat vidiš,</span> je veliko lažje.<h2>
</div>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'INFORMATIVNI IZRAČUN', 'url'=>array('/site/page', 'view'=>'video_navo_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'video_navodila_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'video navodila vsebine',
				'limit'=>5
			
			)); ?>
