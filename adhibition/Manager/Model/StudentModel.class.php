<?php
namespace Manager\Model;
use Think\Model;

class StudentModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        // array('user','unique','帐号已存在！',1,'',1), // 
        // array('user','require','用户名不能空'),
        array('stu_number','require','账号不能为空'),
        array('dep_college ','require','学院必选'),   
        array('dep_major','require','专业必选'),   
        array('dep_class','require','班级必选'),   

        // array('email','email','邮箱格式不正确',0,'',1), //email在新增的时候验证name字段是否唯一  假设4是注册则执行this->create($_POST,4)
        array('stu_number','','帐号名称已经存在！',1,'unique',1), 
        ); 
}