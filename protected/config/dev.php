<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),            
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=yourescape',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'test',
				'charset' => 'utf8',
			    'schemaCachingDuration' => 0,
				'enableParamLogging'=>true,
				'enableProfiling' => true,
			
			),
			'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                   /* array(
                        'class'=>'CFileLogRoute',
//                        'levels'=>'error, trace'
                        'levels'=>'error, warning, info',
//                        'levels'=>'error, warning, info',
                    ),*/
                    // uncomment the following to show log messages on web pages
                    /*
                    array(
                        'class'=>'CWebLogRoute',
                    ),
                    */
                    array(
                        'class'=>'CProfileLogRoute',
//                        'showInFireBug' => true
                    )
                ),
            ),
            'modules'=>array(
            	'gii'=>array(
		            'class'=>'system.gii.GiiModule',
		            'password'=>'1111',
		            // If removed, Gii defaults to localhost only. Edit carefully to taste.
		            'ipFilters'=>array('127.0.0.1','::1'),
		        ),
            ),
		),
		'params'=>array(
	        'supportEmail' => 'vanotis+dev@gmail.com',
        ),
	)
);
