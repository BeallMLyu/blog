<?php if (!defined('THINK_PATH')) exit();?><title>写文章</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        .article_add{
            width: 450px;
            height: 550px;
            /*margin: 5% auto;*/
            display:block;
            margin-left:auto;
            margin-right:auto;
            position: absolute;
            left: 0;
            right: 0;
            top: 200px;
            padding: 10px;
            background-color: rgba(10, 10, 10, 0.77);
            border: 2px ridge rgba(238, 238, 238, 0.13);
            border-radius: 5px;
        }
        .title{
            width:410px;
            height:45px;
            display:block;
            margin-left:auto;
            margin-right:auto;
            position: absolute;
            left: 30px;
            top: 30px;
        }
        .content{
            width:410px;
            height:300px;
            display:block;
            margin-left:auto;
            margin-right:auto;
            position: absolute;
            top: 105px;
            left: 30px;
        }
        .submit{
            background: rgba(0, 0, 0, 0.5);
            width: 406px;
            height: 50px;
            position: absolute;
            left: 30px;
            top: 495px;
            display:block;
            margin-left:auto;
            margin-right:auto;
            text-align: center;
            line-height: 45px;
            font-size: 40px;
            border: 2px solid white;
            border-radius: 5px;
            color: whitesmoke;
        }
        #select{
            border: solid 1px #cfcfcf;
            cursor: pointer;
            background-color: #ffffff;
            display: inline-block;
            width: 410px;
            left: 30px;
            height: 50px;
            position: absolute;
            top: 425px;
            -webkit-border-radius: 4px;
        }
        select{
            text-align: center;
            text-align-last: center;
            font-size: 20px;
        }
        textarea{
            resize: none;
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
    <div>
        <input id="title" class="title" name="title" type="text" placeholder="标题">
        <br/>
        <textarea id="content" class="content" name="content" type="text" placeholder="内容"></textarea>
    </div>
    <select id="select">
        <?php if(is_array($cate)): foreach($cate as $key=>$item): ?><option name="cate_id" value="<?php echo ($item['id']); ?>"><?php echo ($item['cate_name']); ?></option><?php endforeach; endif; ?>
    </select>
    <div id="submit" type="button" class="submit">submit</div>
</div>

</body>
</html>
<script>
    $("#submit").click(function () {
        var select = $("#select option:selected")
        $.post("/Admin/Article/doAdd", {
            title:$("#title").val(),
            content:$("#content").val(),
            cate_id:select.val()
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.href = "/Admin/Article/datalist"
            }
        }, "json")
    })
</script>