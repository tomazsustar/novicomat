<?php
$this->pageTitle=Yii::app()->name . ' - IZOBRAŽEVALNI';
$this->breadcrumbs=array(
        Yii::t('ui','IZOBRAŽEVALNI')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'izobra_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>IZOBRAŽEVALNI VIDEO</h1>
<h2>Učinkovito in atraktivno. Kjerkoli. Kadarkoli.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'izobrazevalni_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'izobraževalni video',
				'limit'=>1
			
			)); 
			?>
	<div id="player"></div>
	<div class="pred_list">
        <div><span>
			<p id="cena">VKLJUČUJE</p>
			<br />
			<ol>
				<li>scenarij</li>
				<li>režija</li>
				<li>snemanje</li>
				<li>montaža</li>
				<li>grafika</li>
				<li>licenčna glasba</li>
			</ol>
			<p id="cena">od 385 €</p>
		</span>
			
		</div>
	</div>
<hr />
<div class="intro">
<h2><span style="color:#111; font-weight:bold;">Kar slišimo si zapomnimo 20 %.</span><br />Kar vidimo si zapomnimo 30 %.<br />Kar vidimo in slišimo si zapomnimo 70 %.<!--neboldano besedilo--><h2>
</div>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'INFORMATIVNI IZRAČUN', 'url'=>array('/site/page', 'view'=>'izobra_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'izobrazevalni_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'izobraževalni vsebine',
				'limit'=>5
			
			)); ?>
