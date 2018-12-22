<?php
namespace Home\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class StudentModel extends Model {
    public $patchValidate = true;
    protected $_validate = array(
        array('name','require','姓名必须填写',1,'',1),//name姓名
        array('email','email','邮箱格式不正确',1,'',1), //email
        array('phone','isMobile','手机号码错误',1,'function',1),
        array('native_place','1,30','籍贯长度过长',2,'length',1),//native_place籍贯
        array('native_place','1,25','政治面貌过长',2,'length',1),//politics_status 政治面貌
        array('native_place','2,25','社会职务2-25',2,'length',1),//duty社会职务
    );
    
    /**
     * 验证手机号是否正确
     * @author honfei
     * @param number $mobile
     */
    function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
}