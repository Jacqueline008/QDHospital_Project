$(function () {

    //给新增一行添加点击事件
    $(".btn-add").click(function () {
        //请求获取字典表逻辑
        $.ajax({
            type:"GET",
            //在模板html中已经定义好了getDictionaryUrl地址
            url:getDictionaryUrl,
            success:function (data) {
                var addstr='<div class="addlist_row submit_row"> <div class="addlist_col dic_item"><select>';
                for(var i=0;i<data.length;i++){
                    addstr=addstr+'<option value="'+data[i].dic_item+'">'+data[i].dic_name+'</option>';
                }
                addstr=addstr+'</select></div> <div class="addlist_col dic_code"><input type="text" placeholder="字典代码(20个字符内)" maxlength="20"></div> <div class="addlist_col dic_value"><input  type="text" placeholder="字典值(20个字符内)" maxlength="20"></div> <div class="addlist_col option"><button class="btn-del"><img src="/HOS/Public/images/del-orange.png"><span>删除该行</span></button></div> </div>';
                $(addstr).insertAfter(".addlist_row:last");
                $(".btn-del").click(function () {
                    $(this).parent().parent().remove();
                });
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //给删除当前行按钮添加点击事件
    $(".btn-del").click(function () {
        $(this).parent().parent().remove();
    });

    //给提交按钮添加点击事件
    var dic_codeResult;
    var dic_valueResult;
    $(".btn-submit").click(function () {
        dic_codeResult=0;
        dic_valueResult=0;
        $(".dic_code input").each(function () {
            if($(this).val()==""){
                dic_codeResult=1;
            }
        });
        $(".dic_value input").each(function () {
            if($(this).val()==""){
                dic_valueResult=1;
            }
        });
        if(dic_codeResult==1||dic_valueResult==1){
            // alert("请完善字典代码/字典值!");
            $(".modal-body").html("请完善字典代码/字典值!");
            $("#mymodal").modal("toggle");
        }else{
            //********************************************************
            //现在准备将字典表中的行全部插入到dictionary_item表中
            var addCount=$(".dic_item select").size();
            var addStr='{"dictionary_item":[';
            for(var i=0;i<addCount;i++){
                addStr=addStr+'{"dic_item":"'+$(".dic_item select").eq(i).val()+'","dic_code":"'+$(".dic_code input").eq(i).val()+'","dic_value":"'+$(".dic_value input").eq(i).val()+'"}';
                if(i!=addCount-1){
                    addStr=addStr+',';
                }
            }
            addStr=addStr+']}';

            //请求新增提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    dictionary_item:addStr
                },
                success:function (data) {
                    if(data==1){
                        //说明所有行全部新增成功，则跳转到系统设置-字典展示页面
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
            //********************************************************
        }
    });

});