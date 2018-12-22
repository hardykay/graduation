<?php
namespace Director\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TopicModel extends Model {
//    protected $patchValidate = true;
    protected $_validate = array(
//        array('name','require','姓名必须填写',1,'',2),//name姓名
        //array('advice','require','评语不能为空',2,'length',2),//native_place籍贯
        array('audit','number','格式不对',2,'',2),//politics_status 政治面貌
//        array('age','1,3','年龄填写错误',2,'length',2),//age年龄
//        array('phone','7,15','手机号不正确',2,'length',2),//phone手机号码
//        array('email','email','邮箱格式不正确',1,'',0), //email
//        array('qq','5,15','QQ不正确',1,'length',2),//qq
   );
}