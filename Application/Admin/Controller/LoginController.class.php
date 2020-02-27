<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/11/13
 * Time: 16:52
 */

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login() {
        return $this->display();
    }

    public function dologin() {
        $users = M('users');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nowTime = date("Y-m-d H:i:s");
        $msg = array(
            'message' => "",
            'status' => 0
        );

        if (!$username) {
            $msg['message'] = "请输入用户名";
            return $this->ajaxReturn($msg);
        }
        if (!$password) {
            $msg['message'] = "请输入密码";
            return $this->ajaxReturn($msg);
        }

        
        $search = $users->where(array('username' => $username))->find();
        
        if (!$search) {
            $msg['message'] = "用户名错误";
            return $this->ajaxReturn($msg);
        }

        if (md5($password) !== $search['password']) {
            $msg['message'] = "密码错误";
        } else {
            $login_time = array(
                'last_login_time' => $nowTime,
                'update_time' => $nowTime,
                'last_login_ip' => get_client_ip()
            );
            $fix = $users->where(array('username' => $username))->save($login_time);
            if ($fix) {
                $msg['message'] = "登录成功";
                $msg['status'] = 1;
                session('users', $search);
            } else {
                $msg['message'] = "登陆失败";
            }
        }
        return $this->ajaxReturn($msg);
    }

    public function log_out() {
        session(null);
        $this->redirect('Login/login');
    }
}