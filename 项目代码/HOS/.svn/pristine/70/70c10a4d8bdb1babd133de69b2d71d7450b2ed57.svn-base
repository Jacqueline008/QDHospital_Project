<?php
namespace Hos\Controller;
use Think\Controller;
class DepController extends Controller{

    public function lst(){
        //获取字典项表中关于科室类别的内容
        $dictionary_item_Model=M("DictionaryItem");
        $dictionary_item_table=$dictionary_item_Model->where("dic_item='DEP_CATEGORY'")->select();
        //将行政区划表的内容传入视图层
        $this->assign("dictionary_item_table",$dictionary_item_table);

        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //若用户没有GET,根据固定sql语句来查询hospital表
        $sql="select *,substring(dep_description,1,100) as small_description from department join dictionary_item on department.dic_item=dictionary_item.dic_item and department.dic_code=dictionary_item.dic_code where hos_code='".$hos_code."' ";
        //若用户GET,根据拼接sql语句来查询hospital表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(isset($_GET["dep_info"])){
                if(I("get.dic_value")!=="null"){
                    $sql=$sql."and (department.dep_code='".I("get.dep_info")."' or department.dep_name='".I("get.dep_info")."') and dictionary_item.dic_value='".I("get.dic_value")."' ";
                }else{
                    $sql=$sql."and (department.dep_code='".I("get.dep_info")."' or department.dep_name='".I("get.dep_info")."')";
                }
            }else{
                if(I("get.dic_value")!=="null"){
                    if(I("get.dic_value")===""){
                        $sql=$sql;
                    }else{
                        $sql=$sql."and dictionary_item.dic_value='".I("get.dic_value")."' ";
                    }
                }else{
                    $sql=$sql;
                }
            }
        }

        //分页展示
        //1.统计满足条件的department表的行数
        $department_Model=new \Think\Model();
        $department_table=$department_Model->query($sql);
        $count=count($department_table);
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
        //1.统计满足条件的department表的行数
        $department_Model=new \Think\Model();
        $department_table=$department_Model->query($sql);
        $count=count($department_table);
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


        //获取符合条件的department表中分页的第一页
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $department_Model=new \Think\Model();
        $department_table=$department_Model->query($sql);
        //将医院表的内容传入视图层
        $this->assign("department_table",$department_table);

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
            //获取科室代码，科室名称，dic_item,dic_code,科室简介
            $dep_code=I("post.dep_code");
            $dep_name=I("post.dep_name");
            $dic_item=I("post.dic_item");
            $dic_code=I("post.dic_code");
            $dep_description=I("post.dep_description");

            //获取当前医院管理员的名字
            $userName=session("userName");
            //获取当前医院管理员所管理的医院代码
            $hospital_model=M("Hospital");
            $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");


            //手动验证一下要插入的科室代码在本医院中是否会相同
            $department_Model=M("Department");
            $department_row=$department_Model->where("hos_code='".$hos_code."' and dep_code='".$dep_code."'")->find();
            if($department_row!==null){
                echo "科室代码: ".$dep_code." 已经在本医院添加过了！";
                return ;
            }


            //准备好要插入的数据
            $addData["hos_code"]=$hos_code;
            $addData["dep_code"]=$dep_code;
            $addData["dep_name"]=$dep_name;
            $addData["dic_item"]=$dic_item;
            $addData["dic_code"]=$dic_code;
            $addData["dep_description"]=$dep_description;

            //向department中插入数据（自动验证）
            $addModel=D("Department");
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


        //获取dictionary_item表的内容
        $dictionary_item_Model=M("DictionaryItem");
        $dictionary_item_table=$dictionary_item_Model->where("dic_item='DEP_CATEGORY'")->select();
        //将dictionary_item表的内容传入视图层
        $this->assign("dictionary_item_table",$dictionary_item_table);

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
            //获取dep_code，dep_description
            $dep_code=I("post.dep_code");
            $dep_description=I("post.dep_description");

            //获取当前医院管理员的名字
            $userName=session("userName");
            //获取当前医院管理员所管理的医院代码
            $hospital_model=M("Hospital");
            $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

            //准备好要插入的数据
            $editData["dep_code"]=$dep_code;
            $editData["dep_description"]=$dep_description;
            $editData["hos_code"]=$hos_code;

            //向department中插入数据（自动验证）
            $editModel=D("Department");
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

        //获取传入的dep_code
        $dep_code=I("get.dep_code");
        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //将hos_code下的dep_code的记录查出来
        $department_Model=M("Department");
        $department_row=$department_Model->join("dictionary_item on department.dic_item=dictionary_item.dic_item and department.dic_code=dictionary_item.dic_code")->where("hos_code='".$hos_code."' and dep_code='".$dep_code."'")->find();
        //将查出的记录传入视图层
        $this->assign("department_row",$department_row);

        $this->display();
    }

    public function del(){
        //获取想要删除的dep_code
        $dep_code=I("get.dep_code");
        //获取当前医院管理员的名字
        $userName=session("userName");
        //获取当前医院管理员所管理的医院代码
        $hospital_model=M("Hospital");
        $hos_code=$hospital_model->join("hos_admin on hospital.hos_code=hos_admin.hos_code")->where("hos_admin.hosadmin_name='".$userName."'")->getField("hospital.hos_code");

        //删除用户想要删除的department
        $department_Model=M("Department");
        $department_Model->where("hos_code='".$hos_code."' and dep_code='".$dep_code."'")->delete();

        header("Location:".U("lst"));
    }

}