<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
<head>
   <meta name="viewport" content="width=device-width, initial-scale = 1, maximum-scale = 1">
	<meta charset="utf-8">
	<title>Zaokroži za dobrodelnost</title>
	<meta name="description" content="Nekaj dodatnih centov pri plačevanju ni veliko, a skupaj lahko naredimo razliko. Zaokrožimo za dobrodelnost!" />
	<meta name="keywords" content="zaokroži, za, dobrodelnost" />
	<meta property="og:image" content="http://www.zaokrozi.si/images/logofb.jpg"/>
	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/default.css" type="text/css" media="screen">
	
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/normaliz.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/960.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/prettyPhoto.css" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/font-awesome.min.css" type="text/css">
	
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,700&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
    
	<!-- script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script -->
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.stellar.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.waypoints.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.isotope.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
	
	<script type="text/javascript">
		$(function(){
			jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
				social_tools: ''
			});
		});
	</script>	
</head>

<body>

<?php echo $content; ?>

<!-- Slide 22 Start -->
<div class="slide" id="slide22" data-slide="22">
    <div class="container clearfix">
        <div class="grid_12">
            <div class="grid_4 topline">
                <div class="mediashare">
                    <p><span class="yellow">Všečkaj</span><br> našo stran</p>
                    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fzaokrozi.za&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" allowTransparency="true"></iframe>
                </div>
            </div>
            <div class="grid_4 topline">
                <div class="mediashare">
                    <p><span class="yellow">Twitaj</span><br> našo stran</p>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://zaokrozi.si" data-via="Zaokrozi" data-count="none">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
			<div class="grid_4 topline omega">
                <div class="mediashare">
                    <p>
                    <a href="mailto:recipient@example.com
					?subject=Zaokroži za dobrodelnost
					&body=Prosim vzemi si trenutek časa in si oglej povezavo: http://www.zaokrozi.si">
                    <span class="yellow">Pošlji email</span><br> prijatelju
                    </a>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- Slide 22 End -->

<!-- Footer Start -->
<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
    <div class="overlay-background padding-slide-foot">
        <div class="container clearfix">
		<div class="copyright"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hvala.png"> <div id="button-top-footer"><a class="button" title="" data-slide="1"></a></div>
		© 2013. Vse pravice pridžane</div>
	</div>
    </div>
</div>
</body>
</html>