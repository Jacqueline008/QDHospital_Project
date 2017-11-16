//验证source的长度是否超过maxlength
function validateLength(source,maxlength,target,reason){
    var source_val=$(source).val();
    if(source_val.length==0){
        return 2;
    }else{
        if(source_val.length>maxlength){
            $(target).text(reason);
            return 1;
        }
        else{
            $(target).text(" ");
            return 0;
        }
    }
}


$(function () {
    //验证name是否超过20个字
    $(".name").blur(function () {
        validateLength(".name",20,".error_name","用户名超过20个字,请再次输入");
    });
    //验证pwd是否超过10个字
    $(".pwd").blur(function () {
        validateLength(".pwd",10,".error_pwd","密码超过10个字,请再次输入");
    });

    //点击登录按钮，再次验证name,pwd是否格式正确
    $(".submit").click(function () {
        var result_name=validateLength(".name",20,".error_name","用户名超过20个字,请再次输入");
        var result_pwd=validateLength(".pwd",10,".error_pwd","密码超过10个字,请再次输入");
        if((result_name===0)&&(result_pwd===0)){

            //name,pwd格式正确
            //请求登录逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    name:$(".name").val(),
                    pwd:$(".pwd").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明用户名和密码都输入正确，则跳转到首页
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


        }else if((result_name===1)||(result_pwd===1)){
            //p_name,p_id,p_tel其中格式有不正确的,就什么也不做
        }else if((result_name===2)||(result_pwd===2)){
            //p_name,p_id,p_tel其中有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });
});
