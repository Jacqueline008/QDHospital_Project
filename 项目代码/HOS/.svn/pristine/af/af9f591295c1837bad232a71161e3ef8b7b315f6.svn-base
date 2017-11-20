<?php
namespace Doc\Controller;
use Think\Controller;
class DocController extends Controller {

    public function edit(){
        if(IS_POST){

            //获取传入的数据
            $editData["doc_code"]=session("userName");
            $editData["doc_sex"]=I("post.doc_sex");
            $editData["doc_age"]=I("post.doc_age");
            $editData["doc_tel"]=I("post.doc_tel");
            $editData["doc_pwd"]=I("post.doc_pwd");
            $editData["doc_area"]=I("post.doc_area");

            if($_FILES["pic"]["name"]==""){
                //没有文件上传
            }else{
                //有文件上传
                //文件上传
                $upload=new \Think\Upload();
                $upload->maxSize=3145728;
                $upload->exts=array("jpg","gif","png","jpeg");
                $upload->rootPath = "./";
                $upload->savePath="./Public/Uploads/";
                $upload->replace=true;
                $upload->autoSub=false;

                $info=$upload->uploadOne($_FILES["pic"]);
                //获取文章上传后的永久保存路径
                $editData["doc_pic"]="/Hos/Public/Uploads/".$info["savename"];
            }

            //向Doctor中更新数据（自动验证）
            $editModel=D("Doctor");
            if(!$editModel->create($editData)){
                //准备插入的数据不符合自动验证的规则,输入错误提示
                $this->error($editModel->getError());
            }else{
                $editModel->save();
            }
            header("Location:".U("edit"));
        }

        //获取当前专家的代码
        $doc_code=session("userName");

        //获取当前专家所对应的信息
        $doctor_Model=M("Doctor");
        $doctor_row=$doctor_Model->where("doc_code='".$doc_code."'")->find();
        //将该医院信息传给视图层
        $this->assign("doctor_row",$doctor_row);

        $this->display();
    }

}

?>