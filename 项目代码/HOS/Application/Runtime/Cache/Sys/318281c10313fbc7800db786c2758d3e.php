<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>登录</title>
    <!--css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--css-pageadmin-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_pageadmin.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Sys/Adminlogin/css_login.css">
</head>
<body>

<!--网站上方固定不动的标头-->
<header id="site-nav">
    <div class="sn-container">
        <!--网站logo-->
        <a href="#" class="sn-logo"><img src="/HOS/Public/images/logo.png"></a>
    </div>
</header>

<!--登录容器-->
<div id="login_container">
    <!--登录容器左侧内容-->
    <div class="left"></div>
    <!--登录容器右侧内容-->
    <div class="right">
        <h2>账户登录</h2>
        <div class="error error_return"></div>

        <div class="input_container">
            <span class="input_label">用户名</span>
            <div class="input_content">
                <input class="name" type="text" placeholder="请输入您的用户名" required>
            </div>
        </div>
        <div class="error error_name"></div>

        <div class="input_container">
            <span class="input_label">密码</span>
            <div class="input_content">
                <input class="pwd" type="password" placeholder="请输入您的密码" required>
            </div>
        </div>
        <div class="error error_pwd"></div>

        <input class="submit" type="submit" value="登录">
    </div>
</div>

<!--模态框-->
<div class="modal" id="mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">来自预约平台的提示:</h4>
            </div>
            <div class="modal-body">
                模态弹出窗主体内容
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--页尾-->
<footer id="footer">
    <div class="container">
        <img src="/HOS/Public/images/footer.png">
        <span>作者:青岛大学2014级开源方向-李艺鸣</span>
    </div>
</footer>


<!--<div id="bg_test" style="height: 100px;width: 100%;"></div>-->

</body>
<!--js-jquery-->
<script src="/HOS/Public/libs/js/jquery-2.2.4.min.js"></script>
<!--js-bootstrap-->
<script src="/HOS/Public/libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!--js-pageadmin-->
<script src="/HOS/Public/libs/js/Home/js_pageadmin.js"></script>
<!--js-this-->
<script>
    //登录按钮需要ajax请求的地址
    var submitUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Adminlogin/login";
    //网站首页（医院展示）的地址
    var HomeUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/hospitalShow";
</script>
<script src="/HOS/Public/libs/js/Sys/Adminlogin/js_login.js"></script>
</html>