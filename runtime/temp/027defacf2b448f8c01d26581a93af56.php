<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"C:\wamp\www\dingdang\public/../application/admin\view\login\index.html";i:1510888854;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>登录</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--link href="__STATIC__/admin/uploadify/uploadify.css" rel="stylesheet"-->
</head>
<body>

<div class="container ">
    <form id="submitForm" method="post" enctype="multipart/form-data" class="form-signin form-horizontal">
        <div class="form-group">
            <div class="col-sm-4"><h2>登录</h2></div>
        </div>
        <div class="form-group">
            <label for="telephone" class="col-sm-2 control-label">电话:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="请填写用户名">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">密码:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password" placeholder="请填写密码">
            </div>
        </div>

        <br />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button id="submitButton" class="btn btn-primary" type="button">登录</button>
            </div>
        </div>
    </form>
</div>
<script>
    var URL = {
        'submit_url' : "__URL__admin/Login/check",
        'success_url' : "__URL__admin/index/index"
    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="__STATIC__/admin/js/common.js"></script>
<script src="__STATIC__/layer/dialog/layer.js"></script>
<script src="__STATIC__/layer/dialog.js"></script>

</body>
</html>
