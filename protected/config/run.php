<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'bookyoubreak',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.helpers.*',
        'application.extensions.*',
	),

	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=fashionmademoise.db.8536260.hostedresource.com;dbname='.(YII_DEBUG ? 'ecompare' : 'fashionmademoise'),
			'emulatePrepare' => true,
			'username' => YII_DEBUG ? 'root' : 'fashionmademoise',
			'password' => YII_DEBUG ? '1111' : 'Q12w3e4r',
			'charset' => 'utf8',
		    //'schemaCachingDuration' => 60*60
		),
		'mail'=>array(
           'class' => 'ext.mail.Mail', //set to the path of the extension
           'transportType' => 'php',
           'viewPath' => 'application.views.mail',
           'debug' => false
        ),
		'cache'=>array(
            'class' => 'CFileCache'
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>'vanotis+dev@gmail.com',
                ),
                
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, info',
                ),
                
               /* array(
                    'class'=>'CWebLogRoute',
                ),*/
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'supportEmail' => 'mchlschwarz8@googlemail.com',
		'adminEmail'=>'vanotis+dev@gmail.com',
	),
);
