<?php

namespace Hos\Model;
use Think\Model;


class HospitalModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("addr","1,100","医院地址超过100个字!",0,"length",3),
        array("msg","1,500","医院简介超过500个字!",0,"length",3),
        array("tel","1,20","医院电话超过20个字!",0,"length",3),
    );
}

?>