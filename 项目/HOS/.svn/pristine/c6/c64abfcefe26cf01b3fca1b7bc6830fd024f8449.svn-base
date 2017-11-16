$(function () {

    //验证dic_value是否超过20个字
    $(".dic_value").blur(function () {
        validateLength(".dic_value",20,".error_dic_value","字典值超过20个字,请再次输入");
    });

    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_dic_value=validateLength(".dic_value",20,".error_dic_value","字典值超过20个字,请再次输入");
        if((result_dic_value===0)){
            //格式全对
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    dic_item:$(".dic_item").val(),
                    dic_code:$(".dic_code").val(),
                    dic_value:$(".dic_value").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明编辑成功，则跳转到系统设置-字典展示页面
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

        }else if((result_dic_value===1)){
            //格式有不正确的,就什么也不做
        }else if((result_dic_value===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
