<?php
namespace App\V1\Service;

use PhpApi\Service;
use App\V1\Model\Test as ModelTest;

class Test extends Service{

    public function __construct() {
		
    }
    
    /**
     * 这是一个简单事例，复杂的业务请用装饰器
     */
    public function add($data) {
        $testModel = new ModelTest();

		$result = $testModel->add($data);
		return $result;
	}

}