<?php
namespace Director\Model;
use Think\Model;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class SquadModel extends Model {
    //protected $patchValidate = true;
    protected $_validate = array(
        array('dep_id','require','专业必须',1),//name姓名  
        array('zz_name','require','答辩组长必须',1),//name姓名  
        array('zz_number','require','答辩组长必须填写',1),//name姓名
        array('name','require','答辩小组名称必须填写',1,'',2),//name姓名
        array('place','require','答辩地点必须填写',1,'',2),//name姓名
        array('dtime','require','答辩时间必须填写',1),//name姓名
        array('hao','checkhao','答辩组成员至少两个以上',1,'callback'),//name姓名
    );
    public function checkhao($arr){
        count($arr)<2?FALSE:true;
    }
}