<?php

namespace Hos\Controller;
use Think\Controller;
class DutyController extends Controller{

    public function lst(){

        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");


        //获取当前医院下的所有科室信息
        $department_Model=M("Department");
        $department_table=$department_Model->where("hos_code='".$hos_code."'")->select();
        //将科室表的内容传入视图层
        $this->assign("department_table",$department_table);

        //若用户没有GET,根据固定sql语句来查询hospital表
        $sql="select * from doctor join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code where department.hos_code='".$hos_code."' ";
        //若用户GET,根据拼接sql语句来查询hospital表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(isset($_GET["doc_info"])){
                if(I("get.dep_code")!=="null"){
                    $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') and department.dep_code='".I("get.dep_code")."' ";
                }else{
                    $sql=$sql."and (doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."') ";
                }
            }else{
                if(I("get.dep_code")!=="null"){
                    if(I("get.dep_code")===""){
                        $sql=$sql;
                    }else{
                        $sql=$sql."and department.dep_code='".I("get.dep_code")."' ";
                    }
                }else{
                    $sql=$sql;
                }
            }
        }

//********************************************************************
        //分页展示
        //1.统计满足条件的医院表的行数
        $doctor_Model=new \Think\Model();
        $doctor_table=$doctor_Model->query($sql);
        $count=count($doctor_table);
        //2.配置每页显示的数据条数
        $Page=new \Think\Page($count,3);
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
        $Page2=new \Think\Page($count,3);
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
//********************************************************************


        //获取符合条件的专家
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $doctor_Model=new \Think\Model();
        $doctor_table=$doctor_Model->query($sql);

        $result_array=array();
        for($i=0;$i<count($doctor_table);$i++){
            $item_array=array();
            $item_array["doc_code"]=$doctor_table[$i]["doc_code"];
            $item_array["doc_name"]=$doctor_table[$i]["doc_name"];
            $item_array["doc_pic"]=$doctor_table[$i]["doc_pic"];
            $item_array["dep_name"]=$doctor_table[$i]["dep_name"];

            $duty_array=array();
            //查询出该专家的14条坐诊状态
            $inner_sql="select * from duty_schedule where doc_code='".$item_array["doc_code"]."'";
            $duty_schedule_Model=new \Think\Model();
            $duty_schedule_table=$duty_schedule_Model->query($inner_sql);
            for($j=0;$j<count($duty_schedule_table);$j++){
                $duty_inner_array=array();
                $duty_inner_array["dut_code"]=$duty_schedule_table[$j][dut_code];
                $duty_inner_array["dut_status"]=$duty_schedule_table[$j][dut_status];
                array_push($duty_array,$duty_inner_array);
            }

            $item_array["duty"]=$duty_array;

            array_push($result_array,$item_array);
        }
        $this->assign("result_array",$result_array);



        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');

        $this->display();
    }

    //用于医院管理员在停诊/上班之间切换
    public function edit(){
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        //获取想要改变值班状态的值班代码
        $dut_code=I("get.dut_code");

        //查询该值班代码原有的状态
        $duty_schedule_Model=M("DutySchedule");
        $dut_status=$duty_schedule_Model->where("dut_code='".$dut_code."'")->getField("dut_status");

        //改变状态更新
        if($dut_status==0){
            $editData["dut_status"]=1;
        }else{
            $editData["dut_status"]=0;
        }
        $editData["dut_code"]=$dut_code;
        $duty_schedule_Model->save($editData);

        //更新成功
        echo 1;

    }


    public function applyRecordLst(){
        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");


//********************************************************************
        //分页展示
        //1.统计满足条件的停诊申请表的行数
        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code")->where("hos_code='".$hos_code."' and stop_schedule.stop_status=1 ")->select();
        $count=count($stop_schedule_table);
        //2.配置每页显示的数据条数
        $Page=new \Think\Page($count,4);
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
        //1.统计满足条件的停诊申请表的行数
        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code")->where("hos_code='".$hos_code."' and stop_schedule.stop_status=1 ")->select();
        $count=count($stop_schedule_table);
        //2.配置每页显示的数据条数
        $Page2=new \Think\Page($count,4);
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
//********************************************************************

        //查看停诊申请表信息（1.管辖医院下的 2.停诊申请状态为待审核的）
        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code")->where("hos_code='".$hos_code."' and stop_schedule.stop_status=1 ")->limit(" ".$Page->firstRow.",".$Page->listRows." ")->select();
        //将停诊申请表的内容传入视图层
        $this->assign("stop_schedule_table",$stop_schedule_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;padding-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');


        $this->display();
    }

    //同意/拒绝逻辑
    public function applyRecordEdit(){
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        //说明点击的是同意按钮
        if(count($_GET)>0){
            $stop_code=I("get.stop_code");

            $edit_Model=M("StopSchedule");
            $editData["stop_code"]=$stop_code;
            $editData["stop_status"]=3;
            $edit_Model->save($editData);

            header("Location:".U("applyRecordLst"));
        }

        //说明点击的是拒绝按钮
        if(IS_POST){
            $stop_code=I("post.stop_code");
            $refuse_reason=I("post.refuse_reason");

            $edit_Model=M("StopSchedule");
            $editData["stop_code"]=$stop_code;
            $editData["refuse_reason"]=$refuse_reason;
            $editData["stop_status"]=2;
            $edit_Model->save($editData);

            echo 1;
        }

    }

}

?>