<?php if (!defined('THINK_PATH')) exit();?><title>文章列表</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        body{
            background: whitesmoke;
        }

        /*功能*/
        .search_class{
            text-align: center; /*让div内部文字居中*/
            width: 520px;
            position: absolute;
            top: 250px;
            left: 40%;
            right: 0;
        }
        #search{
            float: left;
            border: 1px solid #c0c0c0;
            border-radius: 4px;
            padding: 10px;
            font-size: 1em;
            margin: 2px 10px;
        }
        .submit{
            text-align: center;
            padding: 4px 8px;
            font-size: 20px;
            height: 35px;
            width: 70px;
            line-height: 30px;
            border-radius: 4px;
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #006dcc;
            float: left;
            margin: 0;
            cursor:pointer
        }
        #article_add{
            text-align: center;
            padding: 4px 8px;
            font-size: 17px;
            height: 35px;
            width: 70px;
            line-height: 30px;
            border-radius: 4px;
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #006dcc;
            float: left;
            margin: 0 10px;
            cursor:pointer
        }
        #location_datalist{
            text-align: center;
            padding: 4px 8px;
            font-size: 17px;
            height: 35px;
            width: 70px;
            line-height: 30px;
            border-radius: 4px;
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #006dcc;
            float: left;
            cursor:pointer
        }

        /*文章列表*/
        table th, table td{
            padding: 5px 35px;
            text-align: center;
            border: 1px solid silver;
        }
        table th{
            background: #999999;
        }
        .datalist{
            text-align: center; /*让div内部文字居中*/
            background-color: #fff;
            width: 1660px;
            height: 170px;
            position: absolute;
            top: 350px;
            left: 230px;
            right: 0;
            bottom: 0;
        }

        /*翻页*/
        .page_class{
            width: 810px;
            height: 65px;
            position: absolute;
            top: 60%;
            left: 31%;
            right: 0;
            bottom: 0;
        }
        .page_turn{
            float:left;
            margin: 20px;
            border: 1px;
            border-radius: 15px;
            width: 50px;
            height: 50px;
            background: #232323;
            text-align: center;
            line-height: 50px;
            font-size: 30px;
        }

    </style>

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

<!--功能-->
<div class="search_class">
    <input id="search" type="text" placeholder="search in index" value="<?php if($title) echo $title;?>">
    <div id="submit" class="submit">submit</div>
    <div id="article_add">添加文章</div>
    <div id="location_datalist">回到首页</div>
</div>

<!--文章列表-->
<table class="datalist">
    <tr class="table_title">
        <th>标题</th>
        <th>状态</th>
        <th>点击数</th>
        <th>类别名字</th>
        <th>推送时间</th>
        <th>创建时间</th>
        <th>上传时间</th>
        <th>编辑文章</th>
    </tr>
    <?php if(is_array($blog)): foreach($blog as $key=>$item): ?><tr>
            <td><?php echo ($item['title']); ?></td>
            <td>
                <?php if(($item['status'] == 0)): ?>未审核
                    <?php else: ?>已审核<?php endif; ?>
            </td>
            <td><?php echo ($item['click_count']); ?></td>
            <td><?php echo ($item['cate_name']); ?></td>
            <td>
                <?php if(($item['push_time'] == null)): ?>未推送
                    <?php else: echo ($item['push_time']); endif; ?>
            </td>
            <td><?php echo ($item['create_time']); ?></td>
            <td><?php echo ($item['update_time']); ?></td>
            <td>
                <div id="update" style="border: 1px solid #999999;border-radius:2px;float: left;background: #009688;color: whitesmoke;cursor:pointer;width: 100px;">
                    <a href ="/Admin/Article/update.html?id=<?php echo ($item['id']); ?>">点击修改</a>
                </div>
                <div class="delete" data-id="<?php echo ($item['id']); ?>" style="border: 1px solid #999999;border-radius:2px;float: right;background: #009688;color: whitesmoke;cursor:pointer;width: 100px;">点击删除</div>
            </td>
        </tr><?php endforeach; endif; ?>
</table>

<!--翻页-->
<div class="page_class">
    <div class="page_turn" id="last_top">
        <a href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page=1&page_row=<?php echo ($page_row); ?>"><<</a>
    </div>
    <div class="page_turn" id="last">
        <a href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page=<?php if($nowPage - 1 < 1) echo 1;else echo $nowPage - 1;?>&page_row=<?php echo ($page_row); ?>"><<</a>
    </div>
    <!--<?php $__FOR_START_30099__=0;$__FOR_END_30099__=$total_page;for($page=$__FOR_START_30099__;$page < $__FOR_END_30099__;$page+=1){ ?>-->
        <!--<div class="page_turn" id="number">-->
            <!--<a href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page=<?php echo ($page + 1); ?>&page_row=<?php echo ($page_row); ?>"><?php echo ($page + 1); ?></a>-->
        <!--</div>-->
    <!--<?php } ?>-->
    <div class="page_turn" id="next">
        <a href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page=<?php if($nowPage + 1 > $total_page) echo $total_page;else echo $nowPage + 1;?>&page_row=<?php echo ($page_row); ?>">>></a>
    </div>
    <div class="page_turn" id="next_row">
        <a href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page=<?php echo ($total_page); ?>&page_row=<?php echo ($page_row); ?>">>></a>
    </div>
    <a class="page_turn" href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page_row=2">2</a>
    <a class="page_turn" href="/Admin/Article/datalist?<?php if($title) echo "title=".$title.'&';?>page_row=4">4</a>
</div>
<script>
    // 标题搜索
    $("#submit").click(function () {
        var title = $("#search").val()
        window.location.href = "/Admin/Article/datalist?title=" + title
    })

    // 文章删除
    $(".delete").click(function () {
        var id = $(this).attr("data-id");
        $.post("/Admin/Article/doDelete", {
            id:id
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.reload()
            }
        }, "json")
    })

    // 添加文章
    $("#article_add").click(function () {
        window.location.href = "/Admin/Article/add"
    })

    // 返回首页
    $("#location_datalist").click(function () {
        window.location.href = "/Admin/Article/datalist"
    })

</script>

</body>
</html>