$(function () {
    //验证hos_code是否超过20个字
    $(".hos_code").blur(function () {
        validateLength(".hos_code",20,".error_hos_code","医院代码超过20个字,请再次输入");
    });
    //验证hos_name是否超过40个字
    $(".hos_name").blur(function () {
        validateLength(".hos_name",40,".error_hos_name","医院名称超过40个字,请再次输入");
    });

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
        var result_hos_code=validateLength(".hos_code",20,".error_hos_code","医院代码超过20个字,请再次输入");
        var result_hos_name=validateLength(".hos_name",40,".error_hos_name","医院名称超过40个字,请再次输入");
        var result_cant_code=validateSelect(".cant_code",".error_cant_code","请选择行政区划");
        var result_hoslevel_code=validateSelect(".hoslevel_code",".error_hoslevel_code","请选择医院级别");
        if((result_hos_code===0)&&(result_hos_name===0)&&(result_cant_code===0)&&(result_hoslevel_code===0)){
            //格式全对
            //请求新增提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    hos_code:$(".hos_code").val(),
                    hos_name:$(".hos_name").val(),
                    cant_code:$(".cant_code").val(),
                    hoslevel_code:$(".hoslevel_code").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明新增成功，则跳转到医院管理-医院展示页面
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

        }else if((result_hos_code===1)||(result_hos_name===1)){
            //格式有不正确的,就什么也不做
        }else if((result_hos_code===2)||(result_hos_name===2)||(result_cant_code===2)||(result_hoslevel_code===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
