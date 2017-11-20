$(function () {

    //验证p_tel是否满足手机号格式
    $(".p_tel").blur(function () {
        validateTel(".p_tel",".error_p_tel","手机号格式错误,请再次输入");
    });


    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_p_tel=validateTel(".p_tel",".error_p_tel","手机号格式错误,请再次输入");
        if((result_p_tel===0)){
            //格式全对
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    p_name:$(".p_name").val(),
                    p_id:$(".p_id").val(),
                    p_tel:$(".p_tel").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明编辑成功
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

        }else if((result_p_tel===1)){
            //p_name,p_id,p_tel其中格式有不正确的,就什么也不做
        }else if((result_p_tel===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
