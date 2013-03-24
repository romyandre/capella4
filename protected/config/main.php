<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Capella ERP Indonesia v4.0',
	'theme'=>'classic',
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.jcontextmenu.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
		),
		'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=capella4',
		'emulatePrepare' => true,
		'username' => 'capella4',
		'password' => 'capella4',
		'charset' => 'utf8',
		'initSQLs'=>array('set names utf8'),
		//'enableProfiling'=>true,
	'enableParamLogging' => true,
	'schemaCachingDuration' => 3600,
	),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);