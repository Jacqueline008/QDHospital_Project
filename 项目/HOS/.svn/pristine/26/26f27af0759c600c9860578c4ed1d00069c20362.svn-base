<?php

namespace Hos\Model;
use Think\Model;


class DoctorModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("doc_name","1,20","专家名字超过20个字!",0,"length",3),
        array("doc_pwd","1,10","专家密码超过10个字!",0,"length",3),
        array("doc_tel","/^1[3578][0-9]{9}$/","手机号格式错误!",0,"regex",3),
    );
}

?>