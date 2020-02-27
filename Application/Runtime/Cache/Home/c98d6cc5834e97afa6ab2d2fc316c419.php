<?php if (!defined('THINK_PATH')) exit();?><title><?php echo ($blog['title']); ?></title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style type="text/css">
        body{
            background: whitesmoke;
        }

        /*文章标题和内容*/
        .title{
            background: whitesmoke;
            width: 1350px;
            height: 150px;
            text-align: center;
            font-size: 40px;
            line-height: 130px;
            position: absolute;
            left: 530px;
            top: 0;
            border: 2px solid black;
        }
        .content{
            background: whitesmoke;
            width: 1350px;
            height: auto;
            position: absolute;
            left: 530px;
            top: 162.5px;
            font-size: 25px;
            border: 2px solid black;
        }

        /*评论添加框*/
        .article_add{
            width: 1399px;
            background: transparent;
            height: 300px;
            position: relative;
            left: 490px;
            top: auto;
            line-height: 50px;
            margin: auto 0;
            border: 2px solid black;
        }
        .detail{
            width:1350px;
            height:175px;
            position: absolute;
            left: 30px;
            top: 18px;
            font-size: 30px;
            padding-left: 5px;
        }

        .submit{
            background: #009688;
            position: absolute;
            left: 550px;
            top: 225px;
            color: white;
            width: 300px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 5px;
            font-size: 40px;
            cursor: pointer;
        }

        /*评论(表格)*/
        /*.table{*/
            /*position: absolute;*/
            /*left: 530px;*/
            /*top: 75%;*/
        /*}*/
        /*table th, table td{*/
            /*width: 670px;*/
            /*height: 80px;*/
            /*font-size: 25px;*/
        /*}*/

        .comment_top{
            position: absolute;
            top: 1560px;
            left: 530px;
        }
        .comment_class{
            width: 1350px;
            height: 150px;
            word-wrap: break-word;
            white-space : normal;
            /*border: 2px solid black;*/
        }

        textarea{
            resize:none;
            border: none;
        }

        pre{
            white-space:pre-wrap;
            word-wrap:break-word;
        }

        /*翻页*/
        .page_type{
            background: #333333;
            float: left;
            margin: 0 40px;
            width: 150px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 5px;
            font-size: 25px;
        }
        .page_top{
            position: absolute;
            left: 39%;
            top: 1490px;
            /*border: 2px solid black;*/
        }
        .page_top2{
            position: absolute;
            left: 39%;
            top: 2040px;
            /*border: 2px solid black;*/
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

<!--侧面菜单-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .header_class{
            background-color: #333333;
            color: #999999;
            width: 500px;
            height: 350px;
            text-align: center;
            line-height: 20px;
            font-size:25px;
            position: fixed;
            top: 0;
            left: 0;
        }
        .img_class{
            width: 175px;
            height: 175px;
            border-radius: 175px;
            position: relative;
            left: 155px;
            top: 40px
        }
    </style>
</head>
<body>
    <div class="header_class">
        <div class="img_class">
            <a href="/Home/Index/index">
                <img src="/Public/home/my_header.png" style="width: 175px;height: 175px;border-radius: 175px;border: 5px solid magenta">
            </a>
            <a style="font-size: 40px;font-family: Georgia;position: absolute;top: 210px;right: -60px" href="/Home/Index/index">Just_Meitounao</a>
            <div style="font-size: 30px;font-family: Georgia;position: absolute;top: 260px;right: 23px">个人随记</div>
        </div>
    </div>
<style>
    .list{
        background-color: #333333;
        float: left;
        height: 586.5px;
        position: fixed;
        left: 0;
        top: 350px;
    }
    .list_menu{
        background: grey;
        font-size: 20px;
        width: 500px;
        padding: 0;
        line-height: 45px;
        position: relative;
    }
    .list_menu-item{
        height: 50px;
        text-align: center;
        position: relative;
    }
    /*链接色*/
    a:link {
        color:cornflowerblue;
        text-decoration:none;
    }
    /*事后链接*/
    a:visited {
        color:cornflowerblue;
        text-decoration:none;
    }
    /*鼠标悬浮链接*/
    a:hover {
        color:green;
        text-decoration:none;
    }
    /*点击色*/
    a:active {
        color:green;
        text-decoration:none;
    }

    ul li{
        -webkit-transition: background 0.5s,padding-left 0.25s;
    }
</style>
<div>
    <div class="list">
        <ul class="list_menu">
            <li class="list_menu-item" id="home">
                <a class="homeAnime" href="/Home/Index/index" style="color: whitesmoke;position: relative;cursor: default">
                    <div>
                        首页
                    </div>
                </a>
            </li>
            <li class="list_menu-item" id="category">
                <a class="cateAnime" href="/Home/Menu/category" style="color: whitesmoke;position: relative;cursor: default">
                    <div>
                        分类
                    </div>
                </a>
            </li>
            <li class="list_menu-item" id="push">
                <a class="pushAnime" href="/Home/Menu/push" style="color: whitesmoke;position: relative;cursor: default">
                    <div>
                        推送
                    </div>
                </a>
            </li>
            <li class="list_menu-item" id="about">
                <a class="aboutAnime" href="/Home/Menu/about" style="color: whitesmoke;position: relative;cursor: default">
                    <div>
                        关于
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    $("#home").mouseover(function () {
        $("#home").css({"background":"#999999"})
        $(".homeAnime").stop().animate({"font-size":"25px"},100)
    })
    $("#home").mouseout(function () {
        $("#home").css({"background":"grey"})
        $(".homeAnime").stop().animate({"font-size":"20px"},100)
    })

    $("#push").mouseover(function () {
        $("#push").css({"background":"#999999"})
        $(".pushAnime").stop().animate({"font-size":"25px"},100)
    })
    $("#push").mouseout(function () {
        $("#push").css({"background":"grey"})
        $(".pushAnime").stop().animate({"font-size":"20px"},100)
    })
    $("#category").mouseover(function () {
        $("#category").css({"background":"#999999"})
        $(".cateAnime").stop().animate({"font-size":"25px"},100)
    })
    $("#category").mouseout(function () {
        $("#category").css({"background":"grey"})
        $(".cateAnime").stop().animate({"font-size":"20px"},100)
    })

    $("#about").mouseover(function () {
        $("#about").css({"background":"#999999"})
        $(".aboutAnime").stop().animate({"font-size":"25px"},100)
    })
    $("#about").mouseout(function () {
        $("#about").css({"background":"grey"})
        $(".aboutAnime").stop().animate({"font-size":"20px"},100)
    })
</script>

<div class="title"><?php echo ($blog['title']); ?></div>
<div class="content">
    <pre><?php echo ($blog['content']); ?></pre>
</div>
<div class="page_top">
    <div class="page_type">
        <a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=1" style="color: white"><<</a>
    </div>
    <div class="page_type">
        <a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php if($nowPage - 1 < 1) echo 1;else echo $nowPage - 1;?>" style="color: white"><</a>
    </div>
    <!--<?php $__FOR_START_25679__=0;$__FOR_END_25679__=$total_page;for($page=$__FOR_START_25679__;$page < $__FOR_END_25679__;$page+=1){ ?>-->
        <!--<div class="page_type">-->
            <!--<a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php echo ($page + 1); ?>"><?php echo ($page + 1); ?></a>-->
        <!--</div>-->
    <!--<?php } ?>-->
    <div class="page_type">
        <a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php if($nowPage + 1 > $total_page) echo $total_page;else echo $nowPage + 1;?>" style="color: white">></a>
    </div>
    <div class="page_type">
        <a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php echo ($total_page); ?>" style="color: white">>></a>
    </div>
</div>

<div class="article_add">
    <input type="hidden" class="blog_id" data-id="<?php echo ($blog['id']); ?>">
    <textarea id="detail" class="detail" name="detail" placeholder="评论添加"></textarea>
    <div id="submit" type="button" class="submit">submit</div>
</div>
<!--<div style="width: 1300px;height: 1px;background: gray;position: absolute;left: 549px;top: 1560px"></div>-->
<div class="comment_top">
    <?php if(is_array($comment)): foreach($comment as $key=>$item): ?><div class="comment_class">
            <div style="width: 1300px;height: 1px;background: gray;position: absolute;left: 20px;"></div>
            <div style="font-size: 35px;line-height: 60px;position: absolute;left: 20px"><?php echo ($item['detail']); ?></div>
            <div style="font-size: 20px;line-height: 225px;position: absolute;left: 20px"><?php echo ($item['create_time']); ?></div>
            <div style="width: 1300px;height: 1px;background: gray;position: absolute;left: 20px;margin: 150px 0;"></div>
        </div><?php endforeach; endif; ?>
</div>
<!--<div class="page_top2">-->
    <!--<div class="page_type">-->
        <!--<a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=1" style="color: white"><<</a>-->
    <!--</div>-->
    <!--<div class="page_type">-->
        <!--<a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php if($nowPage - 1 < 1) echo 1;else echo $nowPage - 1;?>" style="color: white"><</a>-->
    <!--</div>-->
    <!--<div class="page_type">-->
        <!--<a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php if($nowPage + 1 > $total_page) echo $total_page;else echo $nowPage + 1;?>" style="color: white">></a>-->
    <!--</div>-->
    <!--<div class="page_type">-->
        <!--<a href="/Home/Index/content?id=<?php echo ($blog['id']); ?>&page=<?php echo ($total_page); ?>" style="color: white">>></a>-->
    <!--</div>-->
<!--</div>-->
<script>
    $("#submit").mouseover(function () {
        $("#submit").css({"background":"#058ee1"})
    })
    $("#submit").mouseout(function () {
        $("#submit").css({"background":"#009688"})
    })
    
    
    $("#submit").click(function () {
        var blog_id = $(".blog_id").attr("data-id")
        $.post("/Home/Index/doAdd", {
            detail:$("#detail").val(),
            blog_id:blog_id
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.reload()
            }
        })
    })
</script>

</body>
</html>