	<?php $this->beginContent('//layouts/main'); ?>

	<div  class="homepage" id="skel-panels-pageWrapper" style="position: relative; left: 0px; right: 0px; top: 0px; -webkit-backface-visibility: hidden; -webkit-perspective: 500; -webkit-transition: -webkit-transform 0.25s ease-in-out; transition: -webkit-transform 0.25s ease-in-out;">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
						
				<!-- Header -->
					<div id="header" class="container">
						
						<!-- Logo -->
							<h1 id="logo"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>">DOBREPOLJE.INFO</a></h1>
							<p><?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'Vsebine', 'url'=>array('/vsebine/index')),
				//array('label'=>'Izvoz', 'url'=>array('/vsebine/izvoz')),
				array('label'=>'ŽUPNIJA', 'url'=>array('/site/page', 'view'=>'zupnija.index')),
				// array('label'=>'Lokacije', 'url'=>array('/lokacije/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				// array('label'=>'Uvoz', 'url'=>array('/strani/index'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				// array('label'=>'Portali', 'url'=>array('/portali/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				// array('label'=>'Rutine', 'url'=>array('/rutine/rutine'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Prijava', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				
				//array('label'=>'Odjava ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			
		))); ?>
							
                           <!--<a href="<?php echo Yii::app()->baseUrl; ?>/"> TURIZEM</a>
                           <a href="<?php echo Yii::app()->baseUrl; ?>/"> ŽUPNIJA</a>
                           <a href="<?php echo Yii::app()->baseUrl; ?>/"> GASILCI</a>
                           <a href="<?php echo Yii::app()->baseUrl; ?>/"> ZAGORICA</a>
                           <a href="<?php echo Yii::app()->baseUrl; ?>/"> KOMPOLJE</a>
                           <a href="<?php echo Yii::app()->baseUrl; ?>/"> MAČKARE</a>-->
                            </p>

					</div>

			</div>


		<!-- Main Wrapper -->
			<div id="main-wrapper">

				<!-- Main -->
					<div id="main" class="container">
						<div class="row">

<?php echo $content;
 echo $this->renderPartial('/layouts/sidebar'); ?>

						</div>
					</div>

			</div>
<?php $this->endContent(); ?>