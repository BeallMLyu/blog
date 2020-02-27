<?php if (!defined('THINK_PATH')) exit();?><title>推送添加</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        .push_sort{
            width: 25%;
            background-color: rgba(10, 10, 10, 0.77);
            border: 2px ridge rgba(238, 238, 238, 0.13);
            border-radius: 5px;
            height: 300px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .sort{
            width: 300px;
            height: 50px;
            font-size: 20px;
            position: absolute;
            top: 20%;
            left: 30%;
        }
        select{
            width: 300px;
            height: 50px;
            position: absolute;
            top: 45%;
            left: 30%;
            font-size: 20px;
        }
        .submit{
            background: #009688;
            width: 250px;
            border-radius: 10px;
            text-align: center;
            line-height: 45px;
            font-size: 40px;
            position: absolute;
            top: 75%;
            left: 24%;
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
            line-height: 75px;
            font-size:25px;
            top: 20px;
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
        height: 820px;
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

    <div class="push_sort">
        <p style="color:white;text-align: center;font-size: 20px;line-height: 18px">添加推送</p>
        <div>
            <p style="color:white;font-size: 20px;line-height: 18px;position: absolute;top: 55px;left: 8%">排序码</p>
            <input id="sort" class="sort" name="sort" type="text" placeholder="排序码">
        </div>
            <p style="color:white;font-size: 20px;line-height: 18px;position: absolute;top: 130px;left: 6%">推送文章</p>
            <select id="blog">
                <?php if(is_array($blog)): foreach($blog as $key=>$item): ?><option name="blog_id" value="<?php echo ($item['id']); ?>"><?php echo ($item['title']); ?></option><?php endforeach; endif; ?>
            </select>
        <div id="submit" type="button" class="submit">submit</div>
    </div>

    
</body>
</html>

    <script>
        $("#submit").click(function () {
            var blog = $("#blog option:selected")
            $.post("/Admin/Push/doAdd", {
                sort:$("#sort").val(),
                blog_id:blog.val()
            }, function (result) {
                console.log(result)
                alert(result.message)
                if (result.status == 1) {
                    window.location.href = "/Admin/Push/index"
                }
            }, "json")
        })
    </script>