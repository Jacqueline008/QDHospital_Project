<?php

namespace Hos\Model;
use Think\Model;


class DepartmentModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("dep_code","1,20","科室代码超过20个字!",0,"length",3),
        array("dep_name","1,20","科室名称超过20个字!",0,"length",3),
        array("dep_description","1,500","科室简介超过500个字!",0,"length",3),
    );
}

?>