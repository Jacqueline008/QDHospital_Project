<?php

namespace Sys\Controller;
use Think\Controller;
class HospitalController extends Controller {

    public function lst(){

        //获取行政区划表的内容
        $cant_Model=M("cant");
        $cant_table=$cant_Model->select();
        //将行政区划表的内容传入视图层
        $this->assign("cant_table",$cant_table);

        //获取医院级别表的内容
        $hos_level_Model=M("hos_level");
        $hos_level_table=$hos_level_Model->select();
        //将医院级别表的内容传入视图层
        $this->assign("hos_level_table",$hos_level_table);


        //若用户没有GET,根据固定sql语句来查询hospital表
        $sql="select * from hospital join cant on hospital.cant_code=cant.cant_code join hos_level on hospital.hoslevel_code=hos_level.hoslevel_code ";
        //若用户GET,根据拼接sql语句来查询hospital表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(isset($_GET["hos_info"])){
                if(I("get.cant_code")!=="null"){
                    if(I("get.hoslevel_code")!=="null"){
                        $sql=$sql."where hospital.hos_code='".I("get.hos_info")."' or hospital.hos_name='".I("get.hos_info")."' and cant.cant_code='".I("get.cant_code")."' and hos_level.hoslevel_code='".I("get.hoslevel_code")."'";
                    }else{
                        $sql=$sql."where hospital.hos_code='".I("get.hos_info")."' or hospital.hos_name='".I("get.hos_info")."' and cant.cant_code='".I("get.cant_code")."'";
                    }
                }else{
                    if(I("get.hoslevel_code")!=="null"){
                        $sql=$sql."where hospital.hos_code='".I("get.hos_info")."' or hospital.hos_name='".I("get.hos_info")."' and hos_level.hoslevel_code='".I("get.hoslevel_code")."'";
                    }else{
                        $sql=$sql."where hospital.hos_code='".I("get.hos_info")."' or hospital.hos_name='".I("get.hos_info")."'";
                    }
                }
            }else{
                if(I("get.cant_code")!=="null"){
                    if(I("get.hoslevel_code")!=="null"){
                        if(I("get.cant_code")==="" && I("get.hoslevel_code")===""){
                            $sql=$sql;
                        }else{
                            $sql=$sql."where cant.cant_code='".I("get.cant_code")."' and hos_level.hoslevel_code='".I("get.hoslevel_code")."'";
                        }
                    }else{
                        $sql=$sql."where cant.cant_code='".I("get.cant_code")."'";
                    }
                }else{
                    if(I("get.hoslevel_code")!=="null"){
                        $sql=$sql."where hos_level.hoslevel_code='".I("get.hoslevel_code")."'";
                    }else{
                        $sql=$sql;
                    }
                }
            }
        }
        $sql=$sql." order by hospital.hos_code ";

        //分页展示
        //1.统计满足条件的医院表的行数
        $hospital_Model=new \Think\Model();
        $hospital_table=$hospital_Model->query($sql);
        $count=count($hospital_table);
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
        //1.统计满足条件的医院表的行数
        $hospital_Model=new \Think\Model();
        $hospital_table=$hospital_Model->query($sql);
        $count=count($hospital_table);
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


        //获取符合条件的医院表中分页的第一页
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $hospital_Model=new \Think\Model();
        $hospital_table=$hospital_Model->query($sql);
        //将医院表的内容传入视图层
        $this->assign("hospital_table",$hospital_table);


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
            //获取医院代码，医院名称，行政区划代码，医院等级名称
            $hos_code=I("post.hos_code");
            $hos_name=I("post.hos_name");
            $cant_code=I("post.cant_code");
            $hoslevel_code=I("post.hoslevel_code");

            //准备好要插入的数据
            $addData["hos_code"]=$hos_code;
            $addData["hos_name"]=$hos_name;
            $addData["cant_code"]=$cant_code;
            $addData["hoslevel_code"]=$hoslevel_code;

            //向hospital中插入数据（自动验证）
            $addModel=D("hospital");
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

        //获取行政区划表的内容
        $cant_Model=M("cant");
        $cant_table=$cant_Model->select();
        //将行政区划表的内容传入视图层
        $this->assign("cant_table",$cant_table);

        //获取医院级别表的内容
        $hos_level_Model=M("hos_level");
        $hos_level_table=$hos_level_Model->select();
        //将医院级别表的内容传入视图层
        $this->assign("hos_level_table",$hos_level_table);

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
            //获取医院代码，医院名称，行政区划代码，医院等级名称
            $hos_code=I("post.hos_code");
            $cant_code=I("post.cant_code");
            $hoslevel_code=I("post.hoslevel_code");

            //准备好要插入的数据
            $editData["hos_code"]=$hos_code;
            $editData["cant_code"]=$cant_code;
            $editData["hoslevel_code"]=$hoslevel_code;

            //向hospital中插入数据（自动验证）
            $editModel=D("hospital");
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

        //获取行政区划表的内容
        $cant_Model=M("cant");
        $cant_table=$cant_Model->select();
        //将行政区划表的内容传入视图层
        $this->assign("cant_table",$cant_table);

        //获取医院级别表的内容
        $hos_level_Model=M("hos_level");
        $hos_level_table=$hos_level_Model->select();
        //将医院级别表的内容传入视图层
        $this->assign("hos_level_table",$hos_level_table);


        //获取传入的hos_code
        $hos_code=I("get.hos_code");
        //将hos_code对应的医院表的记录查出来
        $hospital_Model=M("hospital");
        $hospital_row=$hospital_Model->where("hos_code='".$hos_code."'")->find();
        //将查出的记录传入视图层
        $this->assign("hospital_row",$hospital_row);

        $this->display();
    }

    public function del(){
        //获取想要删除的hos_code
        $hos_code=I("get.hos_code");

        //删除用户想要删除的文章
        $hospital_Model=M("hospital");
        $hospital_Model->where("hos_code='".$hos_code."'")->delete();

        header("Location:".U("lst"));
    }

}


?>