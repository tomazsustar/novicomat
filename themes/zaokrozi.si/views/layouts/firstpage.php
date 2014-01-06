<?php $this->beginContent('//layouts/main'); ?>
<!-- Slide 1 Start -->
<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
    <div class="overlay-background home-padding">
        <div class="container clearfix">
            <div class="grid_12">
                <div class="home-text"></div>
                <h1><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo1.png"></h1>
                <h2>Enostaven in hiter način kako darovati skromen znesek za dobre namene</h2>
                    <div class="button-bottom">
                        <a class="button" title data-slide="11"><span></span></a>
                    </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!-- Slide 1 End -->

<!-- Menu Start -->
<div class="menu">    
    <div class="container clearfix">
        <!-- Logo Start -->
        <a class="button" data-slide="1"><div id="logo" class="left"></div></a>
        <!-- Logo End -->
		
        <!-- Navigation Start -->
        <div id="nav" class="right">
            <ul class="navigation">
            	<li data-slide="11">Aktualne zgodbe</li>
                <li data-slide="20">Novice</li>
                <li data-slide="2">O nas</li>
                <li data-slide="21">Partnerji</li>
				<li data-slide="10">Kontakt</li>
                <li class="clear"></li>
            </ul>
        </div>
        <!-- Navigation End -->
    </div>
</div>
<!-- Menu End -->

<?php echo $content; ?>

<!-- Slide 14 Start -->
<div class="slide" id="slide14" data-slide="14" data-stellar-background-ratio="0.5">
    <div class="overlay-background padding-slide14">
        <div class="container clearfix">
            <div class="grid_12">
                <p>V pripravi je sistem, ki bo omogočal popolnoma transparenten pregled nad vsemi zbranimi sredstvi.<br><br>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/transp-icon.png"></p>
            </div>
        </div>
    </div>
</div>
<!-- Slide 14 End -->

<!-- Slide 2 Start -->
<div class="slide" id="slide2" data-slide="2">
    <div class="container clearfix">
        <div class="grid_12">
            <!-- Heading Start -->
            <h1>O nas</h1>
            <div class="clear"></div>
            <!-- Heading End -->
        </div>
        <div id="content">
            <div class="grid_8">
                <h4><span class="boldyellow">Zaokrožimo za dobrodelnost!</span></h4>
                <p>Nekaj dodatnih centov pri plačevanju ni veliko, a skupaj lahko naredimo razliko.<br>
				Pri plačilu znesek velikokrat ni točen in sedaj imate možnost, da razliko do polnega zneska podarite za nekaj dobrega v Sloveniji. Vse, kar morate narediti je, da na blagajni rečete: 'Prosim, zaokrožite za dobrodelnost.'
            	</p>
                <br>
                <h4><span class="boldyellow">Kako deluje?</span></h4>
                <p>V spletnih trgovinah ali poslovalnicah, ki imajo pri zaključku plačila omogočen modul Zaokroži, znesek z izbiro zaokrožite ter tako razliko darujete v naš sklad, ki nato sredstva donira dobrodelnim projektom - te najdete v <a class="button" data-slide="11">Aktualnih zgodbah</a>.<br>
                Vse poteka popolnoma transparentno, kar je tudi naš cilj.</p>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- Slide 2 End -->

<!-- Slide 21 End -->
<div class="slide" id="slide11" data-slide="21">
	<div class="container clearfix">
		<div class="grid_12">
			<!-- Heading Start -->
            <h1>Partnerji</h1>
            <div class="clear"></div>
			<!-- Heading End -->
		</div>
		<div class="clear"></div>
		<div class="grid_3 partnerji">
			<a href="http://3rzadruga.wordpress.com/" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/partner1.png" >
			<p>3R zadružna iniciativa</p>
			</a>
		</div>
		<div class="grid_3 partnerji">
			<a href="http://www.zavodviva.si" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/partner2.png">
			<p>Zavod Viva</p>
       		</a>
		</div>
		<div class="grid_3 partnerji omega">
			<a href="http://www.sproject.org" target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/partner3.png">
			<p>S Project</p>
       		</a>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- Slide 21 End -->

<!-- Slide 10 Start -->
<div class="slide" id="slide10" data-slide="10">
    <div class="container clearfix">
        <div class="grid_12">
            <h1>Kontakt</h1>
            <div class="clear"></div>
        </div>
        <div class="grid_12">
            <p>Zaokroži, zavod za pomoč in trajnostni razvoj</p>
			<ul class="contact-info">
				<li class="fontawesome-icon icon-map-marker"><span> Miličinskega ulica 68, Ljubljana</span></li>
				<li class="fontawesome-icon icon-envelope"><span> info@zaokrozi.si</span></li>
			</ul>
        </div>
		
		<!-- Contact Form Start -->
		<div class="grid_12">
		<div class="contact-form">
			<form method="post" id="contact-form">
				<div class="grid_6">
					<input type="text" name="name" id="contactname" value="" placeholder="Ime in priimek">
					<input type="text" name="email" id="email" value="" placeholder="Email">
					<input type="text" name="subject" id="subject" value="" placeholder="Zadeva">
				</div>
				<div class="grid_6 omega">
					<textarea name="message" id="message" placeholder="Sporočilo"></textarea>
				</div>
				<div class="clear"></div>					
				<input type="submit" value="Pošlji" name="submit" class="contact-button">
			</form>
		</div>
		</div>
		<div class="clear"></div>
		<!-- Contact Form End -->
	</div>
</div>
<!-- Slide 10 End -->
<?php $this->endContent(); ?>