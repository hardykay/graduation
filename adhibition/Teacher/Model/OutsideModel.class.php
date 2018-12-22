<?php
namespace Teacher\Model;
use Think\Model;

class OutsideModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('shenhe1','require','审核意见必须',1),
        array('content3','require','指导老师意见必填',1),   

    );

//	phone char(20) comment '联系电话',
//	email VARCHAR(64) comment '电子邮箱',
//	external varchar(50) comment '校外指导单位',
//	address VARCHAR(50) comment '单位地址',
//	name VARCHAR(200) comment '课题名称',
//	w_name char(10) comment '校外指导老师姓名',
//	w_sex char(2) comment '校外指导老师性别',
//	w_degree VARCHAR(20) comment '校外指导老师学位',
//	w_zhicheng VARCHAR(20) comment '校外指导老师职称',
//	w_direction VARCHAR(20) comment '校外指导老师研究方向',
//	tea_number CHAR(20) comment '校内指导老师工号',
//	url VARCHAR(200) comment '附件',
//	shenhe1  TINYINT DEFAULT 0 comment '指导老师是否评阅0，1', 
//	shenhe2  TINYINT DEFAULT 0 comment '专业负责人是否评阅0.1',
//	shenhe3  TINYINT DEFAULT 0 comment '院长是否评阅0.1',
//	content text comment '申请理由',
//	content2 text comment '校外指导老师意见',
}
