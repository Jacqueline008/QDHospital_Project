<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>模块管理-模块展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Hos/Module/css_lst.css">
</head>
<body>

<!--(必需)网站上方固定不动的标头-->
<header id="site-nav">
    <div class="sn-container">
        <!--网站logo-->
        <a href="#" class="sn-logo"><img src="/HOS/Public/images/logo.png"></a>
        <!--展示下拉菜单的图标-->
        <a href="#" class="sn-showmenu"><img src="/HOS/Public/images/menu1.png"></a>
        <!--快速导航菜单-->
        <div class="sn-quick-menu">
            <a href="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/hospitalShow" class="sn-home sn-hover">首页</a>
            <a href="http://<?php echo C('IP_URL');?>/HOS/Pat/Login/login" class="sn-login sn-hover">登录</a>
            <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/lst" class="sn-sys sn-hover"></a>
            <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Module/lst" class="sn-hos sn-hover"></a>
            <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyForm" class="sn-doc sn-hover"></a>
            <a href="http://<?php echo C('IP_URL');?>/HOS/Pat/Select/lst" class="sn-pat sn-hover"></a>
            <a href="#" class="sn-logout sn-hover">退出</a>
        </div>
    </div>
</header>


<!--模块展示容器-->
<div id="module_container">
    <!--模块项-->
    <a class="item-contaner first" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Hosmsg/edit">
        <div class="item-content">
            <img src="/HOS/Public/images/HosmsgController.png">
            <span class="item-title">医院信息管理</span>
            <span class="item-msg">快速完善管辖医院信息</span>
        </div>
    </a>
    <!--模块项-->
    <a class="item-contaner middle" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Dep/lst">
        <div class="item-content">
            <img src="/HOS/Public/images/DepController.png">
            <span class="item-title">科室管理</span>
            <span class="item-msg">科室快速管理模块</span>
        </div>
    </a>
    <!--模块项-->
    <a class="item-contaner" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst">
        <div class="item-content">
            <img src="/HOS/Public/images/DoctorController.png">
            <span class="item-title">专家管理</span>
            <span class="item-msg">专家快速管理模块</span>
        </div>
    </a>
    <!--模块项-->
    <a class="item-contaner" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/lst">
        <div class="item-content">
            <img src="/HOS/Public/images/DutyController.png">
            <span class="item-title">挂号设置管理</span>
            <span class="item-msg">专家坐诊管理模块</span>
        </div>
    </a>
    <!--模块项-->
    <a class="item-contaner middle" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Blacklist/lst">
        <div class="item-content">
            <img src="/HOS/Public/images/BlacklistController.png">
            <span class="item-title">黑名单功能</span>
            <span class="item-msg">违约患者管理模块</span>
        </div>
    </a>
    <!--模块项-->
    <a class="item-contaner" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Data/lst">
        <div class="item-content">
            <img src="/HOS/Public/images/DataController.png">
            <span class="item-title">数据报表管理</span>
            <span class="item-msg">挂号情况一目了然</span>
        </div>
    </a>
</div>




<!--(必需)模态框-->
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

<!--(必需)页尾-->
<footer id="footer">
    <div class="container">
        <img src="/HOS/Public/images/footer.png">
        <span>作者:青岛大学2014级开源方向-李艺鸣</span>
    </div>
</footer>


<!--<div id="bg_test" style="height: 100px;width: 100%;"></div>-->

</body>
<!--(必需)js-jquery-->
<script src="/HOS/Public/libs/js/jquery-2.2.4.min.js"></script>
<!--(必需)js-bootstrap-->
<script src="/HOS/Public/libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!--******(必需)js-page begin******-->
<script>
    //标头需要ajax请求的地址
    var headerRequestUrl="http://<?php echo C('IP_URL');?>/HOS/Home/Header/showHeaderJSON";
    //标头中退出按钮中确定按钮请求的地址
    var logoutRequestUrl="http://<?php echo C('IP_URL');?>/HOS/Home/Header/logout";
    //网站首页（医院展示）的地址
    var HomeUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/hospitalShow";
</script>
<script src="/HOS/Public/libs/js/Home/js_page.js"></script>
<!--******(必需)js-page end******-->


</html>