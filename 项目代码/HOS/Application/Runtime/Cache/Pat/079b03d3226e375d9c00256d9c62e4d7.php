<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>预约挂号-预约时间选择</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Pat/Treatment/css_treatmentShow.css">
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

<!--详细信息展示容器-->
<div id="info_container">
    <div class="inner-container">
        <div class="title">专家预约</div>
        <img class="doc_pic"src="<?php echo ($duty_schedule_row["doc_pic"]); ?>">
        <div class="doc_name"><?php echo ($duty_schedule_row["doc_name"]); ?></div>
        <div class="hos_name">医院：<?php echo ($duty_schedule_row["hos_name"]); ?></div>
        <div class="dep_name">科室：<?php echo ($duty_schedule_row["dep_name"]); ?></div>

        <div class="t-date-label">就诊时间</div>
        <span class="t_date"><?php echo ($t_date); ?></span>
        <span class="time_range" name="<?php echo ($duty_schedule_row["dut_code"]); ?>"><?php echo ($duty_schedule_row["time_range"]); ?></span>

        <select class="time_code">
            <?php if(is_array($time_schedule_array)): $i = 0; $__LIST__ = $time_schedule_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$time_schedule_item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($time_schedule_item["time_code"]); ?>"><?php echo ($time_schedule_item["time_content"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>

        <div class="p-label">就诊人</div>
        <div class="p_name">姓名：<?php echo ($patient_row["p_name"]); ?></div>
        <div class="p_id">身份证号：<span><?php echo ($patient_row["p_id"]); ?></span></div>
        <div class="p_tel">短信发送至：<?php echo ($patient_row["p_tel"]); ?></div>

        <button class="btn-submit" type="button">立即预约</button>
    </div>
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
    //立即预约按钮请求的逻辑
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/treatmentShowEdit";
    //预约成功后跳转的页面
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Select/lst";
</script>
<script src="/HOS/Public/libs/js/Pat/Treatment/js_treatmentShow.js"></script>
</html>