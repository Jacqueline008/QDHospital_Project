$(function () {

    //点击删除按钮跳转到删除地址
    $(".btn-del").click(function () {
        var dic_item=$(this).parent().parent().find(".dic_item").attr("name");
        var dic_code=$(this).parent().parent().find(".dic_code").attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"dic_item/"+dic_item+"/dic_code/"+dic_code;
        });
    });
    //点击删除按钮跳转到删除地址-移动端
    $(".btn-del-m").click(function () {
        var dic_item=$(this).parent().parent().find(".dic_item-m").attr("name");
        var dic_code=$(this).parent().parent().find(".dic_code-m").attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"dic_item/"+dic_item+"/dic_code/"+dic_code;
        });
    });

    //点击编辑按钮跳转到编辑地址
    $(".btn-edit").click(function () {
        var dic_item=$(this).parent().parent().find(".dic_item").attr("name");
        var dic_code=$(this).parent().parent().find(".dic_code").attr("name");
        window.location.href=editUrl+"dic_item/"+dic_item+"/dic_code/"+dic_code;
    });
    //点击编辑按钮跳转到编辑地址-移动端
    $(".btn-edit-m").click(function () {
        var dic_item=$(this).parent().parent().find(".dic_item-m").attr("name");
        var dic_code=$(this).parent().parent().find(".dic_code-m").attr("name");
        window.location.href=editUrl+"dic_item/"+dic_item+"/dic_code/"+dic_code;
    });

});