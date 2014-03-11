<hr />
<center><h1>iwideo</h1>
<h2>Najboljši video. Najboljša cena.<h2></center>
<!-- uvodni video -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'uvodni_video',
				'itemView'=>'//vsebine/_video',
				'template'=>'{items}',
				'tag'=>'uvodni video',
				'limit'=>1
			
			)); 
			?>
		<div class="kontakti">
                    <a href="mailto:iwideo.info@gmail.com
					?subject=Povpraševanje na spletni strani iwideo.si">
					<div><span><center><img src="<?php '.Yii::app()->request->baseUrl.'?>/themes/iwideo.si/css/mail-grey.png" height="20px"; /><br />
                    iwideo.info@gmail.com</center></span></div>
                    </a>
					<div><span><center><img src="<?php '.Yii::app()->request->baseUrl.'?>/themes/iwideo.si/css/icon_phone_grey.png" height="20px"; /><br />+386 040 69 12 12</strong></center></span></div>
					<a href="http://www.facebook.com/iwideo"><div><span><center><img src="<?php '.Yii::app()->request->baseUrl.'?>/themes/iwideo.si/css/fb-grey-icon.png" height="40px"; /></center></span></div></a>
					<a href="http://www.youtube.com/channel/UCQtu6-5MMHE3BmGB4hKzsqA"><div><span><center><img src="<?php '.Yii::app()->request->baseUrl.'?>/themes/iwideo.si/css/youtube-grey-icon.png" height="40px"; /></center></span></div></a>
		</div>
<hr />
<div class="intro">
<h2><span style="color:#111; font-weight:bold;">iwideo.</span> Najbolj donosna naložba.<h2>
</div>
<span class="cena_prva_stran">od 290 €</span>
<hr />
<!-- uvodne vsebine -->
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'uvodne_vsebine',
				'itemView'=>'//vsebine/_vsebine',
				'template'=>'{items}',
				'tag'=>'uvodne vsebine',
				'limit'=>5
			
			)); ?>
<div class="index_footer">
<div id="index_footer_l"><center>iwideo - video produkcija<br />Rok Borštnik s.p., Prilesje 3a, 1315 Velike Lašče<br />ID DDV: 73560863<br />IBAN SI56 1920 0501 0027 112 (DBS d.d.)</center></div>
<div id="index_footer_d"><center>iwideo.info@gmail.com<br />+386 31 395 038<br />www.facebook.com/iwideo</center></div>
</div>