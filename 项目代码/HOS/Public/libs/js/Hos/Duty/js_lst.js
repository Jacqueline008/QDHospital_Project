//当表单中的input不为空的时候才提交input(该Input name="doc_info")
function formSubmit() {
    if($(".doc-info input").val()!=""){
        $(".doc-info input").attr("name","doc_info");
    }
}

//移动端时:当表单中的input不为空的时候才提交input(该Input name="doc_info")
function formSubmitMobile() {
    if($(".doc-info-m").val()!=""){
        $(".doc-info-m").attr("name","doc_info");
    }
}

$(function () {
    //在停诊/上班之间切换
    $(".changeStatus").click(function () {
        $.ajax({
            type:"GET",
            url:editUrl+"/dut_code/"+$(this).attr("name"),
            success:function (data) {
                if(data==1){
                    //跳转到原页面
                    window.location.href=window.location.href;
                }
            },
            error:function () {
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
                // alert("发生错误!");
            }
        });
    });

    //在停诊/上班之间切换（移动端）
    $(".changeStatus-m").click(function () {
        $.ajax({
            type:"GET",
            url:editUrl+"/dut_code/"+$(this).attr("name"),
            success:function (data) {
                if(data==1){
                    //跳转到原页面
                    window.location.href=window.location.href;
                }
            },
            error:function () {
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
                // alert("发生错误!");
            }
        });
    });
});