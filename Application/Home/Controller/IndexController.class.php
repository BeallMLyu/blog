<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    //首页
    public function index() {
        $blog = M('blog');
        $cate_id = $_GET['cate_id'];
        $title = $_GET['title'];
        $page = $_GET['page'];
        if (!$page) {
            $page = 1;
        }
        $page_row = 4;

        $where = array(
            'blog.delete_time' => array('exp', 'is null'),
            'blog.status' => 1
        );
        if ($title) {
            $where['blog.title'] = array('like', '%'.$title.'%');
            $this->assign('title', $title);
        }

        if ($cate_id) {
            $where['blog.cate_id'] = $cate_id;
            $this->assign('cate_id', $cate_id);
        }

        $limit = ($page - 1) * $page_row;

        $joinLeft = "category on blog.cate_id = category.id";
        $field = "blog.id,blog.cate_id,category.cate_name,blog.title,blog.content,blog.click_count,blog.create_time,blog.update_time";

        $search = $blog->join($joinLeft, "LEFT")->where($where)->field($field)->limit($limit, $page_row)->order("blog.create_time desc")->select();
        $count = $blog->join($joinLeft, "LEFT")->where($where)->count();
        $total_page = ceil($count/$page_row);

        $category = M('category');
        $cate_count = $category->count();
        $cate_select = $category->select();

        for ($i=0;$i<$cate_count;$i++)
        {
            $cate_select[$i]['count'] = $blog->where(array('cate_id'=>$cate_select[$i]['id']))->count();
        }

        $this->assign('cate', $cate_select);
        $this->assign('cate_id', $cate_id);
        $this->assign('blog', $search);
        $this->assign('count', $count);
        $this->assign('nowPage', $page);
        $this->assign('totalPage', $total_page);

        return $this->display();
    }

    //显示相应文章的网页
    public function content() {
        $blog = M('blog');
        $id = $_GET['id'];
        $search = $blog->where(array('id' => $id))->find();
        if (!$search) {
            die("404 Not Found");
        } else {
            $this->assign('blog', $search);
        }

        $comment = M('comment');
        $page = $_GET['page'];
        if (!$page) {
            $page = 1;
        }
        $page_row = 3;

        $where = array(
            'blog_id' => $id,
            'delete_time' => array('exp', 'is null'),
            'examine_status' => 1
        );

        $limit = ($page - 1) * $page_row;

        $comment_search = $comment->where($where)->limit($limit, $page_row)->select();
        $count = $comment->where($where)->count();
        $total_page = ceil($count/$page_row);

        $this->assign('comment', $comment_search);
        $this->assign('count', $count);
        $this->assign('nowPage', $page);
        $this->assign('total_page', $total_page);

        return $this->display();
    }

    //前端添加评论的网页
//    public function add() {
//        $blog = M('blog');
//        $search = $blog->where("delete_time is null")->select();
//        $this->assign('blog', $search);
//        return $this->display();
//    }

    //添加评论的算法
    public function doAdd() {
        $comment = M('comment');
        $detail = $_POST['detail'];
        $blog_id = $_POST['blog_id'];
        $nowTime = date("Y-m-d H:i:s");
        $msg = array(
            'message' => "",
            'status' => 0
        );

        if (!$detail) {
            $msg['message'] = "请输入评论";
            return $this->ajaxReturn($msg);
        }

        $insert = array(
            'detail' => $detail,
            'blog_id' => $blog_id,
            'create_time' => $nowTime,
            'update_time' => $nowTime
        );

        $add = $comment->add($insert);
        if ($add) {
            $msg['message'] = "添加成功";
            $msg['status'] = 1;
        } else {
            $msg['message'] = "添加失败";
        }
        return $this->ajaxReturn($msg);
    }
}