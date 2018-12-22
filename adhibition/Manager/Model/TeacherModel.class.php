<?php
namespace Manager\Model;
use Think\Model;

class TeacherModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        // array('user','unique','帐号已存在！',1,'',1), // 
        // array('user','require','用户名不能空'),
        array('tea_number','require','账号不能为空'),
        array('name ','require','姓名不能为空·'),   
        array('dep_id ','require','学院不能为空·'),  
        // array('email','email','邮箱格式不正确',0,'',1), //email在新增的时候验证name字段是否唯一  假设4是注册则执行this->create($_POST,4)
        array('tea_number','','帐号已经存在！',1,'unique',1), 
        ); 
}