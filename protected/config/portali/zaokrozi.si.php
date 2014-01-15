<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
/*
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>'assets/js/jquery-1.7.1.js',
    'jquery.ajaxqueue.js'=>'assets/js/jquery-1.7.1.min.js',
    
);
*/
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	

	'name'=>'zaokrozi.si',
	'theme'=>'zaokrozi.si',	
	'language'=>'si',
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.joomla15.*',
		'application.components.*',
		'application.components.parsers.*',
		'application.vendors.*',
		'application.helpers.*',
	),	
	
	
	// application components
	'components'=>array(
//		'user'=>array(
//			// enable cookie-based authentication
//			'allowAutoLogin'=>true,
//		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>true,
			'rules'=>array(
				//''=>'vsebine/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'coreMessages'=>array(
            'basePath'=>null,
        ),
		
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
//		'authManager'=>array(
//            'class'=>'CDbAuthManager',
//            'connectionID'=>'db',
//			'defaultRoles'=>array('zelnik.net-avtor'),
//        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	
);
