$(function () {
    //点击科室跳转到该科室的专家坐诊信息页面
    $(".mix-container a").click(function () {
        window.location.href=GOTOUrl+"/hos_code/"+$(this).attr("name2")+"/dep_code/"+$(this).attr("name1");
    });
});