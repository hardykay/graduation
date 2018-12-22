<?php
namespace Teacher\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TopicModel extends Model {
//    protected $patchValidate = true;
    protected $_validate = array(
        array('name','require','课题名称必须填写',1),//name姓名
        array('content','require','内容必须填写',1),//native_place籍贯
    );
}