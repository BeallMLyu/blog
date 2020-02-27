<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/11/14
 * Time: 14:47
 */

namespace Admin\Controller;

class AccountController extends CommonController {
    public function index() {
        $system_info = M('system_info');
        $users = session('users');
        $search = $system_info->where("id > 0")->find();
        $this->assign('users', $users);
        $this->assign('system', $search);
        return $this->display();
    }
}