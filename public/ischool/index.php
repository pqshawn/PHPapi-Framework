<?php
/**
 * ischool项目入口文件
 */


// web服务器所指目录
defined('PUB') || define('PUB', dirname(__FILE__));
// 实际项目根目录
defined('ROOT') || define('ROOT', PUB.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
// 加载composer autoload
require_once ROOT . '/vendor/autoload.php';

$kernel = new \PhpApi\Kernel();

// 配置(用户项目config路径及名称)
$kernel::config(ROOT . 'config', 'Ischool');

// 分发
$kernel::dispatch();