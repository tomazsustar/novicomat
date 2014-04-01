<?php
$this->pageTitle=Yii::app()->name . ' - OGLASNI';
$this->breadcrumbs=array(
        Yii::t('ui','OGLASNI')
    );
?>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'NAROČILO', 'url'=>array('/site/page', 'view'=>'narocilo.oglasni')),
					
					),
			)); ?>
		</div>
<hr />
<center><h1>TV OGLAS</h1>
<h2>Kratek. Močan. Prepričljiv.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'oglasni_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'oglasni video',
				'limit'=>1
			
			)); 
			?>
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
			<p id="cena">od 640 €</p>
		</span>
			
		</div>
	</div>
<hr />
<div class="intro">
<h2><span style="color:#111; font-weight:bold;">Učinkovita povrnitev vložka.</span><!--neboldano besedilo--><h2>
</div>
<div id="narocilo">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
					array('label'=>'INFORMATIVNI IZRAČUN', 'url'=>array('/site/page', 'view'=>'narocilo.oglasni')),
					
					),
			)); ?>
		</div>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'oglasni_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'oglasni vsebine',
				'limit'=>5
			
			)); ?>
