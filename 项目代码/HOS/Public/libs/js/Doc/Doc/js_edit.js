//点击提交按钮，再次验证是否格式正确
function validate() {
    var result_doc_sex=validateSelect(".doc_sex",".error_doc_sex","请选择性别");
    var result_doc_tel=validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
    var result_doc_pwd=validateLength(".doc_pwd",10,".error_addr","密码超过10个字,请再次输入");
    var result_doc_area=validateLength(".doc_area",200,".error_doc_area","擅长领域超过200个字,请再次输入");
    if((result_doc_sex===0)&&(result_doc_tel===0)&&(result_doc_pwd===0)&&(result_doc_area===0)){
        //格式全对
        return true;
    }else if((result_doc_tel===1)||(result_doc_pwd===1)||(result_doc_area===1)){
        //格式有不正确的
        return false;
    }else if((result_doc_sex===2)||(result_doc_tel===2)||(result_doc_pwd===2)||(result_doc_area===2)){
        //有没有输入的
        // alert("请完善信息");
        $(".modal-body").html("请完善您的信息!");
        $("#mymodal").modal("toggle");
        return false;
    }
}

$(function () {
    //验证doc_sex是否选择
    $(".doc_sex").blur(function () {
        validateSelect(".doc_sex",".error_doc_sex","请选择性别");
    });

    //验证doc_tel是否满足手机号格式
    $(".doc_tel").blur(function () {
        validateTel(".doc_tel",".error_doc_tel","手机号格式错误,请再次输入");
    });

    //验证doc_pwd是否超过10个字
    $(".doc_pwd").blur(function () {
        validateLength(".doc_pwd",10,".error_doc_pwd","密码超过10个字,请再次输入");
    });

    //验证doc_area是否超过200个字
    $(".doc_area").blur(function () {
        validateLength(".doc_area",200,".error_doc_area","擅长领域超过200个字,请再次输入");
    });

});
