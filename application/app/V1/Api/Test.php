<?php
namespace App\V1\Api;

use PhpApi\Controller;
use App\V1\Service\Test as ServiceTest;

class Test extends Controller{

    public function get() {
        // 用retKey字符串代替ret数字，便于阅读代码
        return array('retKey' => 'SUCCESS', 'title' => 'test1', 'content' => 'test2', 'request' => $this->params);
    }

    public function show() {
        
        return array('retKey' => 'FAILURE', 'article' => '第一篇文章', 'content' => 'test');
    }

    public function set() {
        $testService = new ServiceTest();

        $data = array(
            'title'   => 'fifth test title',
            'content' => 'fifth test content'
        );
        $result = $testService->add($data);

        $ret = isset($result['rs'])? $result['rs'] : false;
        $retKeyString = $ret? 'SUCCESS' : 'FAILURE';
        return array('retKey' => $retKeyString, 'title' => $data['title'], 'content' => $data['content']);
    }

    
}