<?php
namespace Manager\Model;
use Think\Model;

class SpecialtyModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('dep_father','require','学院必须',1), 
        array('dep_name','require','专业名称必须',1), 
    );
}