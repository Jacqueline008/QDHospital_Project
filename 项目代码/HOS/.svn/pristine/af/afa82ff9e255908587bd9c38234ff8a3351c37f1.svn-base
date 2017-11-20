$(function () {

    //立即预约按钮
    $(".btn-submit").click(function () {
        var dut_code=$(".time_range").attr("name");
        var p_id=$(".p_id span").text();
        var t_date=$(".t_date").text();
        var time_code=$(".time_code").val();
        //请求编辑提交逻辑
        $.ajax({
            type:"POST",
            //在模板html中已经定义好了editUrl地址
            url:editUrl,
            data:{
                dut_code:dut_code,
                p_id:p_id,
                t_date:t_date,
                time_code:time_code
            },
            success:function (data) {
                if(data==1){
                    //说明预约成功
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