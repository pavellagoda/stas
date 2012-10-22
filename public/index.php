<?php

error_reporting(E_ALL);

ini_set('post_max_size', '128M');
ini_set('upload_max_filesize', '128M');

ini_set('display_errors', 1);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../../yii/framework/yii.php';
$config = dirname(__FILE__) . '/../protected/config/main.php';


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

defined('DEV_VERSION') or define('DEV_VERSION', true);

require_once($yii);
Yii::createWebApplication($config)->run();