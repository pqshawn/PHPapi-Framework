<?php
/**
 * Ischool应用配置
 * 
 * @copyright (c)Ldos.net All rights reserved.
 * @author Shawn Yu <pggq@outlook.com>
 */



return array(

    // 默认路由
    'Default' => [
        'appName' => 'Ischool',
        'controller' => 'Ischool/Api/Test',
        'action' => 'get',
    ],
    // 语言配置, zh_cn 或 en
    'Land'    => 'zh_cn',
    // 开发者语言包位置
    'LandDir' => ROOT . 'lang',
    // 错误码文件名
    'CodeStatus' => 'CodeStatus',
    // 时区设置
    'TimeZone'   => 'Asia/Shanghai',

    // DB 配置
    'Db' => array(
        'Master' => array(
            'type'      => 'mysqli',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => '123456',
            'port'      => 3306,
            'db'        => 'ischool',
            'prefix'    => 'sch_', // 表名前缀
            'charset'   => 'utf8'
        )
    ),

    // 缓存 配置
    'Cache'  =>  array(),
);