			<form action="">
        	 <input type="hidden" id="url" value="<?php echo $data->video; ?>" />
			</form>
			
	
<?php
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
 {
	echo ('<div class="video">'.$data->getVideoHTML());
}
	else {
	echo ('<div id="player">');
}
?>

</div>
	
	
	
	