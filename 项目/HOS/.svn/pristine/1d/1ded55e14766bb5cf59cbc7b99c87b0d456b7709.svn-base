$(function () {

    //验证cant_code是否选择
    $(".cant_code").blur(function () {
        validateSelect(".cant_code",".error_cant_code","请选择行政区划");
    });

    //验证hoslevel_code是否选择
    $(".hoslevel_code").blur(function () {
        validateSelect(".hoslevel_code",".error_hoslevel_code","请选择医院级别");
    });

    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_cant_code=validateSelect(".cant_code",".error_cant_code","请选择行政区划");
        var result_hoslevel_code=validateSelect(".hoslevel_code",".error_hoslevel_code","请选择医院级别");
        if((result_cant_code===0)&&(result_hoslevel_code===0)){
            //格式全对
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    hos_code:$(".hos_code").val(),
                    cant_code:$(".cant_code").val(),
                    hoslevel_code:$(".hoslevel_code").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明编辑成功，则跳转到医院管理-医院展示页面
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

        }else if((result_cant_code===2)||(result_hoslevel_code===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
