<?php

namespace Sys\Model;
use Think\Model;


class HospitalModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("hos_code","1,20","医院代码超过20个字!",0,"length",3),
        array("hos_name","1,40","医院名称超过40个字!",0,"length",3),
        array("cant_code","null","没有选择行政区划!",0,"notequal",3),
        array("hoslevel_code","null","没有选择医院级别!",0,"notequal",3),
    );
}

?>