<?php

namespace Pat\Model;
use Think\Model;


class PatientModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("p_id","18","身份证号的位数不是18位!",0,"length"),
        array("p_name","1,20","名字应该在20个字内!",0,"length"),
        array("p_tel","/^1[3578][0-9]{9}$/","手机号格式错误!",0,"regex",3),
    );
}

?>