<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>预约挂号-科室展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Pat/Treatment/css_departmentShow.css">
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

<!--医院信息展示容器-->
<div id="hosinfo-container">
    <div class="hosinfo-up">
        <span class="hos_name"><?php echo ($hospital_row["hos_name"]); ?></span>
        <span class="hoslevel_name"><?php echo ($hospital_row["hoslevel_name"]); ?></span>
        <span class="cant_name">市南区</span>
    </div>
    <div class="hosinfo-down">
        <img src="<?php echo ($hospital_row["pic"]); ?>">
        <div class="mix-container">
            <div class="tel">电话：<?php echo ($hospital_row["tel"]); ?></div>
            <div class="addr">地址：<?php echo ($hospital_row["addr"]); ?></div>
            <div class="msg">简介：<?php echo ($hospital_row["msg"]); ?></div>
        </div>
    </div>
</div>

<!--科室信息展示-->
<div id="depinfo-container">
    <!--每一个科室类别项-->
    <?php if(is_array($result_array)): $i = 0; $__LIST__ = $result_array;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$categoryitem): $mod = ($i % 2 );++$i;?><div class="category-item">
            <div class="category-name"><?php echo (L("$key")); ?></div>
            <div class="mix-container">
                <?php if(is_array($categoryitem)): $i = 0; $__LIST__ = $categoryitem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a name1="<?php echo ($vo["dep_code"]); ?>" name2="<?php echo ($hospital_row["hos_code"]); ?>"><?php echo ($vo["dep_name"]); ?></a><?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
<!--js-this-->
<script>
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/dutyShow";
</script>
<script src="/HOS/Public/libs/js/Pat/Treatment/js_departmentShow.js"></script>

</html>