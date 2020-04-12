<?php
namespace App\V1\Api;

/**
 * 客户端要构造签名，如果不构造签名，请修改掉系统AesCrypto类，第119行到122，并且打开123行
 * 		if ($remainHmac == $calcmac)
		{
			return $requestArray;
		}
		// return $requestArray;
 * 
 * 传参参考：
 * {"os_version":"release-v1.0.0","details":{"os_name_test":"这是测试中文","os_details":{"os_version":"v1.0.0","os_sim":123,"array_test":[{"tkey":"v1.0.0","tkey2":[1,2,3,{"tkey":"v1.0.0"}]},1,"2"]},"phone_version":"3kkaia39393","description":"描述"}}
 */
use PhpApi\Controller;
use App\V1\Service\Test as ServiceTest;

class Test extends Controller {
    // 权限判断
    // use \App\V1\Traits\Controller\SimpleAuth;
    
    protected $testService = null;

    // 权限过滤，1 or true 跳过验证， 0 or false 正常执行验证
    // 不需要验证token接口，前提需要加强安全性能
	private $filterAuth = array(
		'uploadInfo' => 1
    );
    
    protected $filerRequest = array(
		'uploadInfo' => array(
			'os_version' => array('require' => true, 'type' => 'string', 'size' => 15, 'format' => 'regex|/^release-v[\d+]\.[\d+].[\d+]$/'),
			'details' => 
			array('require' => true, 'type' => 'list', 'size' => 11, 'format' => 'list', 'list' =>
				array(
					'os_name_test' => array('require' => true, 'type' => 'string', 'size' => 20, 'format' => ''),
					'os_details' => array('require' => true, 'type' => 'list', 'size' => 11, 'format' => 'list', 'list' =>
						array(
							'os_version' => array('require' => true, 'type' => 'string', 'size' => 11, 'format' => 'version'),
							'os_sim' => array('require' => false, 'type' => 'int', 'size' => 11, 'format' => ''),
							/* 数组部分是验证是比较复杂的，数组里每项都可能不一样，第一项有可能是个对象，第二项是个字符串,对象里可能还是个数组
							非对象的按照format来解析，子元素的有定义的按照定义的来，有键的全写在item的一个数组下即可，*/
							'array_test' => array('require' => true, 'type' =>'array','size' => 11,'format'=>'int','array' => 
								array(
									'tkey' => array('require' => true, 'type' => 'string', 'size' => 11, 'format' => 'regex|/^v[\d+]\.[\d+].[\d+]$/'),
									'tkey2' => array('require' => true, 'type' => 'array', 'size' => 11, 'format' => 'numletter')
								)
							)
						)
					),
					'phone_version' => array('require' => true, 'type' => 'string', 'size' => 11),
					'description' => array('require' => true, 'type' => 'string', 'size' => 11),
				)

			)
		),
		'test' => array(
		)
	);

    /**
     * 用户自定义前置方法
     */
    public function beforeUserAction() {
        $this->testService = new ServiceTest();
    }

    public function uploadInfo() {

        $data = array(
        	'device_id'   => isset($this->params['device_id'])? $this->params['device_id'] : '',
            'device_sn'   => isset($this->params['device_sn'])? $this->params['device_sn'] : '',
            'device_name' => isset($this->params['device_name'])? $this->params['device_name'] : '',
            'device_model' => isset($this->params['device_model'])? $this->params['device_model'] : '',
            'sim_phone1'   => isset($this->params['sim_phone1'])? $this->params['sim_phone1'] : '',
            'sim_phone2'   => isset($this->params['sim_phone2'])? $this->params['sim_phone2'] : '',
            'os_name'      => isset($this->params['os_name'])? $this->params['os_name'] : '',
            'os_version'   => isset($this->params['os_version'])? $this->params['os_version'] : '',
        );
        // $result = $this->testService->save($data); // 请开发人员自己写service
        $result = array('rs' => true);

        $ret = isset($result['rs'])? $result['rs'] : false;
        $retKeyString = $ret? 'SUCCESS' : 'FAILURE';
        return array('retKey' => $retKeyString);

    }

    public function get() {
        // 用retKey字符串代替ret数字，便于阅读代码
        return array('retKey' => 'SUCCESS', 'title' => 'test1', 'content' => 'test2', 'request' => $this->params);
    }
    


    public function show() {
        
        return array('retKey' => 'FAILURE', 'article' => '第一篇文章', 'content' => 'test');
    }

    public function set() {
        $testService = $this->testService;

        $data = array(
            'title'   => 'fifth test title',
            'content' => 'fifth test content'
        );
        $result = $testService->add($data);

        $ret = isset($result['rs'])? $result['rs'] : false;
        $retKeyString = $ret? 'SUCCESS' : 'FAILURE';
        return array('retKey' => $retKeyString, 'title' => $data['title'], 'content' => $data['content']);
    }


    public function tok() {
        $testService = $this->testService;
        $key = 'website';
        $val = 'ldos.com@t='.time();
        $testService->cache($key, $val);
        $result = $testService->cache($key);

        $retKeyString = 'SUCCESS';
        return array('retKey' => $retKeyString, 'key' => $key, 'val' => $result);
    }

    
}
