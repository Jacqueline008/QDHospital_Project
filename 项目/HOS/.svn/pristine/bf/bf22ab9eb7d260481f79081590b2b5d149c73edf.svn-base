$(function () {
    //点击同意按钮
    $(".btn-agree").click(function () {
        var stop_code=$(this).attr("name");
        window.location.href=editUrl+"/stop_code/"+stop_code;
    });

    //点击同意按钮-移动端
    $(".btn-agree-m").click(function () {
        var stop_code=$(this).attr("name");
        window.location.href=editUrl+"/stop_code/"+stop_code;
    });

    //点击拒绝按钮
    $(".btn-refuse").click(function () {
        var stop_code=$(this).attr("name");

        $(".modal-body").html("<input class='refuse-reason' style='width:100%;height: 100%;' type='text' placeholder='请输入拒绝原因(50个字内)'/>");
        $(".modal-footer").html('<button type="button" class="btn btn-primary refuse-option">确定</button>');
        $("#mymodal").modal("toggle");
        $(".refuse-option").click(function () {
            var refuse_reason=$(".refuse-reason").val();
            //请求拒绝逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:editUrl,
                data:{
                    stop_code:stop_code,
                    refuse_reason:refuse_reason
                },
                success:function (data) {
                    if(data==1){
                        //说明拒绝成功
                        window.location.href=GOTOUrl;
                    }
                },
                error:function () {
                }
            });
        });
    });

    //点击拒绝按钮-移动端
    $(".btn-refuse-m").click(function () {
        var stop_code=$(this).attr("name");

        $(".modal-body").html("<input class='refuse-reason' style='width:100%;height: 100%;' type='text' placeholder='请输入拒绝原因(50个字内)'/>");
        $(".modal-footer").html('<button type="button" class="btn btn-primary refuse-option">确定</button>');
        $("#mymodal").modal("toggle");
        $(".refuse-option").click(function () {
            var refuse_reason=$(".refuse-reason").val();
            //请求拒绝逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:editUrl,
                data:{
                    stop_code:stop_code,
                    refuse_reason:refuse_reason
                },
                success:function (data) {
                    if(data==1){
                        //说明拒绝成功
                        window.location.href=GOTOUrl;
                    }
                },
                error:function () {
                }
            });
        });
    });


});