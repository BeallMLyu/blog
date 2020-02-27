<?php if (!defined('THINK_PATH')) exit();?><title>没头没脑的随记</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        body{
            background: lightcyan;
        }

        /*功能*/
        /*#search{*/
            /*border: 1px solid #c0c0c0;*/
            /*border-radius: 4px;*/
            /*font-size: 1em;*/
            /*width: 300px;*/
            /*height: 40px;*/
            /*float: left;*/
            /*position: absolute;*/
            /*top: 0;*/
            /*left: 37%;*/
        /*}*/

        /*.submit{*/
            /*float: left;*/
            /*height: 42px;*/
            /*width: 80px;*/
            /*line-height: 40px;*/
            /*border-radius: 4px;*/
            /*color: #ffffff;*/
            /*text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);*/
            /*background-color: #006dcc;*/
            /*cursor:pointer;*/
            /*text-align: center;*/
            /*position: absolute;*/
            /*top: 0;*/
            /*left: 53.5%;*/
        /*}*/

        /*类别表格*/
        table th, table td{
            text-align: center;
            width: 170px;
            background: white;
            padding: 0 0;
        }
        table th{
            font-size: 30px;
            color: green;
            background: yellowgreen;
        }
        table td{
            font-size: 20px;
        }
        .table{
            background: white;
            position: fixed;
            top: 45%;
            left: 92%;
        }

        /*文章*/
        .datalist{
            background: lightcyan;
            width: 1245px;
            height: 260px;
            font-size: 35px;
            /*border: 2px solid black;*/
        }
        .data_top{
            position: absolute;
            top: 50px;
            left: 500px;
        }
        .content{
            font-size: 20px;
            left: 50px;
            position: relative;
            top: 10px;
            max-width: 1140px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            white-space: pre-line;
            /*border: 2px solid black;*/
        }

        /*翻页*/
        .page{
            float:left;
            margin: 0 50px;
            border: 1px;
            border-radius: 15px;
            width: 150px;
            height: 50px;
            background: #232323;
            text-align: center;
            line-height: 50px;
            font-size: 30px;
            color: white;
        }
        .page_top{
            position: absolute;
            top: 1400px;
            left: 37%;
            margin: 20px 0 40px 0;
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

    <!--<div>-->
        <!--<input id="search" type="text" placeholder="please enter about the title" value="<?php if($title) echo $title;?>">-->
        <!--<br/>-->
        <!--<div id="submit" class="submit">submit</div>-->
    <!--</div>-->
    <div class="data_top">
        <?php if(is_array($blog)): foreach($blog as $key=>$item): ?><div class="datalist">
                <a style="font-size:50px;left: 50px;position: relative" href="/Home/index/content?id=<?php echo ($item['id']); ?>"><?php echo ($item['title']); ?></a>
                <div style="font-size: 20px;position: relative;left: 50px;top: 3px">
                    类别:<a style="font-size: 20px;" title="<?php echo ($item['cate_name']); ?>" href="/Home/Index/index?cate_id=<?php echo ($item['cate_id']); ?>"><?php echo ($item['cate_name']); ?></a>
                    <div style="font-size: 20px;position: relative;float: right;right: 800px;">
                        发表时间:<a style="font-size: 20px;"><?php echo ($item['create_time']); ?></a>
                    </div>
                </div>
                <div class="content"><?php echo ($item['content']); ?></div>
            </div>
            <div style="background:#006dcc;border-radius: 10px;width: 150px;;height: 50px;text-align: center;line-height: 50px;font-size: 25px;position: relative;left: 50px;margin: 0 0 30px 0">
                <a style="color: white" href="/Home/index/content?id=<?php echo ($item['id']); ?>">查看全文</a>
            </div><?php endforeach; endif; ?>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>类别</th>
            </tr>
            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td>
                        <a href="/Home/Index/index?cate_id=<?php echo ($vo['id']); ?>" title="<?php echo ($vo['cate_name']); ?>"><?php echo ($vo['cate_name']); ?></a>(<?php echo ($vo['count']); ?>)
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
<div class="page_top">
    <div class="page">
        <a style="color: white" href="/Home/Index/index?<?php if($title) echo "title=".$title.'&';?>cate_id=<?php echo ($cate_id); ?>&page=1"><<</a>
    </div>
    <div class="page">
        <a style="color: white" href="/Home/Index/index?<?php if($title) echo "title=".$title.'&';?>cate_id=<?php echo ($cate_id); ?>&page=<?php if($nowPage - 1 < 1) echo 1;else echo $nowPage - 1;?>"><</a>
    </div>
    <!--<?php $__FOR_START_9333__=0;$__FOR_END_9333__=$totalPage;for($page=$__FOR_START_9333__;$page < $__FOR_END_9333__;$page+=1){ ?>-->
        <!--<div class="page">-->
            <!--<a style="color: white" href="/Home/Index/index?<?php if($title) echo "title=".$title.'&';?>page=<?php echo ($page + 1); ?>"><?php echo ($page + 1); ?></a>-->
        <!--</div>-->
    <!--<?php } ?>-->
    <div class="page">
        <a style="color: white" href="/Home/Index/index?<?php if($title) echo "title=".$title.'&';?>cate_id=<?php echo ($cate_id); ?>&page=<?php if($nowPage + 1 > $totalPage) echo $totalPage;else echo $nowPage + 1;?>">></a>
    </div>
    <div class="page">
        <a style="color: white" href="/Home/Index/index?<?php if($title) echo "title=".$title.'&';?>cate_id=<?php echo ($cate_id); ?>&page=<?php echo ($totalPage); ?>">>></a>
    </div>
</div>
<script>
    // $("#submit").click(function () {
    //     var title = $("#search").val()
    //     window.location.href = "/Home/index/index?title=" + title
    // })
</script>

</body>
</html>