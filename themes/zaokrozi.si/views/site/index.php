<?php $this->pageTitle=Yii::app()->name; 
$this->layout='//layouts/firstpage';
?>
<!-- Slide 11 End -->
<div class="slide" id="slide11" data-slide="11">
	<div class="container clearfix">
		<div class="grid_12">
			<!-- Heading Start -->
            <h1>Aktualne zgodbe</h1>
            <div class="clear"></div>
			<!-- Heading End -->
		</div>
		<div class="clear"></div>
			<?php 	$this->widget('ZVsebineListWidget', array(
				'id'=>'zgodbe',
				'itemView'=>'//vsebine/_view',
				'template'=>'{items}',
				'tag'=>'zgodbe',
				'limit'=>6
			
			)); ?>
		<div class="clear"></div>
	</div>
</div>
<!-- Slide 11 End -->


<!-- Slide 4 Start -->

<div class="slide" id="slide4" data-slide="20">
    <div class="container clearfix">
        <div class="grid_12">
            <!-- Heading Start -->
            <h1>Novice</h1>
            <div class="clear"></div>
            <!-- Heading End -->
        </div>
        <div class="grid_12">
            <!-- Services Start -->
            <?php  $this->widget('ZVsebineListWidget', array(
				'id'=>'novice',
				'itemView'=>'//vsebine/_novice',
				'template'=>'{items}',
				'tag'=>'novice',
				'limit'=>6
			
			)); ?>
            <div class="grid_4">
                <a class="news" href="novica1.html">
                    <p>Postali smo eden od zmagovalcev Reinovator 2013!</p>
                    <div class="date">9.12.2013</div>
                    <div class="text">V okviru projekta, ki ga pripravlja Zavod Viva, smo prejeli priznanje za inovativno uporabo informacijsko-komunikacijske tehnologije kot orodja aktivnega državljanstva.</div>
                </a>
                <div id="readmore">
				<a href="<?php echo Yii::app()->theme->baseUrl; ?>/novica1.html"><span class="readmore">VEČ</span></a>
				</div>
            </div>
            <div class="grid_4">
                <a class="news" href="novica2.html">
                    <p>Iščemo podjetja za sodelovanje</p>
                    <div class="date">8.12.2013</div>
                   <div class="text">Da lahko projekti postanejo uresničljivi, potrebujemo vas! Razširite novico o nas med vsemi prijatelji, znanci, podjetji in naj nam s skupnimi močmi uspe uresničevati projekte z zbiranjem sredstev na blagajnah, ki gredo v celoti vsem pomoči potrebnim!</div>
                </a>
                <div id="readmore">
				<a href="<?php echo Yii::app()->theme->baseUrl; ?>/novica2.html"><span class="readmore">VEČ</span></a>
				</div>
            </div>
            <div class="grid_4 omega">
                <a class="news" href="novica3.html">
                    <p>Zaokrožite za dobrodelnost</p>
                    <div class="date">3.12.2013</div>
                   <div class="text">Ljubljanski Startup 2012, ki je v maju 2012 potekal na ljubljanski Ekonomski fakulteti, nam z novim letom prinaša zavod Zaokroži za dobrodelnost - organizacijo, ki pomaga pomoči potrebnim, vam pa daje pregled nad zneski, ki ste jih darovali ljudem v stiski.</div>
                </a>
                <div id="readmore">
				<a href="<?php echo Yii::app()->theme->baseUrl; ?>/novica3.html"><span class="readmore">VEČ</span></a>
				</div>
            </div>
            <div class="clear"></div>
            <!-- Services End -->
            <div class="spacesection"></div>
        </div>
    </div>
</div>
<!-- Slide 4 End -->
