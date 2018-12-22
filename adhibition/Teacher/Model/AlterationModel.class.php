<?php
namespace Teacher\Model;
use Think\Model;

class AlterationModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('adviser_audit','require','审核结果必须',1),
        array('adviser','require','审核意见必填',1),
    );
    
}
