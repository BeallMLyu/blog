<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评论添加</title>
    <script src="https://cdn.bootcss.com/jquery/1.9.0/jquery.js"></script>
    <style>
        body{
            background: url("/Public/home/home_index_add.jpg") no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            background-color: magenta;
        }
        .article_add{
            width: 500px;
            background: darkcyan
        }
        .detail{
            width:410px;
            height:300px;
            margin: 20px;
        }
        .submit{
            background: blueviolet;
            width: 350px;
            height: 50px;
            margin: 20px;
            text-align: center;
            line-height: 45px;
            font-size: 40px
        }
    </style>
</head>
<body>
<div class="article_add">
    <div>
        <input id="detail" class="detail" name="detail" type="text" placeholder="评论添加">
    </div>
    <select id="select">
        <?php if(is_array($blog)): foreach($blog as $key=>$item): ?><option name="blog_id" value="<?php echo ($item['id']); ?>"><?php echo ($item['title']); ?></option><?php endforeach; endif; ?>
    </select>
    <div id="submit" type="button" class="submit">submit</div>
</div>
<script>
    $("#submit").click(function () {
        var select = $("#select option:selected")
        $.post("/Home/Index/doAdd", {
            detail:$("#detail").val(),
            blog_id:select.val()
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