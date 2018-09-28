<?php
namespace Ischool\Api;

use PhpApi\Controller;


class Test extends Controller{

    public function get() {
        return array('title' => 'ischool test1', 'content' => 'ischool test2');
    }
}