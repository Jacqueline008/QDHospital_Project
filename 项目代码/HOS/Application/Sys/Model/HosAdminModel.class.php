<?php

namespace Sys\Model;
use Think\Model;


class HosAdminModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("hosadmin_name","1,20","医院管理员名字超过20个字!",0,"length",3),
        array("hosadmin_pwd","1,10","医院管理员密码超过10个字!",0,"length",3),
        array("hosadmin_tel","/^1[3578][0-9]{9}$/","手机号格式错误!",0,"regex",3),
        array("hos_code","null","没有选择管辖医院!",0,"notequal",3),
        array("hos_code","","该医院已经分配过管理员!",0,"unique",3),
    );
}

?>