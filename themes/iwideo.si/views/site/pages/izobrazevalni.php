<?php
$this->pageTitle=Yii::app()->name . ' - IZOBRAŽEVALNI';
$this->breadcrumbs=array(
        Yii::t('ui','IZOBRAŽEVALNI')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'izob_narocilo')),
					
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
			<p id="cena">od 285 €</p>
		</span>
			
		</div>
	</div>
<hr />
<center><h2>Kar slišimo si zapomnimo 20 %.<br />Kar vidimo si zapominimo 30 %.<br />Kar vidimo in slišimo hkrati si zapomnimo 70%.<h2></center>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'izobrazevalni_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'izobraževalni vsebine',
				'limit'=>5
			
			)); ?>
