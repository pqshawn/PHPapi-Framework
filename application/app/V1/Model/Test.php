<?php
namespace App\V1\Model;

use PhpApi\Model;

class Test extends Model {
    // 自定义设置表名
    // public $_table = 'test';

    public function __construct() {
		parent::__construct();
    }
    
    public function add($data) {
		$result = $this->create($data);
		return $result;
	}

}