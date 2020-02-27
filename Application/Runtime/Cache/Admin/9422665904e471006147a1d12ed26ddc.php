<?php if (!defined('THINK_PATH')) exit();?><title>评论管理</title>
    <style>
        /*文章列表*/
        .table{
            background-color: #fff;
            width: 1660px;
            height: 170px;
            /*margin: auto;*/
            position: absolute;
            top: 40%;
            left: 235px;
            right: 0;
        }
        table th, table td{
            top: 100px;
            padding: 5px 40px;
            text-align: center;
            border: 1px solid silver;
        }
        table th{
            background: #999999;
        }

        /*功能*/
        .search{
            position: absolute;
            top: 32.5%;
            left: 57.5%;
            right: 0;
            text-align: center;
            padding: 4px 8px;
            font-size: 20px;
            height: 40px;
            width: 70px;
            line-height: 40px;
            border-radius: 4px;
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #006dcc;
            float: left;
            margin: 0;
            cursor:pointer
        }
        #search{
            border-radius: 5px;
            width: 250px;
            height: 50px;
            position: absolute;
            top: 32.5%;
            left: 43%;
            right: 370px;
            float: left;
            border: 1px solid #c0c0c0;
            padding: 10px;
            font-size: 1em;
        }
        .delete{
            background: #009688;
            float: right;
            color: white;
            border-radius: 5px;
            width: 90px
        }
        .update{
            background: #009688;
            float: left;
            color: white;
            border-radius: 5px;
            width: 90px
        }

        /*翻页*/
        .page_class{
            background: black;
            position: relative;
            top: 57%;
            left: 30%;
            width: 1800px;
            height: 0;
        }
        .page_class_btn{
            float:left;
            border: 1px;
            border-radius: 15px;
            width: 50px;
            height: 50px;
            background: #232323;
            text-align: center;
            line-height: 50px;
            font-size: 30px;
            margin: 1.5%;
        }

    </style>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
<!--侧面菜单-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .header_class{
            background-color: #333333;
            color: #999999;
            width: 200px;
            height: 75px;
            text-align: center;
            line-height: 20px;
            font-size:25px;
            position: fixed;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div class="header_class">
        <p class="header">个人后台管理</p>
    </div>
<style>
    .list{
        background-color: #333333;
        float: left;
        height: 887px;
        position: fixed;
        left: 0;
        top: 50px;
    }
    .list_menu{
        color: whitesmoke;
        font-size: 20px;
        width: 200px;
        padding: 0;
        line-height: 45px;
    }
    .list_menu-item{
        border: 1px solid whitesmoke;
        margin: -1px 0;
        text-align: center;
    }
    /*链接色*/
    a:link {
        color:white;
        text-decoration:none;
    }
    /*事后链接*/
    a:visited {
        color:white;
        text-decoration:none;
    }
    /*鼠标悬浮链接*/
    a:hover {
        color:white;
        text-decoration:none;
    }
    /*点击色*/
    a:active {
        color:white;
        text-decoration:none;
    }
</style>
<div>
    <div class="list">
        <ul class="list_menu">
            <li class="list_menu-item">
                <a href="/Admin/Article/datalist">文章列表</a>
            </li>
            <li class="list_menu-item">
                <a href="/Admin/Account/index">版本信息</a>
            </li>
            <li class="list_menu-item">
                <a href="/Admin/Comment/index">评论管理</a>
            </li>
            <li class="list_menu-item">
                <a href="/Admin/Push/index">推送管理</a>
            </li>
            <li class="list_menu-item">
                <a href="/Admin/Login/log_out">退出登录</a>
            </li>
        </ul>
    </div>
</div>


<div class="action">
    <input id="search" type="text" placeholder="search by detail" value="<?php if($title) echo $title;?>">
    <div id="submit" class="search">search</div>
</div>
    <table class="table">
        <tr class="tr_title">
            <th>评论所指的文章标题</th>
            <th>评论全文</th>
            <th>审核状态</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>编辑文章</th>
        </tr>
        <?php if(is_array($search)): foreach($search as $key=>$item): ?><tr>
                <td>
                    <a href="/Admin/Article/update?id=<?php echo ($item['blog_id']); ?>" style="color: black">
                        <?php echo ($item['title']); ?>
                    </a>
                </td>
                <td><?php echo ($item['detail']); ?></td>
                <td>
                    <?php if(($item['examine_status'] == 0)): ?>未审核
                        <?php else: ?>已审核<?php endif; ?>
                </td>
                <td><?php echo ($item['create_time']); ?></td>
                <td><?php echo ($item['update_time']); ?></td>
                <td>
                    <a class="update" href="/Admin/Comment/update.html?id=<?php echo ($item['id']); ?>">修改评论</a>
                    <div class="delete" data-id="<?php echo ($item['id']); ?>">删除评论</div>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
    <div class="page_class">
        <div class="page_class_btn">
            <a href="/Admin/Comment/index?<?php if($title) echo "title=".$title.'&';?>page=1"><<</a>
        </div>
        <div class="page_class_btn" >
            <a href="/Admin/Comment/index?<?php if($title) echo "title=".$title.'&';?>page=<?php if($nowPage - 1 < 1) echo 1;else echo $nowPage - 1;?>"><</a>
        </div>
        <?php $__FOR_START_8877__=0;$__FOR_END_8877__=$total_page;for($page=$__FOR_START_8877__;$page < $__FOR_END_8877__;$page+=1){ ?><div class="page_class_btn">
                <a href="/Admin/Comment/index?<?php if($title) echo "title=".$title.'&';?>page=<?php echo ($page + 1); ?>"><?php echo ($page + 1); ?></a>
            </div><?php } ?>
        <div class="page_class_btn">
            <a href="/Admin/Comment/index?<?php if($title) echo "title=".$title.'&';?>page=<?php if($nowPage + 1 > $total_page) echo $total_page;else echo $nowPage + 1;?>">></a>
        </div>
        <div class="page_class_btn">
            <a href="/Admin/Comment/index?<?php if($title) echo "title=".$title.'&';?>page=<?php echo ($total_page); ?>">>></a>
        </div>
    </div>
    
</body>
</html>
<script>
    $(".delete").click(function () {
        var id = $(this).attr("data-id");
        $.post("/Admin/Comment/doDelete", {
            id:id
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.href = "/Admin/Comment/index"
            }
        }, "json")
    })

    $("#submit").click(function () {
        var title = $("#search").val()
        window.location.href = "/Admin/Comment/index?title=" + title
    })
</script>