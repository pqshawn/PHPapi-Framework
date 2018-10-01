<?php
/**
 * 这里不但要对登陆做验证，还要根据用户的实际等级，进行判断是否能访问接口
 *
 * @copyright (c)Ldos.net All rights reserved.
 * @author Shawn Yu <Ldos.net>
 */

namespace App\V1\Traits\Controller;

trait Auth {

    public function initialize() 
    {
        $this->checkLogin();
        $this->userAuth();
    }

    /**
     * 登陆验证
     *
     * @param void
     * @param void
     *
     * @return 
     */
    protected function checkLogin()
    {
        

    }

    /**
     * 用户权限验证
     * 不同于登陆验证，主要验证用户是否有使用接口的具体权限，如VIP用户一些特权
     * 调用的接口，可以在此验证
     *
     * @param void
     * @param void
     *
     * @return 
     */
    public function userAuth() 
    {

        // 验证不通过，返回错误码
        // $retArr = array('retKey' => '');
        // \PhpApi\Exception::exceptionToResponse($retArr);

    }


}