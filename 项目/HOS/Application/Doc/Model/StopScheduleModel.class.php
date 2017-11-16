<?php

namespace Doc\Model;
use Think\Model;


class StopScheduleModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("apply_reason","1,50","申停原因超过50个字!",0,"length",3),
    );
}

?>