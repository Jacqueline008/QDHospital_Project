<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>专家管理-专家展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Hos/Doctor/css_lst.css">
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
    <!--部分1：搜索栏部分 begin-->
    <form class="ic-search-m" method="get" action="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst" target="_self" onsubmit="formSubmitMobile()">
        <!--下面的input name="doc_info"(当该input输入值时才提交到表单)-->
        <input class="search-item-m doc-info-m" type="text" placeholder="请输入医院代码/名称">
        <select class="search-item-m dep-code-m" name="dep_code">
            <option value="null">请选择科室名称</option>
            <?php if(is_array($department_table)): $i = 0; $__LIST__ = $department_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($department_row["dep_code"]); ?>><?php echo ($department_row["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <select class="search-item-m doclevel-code-m" name="doclevel_code">
            <option value="null">请选择专家级别</option>
            <?php if(is_array($doc_level_table)): $i = 0; $__LIST__ = $doc_level_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doc_level_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($doc_level_row["doclevel_code"]); ?>><?php echo ($doc_level_row["doclevel_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <div class="btn-container-m">
            <a class="btn-add-m" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/add"><img src="/HOS/Public/images/add.png"><span>添加</span></a>
            <button class="btn-search-m" type="submit"><img src="/HOS/Public/images/search.png"><span>搜索</span></button>
        </div>
    </form>
    <!--部分1：搜索栏部分 end-->

    <!--部分2：列表部分 begin-->
    <div class="list-container-m">
        <?php if(is_array($doctor_table)): $i = 0; $__LIST__ = $doctor_table;if( count($__LIST__)==0 ) : echo "$empty2" ;else: foreach($__LIST__ as $key=>$doctor_row): $mod = ($i % 2 );++$i;?><div class="list-item-m">
                <span class="doc_name-m"><?php echo ($doctor_row["doc_name"]); ?></span>
                <div class="doc_tel-m"><?php echo ($doctor_row["doc_tel"]); ?></div>
                <span class="doc_code-m"><?php echo ($doctor_row["doc_code"]); ?></span>
                <div class="dep_name-m"><span><?php echo ($doctor_row["dep_name"]); ?></span></div>
                <div class="doclevel_name-m"><span><?php echo ($doctor_row["doclevel_name"]); ?></span></div>
                <select class="btn-container-m">
                    <option>操作</option>
                    <option class="btn-edit-m" name="<?php echo ($doctor_row["doc_code"]); ?>">编辑</option>
                    <option class="btn-del-m" name="<?php echo ($doctor_row["doc_code"]); ?>">删除</option>
                </select>
            </div><?php endforeach; endif; else: echo "$empty2" ;endif; ?>
    </div>
    <!--部分2：列表部分 end-->

    <!--部分3：分页部分 begin-->
    <div class="page-list-m"><?php echo ($page2); ?></div>
    <!--部分3：分页部分 end-->

</div>
<!--手机下的内容展示  end-->

<!--*************************************************************************************-->

<!--信息展示容器-->
<div id="info-container">

    <!--容器左侧部分(列表)  begin-->
    <div class="info-list">
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Hosmsg/edit"><img src="/HOS/Public/images/HosmsgController.png"/>医院信息管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Dep/lst"><img src="/HOS/Public/images/DepController.png"/>科室管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst" class="active"><img src="/HOS/Public/images/DoctorController.png"/>专家管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Duty/lst"><img src="/HOS/Public/images/DutyController.png"/>挂号设置管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Blacklist/lst"><img src="/HOS/Public/images/BlacklistController.png"/>黑名单功能</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Hos/Data/lst"><img src="/HOS/Public/images/DataController.png"/>数据报表管理</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--右侧1:搜索栏部分 begin-->
        <form class="ic-search" method="get" action="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/lst" target="_self" onsubmit="formSubmit()">
            <div class="search-item doc-info">
                <span>专家代码/名称</span>
                <!--下面的input name="doc_info"(当该input输入值时才提交到表单)-->
                <input type="text">
            </div>
            <div class="search-item dep-code">
                <span>科室名称</span>
                <select name="dep_code">
                    <option value="null">请选择科室名称</option>
                    <?php if(is_array($department_table)): $i = 0; $__LIST__ = $department_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$department_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($department_row["dep_code"]); ?>><?php echo ($department_row["dep_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="search-item doclevel-code">
                <span>专家级别</span>
                <select name="doclevel_code">
                    <option value="null">请选择专家级别</option>
                    <?php if(is_array($doc_level_table)): $i = 0; $__LIST__ = $doc_level_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doc_level_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($doc_level_row["doclevel_code"]); ?>><?php echo ($doc_level_row["doclevel_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="btn-container">
                <a class="btn-add" href="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/add"><img src="/HOS/Public/images/add.png"><span>添加</span></a>
                <button class="btn-search" type="submit"><img src="/HOS/Public/images/search.png"><span>搜索</span></button>
            </div>
        </form>
        <!--右侧1:搜索栏部分 end-->
        <!--右侧2:列表部分 begin-->
        <div class="list-container">
            <div class="list-head">
                <span class="doc_code">专家代码</span>
                <span class="doc_name">专家名字</span>
                <span class="dep_name">科室名称</span>
                <span class="doclevel_name">专家级别</span>
                <span class="doc_tel">专家手机</span>
                <div class="btn-container"></div>
            </div>
            <?php if(is_array($doctor_table)): $i = 0; $__LIST__ = $doctor_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$doctor_row): $mod = ($i % 2 );++$i;?><div class="list-item">
                    <span class="doc_code"><?php echo ($doctor_row["doc_code"]); ?></span>
                    <span class="doc_name"><?php echo ($doctor_row["doc_name"]); ?></span>
                    <span class="dep_name"><?php echo ($doctor_row["dep_name"]); ?></span>
                    <span class="doclevel_name"><?php echo ($doctor_row["doclevel_name"]); ?></span>
                    <span class="doc_tel"><?php echo ($doctor_row["doc_tel"]); ?></span>
                    <div class="btn-container">
                        <div class="btn-del" name="<?php echo ($doctor_row["doc_code"]); ?>"><img src="/HOS/Public/images/del-orange.png"><span>删除</span></div>
                        <div class="btn-edit" name="<?php echo ($doctor_row["doc_code"]); ?>"><img src="/HOS/Public/images/edit-blue.png"><span>编辑</span></div>
                    </div>
                </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>

        </div>
        <!--右侧2:列表部分 end-->
        <!--右侧3:分页部分 begin-->
        <div class="page-list"><?php echo ($page); ?></div>
        <!--右侧3:分页部分 end-->
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
    //专家管理-编辑页面的地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/edit/";
    //专家管理-删除页面的地址
    var delUrl="http://<?php echo C('IP_URL');?>/HOS/Hos/Doctor/del/";
</script>
<script src="/HOS/Public/libs/js/Hos/Doctor/js_lst.js"></script>

</html>