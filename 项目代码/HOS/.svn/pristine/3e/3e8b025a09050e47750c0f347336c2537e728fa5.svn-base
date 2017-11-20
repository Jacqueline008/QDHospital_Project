<?php
namespace Hos\Controller;
use Think\Controller;
class DataController extends Controller{

    public function lst(){
        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //获取管辖医院下的科室信息
        $department_Model=M("Department");
        $department_table=$department_Model->where("hos_code='".$hos_code."'")->order("dic_code")->select();
        //将科室信息表的内容传入视图层
        $this->assign("department_table",$department_table);


        //获取今天是周几
        $today=date("w");

        //若用户没有GET,根据固定sql语句来查询duty_shedule表
        $sql="select * from duty_schedule join doctor on duty_schedule.doc_code=doctor.doc_code join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code where doctor.hos_code='".$hos_code."' and week_code='".$today."' and dut_status=1 ";
        //若用户GET,根据拼接sql语句来查询hospital表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(isset($_GET["doc_info"])){
                if(I("get.dep_code")!=="null"){
                    $sql=$sql." and ( doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."' ) and doctor.dep_code='".I("get.dep_code")."' ";
                }else{
                    $sql=$sql." and ( doctor.doc_code='".I("get.doc_info")."' or doctor.doc_name='".I("get.doc_info")."' ) ";
                }
            }else{
                if(I("get.dep_code")!=="null"){
                    if(I("get.dep_code")===""){
                        $sql=$sql;
                    }else{
                        $sql=$sql." and doctor.dep_code='".I("get.dep_code")."' ";
                    }
                }else{
                    $sql=$sql;
                }
            }
        }

//*****************************************
        //分页展示
        //1.统计满足条件的duty_schedule表的行数
        $duty_schedule_Model=new \Think\Model();
        $duty_schedule_table=$duty_schedule_Model->query($sql);
        $count=count($duty_schedule_table);
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
        $duty_schedule_Model=new \Think\Model();
        $duty_schedule_table=$duty_schedule_Model->query($sql);
        $count=count($duty_schedule_table);
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
//*****************************************


        //获取符合条件表中分页的第一页
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $duty_schedule_Model=new \Think\Model();
        $duty_schedule_table=$duty_schedule_Model->limit()->query($sql);

        $result_array=array();
        for($i=0;$i<count($duty_schedule_table);$i++){
            $item_array=array();

            $dut_code=$duty_schedule_table[$i]["dut_code"];

            //begin 查询该dut_code下还有多少未预约的时间段以及具体的时间段
            $today_date=date("Y-m-d");

            $time_schedule_Model=M("TimeSchedule");
            $time_code_table=$time_schedule_Model->where("time_range='".$duty_schedule_table[$i]["time_range"]."'")->getField("time_code",true);

            $time_code_array=array();
            for($j=0;$j<count($time_code_table);$j++){
                $time_code=$time_code_table[$j];

                $treatment_Model=M("Treatment");
                $treatment_row=$treatment_Model->where("dut_code='".$dut_code."' and t_date='".$today_date."' and time_code='".$time_code."'")->find();

                if($treatment_row===null){
                    $time_schedule_Model=M("TimeSchedule");
                    $time_content=$time_schedule_Model->where("time_code='".$time_code."'")->getField("time_content");
                    array_push($time_code_array,$time_content);
                }else{
                    continue;
                }
            }
            //end

            $item_array["dut_code"]=$dut_code;
            $item_array["doc_code"]=$duty_schedule_table[$i]["doc_code"];
            $item_array["doc_name"]=$duty_schedule_table[$i]["doc_name"];
            $item_array["dep_name"]=$duty_schedule_table[$i]["dep_name"];
            $item_array["time_range"]=$duty_schedule_table[$i]["time_range"];
            $item_array["num"]=count($time_code_array);
            $item_array["time_content"]=$time_code_array;


            array_push($result_array,$item_array);
        }
        //将内容传入视图层
        $this->assign("result_array",$result_array);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');



        $this->display();
    }

}

?>