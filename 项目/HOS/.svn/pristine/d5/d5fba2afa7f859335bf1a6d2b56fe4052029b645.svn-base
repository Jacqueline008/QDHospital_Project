$(function () {
    //点击已就诊按钮
    $(".btn-edit").click(function () {
        var t_code=$(this).attr("name");
        $.ajax({
            type:"GET",
            //在模板html中已经定义好了submitUrl地址
            url:editUrl+"/t_code/"+t_code,
            success:function (data) {
                if(data==1){
                    //
                    window.location.href=GOTOUrl;
                }else{
                    //alert(data);
                    $(".modal-body").html(data);
                    $("#mymodal").modal("toggle");
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //(移动端)点击已就诊按钮
    $(".btn-edit-m").click(function () {
        var t_code=$(this).attr("name");
        $.ajax({
            type:"GET",
            //在模板html中已经定义好了submitUrl地址
            url:editUrl+"/t_code/"+t_code,
            success:function (data) {
                if(data==1){
                    //
                    window.location.href=GOTOUrl;
                }else{
                    //alert(data);
                    $(".modal-body").html(data);
                    $("#mymodal").modal("toggle");
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });


    //点击未就诊按钮
    $(".btn-del").click(function () {
        var t_code=$(this).attr("name");
        $.ajax({
            type:"POST",
            //在模板html中已经定义好了submitUrl地址
            url:editUrl,
            data:{
                t_code:t_code
            },
            success:function (data) {
                if(data==1){
                    //
                    window.location.href=GOTOUrl;
                }else{
                    //alert(data);
                    $(".modal-body").html(data);
                    $("#mymodal").modal("toggle");
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //(移动端)点击未就诊按钮
    $(".btn-del-m").click(function () {
        var t_code=$(this).attr("name");
        $.ajax({
            type:"POST",
            //在模板html中已经定义好了submitUrl地址
            url:editUrl,
            data:{
                t_code:t_code
            },
            success:function (data) {
                if(data==1){
                    //
                    window.location.href=GOTOUrl;
                }else{
                    //alert(data);
                    $(".modal-body").html(data);
                    $("#mymodal").modal("toggle");
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });
});

