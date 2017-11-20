<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>系统设置-字典新增</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-addedit-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_addedit.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Sys/Set/css_add.css">
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


<!--新增容器-->
<form id="add_container">
    <!--部分1:新增容器中的标题-->
    <div class="add_title">字典新增</div>
    <!--部分2:字典列表容器-->
    <div class="addlist_container">
        <div class="addlist_row addlist_header">
            <div class="addlist_col dic_item">字典名</div>
            <div class="addlist_col dic_code">字典代码</div>
            <div class="addlist_col dic_value">字典值</div>
            <div class="addlist_col option">操作</div>
        </div>
        <!--要提交的行(第1行 不能删除)-->
        <div class="addlist_row submit_row">
            <div class="addlist_col dic_item">
                <select>
                    <?php if(is_array($dictionary_table)): $i = 0; $__LIST__ = $dictionary_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dictionary_row): $mod = ($i % 2 );++$i;?><option value=<?php echo ($dictionary_row["dic_item"]); ?>>
                            <?php echo ($dictionary_row["dic_name"]); ?>
                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="addlist_col dic_code"><input type="text" placeholder="字典代码(20个字符内)" ></div>
            <div class="addlist_col dic_value"><input type="text" placeholder="字典值(20个字符内)" maxlength="20"></div>
            <div class="addlist_col option"><button class="btn-del" style="display: none"><img src="/HOS/Public/images/del-orange.png"><span>删除该行</span></button></div>
        </div>
    </div>


    <!--部分3:新增容器中的按钮容器-->
    <div class="btn-container">
        <button class="btn-add" type="button"><img src="/HOS/Public/images/add-grey.png"><span>新增一行</span></button>
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
    //用于新增一行按钮请求的地址
    var getDictionaryUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/getDictionary";
    //用于提交按钮请求的地址
    var submitUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/add";
    //新增成功跳转的地址
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Set/lst";
</script>
<script src="/HOS/Public/libs/js/Sys/Set/js_add.js"></script>

</html>