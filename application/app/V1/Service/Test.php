<?php
namespace App\V1\Service;

use PhpApi\Service;
use PhpApi\Cache;
use App\V1\Model\Test as ModelTest;

class Test extends Service {
    protected $cacheObj = null;

    public function __construct() {
		$this->cacheObj = new Cache();
    }
    
    /**
     * 这是一个简单事例，复杂的业务请用装饰器
     */
    public function add($data) {
        $testModel = new ModelTest();

		$result = $testModel->add($data);
		return $result;
	}

    public function cache($key, $val = '', $expire = 3600) {
        if ($val) {
            $res = $this->cacheObj->cache->set($key, $val, $expire);
        } else {
            $res = $this->cacheObj->cache->get($key);
        }
        return $res;
    }

}