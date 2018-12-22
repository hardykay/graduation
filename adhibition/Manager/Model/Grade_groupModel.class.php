<?php
namespace Manager\Model;
use Think\Model;

class Grade_groupModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('name','require','名称必须',1),
        array('domain','require','专业必须',1), 
    );
}