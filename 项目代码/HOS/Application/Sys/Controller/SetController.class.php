<?php

namespace Sys\Controller;
use Think\Controller;
class SetController extends Controller {
    public function lst(){
        //获取dictionary表的内容
        $dictionary_Model=M("dictionary");
        $dictionary_table=$dictionary_Model->select();
        //将行政区划表的内容传入视图层
        $this->assign("dictionary_table",$dictionary_table);


        //若用户没有GET,根据固定sql语句来查询dictionary表
        $sql="select * from dictionary join dictionary_item on dictionary.dic_item=dictionary_item.dic_item ";
        //若用户GET,根据拼接sql语句来查询dictionary表
        if(isset($_GET)){
            //根据用户传入的医院代码/名称，行政区划，医院级别来拼接sql语句。
            if(I("get.dic_item")!=="null"){
                if(I("get.dic_item")===""){
                    $sql=$sql;
                }else{
                    $sql=$sql." where dictionary.dic_item='".I("get.dic_item")."'";
                }
            }else{
                $sql=$sql;
            }
        }


        //分页展示
        //1.统计满足条件的医院表的行数
        $dictionary_SModel=new \Think\Model();
        $dictionary_Stable=$dictionary_SModel->query($sql);
        $count=count($dictionary_Stable);
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
        $dictionary_SModel=new \Think\Model();
        $dictionary_Stable=$dictionary_SModel->query($sql);
        $count=count($dictionary_Stable);
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


        //获取符合条件的dictionary表中分页的第一页
        $sql=$sql." limit ".$Page->firstRow.",".$Page->listRows."";
        $dictionary_SModel=new \Think\Model();
        $dictionary_Stable=$dictionary_SModel->query($sql);
        //将dictionary表的内容传入视图层
        $this->assign("dictionary_Stable",$dictionary_Stable);

        $this->display();

    }


    public function add(){
        //所有行新增成功返回1，失败返回验证失败原因
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        //将post过来的数据插入dictionary_item表中
        if(IS_POST){
            $dictionary_item=json_decode($_POST["dictionary_item"]);
            $dictionary_item_array=$dictionary_item->dictionary_item;

            for($i=0;$i<count($dictionary_item_array);$i++){

                $dic_item=$dictionary_item_array[$i]->dic_item;
                $dic_code=$dictionary_item_array[$i]->dic_code;
                $dic_value=$dictionary_item_array[$i]->dic_value;

                //准备好要插入的数据
                $addData["dic_item"]=$dic_item;
                $addData["dic_code"]=$dic_code;
                $addData["dic_value"]=$dic_value;

                //手动验证一下要插入的字典项和字典代码是否会相同
                $dictionary_item_Model=M("DictionaryItem");
                $dictionary_item_row=$dictionary_item_Model->where("dic_item='".$dic_item."' and dic_code='".$dic_code."'")->find();
                if($dictionary_item_row!==null){
                    $dictionary_Model=M("Dictionary");
                    $dic_name=$dictionary_Model->where("dic_item='".$dic_item."'")->getField("dic_name");
                    echo "字典名: '".$dic_name."' 下的字典代码: '".$dic_code."' 已经存在,请重新设置<br>它之前的记录已经成功插入!";
                    return ;
                }

                //向dictionary_item中插入数据（自动验证）
                $addModel=D("DictionaryItem");
                if(!$addModel->create($addData)){
                    //准备插入的数据不符合自动验证的规则,输入错误提示
                    echo ($addModel->getError());
                    return;
                }else{
                    $addModel->add();
                }
            }
            //所有的行都插入成功
            echo 1;
            return ;
        }

        //获取dictionary表的内容
        $dictionary_Model=M("dictionary");
        $dictionary_table=$dictionary_Model->select();
        //将dictionary表的内容传入视图层
        $this->assign("dictionary_table",$dictionary_table);

        $this->display();

    }


    //此方法用于add()所展示的页面中新增一行所请求需要的字典信息
    public function getDictionary(){
        //指定该PHP返回的数据为json格式
        header("Content-Type:application/json;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        //获取dictionary表的内容
        $dictionary_Model=M("dictionary");
        $dictionary_table=$dictionary_Model->select();
        echo json_encode($dictionary_table);
    }


    public function edit(){
        //编辑成功返回1，失败返回验证失败原因
        //指定该PHP返回的数据为text无格式正文
        header("Content-Type: text/plain;charset=utf-8");
        //解决跨域问题
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Methods:POST,GET");

        if(IS_POST){
            //获取字典项，字典代码，字典值
            $dic_item=I("post.dic_item");
            $dic_code=I("post.dic_code");
            $dic_value=I("post.dic_value");

            //准备好要插入的数据
            $editData["dic_item"]=$dic_item;
            $editData["dic_code"]=$dic_code;
            $editData["dic_value"]=$dic_value;

            //向dictionary_item中插入数据（自动验证）
            $editModel=D("DictionaryItem");
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

        //获取传入的dic_item和dic_code
        $dic_item=I("get.dic_item");
        $dic_code=I("get.dic_code");
        //将hos_code对应的医院表的记录查出来
        $dictionary_item_Model=M("DictionaryItem");
        $dictionary_item_row=$dictionary_item_Model->where("dic_item='".$dic_item."' and dic_code='".$dic_code."'")->find();
        //将查出的记录传入视图层
        $this->assign("dictionary_item_row",$dictionary_item_row);

        $this->display();
    }

    public function del(){
        //获取想要删除的dic_item dic_code
        $dic_item=I("get.dic_item");
        $dic_code=I("get.dic_code");


        //删除用户想要删除的dictionary_item
        $dictionary_item_Model=M("DictionaryItem");
        $dictionary_item_Model->where("dic_item='".$dic_item."' and dic_code='".$dic_code."'")->delete();

        header("Location:".U("lst"));
    }

}


?>