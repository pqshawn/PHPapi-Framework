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
    'ContentType' => 'json',
    // 请求和响应单独设置
    // 'RequestContentType' => 'application/json',
    // 'ResponseContentType' => 'application/json',

    // DB 配置
    'Db' => array (
        'Master' => array(
            'type'      => 'mysqli',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => '123456',
            'port'      => 3306,
            'db'        => 'test',
            'prefix'    => '', // 表名前缀
            'charset'   => 'utf8'
        )
    ),
);