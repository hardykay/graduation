<?php
namespace Director\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class Teacher_specialtyModel extends Model {
    protected $patchValidate = true;
    protected $_validate = array(
        array('dep_id','require','必须填写',1,'',2),//name姓名  
        array('topic_strat','require','必须填写',1,'',2),//name姓名  
        array('topic_close','require','必须填写',1,'',2),//name姓名
        array('choice_strat','require','必须填写',1,'',2),//name姓名
        array('choice_close','require','必须填写',1,'',2),//name姓名
        array('teacher_strat','require','必须填写',1,'',2),//name姓名
        array('teacher_close','require','必须填写',1,'',2),//name姓名
        array('paper_close','require','必须填写',1,'',2),//name姓名
    );
  
}