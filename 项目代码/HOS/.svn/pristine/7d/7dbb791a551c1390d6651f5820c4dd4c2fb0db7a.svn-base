$(function () {
    //验证p_name是否超过20个字
    $(".p_name").blur(function () {
        validateLength(".p_name",20,".error_p_name","姓名超过20个字,请再次输入");
    });
    //验证p_id是否是18位
    $(".p_id").blur(function () {
        validateFixedLength(".p_id",18,".error_p_id","身份证号不是18位,请再次输入");
    });
    //验证p_tel是否满足手机号格式
    $(".p_tel").blur(function () {
        validateTel(".p_tel",".error_p_tel","手机号格式错误,请再次输入");
    });

    //点击登录按钮，再次验证p_name,p_id,p_tel是否格式正确
    $(".submit").click(function () {
        var result_p_name=validateLength(".p_name",20,".error_p_name","姓名超过20个字,请再次输入");
        var result_p_id=validateFixedLength(".p_id",18,".error_p_id","身份证号不是18位,请再次输入");
        var result_p_tel=validateTel(".p_tel",".error_p_tel","手机号格式错误,请再次输入");
        if((result_p_name===0)&&(result_p_id===0)&&(result_p_tel===0)){

            //****************************************************
            //p_name,p_id,p_tel格式正确
            //请求登录逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    p_id:$(".p_id").val(),
                    p_name:$(".p_name").val(),
                    p_tel:$(".p_tel").val()
                },
                success:function (data) {
                    if(data==1){
                        //跳转到首页
                        window.location.href=HomeUrl;
                    }
                    $(".error_return").html(data);
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });
            //****************************************************

        }else if((result_p_name===1)||(result_p_id===1)||(result_p_tel===1)){
            //p_name,p_id,p_tel其中格式有不正确的,就什么也不做
        }else if((result_p_name===2)||(result_p_id===2)||(result_p_tel===2)){
            //p_name,p_id,p_tel其中有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });
});
