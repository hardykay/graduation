<?php
namespace Dean\Model;
use Think\Model;

class School_collegeModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('title','require','标题必须',1),
        array('content','require','内容必须',1), 
    );
}