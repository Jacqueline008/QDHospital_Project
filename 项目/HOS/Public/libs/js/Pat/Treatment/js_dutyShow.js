$(function () {
    //点击专家信息跳转到专家详细信息展示页面
    $(".doc-info").click(function () {
        window.location.href=GOTOUrl+"/doc_code/"+$(this).attr("name");
    });

    //点击专家信息跳转到专家详细信息展示页面移动端
    $(".doc-info-m").click(function () {
        window.location.href=GOTOUrl+"/doc_code/"+$(this).attr("name");
    });

    $(".duty_ready").click(function () {
        var dut_code=$(this).parent().attr("name");
        var add_day=$(this).parent().attr("name2");

        $(".modal-header h4").html("系统公告");
        $(".modal-body").html("1.您的违约次数最多为"+break_times+"次,否则将加入黑名单<br>2.黑名单的禁用时长为"+stop_time_value+"个月");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">已阅读</button>');
        $(".modal-footer .btn-primary").click(function () {
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了editUrl地址
                url:editUrl,
                data:{
                    dut_code:dut_code,
                    add_day:add_day
                },
                success:function (data) {
                    if(data==="2"){
                        $(".modal-header h4").html("来自预约平台的提示:");
                        $(".modal-body").html("您还未登录!");
                        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>');
                        $("#mymodal").modal("toggle");
                    }else if(data=="3") {
                        //黑名单
                        $(".modal-header h4").html("来自预约平台的提示:");
                        $(".modal-body").html("抱歉,您已加入黑名单,截至到 "+end_date+" 您才能够预约！ ");
                        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>');
                        $("#mymodal").modal("toggle");
                    }else if(data=="4"){
                        $(".modal-header h4").html("来自预约平台的提示:");
                        $(".modal-body").html("抱歉,该时间范围的号已经全部预约!");
                        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>');
                        $("#mymodal").modal("toggle");
                    }else{
                        var jsonobj=eval('('+data+')');
                        var the_dut_code=jsonobj.dut_code;
                        var the_p_id=jsonobj.p_id;
                        var the_t_date=jsonobj.t_date;
                        //已经在页面中声明
                        window.location.href=SuccessUrl+"/dut_code/"+the_dut_code+"/p_id/"+the_p_id+"/t_date/"+the_t_date;
                    }

                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });
        });
        $("#mymodal").modal("toggle");
    });


});