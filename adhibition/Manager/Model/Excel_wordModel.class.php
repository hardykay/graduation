<?php
namespace Manager\Model;
use Think\Model;

class Excel_wordModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('title','require','文件名称',1),
    );
}