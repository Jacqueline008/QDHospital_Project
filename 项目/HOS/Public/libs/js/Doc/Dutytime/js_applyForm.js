$(function () {
    //开始日期的datepicker设置
    $('.begin_date').datepicker({

        language: 'zh-CN',
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    //结束日期的datepicker设置
    $('.end_date').datepicker({

        language: 'zh-CN',
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    //验证week_code是否选择
    $(".week_code").blur(function () {
        validateSelect(".week_code",".error_week_code","请选择停诊时间");
    });

    //验证time_range是否选择
    $(".time_range").blur(function () {
        validateSelect(".time_range",".error_time_range","请选择时间范围");
    });

    //验证begin_date是否选择
    $(".begin_date").blur(function () {
        validateDatepicker(".begin_date",".error_begin_date","请选择开始日期");
    });

    //验证end_date是否选择
    $(".end_date").blur(function () {
        validateDatepicker(".end_date",".error_end_date","请选择结束日期");
    });

    //验证apply_reason是否超过20个字
    $(".apply_reason").blur(function () {
        validateLength(".apply_reason",50,".error_apply_reason","申停原因超过50个字,请再次输入");
    });


    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_week_code=validateSelect(".week_code",".error_week_code","请选择停诊时间");
        var result_time_range=validateSelect(".time_range",".error_time_range","请选择时间范围");
        var result_begin_date=validateDatepicker(".begin_date",".error_begin_date","请选择开始日期");
        var result_end_date=validateDatepicker(".end_date",".error_end_date","请选择结束日期");
        var result_apply_reason=validateLength(".apply_reason",50,".error_apply_reason","申停原因超过50个字,请再次输入");
        if((result_week_code===0)&&(result_time_range===0)&&(result_begin_date===0)&&(result_end_date===0)&&(result_apply_reason===0)){
            //格式全对
            //请求新增提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    week_code:$(".week_code").val(),
                    time_range:$(".time_range").val(),
                    begin_date:$(".begin_date").val(),
                    end_date:$(".end_date").val(),
                    apply_reason:$(".apply_reason").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明申请成功
                        window.location.href=GOTOUrl;
                    }else{
                        //alert(data);
                        $(".modal-body").html(data);
                        $("#mymodal").modal("toggle");
                    }
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });

        }else if((result_apply_reason===1)){
            //格式有不正确的,就什么也不做
        }else if((result_week_code===2)||(result_time_range===2)||(result_begin_date===2)||(result_end_date===2)||(result_apply_reason===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });

});
