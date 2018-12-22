<?php
namespace Student\Model;
use Think\Model;

class OutsideModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('phone','require','联系电话必填',1),
        array('external','require','校外指导单位必填',1),
        array('address','require','单位地址必填',1),
        array('name','require','拟定题目必填',1),
        array('w_name','require','校外指导老师姓名必填',1),
        array('w_sex','require','校外指导老师性别必填',1),
        array('w_degree','require','校外指导老师学位必填',1),
        array('w_zhicheng','require','校外指导老师技术职位必填',1),
        array('w_direction','require','校外指导老师研究方向必填',1),
        array('tea_number','require','必须选择指导老师',1),
        array('tea_name','require','必须选择指导老师',1),
        array('content','require','申请理由必填',1),
        array('content2','require','指导单位意见必填',1),
    );


}
