<?php
/**
 * App应用配置
 * 
 * @copyright (c)Ldos.net All rights reserved.
 * @author Shawn Yu <pggq@outlook.com>
 */

return array(

    // 默认路由
    'Default' => [
        'appName' => 'App',
        'controller' => 'App/V1/Api/Test',
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
    // 缓存 配置
    'Cache'  =>  array(),
    // 全局，请求和响应内容类型: json，crypto-json （http表现为application/json，application/crypto-json）
    'ContentType' => 'crypto-json',
    // 请求和响应单独设置
    // 'RequestContentType' => 'application/json',
    // 'ResponseContentType' => 'application/json',

    // DB 配置
    'Db' => array (
        'Master' => array (
            'alias'     => 'MasterMysqli', // 别名，作分布式时，用来区分
            'type'      => 'mysqli',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => '123456',
            'port'      => 3306,
            'db'        => 'smart_learning',
            'prefix'    => 'com_', // 表名前缀
            'charset'   => 'utf8'
        )
    ),

    // 缓存 配置
    'Cache' => array (
        'Master' => array (
            'alias'     => 'MasterRedis',
            'type'      => 'redis',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => '123456',
            'port'      => 6379
        ),
        'SlaveA' => array (
            'alias'     => 'SlaveAMemcache',
            'type'      => 'memcache',
            'host'      => '127.0.0.1',
            'port'      => 11211
        ),
        'SlaveB' => array (
            'type'      => 'file'
        )
    )
);