<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>坐诊时间管理-申停表单</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--css-datepicker-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap-datepicker3.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-addedit-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_addedit.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Doc/Dutytime/css_applyForm.css">
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


<!--*************************************************************************************-->

<!--信息展示容器-->
<div id="info-container">

    <!--容器左侧部分(列表)  begin-->
    <div class="info-list">
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyForm" class="active"><img src="/HOS/Public/images/dutytime.png"/>坐诊时间管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Msg/edit"><img src="/HOS/Public/images/dutymsg.png"/>挂号信息管理</a>
        <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Doc/edit"><img src="/HOS/Public/images/me.png"/>个人管理</a>
    </div>
    <!--容器左侧部分(列表)  end-->

    <!--容器右侧部分（内容展示） begin-->
    <div class="info-content">
        <!--编辑容器-->
        <form id="add_container">
            <!--编辑容器中的标题-->
            <div class="add_title">申请停诊表单</div>

            <!--编辑容器中的输入容器-->
            <div class="input_container disable">
                <span class="input_label">专家代码</span>
                <div class="input_content">
                    <input class="doc_code disable" type="text" value="<?php echo ($doc_code); ?>" disabled>
                </div>
            </div>
            <div class="error"></div>

            <!--编辑容器中的输入容器-->
            <div class="input_container">
                <span class="input_label">停诊时间</span>
                <div class="input_content">
                    <select class="week_code" required>
                        <option value="null">请选择停诊时间</option>
                        <option value="1">星期一</option>
                        <option value="2">星期二</option>
                        <option value="3">星期三</option>
                        <option value="4">星期四</option>
                        <option value="5">星期五</option>
                        <option value="6">星期六</option>
                        <option value="0">星期日</option>
                    </select>
                </div>
            </div>
            <div class="error error_week_code"></div>


            <!--编辑容器中的输入容器-->
            <div class="input_container">
                <span class="input_label">时间范围</span>
                <div class="input_content">
                    <select class="time_range" required>
                        <option value="null">请选择时间范围</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                    </select>
                </div>
            </div>
            <div class="error error_time_range"></div>


            <!--编辑容器中的输入容器-->
            <div class="input_container">
                <span class="input_label">开始日期</span>
                <div class="input_content">
                    <input class="begin_date" data-provide="datepicker" placeholder="请选择开始日期" required>
                </div>
            </div>
            <div class="error error_begin_date"></div>

            <!--编辑容器中的输入容器-->
            <div class="input_container">
                <span class="input_label">结束日期</span>
                <div class="input_content">
                    <input class="end_date" data-provide="datepicker" placeholder="请选择开始日期" required>
                </div>
            </div>
            <div class="error error_end_date"></div>


            <!--编辑容器中的输入容器-->
            <div class="input_container texterea_container">
                <span class="input_label">申请原因</span>
                <div class="input_content">
                    <textarea class="apply_reason" placeholder="请填写申停原因(50个字内)" required maxlength="50"></textarea>
                </div>
            </div>
            <div class="error error_apply_reason"></div>


            <!--编辑容器中的按钮容器-->
            <div class="btn-container">
                <button class="btn-reset" type="reset"><img src="/HOS/Public/images/reset.png"><span>重置</span></button>
                <button class="btn-submit" type="button"><img src="/HOS/Public/images/submit-grey.png"><span>提交</span></button>
                <a href="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyRecordLst" class="btn-view" type="button"><span>查看申停记录</span></a>
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


<!--<div id="bg_test" style="height: 100px;width: 100%;"></div>-->

</body>
<!--(必需)js-jquery-->
<script src="/HOS/Public/libs/js/jquery-2.2.4.min.js"></script>
<!--(必需)js-bootstrap-->
<script src="/HOS/Public/libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!--js-datepicker-->
<script src="/HOS/Public/libs/bootstrap-3.3.5-dist/js/bootstrap-datepicker.js"></script>
<!--js-datepicker-language-->
<script src="/HOS/Public/libs/bootstrap-3.3.5-dist/js/locales/bootstrap-datepicker.zh-CN.min.js"></script>
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
    //申停表单逻辑的地址
    var submitUrl="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyForm";
    //申请成功后的跳转地址
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Doc/Dutytime/applyRecordLst";
</script>
<script src="/HOS/Public/libs/js/Doc/Dutytime/js_applyForm.js"></script>

</html>