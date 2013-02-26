<?php

abstract class ZVideoHelper{
	
	public static function insertVideo($url){
		if($url!=""){
			$split=explode('=', $url);
			$embed='<iframe style="display: block; margin: auto;" width="420" height="315" src="http://www.youtube.com/embed/'.$split[1].'" frameborder="0" allowfullscreen></iframe>';
			
		}else{
			$embed="";
		}
		return $embed;
	}
	
}