$(function () {
    //验证dep_description是否超过500个字
    $(".dep_description").blur(function () {
        validateLength(".dep_description",500,".error_dep_description","科室简介超过500个字,请再次输入");
    });


    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_dep_description=validateLength(".dep_description",500,".error_dep_description","科室简介超过500个字,请再次输入");
        if((result_dep_description===0)){
            //格式全对
            //请求编辑提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    dep_code:$(".dep_code").val(),
                    dep_description:$(".dep_description").val()
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

        }else if((result_dep_description===1)){
            //格式有不正确的,就什么也不做
        }else if((result_dep_description===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
