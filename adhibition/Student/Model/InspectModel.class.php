<?php
namespace Student\Model;
use Think\Model;

class InspectModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('progress','require','进展情况必填',1),
    );
    
}
