<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/11/11
 * Time: 10:52
 */
namespace Admin\Controller;

class IndexController extends CommonController
{
    public function index() {
        return $this->display();
    }
}

