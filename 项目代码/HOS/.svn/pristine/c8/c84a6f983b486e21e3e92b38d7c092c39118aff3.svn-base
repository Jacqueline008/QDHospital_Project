$(function () {

    //点击删除按钮跳转到删除地址
    $(".btn-del").click(function () {
        var name=$(this).attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"/p_id/"+name;
        });
    });
    //点击删除按钮跳转到删除地址-移动端
    $(".btn-del-m").click(function () {
        var name=$(this).attr("name");
        $(".modal-body").html("确定删除该记录?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"/p_id/"+name;
        });
    });

});