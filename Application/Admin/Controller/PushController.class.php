<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/12/10
 * Time: 17:27
 */

namespace Admin\Controller;

class PushController extends CommonController
{

    public function index() {
        $push = M('push');

        $joinLeft = "blog on push.blog_id = blog.id";
        $field = "push.id,push.blog_id,blog.title,push.create_time,push.update_time,push.delete_time,push.sort";

        $push_search = $push->join($joinLeft, "LEFT")->where("push.delete_time is null")->field($field)->order('sort desc')->select();

        $this->assign('search', $push_search);

        return $this->display();
    }

    //添加推送的网页
    public function add() {
        $blog = M('blog');
        $blog_search = $blog->where("delete_time is null")->select();
        $this->assign('blog', $blog_search);
        return $this->display();
    }

    //添加推送的算法
    public function doAdd() {
        $push = M('push');
        $blog_id = $_POST['blog_id'];
        $sort = $_POST['sort'];
        $nowTime = date("Y-m-d H:i:s");
        $msg = array(
            'message' => "",
            'status' => 0
        );

        if (!$sort) {
            $msg['message'] = "请输入排序码";
            return $this->ajaxReturn($msg);
        }

        $insert = array(
            'blog_id' => $blog_id,
            'sort' => $sort,
            'create_time' => $nowTime,
            'update_time' => $nowTime,
        );
        $add = $push->add($insert);
        if ($add) {
            $msg['message'] = "添加成功";
            $msg['status'] = 1;
        } else {
            $msg['message'] = "添加失败";
        }
        return $this->ajaxReturn($msg);
    }

    //删除推送的算法
    public function doDelete() {
        $push = M('push');
        $id = $_POST['id'];
        $nowTime = date("Y-m-d H:i:s");

        $delete = $push->where(array('id' => $id))->save(array('delete_time' => $nowTime));

        if ($delete) {
            $message['status'] = 1;
            $message['message'] = "删除成功";
        } else {
            $message['status'] = 0;
            $message['message'] = "删除失败";
        }
        return $this->ajaxReturn($message);
    }

    //修改推送的网页
    public function update() {
        $push = M('push');
        $blog = M('blog');
        $id = $_GET['id'];

        $joinLeft = "blog on push.blog_id = blog.id";
        $field = "push.id,push.blog_id,blog.title,push.create_time,push.update_time,push.delete_time,push.sort";
        $where = array(
            'push.id' => $id,
            'push.delete_time' => array('exp', 'is null')
        );

        $push_search = $push->join($joinLeft, "LEFT")->where($where)->field($field)->find();

        if (!$push_search) {
            die("404 Not Found");
        } else {
            $blog_search = $blog->where("delete_time is null")->select();
            if ($blog_search) {
                $this->assign('blog', $blog_search);
                $this->assign('push', $push_search);
            }
        }

        return $this->display();
    }

    //修改推送的算法
    public function doUpdate() {
        $push = M('push');
        $nowTime = date("Y-m-d H:i:s");

        $fix = array(
            'id' => $_POST['id'],
            'sort' => $_POST['sort'],
            'blog_id' => $_POST['blog_id'],
            'update_time' => $nowTime
        );

        $save = $push->where('id ='.$fix['id'])->save($fix);

        if ($save) {
            $message['status'] = 1;
            $message['message'] = "修改成功";
        } else {
            $message['status'] = 0;
            $message['message'] = "修改失败";
        }
        return $this->ajaxReturn($message);
    }
}