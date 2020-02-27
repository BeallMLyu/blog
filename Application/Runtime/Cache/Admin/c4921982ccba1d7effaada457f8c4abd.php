<?php if (!defined('THINK_PATH')) exit();?><title>账户信息</title>

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

<style>
    .account_class{
        background-color: #fff;
        border-radius: 20px;
        width: 1500px;
        height: 90px;
        margin: 20% 18%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
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
</style>
<table class="account_class">
    <tr>
        <th>用户名</th>
        <th>创建时间</th>
        <th>最后登录时间</th>
        <th>最后登录IP</th>
        <th>域名</th>
        <th>PHP版本</th>
        <th>MySql版本</th>
    </tr>
    <tr>
        <td><?php echo ($users['username']); ?></td>
        <td><?php echo ($users['create_time']); ?></td>
        <td><?php echo ($users['last_login_time']); ?></td>
        <td><?php echo ($users['last_login_ip']); ?></td>
        <td><?php echo ($system['domain']); ?></td>
        <td><?php echo ($system['php_version']); ?></td>
        <td><?php echo ($system['mysql_version']); ?></td>
    </tr>
</table>

</body>
</html>