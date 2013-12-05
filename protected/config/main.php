<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Stas',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.yii-mail.YiiMailMessage',
    ),
    'aliases' => array(
        //assuming you extracted the files to the extensions folder
        'xupload' => 'ext.xupload'
    ),
    'modules' => array(
        'admin' => array(
            'defaultController' => 'default',
            'layout' => 'bootstrap',
        ),
    ),
    // application components
    'components' => array(
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'viewPath' => 'application.views.mailer',
            'logging' => true,
            'dryRun' => false,
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'fakesmtptest@gmail.com',
                'password' => 'pass4fake',
                'port' => 465,
                'encryption' => 'ssl'
            )
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'returnUrl' => "/admin/default"
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'products/<id:.+>' => 'products/view',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'contacts'=>'site/contacts',
                'about'=>'site/about',
                'new'=>'site/new',
                'payment'=>'site/payment',
            ),
            'showScriptName' => false,
            'caseSensitive' => false
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=109.87.136.229;dbname=stas',
            'emulatePrepare' => true,
            'username' => 'dev',
            'password' => 'pass4dev',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            ),
        ),
        'cache' => array(
            'class' => 'CFileCache',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
    'modules' => array(
        'admin' => array(
            'defaultController' => 'default',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1111',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
);
