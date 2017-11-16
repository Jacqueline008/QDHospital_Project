//当表单中的input不为空的时候才提交input(该Input name="hos_name")
function formSubmit() {
    if($(".hos-name input").val()!=""){
        $(".hos-name input").attr("name","hos_name");
    }
}

$(function () {
    //点击qh001(轮播图中写死的一个)
    $(".qh001").click(function () {
        window.location.href=GOTOUrl+"/hos_code/"+$(this).attr("name");
    });

    //点击每一个医院跳转到相应医院的科室展示页面
    $(".list-item").click(function () {
        window.location.href=GOTOUrl+"/hos_code/"+$(this).attr("name");
    });

    //点击每一个医院跳转到相应医院的科室展示页面(移动端)
    $(".list-item-m").click(function () {
        window.location.href=GOTOUrl+"/hos_code/"+$(this).attr("name");
    });

});