<?php
namespace Doc\Controller;
use Think\Controller;
class MsgController extends Controller {

    public function edit(){
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        if(count($_GET)!=0){
            //说明专家点击了已就诊
            $t_code=I("get.t_code");

            $treatment_Model=M("Treatment");
            $editData["t_code"]=$t_code;
            $editData["t_status"]=2;
            $treatment_Model->save($editData);

            echo 1;
            exit;
        }

        if(IS_POST){
            //说明专家点击了未就诊

            //获取传入的t_code
            $t_code=I("post.t_code");

            //先更改该t_code在treatment表中的状态
            $treatment_Model=M("Treatment");
            $editData["t_code"]=$t_code;
            $editData["t_status"]=3;
            $treatment_Model->save($editData);

            //查看该t_code下所对应的p_id/t_date
            $treatment_Model=M("Treatment");
            $p_id=$treatment_Model->where("t_code='".$t_code."'")->getField("p_id");
            $t_date=$treatment_Model->where("t_code='".$t_code."'")->getField("t_date");

            //查看该p_id在untreatment表中的信息
            $untreatment_Model=M("Untreatment");
            $untreatment_table=$untreatment_Model->where("p_id='".$p_id."'")->select();

            $the_break_times=count($untreatment_table);
            if($the_break_times<(C("BREAK_TIMES")-1)){
                $addData["t_code"]=$t_code;
                $addData["p_id"]=$p_id;
                $addData["t_date"]=$t_date;
                $untreatment_Model->add($addData);
                echo 1;
                exit;
            }else if($the_break_times==(C("BREAK_TIMES")-1)){
                //清空该p_id在untreatment表中的记录
                $untreatment_Model->where("p_id='".$p_id."'")->delete();

                //将该p_id插入blacklist表中
                $blacklist_Model=M("Blacklist");

                $addData["p_id"]=$p_id;
                $addData["begin_date"]=$t_date;
                //获取禁用时长
                $dictionary_item_Model=M("DictionaryItem");
                $dic_value=$dictionary_item_Model->where("dic_item='STOP_TIME' and dic_code='1' ")->getField("dic_value");
                //计算出end_date
                $end_date=date("Y-m-d", strtotime("+".$dic_value." months", strtotime($t_date)));
                $addData["end_date"]=$end_date;

                $blacklist_Model->add($addData);
                echo 1;
                exit;
            }

        }

        //获取当前专家的代码
        $doc_code=session("userName");
        //今天的日期
        $today_date=date("Y-m-d");

        //查询该专家当天在treatment表中的信息
        $treatment_Model=M("Treatment");
        $treatment_table=$treatment_Model->join("inner join duty_schedule on treatment.dut_code=duty_schedule.dut_code join patient on treatment.p_id=patient.p_id join time_schedule on treatment.time_code=time_schedule.time_code")->where("duty_schedule.doc_code='".$doc_code."' and treatment.t_date='".$today_date."'")->select();
        //将查询结果传入视图层
        $this->assign("treatment_table",$treatment_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');


        $this->display();
    }

}

?>