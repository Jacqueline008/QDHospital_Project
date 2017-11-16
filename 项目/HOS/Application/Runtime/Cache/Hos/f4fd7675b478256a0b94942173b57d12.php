<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>挂号设置管理-申停记录展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Hos/Duty/css_applyRecordLst.css">
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



<!--平板以及手机下的列表  begin-->
<div class="info-list-mobile">
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Hosmsg/edit"><img src="/HOS/Public/images/HosmsgController.png"/><span>医院信息</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Dep/lst"><img src="/HOS/Public/images/DepController.png"/><span>科室管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst"><img src="/HOS/Public/images/DoctorController.png"/><span>专家管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/lst"><img src="/HOS/Public/images/DutyController.png"/><span>挂号设置</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Blacklist/lst"><img src="/HOS/Public/images/BlacklistController.png"/><span>黑名单</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Data/lst" class=".last"><img src="/HOS/Public/images/DataController.png"/><span>数据报表</span></a>
</div>
<!--平板以及手机下的列表  end-->

<!--手机下的内容展示  begin-->
<div class="info-content-mobile">
    <!--部分1：列表部分 begin-->
    <div class="list-container-m">
        <?php if(is_array($stop_schedule_table)): $i = 0; $__LIST__ = $stop_schedule_table;if( count($__LIST__)==0 ) : echo "$empty2" ;else: foreach($__LIST__ as $key=>$stop_schedule_row): $mod = ($i % 2 );++$i;?><div class="list-item-m">
                <span class="doc_name-m"><?php echo ($stop_schedule_row["doc_name"]); ?></span>
                <span class="week_code-m">
                    <?php switch($stop_schedule_row["week_code"]): case "1": ?>周一<?php break;?>
                        <?php case "2": ?>周二<?php break;?>
                        <?php case "3": ?>周三<?php break;?>
                        <?php case "4": ?>周四<?php break;?>
                        <?php case "5": ?>周五<?php break;?>
                        <?php case "6": ?>周六<?php break;?>
                        <?php case "0": ?>周日<?php break; endswitch;?>
                </span>
                <span class="time_range-m"><?php echo ($stop_schedule_row["time_range"]); ?></span>
                <select class="btn-container-m">
                    <option>操作</option>
                    <option class="btn-edit-m btn-agree-m" name="<?php echo ($stop_schedule_row["stop_code"]); ?>">同意</option>
                    <option class="btn-del-m btn-refuse-m" name="<?php echo ($stop_schedule_row["stop_code"]); ?>">拒绝</option>
                </select>
                <span class="begin_date-m"><span>开始日期：</span><?php echo ($stop_schedule_row["begin_date"]); ?></span>
                <span class="end_date-m"><span>结束日期：</span><?php echo ($stop_schedule_row["begin_date"]); ?></span>
                <span class="apply_date-m"><span>申请时间：</span><?php echo ($stop_schedule_row["apply_date"]); ?></span>
                <span class="apply_reason-m"><span>申请原因：</span><?php echo ($stop_schedule_row["apply_reason"]); ?></span>
            </div><?php endforeach; endif; else: echo "$empty2" ;endif; ?>
    </div>
    <!--部分1：列表部分 end-->

    <!--部分2：分页部分 begin-->
    <div class="page-list-m"><?php echo ($page2); ?></div>
    <!--部分2：分页部分 end-->

</div>
<!--手机下的内容展示  end-->

<!--*************************************************************************************-->

<!--信息展示容器-->
<div id="info-container">

    <!--容器左侧部分(列表)  begin-->
    <div class="info-list">
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Hosmsg/edit"><img src="/HOS/Public/images/HosmsgController.png"/>医院信息管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Dep/lst"><img src="/HOS/Public/images/DepController.png"/>科室管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst"><img src="/HOS/Public/images/DoctorController.png"/>专家管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/lst" class="active"><img src="/HOS/Public/images/DutyController.png"/>挂号设置管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Blacklist/lst"><img src="/HOS/Public/images/BlacklistController.png"/>黑名单功能</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Data/lst"><img src="/HOS/Public/images/DataController.png"/>数据报表管理</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--右侧1:列表部分 begin-->
        <div class="list-container">
            <div class="list-head">
                <span class="doc_name">专家名字</span>
                <span class="week_code">时间</span>
                <span class="time_range">范围</span>
                <span class="begin_date">开始日期</span>
                <span class="end_date">结束日期</span>
                <span class="apply_reason">申停原因</span>
                <span class="apply_date">申请时间</span>
                <div class="btn-container"></div>
            </div>
            <?php if(is_array($stop_schedule_table)): $i = 0; $__LIST__ = $stop_schedule_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$stop_schedule_row): $mod = ($i % 2 );++$i;?><div class="list-item">
                    <span class="doc_name"><?php echo ($stop_schedule_row["doc_name"]); ?></span>
                    <span class="week_code">
                        <?php switch($stop_schedule_row["week_code"]): case "1": ?>周一<?php break;?>
                            <?php case "2": ?>周二<?php break;?>
                            <?php case "3": ?>周三<?php break;?>
                            <?php case "4": ?>周四<?php break;?>
                            <?php case "5": ?>周五<?php break;?>
                            <?php case "6": ?>周六<?php break;?>
                            <?php case "0": ?>周日<?php break; endswitch;?>
                    </span>
                    <span class="time_range"><?php echo ($stop_schedule_row["time_range"]); ?></span>
                    <span class="begin_date"><?php echo ($stop_schedule_row["begin_date"]); ?></span>
                    <span class="end_date"><?php echo ($stop_schedule_row["end_date"]); ?></span>
                    <span class="apply_reason"><?php echo ($stop_schedule_row["apply_reason"]); ?></span>
                    <span class="apply_date"><?php echo ($stop_schedule_row["apply_date"]); ?></span>
                    <div class="btn-container">
                        <div class="btn-del btn-refuse" name="<?php echo ($stop_schedule_row["stop_code"]); ?>"><img src="/HOS/Public/images/refuse.png"><span>拒绝</span></div>
                        <div class="btn-edit btn-agree" name="<?php echo ($stop_schedule_row["stop_code"]); ?>"><img src="/HOS/Public/images/agree.png"><span>同意</span></div>
                    </div>
                </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </div>
        <!--右侧1:列表部分 end-->
        <!--右侧2:分页部分 begin-->
        <div class="page-list"><?php echo ($page); ?></div>
        <!--右侧2:分页部分 end-->
    </div>
    <!--容器右侧部分（内容展示） end-->

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
    //同意/拒绝逻辑地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/applyRecordEdit";
    //本页面
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/applyRecordLst";
</script>
<script src="/HOS/Public/libs/js/Hos/Duty/js_applyRecordLst.js"></script>

</html>