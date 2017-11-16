<?php
namespace Pat\Controller;
use Think\Controller;
class PatController extends Controller {

    public function edit(){
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");
        if(IS_POST){

            //获取传入的数据
            $editData["p_id"]=I("post.p_id");
            $editData["p_name"]=I("post.p_name");
            $editData["p_tel"]=I("post.p_tel");

            //向patient中更新数据（自动验证）
            $editModel=D("Patient");
            if(!$editModel->create($editData)){
                //准备插入的数据不符合自动验证的规则,输入错误提示
                $this->error($editModel->getError());
            }else{
                $editModel->save();
            }
            echo 1;
            return;
        }

        //获取当前患者id
        $p_id=session("userID");

        //将该患者对应的信息查询出来
        $patient_Model=M("Patient");
        $patient_row=$patient_Model->where("p_id='".$p_id."'")->find();
        //将查询出来的信息传给视图层
        $this->assign("patient_row",$patient_row);

        $this->display();
    }

}

?>