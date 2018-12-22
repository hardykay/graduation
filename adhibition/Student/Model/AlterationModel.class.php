<?php
namespace Student\Model;
use Think\Model;

class AlterationModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('new_name','require','变更后题目必填',1),
        array('cause','require','题目变更原因必填',1),
        array('plan','require','新题目内容、进度计划及完成任务的保障措施必填',1),
    );
    
}
