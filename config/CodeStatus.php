<?php

/**
 * 自定义状态码
 * 1.PHPapi有个Http类，里面的状态码往往在fcgi里已经不受控制，定义在里为了查漏预知PHPapi的实现层次
 * 如有需要请稳步nginx等WEB服务，接收的客户端也要分清获取web服务器的Status Code与本系统返回的code的方式与区别以及分段控制
 * 
 * 2.这里主要让后台开发人员可以自定义一些Status Code，更好的配合客户端开发人员，可以自定义全平台通用的错误码，如返回 ret=11000
 * 
 * 11000假设代指：2（ischool应用）1（Android）000（错误码成功）
 * 根据实际灵活协定
 * 
 * 3.在编码时，我们是采取直接写“英文短语”为键，还是直接写“数字“为键，建议以英文为键找码，不但读起来容易理解点，而且语言包也用得。
 * 
 * @copyright (c)Ldos.net All rights reserved.
 * @author Shawn Yu <pggq@outlook.com>
*/

return array(

    'App' => array(
        'SUCCESS' => 10000, // app项目，各端通用，成功
        'FAILURE' => 10001, 
        'NO_METHOD' => 10002,
        'INVALID_ARGUMENT' => 10003, // 通用参数错误
        'ILLEGAL_TOKEN' => 10004,
        'EXPIRE_TOKE'   => 10005,
        'SYSTEM_WARNING_FOR_PARAMS' => 10006,   // 前台传参错误: 超出系统限制
        'CUSTOMER_WARNING_FOR_PARAMS' => 10007, // 前台传参错误: 不符合规则
    ),
    'Ischool' => array(
        'SUCCESS' => 20000,
        'FAILURE' => 20001, 
    )

);