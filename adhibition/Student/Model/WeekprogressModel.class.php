<?php
namespace Student\Model;
use Think\Model;

class WeekprogressModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('jinzhan','require','工作完成情况必填',1),
        array('down','require','下阶段工作内容必填',1),
        array('title','require','标题必填',1),
    );
    
}
