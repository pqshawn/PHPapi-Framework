<?php
namespace App\V1\Api;

use PhpApi\Controller;

class Users extends Controller {
	// 权限判断
	use \App\V1\Traits\Controller\SimpleAuth;
	
	// 权限过滤，1 or true 跳过验证， 0 or false 正常执行验证
	private $filterAuth = array(
		'regist' => 1,
		'getinfo' => 0
	);

	/**
     * 用户自定义前置方法
     */
    protected function beforeUserAction() {

    }


    public function getinfo() {
        // 用retKey字符串代替ret数字，便于阅读代码
        return array('retKey' => 'SUCCESS', 'name' => '可可西里兽', 'avatar' => '', 'roles' => array('admin'));
    }

    public function regist() {
    	// $this->params = ;
    	// 用retKey字符串代替ret数字，便于阅读代码
        return array('retKey' => 'SUCCESS');
    }

    public function login() {

    }
}
