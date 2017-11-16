<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>挂号信息管理-编辑</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Doc/Msg/css_edit.css">
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
    <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyForm"><img src="/HOS/Public/images/dutytime.png"/><span>坐诊时间管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Msg/edit" class="middle"><img src="/HOS/Public/images/dutymsg.png"/><span>挂号信息管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Doc/edit"><img src="/HOS/Public/images/me.png"/><span>个人管理</span></a>
</div>
<!--平板以及手机下的列表  end-->

<!--手机下的内容展示  begin-->
<div class="info-content-mobile">
    <!--部分1：列表部分 begin-->
    <div class="list-container-m">
        <?php if(is_array($treatment_table)): $i = 0; $__LIST__ = $treatment_table;if( count($__LIST__)==0 ) : echo "$empty2" ;else: foreach($__LIST__ as $key=>$treatment_row): $mod = ($i % 2 );++$i;?><div class="list-item-m">
                <span class="p_name-m"><span class="span">就诊人：</span><?php echo ($treatment_row["p_name"]); ?></span>
                <span class="t_status-m">
                    <span class="span">就诊状态：</span>
                    <?php switch($treatment_row["t_status"]): case "1": ?><span class="wait-m">已预订</span><?php break;?>
                            <?php case "2": ?><span class="yes-m">已就诊</span><?php break;?>
                            <?php case "3": ?><span class="no-m">未就诊</span><?php break; endswitch;?>
                </span>
                <span class="t_date-m"><?php echo ($treatment_row["t_date"]); ?> <?php echo ($treatment_row["time_content"]); ?></span>
                <?php if($treatment_row["t_status"] == 1): ?><select class="btn-container-m">
                        <option>操作</option>
                        <option class="btn-edit-m" name="<?php echo ($treatment_row["t_code"]); ?>">已就诊</option>
                        <option class="btn-del-m" name="<?php echo ($treatment_row["t_code"]); ?>">未就诊</option>
                    </select><?php endif; ?>
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
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyForm"><img src="/HOS/Public/images/dutytime.png"/>坐诊时间管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Msg/edit" class="active"><img src="/HOS/Public/images/dutymsg.png"/>挂号信息管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Doc/edit"><img src="/HOS/Public/images/me.png"/>个人管理</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--右侧1:列表部分 begin-->
        <div class="list-container">
            <div class="list-head">
                <span class="p_name">就诊人</span>
                <span class="t_date">就诊时间</span>
                <span class="t_status">就诊状态</span>
                <div class="btn-container"></div>
            </div>
            <?php if(is_array($treatment_table)): $i = 0; $__LIST__ = $treatment_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$treatment_row): $mod = ($i % 2 );++$i;?><div class="list-item">
                    <span class="p_name"><?php echo ($treatment_row["p_name"]); ?></span>
                    <span class="t_date"><?php echo ($treatment_row["t_date"]); ?> <?php echo ($treatment_row["time_content"]); ?></span>
                    <span class="t_status">
                        <?php switch($treatment_row["t_status"]): case "1": ?><span class="wait">已预订</span><?php break;?>
                            <?php case "2": ?><span class="yes">已就诊</span><?php break;?>
                            <?php case "3": ?><span class="no">未就诊</span><?php break; endswitch;?>
                    </span>
                    <div class="btn-container">
                        <?php if($treatment_row["t_status"] == 1): ?><div class="btn-del" name="<?php echo ($treatment_row["t_code"]); ?>"><img src="/HOS/Public/images/refuse.png"><span>未就诊</span></div>
                            <div class="btn-edit" name="<?php echo ($treatment_row["t_code"]); ?>"><img src="/HOS/Public/images/agree.png"><span>已就诊</span></div><?php endif; ?>
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
    //已就诊/未就诊处理逻辑的地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Doc/Msg/edit";
    //已就诊/未就诊成功后跳转的地址
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Doc/Msg/edit";
</script>
<script src="/HOS/Public/libs/js/Doc/Msg/js_edit.js"></script>

</html>