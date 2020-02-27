<?php if (!defined('THINK_PATH')) exit();?><title>文章修改</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        .article_add{
            width: 550px;
            height: 650px;
            border-radius: 25px;
            border: 5px solid grey;
            /*text-align: center;*/
            background-color: rgba(10, 10, 10, 0.77);
            color: white;
            position: absolute;
            left: 38.5%;
            top: 18%;
        }
        .title{
            width:410px;
            height:60px;
            display:block;
            margin-left:auto;
            margin-right:auto;
            position: absolute;
            left: 120px;
            top: 60px;
        }
        .content{
            width:410px;
            height:300px;
            position: absolute;
            left: 120px;
            top: 150px;
        }
        .submit{
            background: transparent;
            width: 350px;
            height: 50px;
            text-align: center;
            line-height: 45px;
            font-size: 40px;
            border-radius: 20px;
            border: grey solid 5px;
            position: absolute;
            top: 87%;
            left: 16%;
        }
        #select{
            border: solid 1px #cfcfcf;
            cursor: pointer;
            background-color: #ffffff;
            display: inline-block;
            position: absolute;
            left: 27.5%;
            top: 79%;
            width: 357px;
            height: 30px;
            -webkit-border-radius: 4px;
        }
        select{
            text-align: center;
            text-align-last: center;
            font-size: 20px;
        }
        #status{
            width: 30%;
            position: absolute;
            top: 72.5%;
            left: 45%;
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
    <p style="font-size: 20px;line-height: 20px;left: 42.5%;position: absolute">编辑文章</p>
    <input id="blog_id" type="hidden" value="<?php echo ($blog['id']); ?>">
    <div>
        <br/>
        <p style="font-size: 20px;position: absolute;left: 3%;top: 8%">文章标题</p>
        <input id="title" class="title" name="title" type="text" value="<?php echo ($blog['title']); ?>">
        <br/>
        <p style="font-size: 20px;position: absolute;left: 3%;top: 40%">文章内容</p>
        <textarea  id="content" class="content" name="content" type="text" ><?php echo ($blog['content']); ?></textarea>
    </div>
    <p style="font-size: 20px;position: absolute;left: 3%;top: 76.25%">文章类别</p>
    <select id="select">
        <?php if(is_array($cate)): foreach($cate as $key=>$item): ?><option name="cate_id" value="<?php echo ($item['id']); ?>" <?php if($blog['cate_id'] == $item['id']) echo "selected";?>><?php echo ($item['cate_name']); ?></option><?php endforeach; endif; ?>
    </select>
    <p style="font-size: 20px;position: absolute;left: 3%;top: 69.5%">文章状态</p>
    <div id="status">
        <input type="radio" style="background: cornflowerblue" value="1" name="status" <?php if($blog['status'] == 1) echo "checked";?>>已审核
        <input type="radio" style="background: cornflowerblue" value="0" name="status" <?php if($blog['status'] == 0) echo "checked";?>>未审核
    </div>
    <div id="submit" type="button" class="submit">submit</div>
</div>

</body>
</html>
<script>
    $("#submit").click(function () {
        var select = $("#select option:selected")
        var status = $("#status input[type='radio']:checked")
        $.post("/Admin/Article/doUpdate", {
            id:$("#blog_id").val(),
            title:$("#title").val(),
            content:$("#content").val(),
            status:status.val(),
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