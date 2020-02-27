<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/11/27
 * Time: 10:37
 */
namespace Admin\Controller;

class CommentController extends CommonController
{
    public function index() {
        $comment = M('comment');
        $title = $_GET['title'];
        $page = $_GET['page'];
        if (!$page) {
            $page = 1;
        }

        $pageRow = 4;

        $joinLeft = "blog on comment.blog_id = blog.id";
        $field = "comment.id,comment.blog_id,blog.title,comment.detail,comment.examine_status,comment.create_time,comment.update_time,comment.delete_time";


        if (!$title) {
            $where = "comment.delete_time is null";
        } else {
            $where = array(
                'blog.title' => array('like', '%'.$title.'%'),
                'comment.delete_time' => array('exp', 'is null')
            );
            $this->assign('title', $title);
        }

        $limit = ($page - 1) * $pageRow;

        $comment_search = $comment->join($joinLeft, "LEFT")->where($where)->field($field)->limit($limit, $pageRow)->select();
        $count = $comment->join($joinLeft, "LEFT")->where($where)->count();
        $totalPage = ceil($count/$pageRow);

        $this->assign('search', $comment_search);
        $this->assign('count', $count);
        $this->assign('nowPage', $page);
        $this->assign('total_page', $totalPage);

        return $this->display();
    }

    //修改评论的网页
    public function update() {
        $comment = M('comment');
        $blog = M('blog');
        $id = $_GET['id'];
        $joinLeft = "blog on comment.blog_id = blog.id";
        $field = "comment.id,comment.blog_id,comment.detail,comment.examine_status";
        $where = array(
            'comment.id' => $id,
            'comment.delete_time' => array('exp', 'is null')
        );

        $search = $comment->join($joinLeft, 'LEFT')->where($where)->field($field)->find();

        if (!$search) {
            die("404 Not Found");
        } else {
            $blog_search = $blog->where("id > 0")->select();
            $this->assign('comment', $search);
            $this->assign('blog', $blog_search);
        }
        return $this->display();
    }

    //修改评论的算法
    public function doUpdate() {
        $comment = M('comment');
        $nowTime = date("Y-m-d H:i:s");

        $fix = array(
            'id' => $_POST['id'],
            'detail' => $_POST['detail'],
            'examine_status' => $_POST['examine_status'],
            'update_time' => $nowTime
        );

        $save = $comment->where('id='.$fix['id'])->save($fix);

        if ($save) {
            $message['status'] = 1;
            $message['message'] = "修改成功";
        } else {
            $message['status'] = 0;
            $message['message'] = "修改失败";
        }
        return $this->ajaxReturn($message);
    }

    //删除评论的算法
    public function doDelete() {
        $comment = M('comment');
        $id = $_POST['id'];
        $nowTime = date("Y-m-d H:i:s");

        $delete = $comment->where(array('id' => $id))->save(array('delete_time' => $nowTime));

        if ($delete) {
            $message['status'] = 1;
            $message['message'] = "删除成功";
        } else {
            $message['status'] = 0;
            $message['message'] = "删除失败";
        }
        return $this->ajaxReturn($message);
        }
}