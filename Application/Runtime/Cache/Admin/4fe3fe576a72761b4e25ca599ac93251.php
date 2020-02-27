<?php if (!defined('THINK_PATH')) exit();?><title>文章推送</title>
    <style>
        /*推送表格*/
        .table{
            background-color: #fff;
            width: 1660px;
            height: 170px;
            margin: auto;
            position: absolute;
            top: 250px;
            left: 200px;
            right: 0;
            text-align: center;
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

        /*添加推送按钮*/
        .add{
            background: #009688;
            width: 100px;
            border-radius: 5px;
            height: 50px;
            position: absolute;
            text-align: center;
            line-height: 50px;
            top: 150px;
            left: 50%;
            right: 0;
        }

        /*删除,不多说*/
        .delete{
            background: #009688;
            border-radius: 5px;
            border: 1px solid #333333;
            padding: 0 5px;
            color: white;
            position: absolute;
            right: 30px;
            margin: -10px 0;
        }

        /*修改*/
        .update{
            background: #009688;
            border-radius: 5px;
            border: 1px solid #333333;
            padding: 0 5px;
            position: absolute;
            right: 130px;
            margin: -10px 0;
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
            position: absolute;
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

<div class="add">
    <a href="/Admin/Push/add">添加推送</a>
</div>
<div>
    <table class="table">
        <tr>
            <th>推送标题</th>
            <th>推送时间</th>
            <th>更新时间</th>
            <th>推送值</th>
            <th>编辑文章</th>
        </tr>
        <?php if(is_array($search)): foreach($search as $key=>$item): ?><tr>
                <td><?php echo ($item['title']); ?></td>
                <td><?php echo ($item['create_time']); ?></td>
                <td><?php echo ($item['update_time']); ?></td>
                <td><?php echo ($item['sort']); ?></td>
                <td>
                    <a class="delete" data-id="<?php echo ($item['id']); ?>">删除推送</a>
                    <a class="update" href="/Admin/Push/update?id=<?php echo ($item['id']); ?>">修改推送</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</div>


</body>
</html>

<script>
    $(".delete").click(function () {
        var id = $(this).attr("data-id")
        $.post("/Admin/Push/doDelete", {
            id:id
        }, function (result) {
            console.log(result)
            alert(result.message)
            if (result.status == 1) {
                window.location.reload()
            }
        }, "json")
    })
</script>