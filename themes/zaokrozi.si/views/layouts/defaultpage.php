<?php $this->beginContent('//layouts/main'); ?>
<!-- Menu Start -->
<div class="menu">    
    <div class="container clearfix">
        <!-- Logo Start -->
        <a href="javascript: history.go(-1)"><div id="logo" class="left"></div></a>
        <!-- Logo End -->
		
        <!-- Navigation Start -->
        <div id="nav" class="right">
            <ul class="navigation">
            	<a href="javascript: history.go(-1)" class="onepageback">Nazaj</a>
                <li class="clear"></li>
            </ul>
        </div>
        <!-- Navigation End -->
    </div>
</div>
<!-- Menu End -->
<?php echo $content; ?>

<?php $this->endContent(); ?>