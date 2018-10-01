<?php
namespace App\V1\Api;

use PhpApi\Controller;

class Server extends Controller {

    protected $testService = null;

    /**
     * 用户自定义前置方法
     */
    public function beforeUserAction() {
        $this->testService = new ServiceTest();
    }

    public function find($serverName = '') {
       
    }
    
}
