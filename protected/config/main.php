<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Товары',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.extensions.libs.*',
        'application.extensions.mail.Message',
        'application.helpers.*',
    ),
    // application components
    'components' => array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1111',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => 'admin/site/login',
        ),
        'mail' => array(
            'class' => 'ext.mail.Mail', //set to the path of the extension
            'transportType' => 'php',
            'viewPath' => 'application.views.mail',
            'debug' => false
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'showScriptName' => false,
//            'urlSuffix' => '.html',
            'urlFormat' => 'path',
            'rules' => array(
                'gii' => 'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                'search' => 'product/index',
                'admin' => 'admin/user/index',
                'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
                'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                '<lang:[\w-]+>/destination/<region:\w+>' => 'site/destination',
                '<lang:[\w-]+>/<action:about|contact|travelblogs|facebook|twitter|youtube|holidays|clearcache>' => 'site/<action>',
                '<lang:[\w-]+>/<controller:\w+>/<id:[\w-]+>' => '<controller>/view',
                '<lang:[\w-]+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<lang:[\w-]+>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<lang:[\w-]+>/<controller:\w+>' => '<controller>/index',
                '<lang:[\w-]+>' => 'site/index',
                
//                '<lang:\w+>/<controller:\w+>/<id:[\w-]+>' => '<controller>/view',
//                '<lang:\w+>/<controller:\w+>/<action:\w+>/<id:[\w-]+>' => '<controller>/<action>',
//                '<lang:\w+>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                '<lang:\w+>/<controller:\w+>' => '<controller>/index',
//                '<lang:\w+>/' => 'site/index',
                
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=stas',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'test',
            'charset' => 'utf8',
            'schemaCachingDuration' => 60 * 60 * 24
        ),
        'cache' => array(
            'class' => 'CFileCache'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                /* array(
                  'class'=>'EmailLogRoute',
                  'levels'=>'error, warning',
                  'emails'=>'vanotis+dev@gmail.com',
                  'filter'=>array(
                  'class'=>'LogFilter',
                  'ignoreCategories'=>array(
                  'exception.CHttpException.404'
                  )
                  ),

                  ), */

                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info',
                ),
            /* array(
              'class'=>'CWebLogRoute',
              ), */
            ),
        ),
    ),
    'modules' => array(
        'admin' => array(
            //'layout' => 'admin',
            'defaultController' => 'users',
        /* 'password'=>'1111', */
        /* 'registerModels'=>array(
          'application.models.*',
          ), */
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1111',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'supportEmail' => 'mchlschwarz8@googlemail.com',
        'adminEmail' => 'vanotis+dev@gmail.com',
        'redirectK' => 10,
        'itemsLimit' => 12,
    ),
);
