$(function () {

    //点击删除按钮跳转到删除地址
    $(".btn-del").click(function () {
        var t_code=$(this).attr("name");
        $(".modal-body").html("确定取消预约?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"/t_code/"+t_code;
        });
    });
    //点击删除按钮跳转到删除地址-移动端
    $(".btn-del-m").click(function () {
        var t_code=$(this).attr("name");
        $(".modal-body").html("确定取消预约?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $("#mymodal").modal("toggle");
        $(".modal-footer .btn-primary").click(function () {
            window.location.href=delUrl+"/t_code/"+t_code;
        });
    });



});