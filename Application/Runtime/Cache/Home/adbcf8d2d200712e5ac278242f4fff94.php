<?php if (!defined('THINK_PATH')) exit();?><title>关于我</title>
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

<style>
    body{
        background: lightcyan;
    }
    .title{
        color: #006dcc;
        position: absolute;
        top: 5%;
        right: 650px;
        font-size: 60px;
    }

    .ul_top{
        position: absolute;
        left: 52%;
        top: 15%;
    }
    .about{
        width: 300px;
        height: 70px;
        line-height: 70px;
        font-size: 40px;
    }
</style>

<div class="title">关于我</div>
<div class="ul_top">
    <ul>
        <li class="about">95后</li>
        <li class="about">PS4玩家</li>
        <li class="about">目前学习中......</li>
    </ul>
</div>


</body>
</html>