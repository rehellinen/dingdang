<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"C:\wamp\www\dingdang\public/../application/admin\view\index\index.html";i:1510404497;s:72:"C:\wamp\www\dingdang\public/../application/admin\view\public\header.html";i:1510456974;s:69:"C:\wamp\www\dingdang\public/../application/admin\view\public\nav.html";i:1512123514;s:72:"C:\wamp\www\dingdang\public/../application/admin\view\public\footer.html";i:1510456924;}*/ ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>rehellinen后台管理</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="__STATIC__/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="__STATIC__/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="__STATIC__/admin/assets/css/style.css" rel="stylesheet" />
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="__STATIC__/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="__STATIC__/uploadify/uploadify.css">
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- HEADER END-->
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a class="<?php echo $controller=='Index'?'menu-top-active' : ''; ?>" href="__URL__admin/index/index">首页</a></li>
                        <li><a class="<?php echo $controller=='Banner'?'menu-top-active' : ''; ?>" href="__URL__admin/banner/index">轮播图管理</a></li>
                        <li><a class="<?php echo $controller=='User'?'menu-top-active' : ''; ?>" href="__URL__admin/user/index">用户管理</a></li>
                        <li><a class="<?php echo $controller=='Lecture'?'menu-top-active' : ''; ?>" href="__URL__admin/lecture/index">讲座管理</a></li>
                        <li><a class="<?php echo $controller=='Place'?'menu-top-active' : ''; ?>" href="__URL__admin/place/index">地点管理</a></li>
                        <li><a class="<?php echo $controller=='AttendanceException'?'menu-top-active' : ''; ?>" href="__URL__admin/attendance/index">签到管理</a></li>
                        <li><a class="<?php echo $controller=='Enroll'?'menu-top-active' : ''; ?>" href="__URL__admin/enroll/index">报名管理</a></li>
                        <li><a  href="__URL__admin/login/logout">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">首页</h4>
                </div>
            </div>

            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-user dashboard-div-icon" ></i>
                        <p><?php echo $userCount; ?></p>
                        <h5>用户数量</h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <p><?php echo $lectureCount; ?></p>
                        <h5>讲座数量</h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <p><?php echo $placeCount; ?></p>
                        <h5>地点数量</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-bell-o dashboard-div-icon" ></i>
                        <p><?php echo $enrollCount; ?></p>
                        <h5>报名数量</h5>
                    </div>
                </div>

            </div>
           

        </div>
    </div>
<!-- CONTENT-WRAPPER SECTION END-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                2017 &copy; copyright |  rehellinen
            </div>

        </div>
    </div>
</footer>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
<!--<script src="__STATIC__/admin/assets/js/jquery-1.11.1.js"></script>-->
<!-- BOOTSTRAP SCRIPTS  -->
<script src="__STATIC__/admin/assets/js/bootstrap.js"></script>
<script src="__STATIC__/admin/js/common.js"></script>
<script src="__STATIC__/layer/dialog/layer.js"></script>
<script src="__STATIC__/layer/dialog.js"></script>

</body>
</html>
