<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>医院管理-医院编辑</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-addedit-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_addedit.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Sys/Hospital/css_edit.css">
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


<!--编辑容器-->
<form id="add_container">
    <!--编辑容器中的标题-->
    <div class="add_title">医院编辑</div>

    <!--编辑容器中的输入容器-->
    <div class="input_container disable">
        <span class="input_label">医院代码</span>
        <div class="input_content">
            <input class="hos_code disable" type="text" value="<?php echo ($hospital_row["hos_code"]); ?>" disabled>
        </div>
    </div>
    <div class="error error_hos_code"></div>

    <!--编辑容器中的输入容器-->
    <div class="input_container disable">
        <span class="input_label">医院名称</span>
        <div class="input_content">
            <input class="hos_name disable" type="text" value="<?php echo ($hospital_row["hos_name"]); ?>" disabled>
        </div>
    </div>
    <div class="error error_hos_name"></div>

    <!--编辑容器中的输入容器-->
    <div class="input_container">
        <span class="input_label">行政区划</span>
        <div class="input_content">
            <select class="cant_code" required>
                <option value="null">请选择行政区划</option>
                <?php if(is_array($cant_table)): $i = 0; $__LIST__ = $cant_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cant_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($cant_row["cant_code"]); ?>
                    <?php if($hospital_row['cant_code'] == $cant_row['cant_code']): ?>selected<?php endif; ?>
                    >
                    <?php echo ($cant_row["cant_name"]); ?>
                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="error error_cant_code"></div>

    <!--编辑容器中的输入容器-->
    <div class="input_container">
        <span class="input_label">医院级别</span>
        <div class="input_content">
            <select class="hoslevel_code" required>
                <option value="null">请选择医院级别</option>
                <?php if(is_array($hos_level_table)): $i = 0; $__LIST__ = $hos_level_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hos_level_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($hos_level_row["hoslevel_code"]); ?>
                    <?php if($hospital_row['hoslevel_code'] == $hos_level_row['hoslevel_code']): ?>selected<?php endif; ?>
                    >
                    <?php echo ($hos_level_row["hoslevel_name"]); ?>
                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="error error_hoslevel_code"></div>

    <!--编辑容器中的按钮容器-->
    <div class="btn-container">
        <button class="btn-reset" type="reset"><img src="/HOS/Public/images/reset.png"><span>重置</span></button>
        <button class="btn-submit" type="button"><img src="/HOS/Public/images/submit-write.png"><span>提交</span></button>
    </div>

</form>




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
    //编辑提交按钮需要ajax请求的地址
    var submitUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/edit";
    //医院管理-医院展示的页面地址
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/lst";
</script>
<script src="/HOS/Public/libs/js/Sys/Hospital/js_edit.js"></script>

</html>