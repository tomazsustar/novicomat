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
				'itemView'=>'//vsebine/_zgodbe',
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
            
            <div class="clear"></div>
            <!-- Services End -->
            <div class="spacesection"></div>
        </div>
    </div>
</div>
<!-- Slide 4 End -->
