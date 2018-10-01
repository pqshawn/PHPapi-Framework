<?php
/**
 * 这里仅对登陆token做鉴权
 *
 * @copyright (c)Ldos.net All rights reserved.
 * @author Shawn Yu <Ldos.net>
 */

namespace App\V1\Traits\Controller;

trait SimpleAuth {

    /**
     * 用户自定义初始化
     */
    public function initialize($actionName = '') 
    {   
        // 注意方法名保持一致
        $actionName = !empty($actionName)? lcfirst($actionName) : $actionName;
        
        // 不需要难
        if (empty($this->filterAuth[$actionName])) 
        {
            $this->checkLogin();
        }
        
        
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

        $cacheObj = new \PhpApi\Cache();
        $clientToken = '';
        if (isset($_SERVER['HTTP_AUTHENTICATION']) && $_SERVER['HTTP_AUTHENTICATION'] ) {
            $clientToken = $_SERVER['HTTP_AUTHENTICATION'];
        } else {
            $retArr = array('retKey' => 'ILLEGAL_TOKEN');
            \PhpApi\Exception::exceptionToResponse($retArr);
        }

        $res = $cacheObj->cache->get($clientToken);
        // @todo 过期的暂时不做具体判断
        if (empty($res)) {
            $retArr = array('retKey' => 'INVALID_ARGUMENT');
            \PhpApi\Exception::exceptionToResponse($retArr);
        }

    }


}