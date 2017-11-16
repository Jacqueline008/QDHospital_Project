<?php
namespace Pat\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){

        if(IS_POST){
            //对于患者身份证号,姓名，手机格式不正确的会返回错误信息，对于正确的会返回1
            //指定该PHP返回的数据为text无格式正文
            header("Content-Type: text/plain;charset=utf-8");
            //解决跨域问题
            header("Access-Control-Allow-Origin:*");
            header("Access-Control-Allow-Methods:POST,GET");

            //获取患者身份证号,姓名，手机
            $p_id=I("post.p_id");
            $p_name=I("post.p_name");
            $p_tel=I("post.p_tel");

            //查询该患者在patient表中是否有记录
            $selectModel=M("patient");
            $selectData=$selectModel->where("p_id="."'".$p_id."'")->getField("p_id");

            if($selectData==null){
                //说明patient表中没有该患者,那么就将该患者插入patient表中

                //准备好要插入的数据
                $addData["p_id"]=$p_id;
                $addData["p_name"]=$p_name;
                $addData["p_tel"]=$p_tel;

                //向patient中插入数据（自动验证）
                $addModel=D("patient");
                if(!$addModel->create($addData)){
                    //准备插入的数据不符合自动验证的规则,输入错误提示
                    echo ($addModel->getError());
                    return;
                }else{
                    $addModel->add();
                }

            }else{
                //说明patient表中已经有该患者了，那么就什么也不做
            }

            //向session写入数据
            session("userType",4);
            session("userName",$p_name);
            session("userID",$p_id);
            echo 1;
            return;
        }

        $this->assign();
        $this->display();
    }
}
?>