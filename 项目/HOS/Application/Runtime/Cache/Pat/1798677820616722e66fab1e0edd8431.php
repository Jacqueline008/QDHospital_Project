<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>预约挂号-坐诊展示</title>
    <!--(必需)css-bootstrap-->
    <link rel="stylesheet" href="/HOS/Public/libs/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!--(必需)css-page-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_page.css">
    <!--css-lst-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Home/css_lst.css">
    <!--css-this-->
    <link rel="stylesheet" href="/HOS/Public/libs/css/Pat/Treatment/css_dutyShow.css">
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


<div class="dep-container">
    <div class="dep_name"><?php echo ($department_row["dep_name"]); ?></div>
    <div class="doc_name">所属医院：<?php echo ($hos_name); ?></div>
    <div class="dep_description">简介：<?php echo ($department_row["dep_description"]); ?></div>
</div>



<!--手机下的内容展示  begin-->
<div class="info-content-mobile">

    <!--部分1：列表部分 begin-->
    <div class="list-container-m">

        <?php if(is_array($result_array)): $i = 0; $__LIST__ = $result_array;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$result_item): $mod = ($i % 2 );++$i;?><div class="item-m">
                <div class="doc-info-m" name="<?php echo ($result_item["doc_code"]); ?>">
                    <img src="<?php echo ($result_item["doc_pic"]); ?>">
                    <span class="doc_name_m"><?php echo ($result_item["doc_name"]); ?></span>
                    <span class="doclevel_name_m"><?php echo ($result_item["doclevel_name"]); ?></span>
                    <span class="doc_area_m">擅长:<?php echo ($result_item["doc_area"]); ?>...</span>
                </div>
                <div class="duty-container-m">
                    <div class="range">
                        <span>时间</span>
                        <span>上午</span>
                        <span>下午</span>
                    </div>
                    <div class="one">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "$empty" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="1">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="1">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="two">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="2">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="2">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="three">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="3">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="3">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="four">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="4">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="4">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="five">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],8,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="5">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="5">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="six">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],10,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="6">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],11,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="6">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="seven">

                        <?php if(is_array($week_array)): $i = 0; $__LIST__ = array_slice($week_array,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                                <span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;"><?php echo ($week_item["date"]); ?></span>
                                    <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期一</span><?php break;?>
                                    <?php case "2": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期二</span><?php break;?>
                                    <?php case "3": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期三</span><?php break;?>
                                    <?php case "4": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期四</span><?php break;?>
                                    <?php case "5": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期五</span><?php break;?>
                                    <?php case "6": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期六</span><?php break;?>
                                    <?php case "0": ?><span style="width:100%;font-size: 10px;line-height: 15px;height: 15px;border:none;">星期日</span><?php break; endswitch;?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],12,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="7">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],13,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><span name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="7">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width: 100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width: 100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

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


    <!--容器右侧部分（内容展示） begin-->
    <!--<div class="info-content">-->
        <!--右侧1:列表部分 begin-->
        <div class="list-container">

            <div class="head">
                <div class="doc-info">专家</div>
                <div class="duty-container">
                    <span class="range">时间</span>
                    <?php if(is_array($week_array)): $i = 0; $__LIST__ = $week_array;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$week_item): $mod = ($i % 2 );++$i;?><span>
                            <span style="width:100%;font-size: 10px;line-height: 25px;height: 25px;"><?php echo ($week_item["date"]); ?></span>
                                <?php switch($week_item["day"]): case "1": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期一</span><?php break;?>
                                <?php case "2": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期二</span><?php break;?>
                                <?php case "3": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期三</span><?php break;?>
                                <?php case "4": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期四</span><?php break;?>
                                <?php case "5": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期五</span><?php break;?>
                                <?php case "6": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期六</span><?php break;?>
                                <?php case "0": ?><span style="width:100%;font-size: 12px;line-height: 20px;height: 20px;">星期日</span><?php break; endswitch;?>
                        </span><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </div>
            </div>


            <?php if(is_array($result_array)): $i = 0; $__LIST__ = $result_array;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$result_item): $mod = ($i % 2 );++$i;?><div class="item">
                    <div class="doc-info" name="<?php echo ($result_item["doc_code"]); ?>">
                        <img src="<?php echo ($result_item["doc_pic"]); ?>">
                        <span class="doc_name"><?php echo ($result_item["doc_name"]); ?></span>
                        <span class="doclevel_name"><?php echo ($result_item["doclevel_name"]); ?></span>
                        <span class="doc_area">擅长:<?php echo ($result_item["doc_area"]); ?>...</span>
                    </div>
                    <div class="duty-container">
                    <span class="range">
                        <div class="up">上午</div>
                        <div class="down">下午</div>
                    </span>
                    <span class="one">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="1">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="1">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="two">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="2">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="2">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="three">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="3">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="3">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="four">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="4">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;" class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="4">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="five">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],8,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="5">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>" name2="5">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="six">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],10,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],11,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    <span class="seven">
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],12,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="up" name="<?php echo ($duty_array_item["dut_code"]); ?>">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($result_item["duty"])): $i = 0; $__LIST__ = array_slice($result_item["duty"],13,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$duty_array_item): $mod = ($i % 2 );++$i;?><div class="down" name="<?php echo ($duty_array_item["dut_code"]); ?>">
                                <?php if($duty_array_item["dut_status"] == 0): ?><span style="color:#C31E22;width:100%;border:none;"></span>
                                    <?php else: ?>
                                    <span style="color:#3DAFA7;width:100%;border:none;"class="duty_ready">预约</span><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <!--右侧1:列表部分 end-->
        <!--右侧2:分页部分 begin-->
        <div class="page-list"><?php echo ($page); ?></div>
        <!--右侧2:分页部分 end-->
    <!--</div>-->
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
    //点击专家跳转的页面
    var GOTOUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/docShow";
    //点击预约请求的逻辑地址
    var editUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/dutyShowEdit";
    //点击预约后有请求时间后跳转的地址
    var SuccessUrl="http://<?php echo C('IP_URL');?>/HOS/Pat/Treatment/treatmentShow";
    //违约次数
    var break_times="<?php echo C('BREAK_TIMES');?>";
    //禁用时长
    var stop_time_value="<?php echo ($stop_time_value); ?>";
    //可能有值的end_date
    var end_date="<?php echo ($end_date); ?>";
</script>
<script src="/HOS/Public/libs/js/Pat/Treatment/js_dutyShow.js"></script>

</html>