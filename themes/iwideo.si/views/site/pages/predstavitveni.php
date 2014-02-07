<?php
$this->pageTitle=Yii::app()->name . ' - PREDSTAVITVENI';
$this->breadcrumbs=array(
        Yii::t('ui','PREDSTAVITVENI')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'pred_narocilo')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>PREDSTAVITVENI VIDEO</h1>
<h2>Zapeljiva predstavitev. Opazna kjerkoli in kadarkoli.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'predstavitveni_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'predstavitveni video',
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
			<p id="cena">od 380 €</p>
		</span>
			
		</div>
	</div>
<hr />
<center><h2>Preprosto. Hitro. Ugodno.<h2></center>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'predstavitveni_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'predstavitveni vsebine',
				'limit'=>5
			
			)); ?>
