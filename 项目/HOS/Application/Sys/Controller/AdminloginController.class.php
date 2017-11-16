<?php

namespace Sys\Controller;
use Think\Controller;
class AdminloginController extends Controller {
    public function login(){
        if(IS_POST){
            //会返回密码错误/无权限/1
            //指定该PHP返回的数据为text无格式正文
            header("Content-Type: text/plain;charset=utf-8");
            //解决跨域问题
            header("Access-Control-Allow-Origin:*");
            header("Access-Control-Allow-Methods:POST,GET");

            //********传入的用户名是系统管理员
            if($_POST["name"]==C("SYSADMIN_NAME")){
                if($_POST["pwd"]==C("SYSADMIN_PWD")){

                    //session赋值
                    session("userName","系统管理员");
                    session("userType",1);

                    echo 1;
                }else{
                    echo "您输入的密码错误!";
                }
            }
            //********传入的用户名是医院管理员
            elseif(preg_match("/^HA/",$_POST["name"])){
                $selectModel=M("hos_admin");
                $selectData=$selectModel->where("hosadmin_name="."'".$_POST["name"]."'")->getField("hosadmin_pwd");
                if($selectData==null){
                    echo "抱歉,您没有权限进入系统!";
                }else{
                    if($selectData==$_POST["pwd"]){

                        //session赋值
                        session("userName",$_POST["name"]);
                        session("userType",2);

                        echo 1;
                    }else{
                        echo "您输入的密码错误!";
                    }
                }
            }
            //********传入的用户名是医院专家
            elseif(preg_match("/^QH/",$_POST["name"])){
                $selectModel=M("doctor");
                $selectData=$selectModel->where("doc_code="."'".$_POST["name"]."'")->getField("doc_pwd");
                if($selectData==null){
                    echo "抱歉,您没有权限进入系统!";
                }else{
                    if($selectData==$_POST["pwd"]){

                        //session赋值
                        session("userName",$_POST["name"]);
                        session("userType",3);

                        echo 1;
                    }else{
                        echo "您输入的密码错误!";
                    }
                }
            }
            //********传入的用户名不是系统管理员，也不是医院管理员，也不是医院专家
            else{
                echo "抱歉,您没有权限进入系统!";
            }
            exit;
        }

        //展示登录页面
        $this->assign();
        $this->display();
    }
}

?>