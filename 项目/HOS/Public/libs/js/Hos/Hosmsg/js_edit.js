//点击提交按钮，再次验证是否格式正确
function validate() {
    var result_tel=validateLength(".tel",20,".error_tel","电话超过20个字,请再次输入");
    var result_addr=validateLength(".addr",100,".error_addr","地址超过100个字,请再次输入");
    var result_msg=validateLength(".msg",500,".error_msg","简介超过200个字,请再次输入");
    if((result_tel===0)&&(result_addr===0)&&(result_msg===0)){
        //格式全对
        return true;
    }else if((result_tel===1)||(result_addr===1)||(result_msg===1)){
        //格式有不正确的
        return false;
    }else if((result_tel===2)||(result_addr===2)||(result_msg===2)){
        //有没有输入的
        // alert("请完善信息");
        $(".modal-body").html("请完善您的信息!");
        $("#mymodal").modal("toggle");
        return false;
    }
}

$(function () {
    //验证tel是否超过10个字
    $(".tel").blur(function () {
        validateLength(".tel",20,".error_tel","电话超过20个字,请再次输入");
    });
    //验证addr是否超过100个字
    $(".addr").blur(function () {
        validateLength(".addr",100,".error_addr","地址超过100个字,请再次输入");
    });
    //验证msg是否超过200个字
    $(".msg").blur(function () {
        validateLength(".msg",500,".error_msg","简介超过200个字,请再次输入");
    });

});
