<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>系统设置-字典展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Sys/Set/css_lst.css">
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
    <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/lst"><img src="/HOS/Public/images/sys-hospital.png"/><span>医院管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Hosadmin/lst" class="middle"><img src="/HOS/Public/images/sys-admin.png"/><span>医院管理员管理</span></a>
    <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/lst"><img src="/HOS/Public/images/sys-setting.png"/><span>系统设置</span></a>
</div>
<!--平板以及手机下的列表  end-->

<!--手机下的内容展示  begin-->
<div class="info-content-mobile">
    <!--部分1：搜索栏部分 begin-->
    <form class="ic-search-m" method="get" action="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/lst" target="_self">
        <select class="search-item-m dic-item-m" name="dic_item">
            <option value="null">请选择字典名</option>
            <?php if(is_array($dictionary_table)): $i = 0; $__LIST__ = $dictionary_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dictionary_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($dictionary_row["dic_item"]); ?>><?php echo ($dictionary_row["dic_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <div class="btn-container-m">
            <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/add" class="btn-add-m"><img src="/HOS/Public/images/add.png"><span>添加</span></a>
            <button class="btn-search-m" type="submit"><img src="/HOS/Public/images/search.png"><span>搜索</span></button>
        </div>
    </form>
    <!--部分1：搜索栏部分 end-->

    <!--部分2：列表部分 begin-->
    <div class="list-container-m">
        <?php if(is_array($dictionary_Stable)): $i = 0; $__LIST__ = $dictionary_Stable;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$dictionary_row): $mod = ($i % 2 );++$i;?><div class="list-item-m">
                <div class="dic_item-m" name="<?php echo ($dictionary_row["dic_item"]); ?>"><span>字典项</span><?php echo ($dictionary_row["dic_item"]); ?></div>
                <div class="dic_name-m"><span>字典名</span><?php echo ($dictionary_row["dic_name"]); ?></div>
                <div class="dic_code-m" name="<?php echo ($dictionary_row["dic_code"]); ?>"><span>字典代码</span><?php echo ($dictionary_row["dic_code"]); ?></div>
                <div class="dic_value-m"><span>字典值</span><?php echo ($dictionary_row["dic_value"]); ?></div>

                <select class="btn-container-m">
                    <option class="btn-edit-m">编辑</option>
                    <option class="btn-del-m">删除</option>
                </select>
            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
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
        <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/lst"><img src="/HOS/Public/images/sys-hospital.png"/>医院管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Hosadmin/lst"><img src="/HOS/Public/images/sys-admin.png"/>医院管理员管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/lst" class="active"><img src="/HOS/Public/images/sys-setting.png"/>系统设置</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--右侧1:搜索栏部分 begin-->
        <form class="ic-search" method="get" action="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/lst" target="_self">
            <div class="search-item dic-item">
                <span>字典名</span>
                <select name="dic_item">
                    <option value="null">请选择字典名</option>
                    <?php if(is_array($dictionary_table)): $i = 0; $__LIST__ = $dictionary_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dictionary_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($dictionary_row["dic_item"]); ?>><?php echo ($dictionary_row["dic_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="btn-container">
                <a class="btn-add" href="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/add"><img src="/HOS/Public/images/add.png"><span>添加</span></a>
                <button class="btn-search" type="submit"><img src="/HOS/Public/images/search.png"><span>搜索</span></button>
            </div>
        </form>
        <!--右侧1:搜索栏部分 begin-->
        <!--右侧2:列表部分 begin-->
        <div class="list-container">
            <div class="list-head">
                <span class="dic_item">字典项</span>
                <span class="dic_name">字典名</span>
                <span class="dic_code">字典代码</span>
                <span class="dic_value">字典值</span>
                <div class="btn-container"></div>
            </div>
            <?php if(is_array($dictionary_Stable)): $i = 0; $__LIST__ = $dictionary_Stable;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$dictionary_row): $mod = ($i % 2 );++$i;?><div class="list-item">
                    <span class="dic_item" name="<?php echo ($dictionary_row["dic_item"]); ?>"><?php echo ($dictionary_row["dic_item"]); ?></span>
                    <span class="dic_name"><?php echo ($dictionary_row["dic_name"]); ?></span>
                    <span class="dic_code" name="<?php echo ($dictionary_row["dic_code"]); ?>"><?php echo ($dictionary_row["dic_code"]); ?></span>
                    <span class="dic_value"><?php echo ($dictionary_row["dic_value"]); ?></span>
                    <div class="btn-container">
                        <div class="btn-del"><img src="/HOS/Public/images/del-orange.png"><span>删除</span></div>
                        <div class="btn-edit"><img src="/HOS/Public/images/edit-blue.png"><span>编辑</span></div>
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
    //系统设置-字典编辑页面的地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/edit/";
    //系统设置-删除的地址
    var delUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/del/";
</script>
<script src="/HOS/Public/libs/js/Sys/Set/js_lst.js"></script>

</html>