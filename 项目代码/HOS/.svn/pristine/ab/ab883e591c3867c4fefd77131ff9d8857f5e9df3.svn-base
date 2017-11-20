//当表单中的input不为空的时候才提交input(该Input name="hos_info")
function formSubmit() {
    if($(".hos-info input").val()!=""){
        $(".hos-info input").attr("name","hos_info");
    }
}

//移动端时:当表单中的input不为空的时候才提交input(该Input name="hos_info")
function formSubmitMobile() {
    if($(".hos-info-m").val()!=""){
        $(".hos-info-m").attr("name","hos_info");
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
            window.location.href=delUrl+"hos_code/"+name;
        });
    });
    //点击删除按钮跳转到删除地址-移动端
    $(".btn-del-m").click(function () {
        var name=$(this).attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"hos_code/"+name;
        });
    });

    //点击编辑按钮跳转到编辑地址
    $(".btn-edit").click(function () {
        window.location.href=editUrl+"hos_code/"+$(this).attr("name");
    });
    //点击编辑按钮跳转到编辑地址-移动端
    $(".btn-edit-m").click(function () {
        window.location.href=editUrl+"hos_code/"+$(this).attr("name");
    });

});
