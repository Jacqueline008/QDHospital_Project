//***************************************************************
//***************************************************************
//模态框
$('#mymodal').on('shown.bs.modal', function (e) {
    // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
    $(this).css('display', 'block');
    var modalHeight=$(window).height() / 2 - $('#mymodal .modal-dialog').height() / 2;
    $(this).find('.modal-dialog').css({
        'margin-top': modalHeight
    });
});


//***************************************************************
//***************************************************************
//header

//获取标头JSON
function getHeaderJSON() {
    $.ajax({
        type:"GET",
        url:headerRequestUrl,
        success:function (data) {
            if(data.home!=="0"){
                $(".sn-home").css("display","block");
            }
            if(data.login!=="0"){
                $(".sn-login").css("display","block");
            }
            if(data.sys!=="0"){
                $(".sn-sys").css("display","block");
                $(".sn-sys").html("hi,"+data.sys);
            }
            if(data.hos!=="0"){
                $(".sn-hos").css("display","block");
                $(".sn-hos").html("hi,"+data.hos);
            }
            if(data.doc!=="0"){
                $(".sn-doc").css("display","block");
                $(".sn-doc").html("hi,"+data.doc);
            }
            if(data.pat!=="0"){
                $(".sn-pat").css("display","block");
                $(".sn-pat").html("hi,"+data.pat);
            }
            if(data.logout!=="0"){
                $(".sn-logout").css("display","block");
            }
        },
        error:function () {
            $(".modal-body").html("发生错误!");
            $("#mymodal").modal("toggle");
            // alert("发生错误!");
        }
    });
}


$(function () {
    //获取标头JSON
    getHeaderJSON();

    //给下拉菜单的图标添加点击事件
    $(".sn-showmenu").click(function () {
        $(".sn-quick-menu").slideToggle();
    });

    //点击退出连接时，弹出确认退出对话框
    $(".sn-logout").click(function () {
        $(".modal-body").html("确定退出本系统?");
        $(".modal-footer").html('<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button> <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>');
        $(".modal-footer .btn-primary").click(function () {
                $.ajax({
                    type:"GET",
                    url:logoutRequestUrl,
                    success:function (data) {
                        if(data==1){
                            //跳转到首页
                            window.location.href=HomeUrl;
                        }
                    },
                    error:function () {
                        $(".modal-body").html("发生错误!");
                        $("#mymodal").modal("toggle");
                        // alert("发生错误!");
                    }
                });
        });
        $("#mymodal").modal("toggle");
    });

});



//***************************************************************
//***************************************************************
//本项目中的一些方法

//验证source的长度是否超过maxlength
function validateLength(source,maxlength,target,reason){
    var source_val=$(source).val();
    if(source_val.length==0){
        return 2;
    }else{
        if(source_val.length>maxlength){
            $(target).text(reason);
            return 1;
        }
        else{
            $(target).text(" ");
            return 0;
        }
    }
}

//验证source的长度是否是fixedlength
function validateFixedLength(source,fixedlength,target,reason){
    var source_val=$(source).val();
    if(source_val.length==0){
        return 2;
    }else{
        if(source_val.length!=fixedlength){
            $(target).text(reason);
            return 1;
        }
        else{
            $(target).text(" ");
            return 0;
        }
    }
}

//验证手机号
function validateTel(source,target,reason){
    var source_val=$(source).val();
    if(source_val.length==0){
        return 2;
    }else{
        var reg=/^1[3578][0-9]{9}$/;
        if(!reg.test(source_val)){
            $(target).text(reason);
            return 1;
        }
        else{
            $(target).text(" ");
            return 0;
        }
    }
}

//验证select是否没有选择
function validateSelect(source,target,reason) {
    var source_val=$(source).val();
    if(source_val==="null"){
        $(target).text(reason);
        return 2;
    }else{
        $(target).text(" ");
        return 0;
    }
}

//验证datepicker是否没有选择
function validateDatepicker(source,target,reason) {
    var source_val=$(source).val();
    if(source_val===""){
        $(target).text(reason);
        return 2;
    }else{
        $(target).text(" ");
        return 0;
    }
}

