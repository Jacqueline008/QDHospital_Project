<?php
namespace Pat\Controller;
use Think\Controller;
class SelectController extends Controller{

    public function lst(){

        //获取当前登录的患者id
        $p_id=session("userID");

        //今天的日期
        $today_date=date("Y-m-d");
//*********************************************************
        //分页展示
        //1.统计满足条件的Treatment表的行数
        $treatment_Model=M("Treatment");
        $treatment_table=$treatment_Model->join("inner join duty_schedule on treatment.dut_code=duty_schedule.dut_code join time_schedule on treatment.time_code=time_schedule.time_code join doctor on duty_schedule.doc_code=doctor.doc_code join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code join hospital on doctor.hos_code=hospital.hos_code join patient on treatment.p_id=patient.p_id")->where("treatment.p_id='".$p_id."' and t_date > '.$today_date.'")->order("treatment.t_code")->select();
        $count=count($treatment_table);
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
        $treatment_Model=M("Treatment");
        $treatment_table=$treatment_Model->join("inner join duty_schedule on treatment.dut_code=duty_schedule.dut_code join time_schedule on treatment.time_code=time_schedule.time_code join doctor on duty_schedule.doc_code=doctor.doc_code join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code join hospital on doctor.hos_code=hospital.hos_code join patient on treatment.p_id=patient.p_id")->where("treatment.p_id='".$p_id."' and t_date > '.$today_date.'")->order("treatment.t_code")->select();
        $count=count($treatment_table);
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
//*********************************************************


        //获取该患者在就诊表中的信息
        $treatment_Model=M("Treatment");
        $treatment_table=$treatment_Model->join("inner join duty_schedule on treatment.dut_code=duty_schedule.dut_code join time_schedule on treatment.time_code=time_schedule.time_code join doctor on duty_schedule.doc_code=doctor.doc_code join department on doctor.hos_code=department.hos_code and doctor.dep_code=department.dep_code join hospital on doctor.hos_code=hospital.hos_code join patient on treatment.p_id=patient.p_id")->where("treatment.p_id='".$p_id."' and t_date > '.$today_date.'")->order("treatment.t_code")->limit(" ".$Page->firstRow.",".$Page->listRows." ")->select();
        //将获取的信息传入视图层
        $this->assign("treatment_table",$treatment_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;padding-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');

        $this->display();
    }

    public function del(){
        //获取想要删除的t_code
        $t_code=I("get.t_code");

        //删除用户想要删除的文章
        $treatment_Model=M("Treatment");
        $treatment_Model->where("t_code='".$t_code."'")->delete();

        header("Location:".U("lst"));
    }

}

?>
