<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2019/11/15
 * Time: 10:29
 */

namespace Admin\Controller;

class ArticleController extends CommonController
{
    //文章列表(首页、搜索)
    public function datalist() {
        $blog = M('blog');
        $title = $_GET['title'];
        $page = $_GET['page'];
        if (!$page) {
            $page = 1;
        }
        $page_row = $_GET['page_row'];
        if (!$page_row) {
            $page_row = 3;
        }

        $field = "blog.id,blog.title,blog.status,blog.click_count,blog.push_time,blog.create_time,blog.update_time,blog.cate_id,category.cate_name";
        $joinLeft = "category on blog.cate_id = category.id";
        if (!$title) {
            $where = "blog.delete_time is null";
        } else {
            $where = array(
                'blog.title' => array('like', '%'.$title.'%'),
                'blog.delete_time' => array('exp', 'is null')
            );
            $this->assign('title', $title);
        }

        $limit = ($page - 1) * $page_row;

        $search = $blog->join($joinLeft, 'LEFT')->where($where)->field($field)->limit($limit, $page_row)->order('id desc')->select();
        $count = $blog->join($joinLeft, 'LEFT')->where($where)->count();
        $total_page = ceil($count/$page_row);

        $this->assign('blog', $search);
        $this->assign('count', $count);
        $this->assign('nowPage', $page);
        $this->assign('page_row', $page_row);
        $this->assign('total_page', $total_page);


        return $this->display();
    }

    //发表新文章(网页)
    public function add() {
        $cate = M('category');
        $cateSearch = $cate->where("id > 0")->select();
        $this->assign('cate', $cateSearch);
        return $this->display();
    }

    //修改现有且指定的文章(网页)
    public function update() {
        $blog = M('blog');
        $cate = M('category');
        $id = $_GET['id'];
        $joinLeft = "category on blog.cate_id = category.id";
        $field = "blog.id,blog.content,blog.title,blog.status,blog.cate_id";
        $where = array(
            'blog.id' => $id,
            'blog.delete_time' => array('exp', 'is null')
            );

        $search = $blog->join($joinLeft, 'LEFT')->where($where)->field($field)->find();

        if (!$search) {
            die("404 Not Found");
        } else {
            $cate_search = $cate->where("id > 0")->select();
            if ($cate_search) {
                $this->assign('cate', $cate_search);
                $this->assign('blog', $search);
            }
        }
        
        return $this->display();
    }

    //添加新文章(算法)
    public function doAdd() {
        $blog = M('blog');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $cate_id = $_POST['cate_id'];
        $nowTime = date("Y-m-d H:i:s");
        $msg = array(
            'message' => "",
            'status' => 0
        );

        if (!$title) {
            $msg['message'] = "请输入标题";
            return $this->ajaxReturn($msg);
        }
        if (!$content) {
            $msg['message'] = "请输入内容";
            return $this->ajaxReturn($msg);
        }

        $title_search = $blog->where(array('title' => $title))->find();
        if ($title_search) {
            $msg['message'] = "标题已存在";
            return $this->ajaxReturn($msg);
        } else {
            $insert = array(
                'title' => $title,
                'content' => $content,
                'create_time' => $nowTime,
                'update_time' => $nowTime,
                'cate_id' => $cate_id
            );

            $add = $blog->add($insert);

            if ($add) {
                $msg['message'] = "添加成功";
                $msg['status'] = 1;
            } else {
                $msg['message'] = "添加失败";
            }
            return $this->ajaxReturn($msg);
        }
    }

    //修改现有文章(算法)
    public function doUpdate() {
        $blog = M('blog');
        $nowTime = date("Y-m-d H:i:s");

        $fix = array(
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'cate_id' => $_POST['cate_id'],
            'status' => $_POST['status'],
            'update_time' => $nowTime
        );

        $save = $blog->where('id ='.$fix['id'])->save($fix);

        if ($save) {
            $message['status'] = 1;
            $message['message'] = "修改成功";
        } else {
            $message['status'] = 0;
            $message['message'] = "修改失败";
        }
        return $this->ajaxReturn($message);
    }

    //删除现有文章(算法)
    public function doDelete() {
        $blog = M('blog');
        $id = $_POST['id'];
        $nowTime = date("Y-m-d H:i:s");

        $delete = $blog->where(array('id' => $id))->save(array('delete_time' => $nowTime));

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