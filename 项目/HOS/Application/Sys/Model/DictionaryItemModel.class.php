<?php

namespace Sys\Model;
use Think\Model;


class DictionaryItemModel extends Model{
    //用于自动验证
    protected $_validate=array(
        array("dic_code","1,20","字典代码超过20个字!",0,"length",3),
        array("dic_value","1,20","字典值超过20个字!",0,"length",3),
    );
}

?>