<?php
$devel_hosts = array('localhost', '127.0.0.1');

if(in_array($_SERVER['HTTP_HOST'], $devel_hosts))
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
 
// Include config files
$configMain = require_once( dirname( __FILE__ ) . '/protected/config/main.php' );
$configServer = require_once( dirname( __FILE__ ) . '/server.' . $environment .'.php' );
 
// Include Yii framework
require_once( $yii );
 
// Run application
$config = CMap::mergeArray( $configMain, $configServer );
Yii::createWebApplication( $config )->run();