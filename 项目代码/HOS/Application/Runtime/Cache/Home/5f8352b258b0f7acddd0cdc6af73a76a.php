<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>医院管理-医院展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/Common/css_hospital.css">
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
            <a href="#" class="sn-home sn-hover">首页</a>
            <a href="#" class="sn-login sn-hover">登录</a>
            <a href="#" class="sn-sys sn-hover"></a>
            <a href="#" class="sn-hos sn-hover"></a>
            <a href="#" class="sn-doc sn-hover"></a>
            <a href="#" class="sn-pat sn-hover"></a>
            <a href="#" class="sn-logout sn-hover">退出</a>
        </div>
    </div>
</header>


<!--轮播组件-->
<div class="carousel slide" data-ride="carousel" id="mycarousel">
    <!--小点点-->
    <ol class="carousel-indicators">
    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mycarousel" data-slide-to="1"></li>
    </ol>
    <!--播放内容-->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="/HOS/Public/images/slider1.jpg">
        </div>

        <div class="item">
            <img src="/HOS/Public/images/slider2.jpg">
        </div>
    </div>
    <!--左右箭头-->
    <a href="#mycarousel" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#mycarousel" class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Previous</span>
    </a>
</div>


<!--内容展示 begin-->
<div class="info-content">
    <!--部分1:搜索栏部分 begin-->
    <form class="ic-search" method="get" action="http://<?php echo C('IP_URL');?>/HOS/Home/Common/hospital" target="_self" onsubmit="formSubmit()">
        <div class="search-item hos-name">
            <span>医院名称</span>
            <!--下面的input name="hos_name"(当该input输入值时才提交到表单)-->
            <input type="text" placeholder="请输入医院名称">
        </div>
        <div class="search-item cant-code">
            <span>行政区划</span>
            <select name="cant_code">
                <option value="null">请选择行政区划</option>
                <?php if(is_array($cant_table)): $i = 0; $__LIST__ = $cant_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cant_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($cant_row["cant_code"]); ?>><?php echo ($cant_row["cant_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="search-item hoslevel-code">
            <span>医院级别</span>
            <select name="hoslevel_code">
                <option value="null">请选择医院级别</option>
                <?php if(is_array($hos_level_table)): $i = 0; $__LIST__ = $hos_level_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hos_level_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($hos_level_row["hoslevel_code"]); ?>><?php echo ($hos_level_row["hoslevel_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="btn-container">
            <button class="btn-search" type="submit"><img src="/HOS/Public/images/search.png"><span>搜索</span></button>
        </div>
    </form>
    <!--部分1:搜索栏部分 begin-->
    <!--部分2:列表部分 begin-->
    <div class="list-container">
        <?php if(is_array($hospital_table)): $i = 0; $__LIST__ = $hospital_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$hospital_row): $mod = ($i % 2 );++$i;?><div class="list-item">
                <img src="<?php echo ($hospital_row["pic"]); ?>">
                <div class="mix-container">
                    <span class="hos-name"><?php echo ($hospital_row["hos_name"]); ?></span>
                    <span class="hoslevel-code"><?php echo ($hospital_row["hoslevel_name"]); ?></span>
                    <span class="cant-code"><?php echo ($hospital_row["cant_name"]); ?></span>
                    <span class="msg"><?php echo ($hospital_row["big_msg"]); ?>...</span>
                </div>
            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>
    <!--部分2:列表部分 end-->
    <!--部分2:列表部分(移动端) begin-->
    <div class="list-container-m">
        <?php if(is_array($hospital_table)): $i = 0; $__LIST__ = $hospital_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$hospital_row): $mod = ($i % 2 );++$i;?><div class="list-item-m">
                <img src="<?php echo ($hospital_row["pic"]); ?>">
                <div class="mix-container-m">
                    <div class="hos-name-m"><?php echo ($hospital_row["hos_name"]); ?></div>
                    <span class="hoslevel-code-m"><?php echo ($hospital_row["hoslevel_name"]); ?></span>
                    <span class="cant-code-m"><?php echo ($hospital_row["cant_name"]); ?></span>
                    <div class="msg-m"><?php echo ($hospital_row["small_msg"]); ?>...</div>
                </div>
            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>
    <!--部分2:列表部分(移动端) end-->
    <!--部分3:分页部分 begin-->
    <div class="page-list"><?php echo ($page); ?></div>
    <!--部分3:分页部分 end-->
    <!--部分3:分页部分(移动端) begin-->
    <div class="page-list-m"><?php echo ($page2); ?></div>
    <!--部分3:分页部分(移动端) end-->
</div>
<!--内容展示 end-->


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
<script src="/HOS/Public/libs/js/Home/Common/js_hospital.js"></script>

</html>