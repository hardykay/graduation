<?php
namespace Teacher\Model\many;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TaskModel extends Model {
    //protected $patchValidate = true;
    protected $_validate = array(
        //array('stu_number','','该学生已经有任务书了！',0,'unique',1), 
        array('stu_number','require','您没有选择学生',1),
        //array('top_id','require','没有找到该课题',1),
        array('tea_number','require','您先登录',1),
        array('research','require','研究的主要内容不能为空',1),
        array('basic','require','涉及知识和基本要求不能为空',1),
        array('expect','require','预期目标不能为空',1),
        array('arrange','require','进度安排不能为空',1),
    );
}