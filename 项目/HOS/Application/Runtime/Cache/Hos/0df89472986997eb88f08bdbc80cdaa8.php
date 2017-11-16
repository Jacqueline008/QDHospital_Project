<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>医院信息管理-医院信息编辑</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-addedit-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_addedit.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Hos/Hosmsg/css_edit.css">
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



<!--平板以及手机下的列表  begin-->
<div class="info-list-mobile">
    <a href="#"><img src="/HOS/Public/images/HosmsgController.png"/><span>医院信息</span></a>
    <a href="#"><img src="/HOS/Public/images/DepController.png"/><span>科室管理</span></a>
    <a href="#"><img src="/HOS/Public/images/DoctorController.png"/><span>专家管理</span></a>
    <a href="#"><img src="/HOS/Public/images/DutyController.png"/><span>挂号设置</span></a>
    <a href="#"><img src="/HOS/Public/images/BlacklistController.png"/><span>黑名单</span></a>
    <a href="#" class=".last"><img src="/HOS/Public/images/DataController.png"/><span>数据报表</span></a>
</div>
<!--平板以及手机下的列表  end-->


<!--*************************************************************************************-->

<!--信息展示容器-->
<div id="info-container">

    <!--容器左侧部分(列表)  begin-->
    <div class="info-list">
        <a href="#" class="active"><img src="/HOS/Public/images/HosmsgController.png"/>医院信息管理</a>
        <a href="#"><img src="/HOS/Public/images/DepController.png"/>科室管理</a>
        <a href="#"><img src="/HOS/Public/images/DoctorController.png"/>专家管理</a>
        <a href="#"><img src="/HOS/Public/images/DutyController.png"/>挂号设置管理</a>
        <a href="#"><img src="/HOS/Public/images/BlacklistController.png"/>黑名单功能</a>
        <a href="#"><img src="/HOS/Public/images/DataController.png"/>数据报表管理</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--编辑容器-->
        <form id="add_container" enctype="multipart/form-data"
              method="post" action="http://<?php echo C('IP_URL');?>/HOS/Hos/Hosmsg/edit" target="_self"
              onSubmit="return validate();">
            <!--编辑容器中的标题-->
            <div class="add_title">医院编辑</div>

            <!--编辑容器中的输入容器-->
            <div class="input_container disable">
                <span class="input_label">医院名称</span>
                <div class="input_content">
                    <input class="hos_name disable" type="text" value="<?php echo ($hospital_row["hos_name"]); ?>" disabled>
                </div>
            </div>
            <div class="error"></div>

            <!--混合信息容器-->
            <div class="input_container mix_container">
                <img class="pic" src="<?php echo ($hospital_row["pic"]); ?>">
                <div class="hos_code"><div class="null"></div><div class="content">医院代码:<?php echo ($hospital_row["hos_code"]); ?></div></div>
                <div class="upload"><div class="null"></div><div class="content">上传图片<input name="pic" type="file"></div></div>
            </div>
            <div class="error"></div>

            <!--编辑容器中的输入容器-->
            <div class="input_container">
                <span class="input_label">医院电话</span>
                <div class="input_content">
                    <input name="tel" class="tel" type="text" placeholder="未编辑医院联系电话" value="<?php echo ($hospital_row["tel"]); ?>" required>
                </div>
            </div>
            <div class="error error_tel"></div>

            <!--编辑容器中的输入容器-->
            <div class="input_container texterea_container">
                <span class="input_label">医院地址</span>
                <div class="input_content">
                    <textarea name="addr" class="addr" placeholder="未编辑医院地址(100个字内)" required maxlength="100"><?php echo ($hospital_row["addr"]); ?></textarea>
                </div>
            </div>
            <div class="error error_addr"></div>

            <!--编辑容器中的输入容器-->
            <div class="input_container texterea_container">
                <span class="input_label">医院简介</span>
                <div class="input_content">
                    <textarea name="msg" class="msg" placeholder="未编辑医院简介(500个字内)" required maxlength="500"><?php echo ($hospital_row["msg"]); ?></textarea>
                </div>
            </div>
            <div class="error error_msg"></div>


            <!--编辑容器中的按钮容器-->
            <div class="btn-container">
                <button class="btn-reset" type="reset"><img src="/HOS/Public/images/reset.png"><span>重置</span></button>
                <button class="btn-submit" type="sumbit"><img src="/HOS/Public/images/submit-write.png"><span>提交</span></button>
            </div>

        </form>
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


<div id="bg_test" style="height: 100px;width: 100%;"></div>

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
    //医院管理-编辑页面的地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/edit/";
    //医院管理-删除页面的地址
    var delUrl="http://<?php echo C('IP_URL');?>/HOS/Sys/Hospital/del/";
</script>
<script src="/HOS/Public/libs/js/Hos/Hosmsg/js_edit.js"></script>

</html>