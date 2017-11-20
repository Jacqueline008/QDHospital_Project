$(function () {

    //验证doc_pwd是否超过10个字
    $(".doc_pwd").blur(function () {
        validateLength(".doc_pwd",10,".error_doc_pwd","密码超过10个字,请再次输入");
    });
    //验证doc_tel是否满足手机号格式
    $(".doc_tel").blur(function () {
        validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
    });

    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_doc_pwd=validateLength(".doc_pwd",10,".error_doc_pwd","密码超过10个字,请再次输入");
        var result_doc_tel=validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
        if((result_doc_pwd===0)&&(result_doc_tel===0)){
            //格式全对
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    doc_code:$(".doc_code").val(),
                    doc_pwd:$(".doc_pwd").val(),
                    doc_tel:$(".doc_tel").val()
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

        }else if((result_doc_pwd===1)||(result_doc_tel===1)){
            //格式有不正确的,就什么也不做
        }else if((result_doc_pwd===2)||(result_doc_tel===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
