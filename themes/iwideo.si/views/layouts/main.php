<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/default.css" />
	
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
	
	<title>iWideo</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<a href="/index.php/"><div id="logo"></div></a>
		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					//array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'PREDSTAVITVENI', 'url'=>array('/site/page', 'view'=>'predstavitveni')),
					array('label'=>'IZOBRAŽEVALNI', 'url'=>array('/site/page', 'view'=>'izobrazevalni')),					
					array('label'=>'VIDEO NAVODILA', 'url'=>array('/site/page', 'view'=>'video_navodila')),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
		</div><!-- mainmenu -->
	</div><!-- header -->
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		&copy; <?php echo date('Y'); ?> iWideo<br/>
		<br/>
		<?php 
		//echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>