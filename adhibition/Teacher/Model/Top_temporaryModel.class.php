<?php
namespace Teacher\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class Top_temporaryModel extends Model {
//    protected $patchValidate = true;
    protected $_validate = array(
        array('name','require','课题名称必须填写',1),//name姓名
        array('content','require','内容必须填写',1),
        array('tea_number','require','请求超时',1),//name姓名
        array('top','require','请求超时',1),
    );
}