<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2020/2/9
 * Time: 15:18
 */

namespace Home\Controller;

use Think\Controller;

class MenuController extends Controller
{
    public function push() {
        $push = M('push');

        $joinLeft = "blog on blog.id = push.blog_id";
        $field = "push.update_time,push.blog_id,blog.title";
        $push_select = $push
            ->where("push.delete_time is null")
            ->join($joinLeft, "LEFT")
            ->field($field)
            ->limit(10)
            ->order("push.update_time desc")
            ->select();

        $this->assign('push', $push_select);
        return $this->display();
    }

    public function category() {
        $category = M('category');
        $blog = M('blog');
        $cateCount = $category->count();
        $cate = $category->select();

        for($i=0;$i<$cateCount;$i++)
        {
            $cate[$i]['count'] = $blog->where(array('cate_id'=>$cate[$i]['id']))->count();
        }

        $this->assign('cate',$cate);
        return $this->display();
    }

    public function about() {
        return $this->display();
    }
}