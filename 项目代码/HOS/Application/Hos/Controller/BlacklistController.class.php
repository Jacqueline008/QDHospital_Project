<?php
namespace Hos\Controller;
use Think\Controller;
class BlacklistController extends Controller{

    public function lst(){
//*************************************************
        //分页展示
        //1.统计满足条件的blacklist的行数
        $blacklist_Model=M("Blacklist");
        $blacklist_table=$blacklist_Model->join("patient on blacklist.p_id=patient.p_id")->select();
        $count=count($blacklist_table);
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
        $blacklist_Model=M("Blacklist");
        $blacklist_table=$blacklist_Model->join("patient on blacklist.p_id=patient.p_id")->select();
        $count=count($blacklist_table);
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
//*************************************************

        //获取黑名单表的内容
        $blacklist_Model=M("Blacklist");
        $blacklist_table=$blacklist_Model->join("patient on blacklist.p_id=patient.p_id")->limit(" ".$Page->firstRow.",".$Page->listRows." ")->select();
        //将黑名单表的内容传入视图层
        $this->assign("blacklist_table",$blacklist_table);

        //查询结果没有时显示的div
        $this->assign("empty",'<div class="noContent" style="text-align: center;margin-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 200px;height: 150px;"><span style="display: block;color:#555;font-size: 16px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');
        //查询结果没有时显示的div--移动端
        $this->assign("empty2",'<div class="noContent" style="text-align: center;padding-top: 50px;"><img src="/HOS/Public/images/noContent.png" style="width: 130px;height: 105px;"><span style="display: block;color:#555;font-size: 14px;margin-top: 20px;">抱歉,没有符合条件的搜索结果</span></div>');


        $this->display();
    }

    public function del(){
        $p_id=I("get.p_id");

        $blacklist_Model=M("Blacklist");
        $blacklist_Model->where("p_id='".$p_id."'")->delete();

        header("Location:".U("lst"));
    }

}

?>