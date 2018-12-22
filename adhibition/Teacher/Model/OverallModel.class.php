<?php
namespace Teacher\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class OverallModel extends Model {
//    protected $patchValidate = true;
    protected $_validate = array(
        array('grade','bijiao','平时成绩必须大于或等于0，且小于等于100',1,'callback'),//name姓名
        array('zdgrade','bijiao','论文成绩必须大于或等于0，且小于等于100',1,'callback'),//native_place籍贯
        array('content1','require','指导老师的评语不能为空',1),
    );
    
    public function  bijiao($val){
        if($val>=0 && $val<=100){
            return true;
        }
        return FALSE;
    }
}