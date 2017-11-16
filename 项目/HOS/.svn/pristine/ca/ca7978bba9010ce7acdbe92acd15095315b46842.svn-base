<?php

namespace Sys\Controller;
use Think\Controller;
class HosadminController extends Controller {
    public function lst(){
        //获取医院表的内容
        $hospital_Model=M("hospital");
        $hospital_table=$hospital_Model->select();
        //将医院表的内容传入视图层
        $this->assign("hospital_table",$hospital_table);


        //若用户没有GET,根据固定sql语句来查询hos_admin表
        $sql="select * from hos_admin join hospital on hos_admin.hos_code=hospital.hos_code ";
        //若用户GET,根据拼接sql语句来查询hos_admin表
        if(isset($_GET)){
            //根据用户传入的医院管理员/管辖医院来拼接sql语句。
            if(isset($_GET["hosadmin_name"])){
                if(I("get.hos_code")!=="null"){
                    $sql=$sql." where hos_admin.hosadmin_name='".I("get.hosadmin_name")."' and hospital.hos_code='".I("get.hos_code")."'";
                }else{
                    $sql=$sql." where hos_admin.hosadmin_name='".I("get.hosadmin_name")."'";
                }
            }else{
                if(I("get.hos_code")!=="null"){
                    if(I("get.hos_code")===""){
                        $sql=$sql;
                    }else{
                        $sql=$sql."where hospital.hos_code='".I("get.hos_code")."'";
                    }
                }else{
                    $sql=$sql;
                }
            }
        }
        $sql=$sql." order by hos_admin.hosadmin_name ";

        //分页展示
        //1.统计满足条件的hos_admin表的行数
        $hos_admin_Model=new \Think\Model();
        $hos_admin_table=$hos_admin_Model->query($sql);
        $count=count($hos_admin_table);
        //2.配置每页显示的数据条数
        $Page=new \Think\Page($count,5);
        //3.配置分页样式
        $Page -> setConfig('first','首页');
        $Page -> setConfig('prev','<<');
        $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page -> setConfig('next','>>');
        $Page -> setConfig('last','尾页');
        $Page -> lastSuffix = false;//最后一页不显示为总页数
        $Page -> setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        //4.分页显示输出
        $show=$Page->show();
        $this->assign("page",$show);


        //分页展示-移动端
        //1.统计满足条件的hos_admin表的行数
        $hos_admin_Model=new \Think\Model();
        $hos_admin_table=$hos_admin_Model->query($sql);
        $count=count($hos_admin_table);
        //2.配置每页显示的数据条数
        $Page2=new \Think\Page($count,5);
        //3.配置分页样式
        $Page2 -> setConfig('first','首页');
        $Page2 -> setConfig('prev','上一页');
        $Page2 -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page2 -> setConfig('next','下一页');
        $Page2 -> setConfig('last','尾页');
        $Page2 -> lastSuffix = false;//最后一页不显示为总页数
        $Page2 -> setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
        //4.分页显示输出
        $show2=$Page2->show();
        $this->assign("page2",$show2);


        //获取符合条件的hos_admin表中分页的第一页
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $hos_admin_Model=new \Think\Model();
        $hos_admin_table=$hos_admin_Model->query($sql);
        //将hos_admin表的内容传入视图层
        $this->assign("hos_admin_table",$hos_admin_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');


        $this->display();
    }

    public function add(){
        //新增成功返回1，失败返回验证失败原因
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        if(IS_POST){

            //获取医院管理员名字，密码，手机，管辖医院
            $hosadmin_name=I("post.hosadmin_name");
            $hosadmin_pwd=I("post.hosadmin_pwd");
            $hosadmin_tel=I("post.hosadmin_tel");
            $hos_code=I("post.hos_code");

            //准备好要插入的数据
            $addData["hosadmin_name"]=$hosadmin_name;
            $addData["hosadmin_pwd"]=$hosadmin_pwd;
            $addData["hosadmin_tel"]=$hosadmin_tel;
            $addData["hos_code"]=$hos_code;

            //手动验证一下要插入的管理员名字是否会相同
            $hos_admin_Model=M("HosAdmin");
            $hos_admin_row=$hos_admin_Model->where("hosadmin_name='".$hosadmin_name."'")->find();
            if($hos_admin_row!==null){
                echo "管理员名字已经存在!";
                return;
            }

            //向hos_admin中插入数据（自动验证）
            $addModel=D("HosAdmin");
            if(!$addModel->create($addData)){
                //准备插入的数据不符合自动验证的规则,输入错误提示
                echo ($addModel->getError());
                return;
            }else{
                $addModel->add();
                echo 1;
                return;
            }
        }

        //获取hospital表的内容
        $hospital_Model=M("hospital");
        $hospital_table=$hospital_Model->select();
        //将hospital表的内容传入视图层
        $this->assign("hospital_table",$hospital_table);

        $this->display();
    }

    public function edit(){
        //编辑成功返回1，失败返回验证失败原因
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        if(IS_POST){
            //获取管理员名字，密码，手机
            $hosadmin_name=I("post.hosadmin_name");
            $hosadmin_pwd=I("post.hosadmin_pwd");
            $hosadmin_tel=I("post.hosadmin_tel");

            //准备好要插入的数据
            $editData["hosadmin_name"]=$hosadmin_name;
            $editData["hosadmin_pwd"]=$hosadmin_pwd;
            $editData["hosadmin_tel"]=$hosadmin_tel;

            //向hospital中插入数据（自动验证）
            $editModel=D("HosAdmin");
            if(!$editModel->create($editData)){
                //准备插入的数据不符合自动验证的规则,输入错误提示
                echo ($editModel->getError());
                return;
            }else{
                $editModel->save();
                echo 1;
                return;
            }
        }

        //获取传入的hos_code
        $hosadmin_name=I("get.hosadmin_name");
        //将hos_code对应的医院表的记录查出来
        $hos_admin_Model=M("HosAdmin");
        $hos_admin_row=$hos_admin_Model->join("hospital on hos_admin.hos_code=hospital.hos_code")->where("hosadmin_name='".$hosadmin_name."'")->find();
        //将查出的记录传入视图层
        $this->assign("hos_admin_row",$hos_admin_row);

        $this->display();
    }


    public function del(){
        //获取想要删除的hosadmin_name
        $hosadmin_name=I("get.hosadmin_name");

        //删除用户想要删除的hosadmin_name
        $hos_admin_Model=M("HosAdmin");
        $hos_admin_Model->where("hosadmin_name='".$hosadmin_name."'")->delete();

        header("Location:".U("lst"));
    }

}


?>