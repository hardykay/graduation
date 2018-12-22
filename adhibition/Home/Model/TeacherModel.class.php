<?php

namespace Home\Model;

use Think\Model;

/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TeacherModel extends Model {

    //protected $patchValidate = true;
    protected $_validate = array(
        array('name', 'require', '姓名必须填写', 1), //name姓名
        array('email', 'email', '邮箱格式不正确', 1), //email
        //array('phone', '^1[3|4|5|8][0-9]\d{4,8}$', '手机号码错误！', 0, 'regex'),
        array('phone','isMobile','手机号码错误',0,'function'),
        // array('phone','7,15','手机号不正确',1),//phone手机号码
        array('title', '1,15', '职称长度小于15', 2, 'length', 0), //native_place职称
        array('education', '1,15', '学历小于15个字', 2, 'length', 0), //politics_status 学历
        array('degree', '2,15', '学位小于15个字', 2, 'length', 0), //duty学位
        array('post1', '1,15', '职务小于15个字', 2, 'length', 0), //duty职务
        array('acaspe', '2,150', '学术专长小于150个字', 2, 'length', 0), //duty学术专长
        array('belong', '2,30', '所在单位小于30个字', 2, 'length', 0), //duty所在单位
        array('qq', '5,15', 'QQ不正确', 2, 'length', 0), //qq
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
