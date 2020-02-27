<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2020/1/6
 * Time: 17:14
 */

namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function _initialize() {
        $users = session('users');
        if (!$users) {
            $this->redirect('Login/login');
        }
    }
}