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