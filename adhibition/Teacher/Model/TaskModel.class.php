<?php
namespace Teacher\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TaskModel extends Model {
    //protected $patchValidate = true;
    protected $_validate = array( 
        array('top_id','require','没有找到该课题',1),
        array('research','require','研究的主要内容不能为空',1),
        array('basic','require','涉及知识和基本要求不能为空',1),
        array('expect','require','预期目标不能为空',1),
        array('arrange','require','进度安排不能为空',1),
    );
}