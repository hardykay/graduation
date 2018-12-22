<?php
namespace Manager\Model;
use Think\Model;

class CollegeModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('dep_name','require','学院名称必须',1),
    );
}