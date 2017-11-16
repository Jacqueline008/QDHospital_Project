<?php

namespace Hos\Controller;
use Think\Controller;
class DoctorController extends Controller{

    public function lst(){
        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //获取当前医院下的department
        $department_Model=M("Department");
        $department_table=$department_Model->where("hos_code='".$hos_code."'")->select();
        //将科室表的内容传入视图层
        $this->assign("department_table",$department_table);

        //获取doc_level表的内容
        $doc_level_Model=M("DocLevel");
        $doc_level_table=$doc_level_Model->select();
        //将医院级别表的内容传入视图层
        $this->assign("doc_level_table",$doc_level_table);

        //若用户没有GET,根据固定sql语句来查询doctor表
        $sql="SELECT * FROM doctor join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code join doc_level on doctor.doclevel_code=doc_level.doclevel_code where doctor.hos_code='".$hos_code."' ";
        //若用户GET,根据拼接sql语句来查询hospital表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(isset($_GET["doc_info"])){
                if(I("get.dep_code")!=="null"){
                    if(I("get.doclevel_code")!=="null"){
                        $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') and doctor.dep_code='".I("get.dep_code")."' and doctor.doclevel_code='".I("get.doclevel_code")."' ";
                    }else{
                        $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') and doctor.dep_code='".I("get.dep_code")."' ";
                    }
                }else{
                    if(I("get.doclevel_code")!=="null"){
                        $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') and doctor.doclevel_code='".I("get.doclevel_code")."' ";
                    }else{
                        $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') ";
                    }
                }
            }else{
                if(I("get.dep_code")!=="null"){
                    if(I("get.doclevel_code")!=="null"){
                        if(I("get.dep_code")==="" && I("get.doclevel_code")===""){
                            $sql=$sql;
                        }else{
                            $sql=$sql."and doctor.dep_code='".I("get.dep_code")."' and doctor.doclevel_code='".I("get.doclevel_code")."' ";
                        }
                    }else{
                        $sql=$sql."and doctor.dep_code='".I("get.dep_code")."' ";
                    }
                }else{
                    if(I("get.doclevel_code")!=="null"){
                        $sql=$sql."and doctor.doclevel_code='".I("get.doclevel_code")."' ";
                    }else{
                        $sql=$sql;
                    }
                }
            }
        }
        $sql=$sql." order by doctor.doc_code ";

        //分页展示
        //1.统计满足条件的医院表的行数
        $doctor_Model=new \Think\Model();
        $doctor_table=$doctor_Model->query($sql);
        $count=count($doctor_table);
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
        $doctor_Model=new \Think\Model();
        $doctor_table=$doctor_Model->query($sql);
        $count=count($doctor_table);
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
        $doctor_Model=new \Think\Model();
        $doctor_table=$doctor_Model->query($sql);
        //将医院表的内容传入视图层
        $this->assign("doctor_table",$doctor_table);

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
            $doc_code=I("post.doc_code");
            $doc_name=I("post.doc_name");
            $dep_code=I("post.dep_code");
            $doclevel_code=I("post.doclevel_code");
            $doc_pwd=I("post.doc_pwd");
            $doc_tel=I("post.doc_tel");

            //手动验证一下要插入的doc_code是否会相同
            $doctor_Model=M("Doctor");
            $doctor_row=$doctor_Model->where("doc_code='".$doc_code."'")->find();
            if($doctor_row!==null){
                echo "专家代码已经存在!";
                return;
            }

            //获取当前医院管理员的名字
            $userName=session("userName");
            //获取当前医院管理员所管理的医院代码
            $hospital_model=M("Hospital");
            $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

            //准备好要插入的数据
            $addData["doc_code"]=$doc_code;
            $addData["doc_name"]=$doc_name;
            $addData["dep_code"]=$dep_code;
            $addData["doclevel_code"]=$doclevel_code;
            $addData["doc_pwd"]=$doc_pwd;
            $addData["doc_tel"]=$doc_tel;
            $addData["hos_code"]=$hos_code;

            //向doctor中插入数据（自动验证）
            $addModel=D("Doctor");
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

        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //获取当前医院下的department
        $department_Model=M("Department");
        $department_table=$department_Model->where("hos_code='".$hos_code."'")->select();
        //将科室表的内容传入视图层
        $this->assign("department_table",$department_table);

        //获取doc_level
        $doc_level_Model=M("DocLevel");
        $doc_level_table=$doc_level_Model->select();
        //将科室表的内容传入视图层
        $this->assign("doc_level_table",$doc_level_table);

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
            //获取doc_code,doc_pwd,doc_tel
            $doc_code=I("post.doc_code");
            $doc_pwd=I("post.doc_pwd");
            $doc_tel=I("post.doc_tel");

            //准备好要插入的数据
            $editData["doc_code"]=$doc_code;
            $editData["doc_pwd"]=$doc_pwd;
            $editData["doc_tel"]=$doc_tel;

            //向hospital中插入数据（自动验证）
            $editModel=D("Doctor");
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

        //获取传入的doc_code
        $doc_code=I("get.doc_code");
        //将doc_code对应的专家表的记录查出来
        $doctor_Model=M("Doctor");
        $doctor_row=$doctor_Model->join("inner join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code inner join doc_level on doctor.doclevel_code=doc_level.doclevel_code ")->where("doc_code='".$doc_code."'")->find();
        //将查出的记录传入视图层
        $this->assign("doctor_row",$doctor_row);

        $this->display();
    }

    public function del(){
        //获取想要删除的doc_code
        $doc_code=I("get.doc_code");

        //删除用户想要删除的文章
        $doctor_Model=M("Doctor");
        $doctor_Model->where("doc_code='".$doc_code."'")->delete();

        header("Location:".U("lst"));
    }

}

?>