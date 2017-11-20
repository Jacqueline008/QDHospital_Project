$(function () {
    //验证doc_code是否超过20个字
    $(".doc_code").blur(function () {
        validateLength(".doc_code",20,".error_doc_code","专家代码超过20个字,请再次输入");
    });
    //验证doc_name是否超过20个字
    $(".doc_name").blur(function () {
        validateLength(".doc_name",20,".error_doc_name","名字超过20个字,请再次输入");
    });
    //验证doc_pwd是否超过10个字
    $(".doc_pwd").blur(function () {
        validateLength(".doc_pwd",10,".error_doc_pwd","密码超过10个字,请再次输入");
    });
    //验证doc_tel是否满足手机号格式
    $(".doc_tel").blur(function () {
        validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
    });

    //验证dep_code是否选择
    $(".dep_code").blur(function () {
        validateSelect(".dep_code",".error_dep_code","请选择科室名称");
    });

    //验证doclevel_code是否选择
    $(".doclevel_code").blur(function () {
        validateSelect(".doclevel_code",".error_doclevel_code","请选择专家级别");
    });

    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_doc_code=validateLength(".doc_code",20,".error_doc_code","专家代码超过20个字,请再次输入");
        var result_doc_name=validateLength(".doc_name",20,".error_doc_name","名字超过20个字,请再次输入");
        var result_doc_pwd=validateLength(".doc_pwd",10,".error_doc_pwd","密码超过10个字,请再次输入");
        var result_doc_tel=validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
        var result_dep_code=validateSelect(".dep_code",".error_dep_code","请选择科室名称");
        var result_doclevel_code=validateSelect(".doclevel_code",".error_doclevel_code","请选择专家级别");
        if((result_doc_code===0)&&(result_doc_name===0)&&(result_doc_pwd===0)&&(result_doc_tel===0)&&(result_dep_code===0)&&(result_doclevel_code===0)){
            //格式全对
            //请求新增提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    doc_code:$(".doc_code").val(),
                    doc_name:$(".doc_name").val(),
                    dep_code:$(".dep_code").val(),
                    doclevel_code:$(".doclevel_code").val(),
                    doc_pwd:$(".doc_pwd").val(),
                    doc_tel:$(".doc_tel").val()
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

        }else if((result_doc_code===1)||(result_doc_name===1)||(result_doc_pwd===1)||(result_doc_tel===1)){
            //格式有不正确的,就什么也不做
        }else if((result_doc_code===2)||(result_doc_name===2)||(result_doc_pwd===2)||(result_doc_tel===2)||(result_dep_code===2)||(result_doclevel_code===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
