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

    //点击删除按钮跳转到删除地址
    $(".btn-del").click(function () {
        var name=$(this).attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"doc_code/"+name;
        });
    });
    //点击删除按钮跳转到删除地址-移动端
    $(".btn-del-m").click(function () {
        var name=$(this).attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"doc_code/"+name;
        });
    });

    //点击编辑按钮跳转到编辑地址
    $(".btn-edit").click(function () {
        window.location.href=editUrl+"doc_code/"+$(this).attr("name");
    });
    //点击编辑按钮跳转到编辑地址-移动端
    $(".btn-edit-m").click(function () {
        window.location.href=editUrl+"doc_code/"+$(this).attr("name");
    });

});
