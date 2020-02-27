<?php if (!defined('THINK_PATH')) exit();?><title>评论修改</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        .article_add{
            background: rgba(0, 0, 0, 0.5);
            width: 600px;
            height: 540px;
            text-align: center;
            border-radius: 10px;
            position: absolute;
            left: 40%;
            top: 20%;
            font-size: 20px;
        }
        .detail{
            width:410px;
            height:300px;
            position: relative;
            top: 0;
            left: 50px;
        }
        .submit{
            border: 1px solid #CCCCCC;
            border-radius: 10px;
            background: #009688;
            width: 350px;
            height: 50px;
            text-align: center;
            line-height: 45px;
            font-size: 40px;
            position: relative;
            top: 55px;
            left: 20%;
        }
        #examine_status{
            position: relative;
            top: 30px;
            left: 60px;
        }
        input{
            font-size: 20px;
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
<div class="article_add">
    <p style="font-size: 20px;line-height: 30px;">评论修改</p>
    <input id="comment_id" type="hidden" value="<?php echo ($comment['id']); ?>">
    <p style="font-size: 20px;position: absolute;top: 39%;left: 25px;">评论内容</p>
    <div>
        <input id="detail" class="detail" name="detail" type="text" value="<?php echo ($comment['detail']); ?>">
    </div>
    <p style="font-size: 20px;position: absolute;left: 25px;top: 70%">审核状态</p>
    <div id="examine_status">
        <input type="radio" style="background: cornflowerblue" value="1" name="examine_status" <?php if($comment['examine_status'] == 1) echo "checked";?>>已审核
        <input type="radio" style="background: cornflowerblue" value="0" name="examine_status" <?php if($comment['examine_status'] == 0) echo "checked";?>>未审核
    </div>
    <div id="submit" type="button" class="submit">submit</div>
</div>

</body>
</html>
<script>
    $("#submit").click(function () {
        var examine_status = $("#examine_status input[type='radio']:checked")
        $.post("/Admin/Comment/doUpdate", {
            id:$("#comment_id").val(),
            detail:$("#detail").val(),
            examine_status:examine_status.val(),
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.href = "/Admin/Comment/index"
            }
        }, "json")
    })
</script>