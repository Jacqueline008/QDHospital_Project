<?php
namespace Home\Controller;
use Think\Controller;
class HeaderController extends Controller {

    //此方法用于返回header中各信息的json字符串
    public function showHeaderJSON(){
        //指定该PHP返回的数据为json格式
        header("Content-Type:application/json;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        $obj=new HeaderController();
        if(session("?userType")){
            //session取值
            $userType=session("userType");
            $userName=session("userName");
            switch ($userType){
                case 1:$obj->generateJSON("1","0",$userName,"0","0","0","1");break;
                case 2:$obj->generateJSON("1","0","0",$userName,"0","0","1");break;
                case 3:$obj->generateJSON("1","0","0","0",$userName,"0","1");break;
                case 4:$obj->generateJSON("1","0","0","0","0",$userName,"1");break;
            }
        }else{
            //未登录
            $obj->generateJSON("1","1","0","0","0","0","0");
        }

    }

    //此方法用于将数组转换为JSON
    public function generateJSON($home,$login,$sys,$hos,$doc,$pat,$logout){
        $arr=array(
            "home"=>$home,
            "login"=>$login,
            "sys"=>$sys,
            "hos"=>$hos,
            "doc"=>$doc,
            "pat"=>$pat,
            "logout"=>$logout,
        );
        echo json_encode($arr);
    }

    //此方法用于退出时清除session内容
    public function logout(){
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        session(null);
        echo 1;
    }
}

?>