<?php
namespace Dean\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class TopicModel extends Model {
//    protected $patchValidate = true;
    protected $_validate = array(
        array('audit','require','审核意见必选',1),//politics_status 政治面貌
   );
}