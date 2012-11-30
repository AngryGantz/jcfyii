<?php

// change the following paths if necessary
// // $yii=dirname(__FILE__).'/protected/lib/yii/yii.php';
require(dirname(__FILE__) . '/protected/lib/yii/yiiBase.php');
class Yii extends YiiBase {
    /**
     * @static
     * @return CWebApplication
     */
    public static function app()
    {
        return parent::app();
    }
}

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);

// //  require_once($yii);
Yii::createWebApplication($config)->run();