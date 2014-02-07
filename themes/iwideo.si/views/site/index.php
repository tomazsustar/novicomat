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
					<div><span><center><strong>PIŠITE NAM</strong><br />
                    iwideo.info@gmail.com</center></span></div>
                    </a>
					<div><span><center><strong>POKLIČITE NAS</strong><br />+386 31 395 038</strong></center></span></div>
					<a href="http://www.facebook.com/iwideo"><div><span><center><strong>OGLEJTE SI NAŠ FB</strong><br />www.facebook.com/iwideo</center></span></div></a>
					<a href="http://www.youtube.com/channel/UCQtu6-5MMHE3BmGB4hKzsqA"><div><span><center><strong>NAŠ YOUTUBE KANAL</strong><br />www.youtube.com</center></span></div></a>
		</div>
<hr />
<center><h2>iwideo. Najbolj donosna naložba.<h2></center>
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