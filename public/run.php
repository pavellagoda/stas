<?php

set_time_limit(0);

function dump($var,$asString = false,$depth=10,$highlight=false){
    if ($asString){
        return CVarDumper::dumpAsString($var,$depth,$highlight);
    } else {
        echo '<pre>';
        CVarDumper::dump($var,$depth,$highlight);
        echo '</pre>';
    }
}

switch(isset($_SERVER['USERNAME']) && ($_SERVER['USERNAME'] == 'Ivan' || @$_SERVER['USERDOMAIN'] == 'IVAN') || 1){
    case true:
        # development env
        $env = 'dev';
        define('YII_DEBUG',true);
        break;
        
    case false:
        # production env
        $env = 'main';
        break;
}

defined('YII_DEBUG') or define('YII_DEBUG',false);

$yii=dirname(__FILE__).'/../yii/yii.php';
$config=dirname(__FILE__).'/protected/config/'.$env.'.php';

require_once($yii);
 
Yii::createConsoleApplication($config)->run();
