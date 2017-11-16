<?php
namespace Doc\Controller;
use Think\Controller;
class DutytimeController extends Controller {

    public function applyForm(){
        //新增成功返回1，失败返回验证失败原因
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        if(IS_POST){
            //获取
            $doc_code=session("userName");
            $week_code=I("post.week_code");
            $time_range=I("post.time_range");

            $begin_date=I("post.begin_date");
            $end_date=I("post.end_date");
            $apply_reason=I("post.apply_reason");

            //依据$doc_code,$week_code,$time_range获取值班代码
            $duty_schedult_Model=M("DutySchedule");
            $dut_code=$duty_schedult_Model->where("doc_code='".$doc_code."' and week_code='".$week_code."' and time_range='".$time_range."' ")->getField("dut_code");

            //准备好要插入的数据
            $addData["dut_code"]=$dut_code;
            $addData["begin_date"]=$begin_date;
            $addData["end_date"]=$end_date;
            date_default_timezone_set("Asia/Shanghai");
            $addData["apply_date"]=date("Y-m-d H:i:s");
            $addData["apply_reason"]=$apply_reason;


            //向stop_schedule中插入数据（自动验证）
            $addModel=D("StopSchedule");
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

        //获取当前专家代码
        $doc_code=session("userName");
        //将登录的专家代码传入视图层
        $this->assign("doc_code",$doc_code);

        $this->display();
    }

    public function applyRecordLst(){
        //获取当前专家代码
        $doc_code=session("userName");
//**************************************************************
        //分页展示
        //1.统计满足条件的医院表的行数
        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code ")->where("duty_schedule.doc_code='".$doc_code."'")->select();
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
        //1.统计满足条件的医院表的行数
        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code ")->where("duty_schedule.doc_code='".$doc_code."'")->select();
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
//**************************************************************

        $stop_schedule_Model=M("StopSchedule");
        $stop_schedule_table=$stop_schedule_Model->join("inner join duty_schedule on stop_schedule.dut_code=duty_schedule.dut_code join doctor on duty_schedule.doc_code=doctor.doc_code ")->where("duty_schedule.doc_code='".$doc_code."'")->limit(" ".$Page->firstRow.",".$Page->listRows." ")->select();
        $this->assign("stop_schedule_table",$stop_schedule_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;padding-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');


        $this->display();
    }

}