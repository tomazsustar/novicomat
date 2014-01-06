<?php
$devel_hosts = array('localhost', '127.0.0.1', 'local.zaokrozi.si');


if(in_array($_SERVER['HTTP_HOST'], $devel_hosts) || strpos($_SERVER['HTTP_HOST'], 'local')===0)
{
	 // change the following paths if necessary
	$yii=dirname(__FILE__).'/../yii/framework/yii.php';
	$config=dirname(__FILE__).'/protected/config/main.php';
	
	// remove the following lines when in production mode
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	// specify how many levels of call stack should be shown in each log message
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
	 
	  // Set environment variable
	  $environment = 'development';
  
}
else
{
	  // Set framework path
	  $yii=dirname(__FILE__).'/../../yii/framework/yii.php';
	 
	  
	  // remove the following lines when in production mode
		defined('YII_DEBUG') or define('YII_DEBUG',true);
		// specify how many levels of call stack should be shown in each log message
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
	  
	  // Set environment variable
	  $environment = 'production';
}

// konfiguracija za posamezen portal
$portal = str_replace(array('www.','local.'), '', $_SERVER['HTTP_HOST']);
$configPortal=array();
$configPortalPath=dirname( __FILE__ ) . "/protected/config/portali/$portal.php";
if(file_exists($configPortalPath)){
	$configPortal = require_once($configPortalPath);
}elseif($environment = 'development'){
	//če smo lokalno in ni nobene domene za portal potem odpri novicomat
	$configPortal = require_once(dirname( __FILE__ ) . "/protected/config/portali/novicomat.si.php");
}

// Include config files
$configMain = require_once( dirname( __FILE__ ) . '/protected/config/main.php' );
$configServer = require_once( dirname( __FILE__ ) . '/server.' . $environment .'.php' );
 
// Include Yii framework
require_once( $yii );
 
// Run application
$config = CMap::mergeArray( $configMain, $configServer );
$config = CMap::mergeArray( $config, $configPortal );
Yii::createWebApplication( $config )->run();