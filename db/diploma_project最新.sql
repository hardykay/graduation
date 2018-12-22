/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : diploma_project

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-12-22 22:12:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_alteration
-- ----------------------------
DROP TABLE IF EXISTS `tp_alteration`;
CREATE TABLE `tp_alteration` (
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `name` varchar(20) DEFAULT NULL COMMENT '学生姓名',
  `dep_college` int(11) DEFAULT NULL COMMENT '学院编号',
  `dep_major` int(11) DEFAULT NULL COMMENT '专业编号',
  `college_name` varchar(50) DEFAULT NULL COMMENT '学院名称',
  `major_name` varchar(50) DEFAULT NULL COMMENT '专业名称',
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `top_name` varchar(50) DEFAULT NULL COMMENT '课题名称',
  `new_name` varchar(50) DEFAULT NULL COMMENT '新的课题名称',
  `cause` text COMMENT '变更原因',
  `plan` text COMMENT '新题目内容、进度计划及完成任务的保障措施',
  `adviser` text COMMENT '指导教师',
  `adviser_audit` tinyint(4) DEFAULT '0' COMMENT '指导老师审核，0未审核，1通过审核，2退回修改',
  `college` text COMMENT '系主任的意见',
  `college_audit` tinyint(4) DEFAULT '0' COMMENT '系主任审核结果，0未审核，1通过审核，2退回修改',
  `stu_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '学生提交的时间',
  `tea_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '指导老师审核时间',
  `college_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '系主任审核时间',
  KEY ` stu` (`stu_number`) USING BTREE,
  KEY `dep_college` (`dep_college`),
  KEY `dep_major` (`dep_major`),
  KEY `top_id` (`top_id`),
  KEY `top_name` (`top_name`),
  KEY `adviser_audit` (`adviser_audit`),
  KEY `college_audit` (`college_audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='题目变更';

-- ----------------------------
-- Records of tp_alteration
-- ----------------------------

-- ----------------------------
-- Table structure for tp_chaos_topic
-- ----------------------------
DROP TABLE IF EXISTS `tp_chaos_topic`;
CREATE TABLE `tp_chaos_topic` (
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `volunt` tinyint(4) NOT NULL COMMENT '志愿，1,2,3志愿',
  UNIQUE KEY `stu_number_2` (`stu_number`,`volunt`),
  UNIQUE KEY `top_id` (`top_id`,`stu_number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-盲选课题表';

-- ----------------------------
-- Records of tp_chaos_topic
-- ----------------------------

-- ----------------------------
-- Table structure for tp_class
-- ----------------------------
DROP TABLE IF EXISTS `tp_class`;
CREATE TABLE `tp_class` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  `dep_father` int(11) DEFAULT NULL COMMENT '专业编号',
  PRIMARY KEY (`dep_id`),
  KEY `dep_id` (`dep_id`),
  KEY `dep_father` (`dep_father`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='班级';

-- ----------------------------
-- Records of tp_class
-- ----------------------------
INSERT INTO `tp_class` VALUES ('6', '一班', '5');
INSERT INTO `tp_class` VALUES ('7', '一班', '6');
INSERT INTO `tp_class` VALUES ('8', '铀矿', '7');
INSERT INTO `tp_class` VALUES ('9', '1班', '8');
INSERT INTO `tp_class` VALUES ('10', '1班', '9');

-- ----------------------------
-- Table structure for tp_college
-- ----------------------------
DROP TABLE IF EXISTS `tp_college`;
CREATE TABLE `tp_college` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`dep_id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='学院表';

-- ----------------------------
-- Records of tp_college
-- ----------------------------
INSERT INTO `tp_college` VALUES ('3', '基础科学学院');
INSERT INTO `tp_college` VALUES ('4', '铀矿学院');
INSERT INTO `tp_college` VALUES ('5', '测试学院');

-- ----------------------------
-- Table structure for tp_draft
-- ----------------------------
DROP TABLE IF EXISTS `tp_draft`;
CREATE TABLE `tp_draft` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `paperpath` varchar(200) NOT NULL COMMENT '论文文件路径',
  `t` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '上传时间',
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态0.1',
  `pingyu` text COMMENT '论文草稿评语',
  `check_url` varchar(200) DEFAULT NULL COMMENT '审核附件',
  KEY `stu_number` (`stu_number`),
  KEY `top_id` (`top_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文草稿';

-- ----------------------------
-- Records of tp_draft
-- ----------------------------
INSERT INTO `tp_draft` VALUES ('2', '3', '/Public/Student/2/2018-04-30/5ae73c36bffe1.pdf', '2018-04-30 23:55:09', '/Public/Student/2/2018-04-30/5ae73c36d19ee.pdf', '1', '', '');
INSERT INTO `tp_draft` VALUES ('1', '2', '/Public/Student/1/2018-05-01/5ae740b461c5e.pdf', '2018-05-01 00:13:40', '', '0', null, null);

-- ----------------------------
-- Table structure for tp_excel_word
-- ----------------------------
DROP TABLE IF EXISTS `tp_excel_word`;
CREATE TABLE `tp_excel_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 名称',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `url` varchar(200) DEFAULT NULL COMMENT ' 文件',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模板表格';

-- ----------------------------
-- Records of tp_excel_word
-- ----------------------------

-- ----------------------------
-- Table structure for tp_finalize
-- ----------------------------
DROP TABLE IF EXISTS `tp_finalize`;
CREATE TABLE `tp_finalize` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `paperpath` varchar(200) NOT NULL COMMENT '论文文件路径',
  `t` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态0.1.2',
  `pingyu` text,
  `check_url` varchar(200) DEFAULT NULL COMMENT '审核附件',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文定稿';

-- ----------------------------
-- Records of tp_finalize
-- ----------------------------
INSERT INTO `tp_finalize` VALUES ('2', '3', '/Public/Student/2/2018-04-30/5ae73c822e1e6.pdf', '2018-05-01 00:08:39', '/Public/Student/2/2018-04-30/5ae73c823e284.pdf', '1', null, null);

-- ----------------------------
-- Table structure for tp_grade_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_grade_group`;
CREATE TABLE `tp_grade_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评阅小组编号',
  `name` char(20) NOT NULL DEFAULT '' COMMENT '评阅名称',
  `domain` char(20) NOT NULL COMMENT '专业',
  `tea_number` char(20) NOT NULL COMMENT '创建的教师',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='建立评阅小组';

-- ----------------------------
-- Records of tp_grade_group
-- ----------------------------

-- ----------------------------
-- Table structure for tp_grade_group_teacher
-- ----------------------------
DROP TABLE IF EXISTS `tp_grade_group_teacher`;
CREATE TABLE `tp_grade_group_teacher` (
  `id` int(11) NOT NULL,
  `tea_number` char(20) NOT NULL COMMENT '教师工号',
  `number_people` int(11) NOT NULL DEFAULT '0' COMMENT '带的人数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评阅老师';

-- ----------------------------
-- Records of tp_grade_group_teacher
-- ----------------------------

-- ----------------------------
-- Table structure for tp_inspect
-- ----------------------------
DROP TABLE IF EXISTS `tp_inspect`;
CREATE TABLE `tp_inspect` (
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `progress` text COMMENT '进展情况',
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态,0,1,2 ',
  KEY `top_id` (`top_id`),
  KEY `stu_number` (`stu_number`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='中期检查';

-- ----------------------------
-- Records of tp_inspect
-- ----------------------------

-- ----------------------------
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) DEFAULT NULL COMMENT '答辩编号',
  `tea_number` varchar(20) DEFAULT NULL COMMENT '教师工号',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩组成员';

-- ----------------------------
-- Records of tp_member
-- ----------------------------

-- ----------------------------
-- Table structure for tp_outside
-- ----------------------------
DROP TABLE IF EXISTS `tp_outside`;
CREATE TABLE `tp_outside` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `stu_name` char(20) NOT NULL,
  `dep_college` int(11) NOT NULL COMMENT '学院',
  `college` varchar(20) DEFAULT NULL COMMENT '学院',
  `dep_major` int(11) NOT NULL COMMENT '专业',
  `major` varchar(20) DEFAULT NULL COMMENT '专业',
  `phone` char(20) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(64) DEFAULT NULL COMMENT '电子邮箱',
  `external` varchar(50) DEFAULT NULL COMMENT '校外指导单位',
  `address` varchar(50) DEFAULT NULL COMMENT '单位地址',
  `name` varchar(200) DEFAULT NULL COMMENT '课题名称',
  `w_name` char(10) DEFAULT NULL COMMENT '校外指导老师姓名',
  `w_sex` char(2) DEFAULT NULL COMMENT '校外指导老师性别',
  `w_degree` varchar(20) DEFAULT NULL COMMENT '校外指导老师学位',
  `w_zhicheng` varchar(20) DEFAULT NULL COMMENT '校外指导老师职称',
  `w_direction` varchar(20) DEFAULT NULL COMMENT '校外指导老师研究方向',
  `tea_name` varchar(20) DEFAULT NULL,
  `tea_number` char(20) DEFAULT NULL COMMENT '校内指导老师工号',
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `shenhe1` tinyint(4) DEFAULT '0' COMMENT '指导老师是否评阅0，1，2是没通过',
  `shenhe3` tinyint(4) DEFAULT '0' COMMENT '专业负责人是否评阅0.1',
  `content` text COMMENT '申请理由',
  `content2` text COMMENT '校外指导老师意见',
  `content3` text COMMENT '校内指导老师意见',
  `content5` text COMMENT '专业负责人审核的意见',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `stu_number` (`stu_number`),
  KEY `dep_college` (`dep_college`),
  KEY `dep_major` (`dep_major`),
  KEY `shenhe1` (`shenhe1`),
  KEY `shenhe3` (`shenhe3`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='校外毕业设计申请表';

-- ----------------------------
-- Records of tp_outside
-- ----------------------------

-- ----------------------------
-- Table structure for tp_overall
-- ----------------------------
DROP TABLE IF EXISTS `tp_overall`;
CREATE TABLE `tp_overall` (
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `stu_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `top_name` varchar(100) DEFAULT NULL COMMENT '课题名称',
  `tea_name` varchar(20) DEFAULT NULL COMMENT '指导老师',
  `tea_number` char(20) DEFAULT NULL COMMENT '指导老师工号',
  `z_id` int(11) DEFAULT NULL COMMENT '专业编号',
  `z_name` varchar(20) DEFAULT NULL COMMENT '专业名称',
  `b_id` int(11) DEFAULT NULL COMMENT '班级编号',
  `b_name` varchar(20) DEFAULT NULL COMMENT '班级名称',
  `grade` tinyint(4) DEFAULT NULL COMMENT '平时成绩',
  `zdgrade` tinyint(4) DEFAULT NULL COMMENT '指导老师评分',
  `pingyuegrade` tinyint(4) DEFAULT NULL COMMENT '评阅老师评分',
  `dabiangrade` tinyint(4) DEFAULT NULL COMMENT '答辩评分',
  `score` tinyint(4) DEFAULT NULL COMMENT '总成绩',
  `genera` text COMMENT '总评',
  `content1` text COMMENT '指导老师评语',
  `content2` text COMMENT '评阅老师评语',
  `content3` text COMMENT '答辩评语',
  `pinyue` tinyint(4) DEFAULT '0' COMMENT '评阅老师是否评阅0，1',
  `zhidao` tinyint(4) DEFAULT '0' COMMENT '指导老师是否评阅0，1',
  `dabian` tinyint(4) DEFAULT '0' COMMENT '答辩老师是否评阅，答辩是否结束（0没答辩，1完结，2进入二辩，3优秀答辩）',
  `rele` tinyint(4) DEFAULT '0' COMMENT '是否发布0,1',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`),
  KEY `z_id` (`z_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='总评成绩';

-- ----------------------------
-- Records of tp_overall
-- ----------------------------
INSERT INTO `tp_overall` VALUES ('2', '软件二', '3', '第三课题', '李四', '4', '5', '软件工程', '6', '一班', '100', '100', null, null, null, null, '&lt;p&gt;可以可以&lt;/p&gt;\r\n', null, null, '0', '1', '0', '0');

-- ----------------------------
-- Table structure for tp_report
-- ----------------------------
DROP TABLE IF EXISTS `tp_report`;
CREATE TABLE `tp_report` (
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `wordpath` varchar(200) DEFAULT NULL COMMENT '开题报告文件路径',
  `w_wordpath` varchar(200) DEFAULT NULL COMMENT '开题报告外文翻译原文文件路径',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态0,1,2',
  `url` varchar(200) DEFAULT NULL COMMENT '审核附件',
  `opinion` text COMMENT '审核意见',
  `queren` tinyint(4) DEFAULT '0' COMMENT '学生是否确认，0。没有，1确认',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`) USING BTREE,
  KEY `audit` (`audit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='开题报告';

-- ----------------------------
-- Records of tp_report
-- ----------------------------

-- ----------------------------
-- Table structure for tp_review
-- ----------------------------
DROP TABLE IF EXISTS `tp_review`;
CREATE TABLE `tp_review` (
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `tea_number` char(20) DEFAULT NULL COMMENT '评阅教师工号',
  `dep_id` int(11) DEFAULT NULL COMMENT '专业编号',
  `audit` tinyint(4) DEFAULT '0' COMMENT '评阅01',
  UNIQUE KEY `stu` (`stu_number`),
  KEY `dep_id` (`dep_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分配评阅老师';

-- ----------------------------
-- Records of tp_review
-- ----------------------------

-- ----------------------------
-- Table structure for tp_scale
-- ----------------------------
DROP TABLE IF EXISTS `tp_scale`;
CREATE TABLE `tp_scale` (
  `id` tinyint(4) NOT NULL COMMENT '编号',
  `grade` tinyint(4) DEFAULT NULL COMMENT '平时成绩比例',
  `zdgrade` tinyint(4) DEFAULT NULL COMMENT '指导老师评分比例',
  `pingyuegrade` tinyint(4) DEFAULT NULL COMMENT '评阅老师评分比例',
  `dabiangrade` tinyint(4) DEFAULT NULL COMMENT '答辩评分比例',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='总评成绩比例';

-- ----------------------------
-- Records of tp_scale
-- ----------------------------

-- ----------------------------
-- Table structure for tp_school_carrousel
-- ----------------------------
DROP TABLE IF EXISTS `tp_school_carrousel`;
CREATE TABLE `tp_school_carrousel` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `head` varchar(50) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_school_carrousel
-- ----------------------------

-- ----------------------------
-- Table structure for tp_school_college
-- ----------------------------
DROP TABLE IF EXISTS `tp_school_college`;
CREATE TABLE `tp_school_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` text COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='院内公告通知表';

-- ----------------------------
-- Records of tp_school_college
-- ----------------------------

-- ----------------------------
-- Table structure for tp_school_govern
-- ----------------------------
DROP TABLE IF EXISTS `tp_school_govern`;
CREATE TABLE `tp_school_govern` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` longtext COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';

-- ----------------------------
-- Records of tp_school_govern
-- ----------------------------

-- ----------------------------
-- Table structure for tp_school_notice
-- ----------------------------
DROP TABLE IF EXISTS `tp_school_notice`;
CREATE TABLE `tp_school_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` longtext COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';

-- ----------------------------
-- Records of tp_school_notice
-- ----------------------------

-- ----------------------------
-- Table structure for tp_specialty
-- ----------------------------
DROP TABLE IF EXISTS `tp_specialty`;
CREATE TABLE `tp_specialty` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  `dep_father` int(11) DEFAULT NULL COMMENT '学院编号',
  PRIMARY KEY (`dep_id`),
  KEY `specol` (`dep_father`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='专业';

-- ----------------------------
-- Records of tp_specialty
-- ----------------------------
INSERT INTO `tp_specialty` VALUES ('5', '软件工程', '3');
INSERT INTO `tp_specialty` VALUES ('6', '计算机科学与技术', '3');
INSERT INTO `tp_specialty` VALUES ('7', '铀矿', '4');
INSERT INTO `tp_specialty` VALUES ('8', '测试专业', '5');
INSERT INTO `tp_specialty` VALUES ('9', '测试专业2', '5');

-- ----------------------------
-- Table structure for tp_squad
-- ----------------------------
DROP TABLE IF EXISTS `tp_squad`;
CREATE TABLE `tp_squad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_id` int(11) NOT NULL COMMENT '专业编号',
  `zz_name` char(20) NOT NULL COMMENT '答辩组长',
  `zz_number` char(20) NOT NULL COMMENT '组长工号',
  `tea_number` char(20) DEFAULT NULL COMMENT '答辩秘书教师工号',
  `tea_name` char(20) DEFAULT NULL COMMENT '答辩秘书姓名',
  `name` varchar(200) NOT NULL COMMENT '答辩小组名称',
  `place` varchar(50) NOT NULL COMMENT '答辩地点',
  `dtime` char(100) NOT NULL COMMENT '答辩开始时间',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩小组';

-- ----------------------------
-- Records of tp_squad
-- ----------------------------

-- ----------------------------
-- Table structure for tp_squad_stu
-- ----------------------------
DROP TABLE IF EXISTS `tp_squad_stu`;
CREATE TABLE `tp_squad_stu` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '答辩小组编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `dep_id` int(11) NOT NULL DEFAULT '0' COMMENT '专业编号',
  `squad` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否有答辩小组0没答辩，1，已经通过，2进入二辩，3进入优秀',
  KEY `id` (`id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩学生';

-- ----------------------------
-- Records of tp_squad_stu
-- ----------------------------

-- ----------------------------
-- Table structure for tp_student
-- ----------------------------
DROP TABLE IF EXISTS `tp_student`;
CREATE TABLE `tp_student` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `pwd` char(32) NOT NULL COMMENT '密码',
  `dep_college` int(11) DEFAULT NULL COMMENT '学院',
  `dep_major` int(11) DEFAULT NULL COMMENT '专业',
  `dep_class` int(11) DEFAULT NULL COMMENT '班级',
  `phone` char(12) DEFAULT NULL COMMENT '手机号',
  `email` varchar(64) DEFAULT NULL COMMENT '常用邮箱',
  `qq` varchar(20) DEFAULT NULL COMMENT 'qq',
  `native_place` varchar(100) DEFAULT NULL COMMENT '籍贯',
  `politics_status` varchar(50) DEFAULT NULL COMMENT '政治面貌',
  `age` varchar(50) DEFAULT NULL COMMENT '年龄',
  `duty` varchar(50) DEFAULT NULL COMMENT '职务',
  PRIMARY KEY (`stu_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生';

-- ----------------------------
-- Records of tp_student
-- ----------------------------
INSERT INTO `tp_student` VALUES ('1', '软件一', 'c4ca4238a0b923820dcc509a6f75849b', '3', '5', '6', '', '1755808168@qq.com', '', '', '', null, '');
INSERT INTO `tp_student` VALUES ('13', '铀矿三', 'c51ce410c124a10e0db5e4b97fc2af39', '4', '7', '8', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('2', '软件二', 'c81e728d9d4c2f636f067f89cc14862c', '3', '5', '6', '', '1755808168@qq.com', '', '', '', null, '');
INSERT INTO `tp_student` VALUES ('22', '铀矿亿', 'b6d767d2f8ed5d21a44b0e5886680cb9', '4', '7', '8', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('3', '软件三', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', '5', '6', '', '1755808168@qq.com', '', '', '', null, '');
INSERT INTO `tp_student` VALUES ('33', '有苦anger', '182be0c5cdcd5072bb1864cdee4d3d6e', '4', '7', '8', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('4', '既可以', 'a87ff679a2f3e71d9181a67b7542122c', '3', '6', '7', '', '1755808168@qq.com', '', '', '', null, '');
INSERT INTO `tp_student` VALUES ('5', '即可而', 'e4da3b7fbbce2345d7772b0674a318d5', '3', '6', '7', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('6', '即可三', '1679091c5a880faf6fb5e6087eb1b2dc', '3', '6', '7', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('xs1', '学生1', 'e8950adf172d527b1a32d6e6f05b5c7c', '5', '8', '9', '', '12432143@qq.com', '', '', '', null, '');
INSERT INTO `tp_student` VALUES ('xs2', '学生2', 'b1aedee0f39dfe1a2a1a833021d1e0a3', '5', '8', '9', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('xs3', '学生3', 'f992a8f45d788c8eea4297be4f841694', '5', '8', '9', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('xs4', '学生四', '246400392f9c821a970aab626b298d81', '5', '9', '10', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('xs5', '学生五', '4b75f6bb0c3983ebda31c25947ec19ab', '5', '9', '10', null, null, null, null, null, null, null);
INSERT INTO `tp_student` VALUES ('xs6', '学生六', 'd3245d42bc09e9e77cbf4cbf8f827f44', '5', '9', '10', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for tp_stu_topic
-- ----------------------------
DROP TABLE IF EXISTS `tp_stu_topic`;
CREATE TABLE `tp_stu_topic` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-选题表';

-- ----------------------------
-- Records of tp_stu_topic
-- ----------------------------
INSERT INTO `tp_stu_topic` VALUES ('1', '2');
INSERT INTO `tp_stu_topic` VALUES ('3', '2');
INSERT INTO `tp_stu_topic` VALUES ('2', '3');
INSERT INTO `tp_stu_topic` VALUES ('xs1', '7');
INSERT INTO `tp_stu_topic` VALUES ('xs2', '7');
INSERT INTO `tp_stu_topic` VALUES ('xs4', '7');
INSERT INTO `tp_stu_topic` VALUES ('xs5', '8');

-- ----------------------------
-- Table structure for tp_task
-- ----------------------------
DROP TABLE IF EXISTS `tp_task`;
CREATE TABLE `tp_task` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `tea_number` char(20) NOT NULL COMMENT '教师工号',
  `dep_id` int(11) NOT NULL,
  `research` text COMMENT '研究主要内容',
  `basic` text COMMENT '涉及知识和基本要求',
  `expect` text COMMENT '预期目标',
  `arrange` text COMMENT '进度安排',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  `audit` tinyint(4) DEFAULT '0' COMMENT '是否通过审核0未审核，1通过，2退回修改',
  `opinion` text COMMENT '审核意见',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top` (`top_id`),
  KEY `dep_id` (`dep_id`),
  KEY `audit` (`audit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师下达任务书';

-- ----------------------------
-- Records of tp_task
-- ----------------------------
INSERT INTO `tp_task` VALUES ('xs1', '7', 'js1', '8', '&lt;h3&gt;研究的主要内容&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/h3&gt;\r\n', '&lt;h3&gt;研究的主要内容&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/h3&gt;\r\n', '&lt;h3&gt;研究的主要内容&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/h3&gt;\r\n', '&lt;h3&gt;研究的主要内容&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/h3&gt;\r\n', '/Public/Teacher/js1/2018-12-05/5c07c198862b6.docx', '0', null);

-- ----------------------------
-- Table structure for tp_teacher
-- ----------------------------
DROP TABLE IF EXISTS `tp_teacher`;
CREATE TABLE `tp_teacher` (
  `tea_number` char(20) NOT NULL COMMENT '教师工号',
  `name` varchar(20) DEFAULT NULL COMMENT '教师姓名',
  `pwd` char(32) DEFAULT NULL COMMENT '密码',
  `dep_id` int(11) DEFAULT NULL COMMENT '所属学院',
  `title` varchar(30) DEFAULT NULL COMMENT '职称',
  `education` varchar(30) DEFAULT NULL COMMENT '学历',
  `degree` varchar(30) DEFAULT NULL COMMENT '学位',
  `post1` varchar(30) DEFAULT NULL COMMENT '职务',
  `acaspe` text COMMENT '学术专长',
  `belong` varchar(60) DEFAULT NULL COMMENT '所在单位',
  `phone` char(20) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(64) DEFAULT NULL COMMENT '电子邮箱',
  `qq` varchar(20) DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为管理员',
  `dean` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为院长',
  `specialty` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为系主任',
  `adviser` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否为指导老师',
  `total_stu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '该老师所带的学生数的最大值',
  `nowadays_stu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教师当前所带的学生数',
  PRIMARY KEY (`tea_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='教师';

-- ----------------------------
-- Records of tp_teacher
-- ----------------------------
INSERT INTO `tp_teacher` VALUES ('1', '友谊', 'c4ca4238a0b923820dcc509a6f75849b', '4', '', '', null, '', '', '', '', '1755808168@qq.com', '', '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('2', '幼儿', 'c81e728d9d4c2f636f067f89cc14862c', '4', null, null, null, null, null, null, null, null, null, '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('3', '有三', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '4', '', '', null, '', '', '', '', '1755808168@qq.com', '', '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('4', '李四', 'a87ff679a2f3e71d9181a67b7542122c', '3', '', '', null, '', '', '', '', '1755808168@qq.com', '', '0', '1', '1', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('5', '张三', 'e4da3b7fbbce2345d7772b0674a318d5', '3', '', '', null, '', '', '', '', '1755808168@qq.com', '', '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('6', '王五', '1679091c5a880faf6fb5e6087eb1b2dc', '3', '', '', null, '', '', '', '', '1755808168@qq.com', '', '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('cs1', 'cs1', 'b12efe4e2b53de51a261421f77a3cbef', '5', '', '', null, '', '', '', '', '1755808168@qq.com', '', '1', '1', '1', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('js1', '教师1', '43e5a7e8d9730d52b36182c13a31044a', '5', '', '', null, '', '', '', '', '1332@qq.com', '', '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('js2', '教师2', 'ce7b327b9b10484eb1c1f42aa3651ff8', '5', null, null, null, null, null, null, null, null, null, '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('js3', '教师三 ', 'e169b0aef187dc58849d51bdd0b6e573', '5', null, null, null, null, null, null, null, null, null, '0', '0', '0', '1', '0', '0');
INSERT INTO `tp_teacher` VALUES ('myisadmin', '我是管理员', 'e8b42101857dd881915871a246df2e64', null, null, null, null, null, null, null, null, '1755808168@qq.com', null, '1', '0', '0', '1', '0', '0');

-- ----------------------------
-- Table structure for tp_teacher_specialty
-- ----------------------------
DROP TABLE IF EXISTS `tp_teacher_specialty`;
CREATE TABLE `tp_teacher_specialty` (
  `dep_id` int(11) NOT NULL COMMENT '专业编号',
  `tea_number` char(20) NOT NULL COMMENT '教师工号',
  `topic_strat` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '申请课题开始的时间',
  `topic_close` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '申请课题结束的时间',
  `choice_strat` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '学生选择课题开始时间',
  `choice_close` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '学生选择课题结束时间',
  `teacher_strat` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '指导老师选择学生开始时间',
  `teacher_close` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '指导老师选择学生结束时间 ',
  `paper_close` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '论文提交结束时间',
  UNIQUE KEY `dep` (`dep_id`),
  KEY `tea` (`tea_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='专业毕设负责人，所负责的专业';

-- ----------------------------
-- Records of tp_teacher_specialty
-- ----------------------------
INSERT INTO `tp_teacher_specialty` VALUES ('5', '4', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-05-15 00:00:00');
INSERT INTO `tp_teacher_specialty` VALUES ('6', '4', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-04-29 00:00:00', '2018-05-09 00:00:00', '2018-05-09 00:00:00');
INSERT INTO `tp_teacher_specialty` VALUES ('8', 'cs1', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-27 00:00:00');
INSERT INTO `tp_teacher_specialty` VALUES ('9', 'cs1', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-03 00:00:00', '2018-12-12 00:00:00', '2018-12-20 00:00:00');

-- ----------------------------
-- Table structure for tp_topic
-- ----------------------------
DROP TABLE IF EXISTS `tp_topic`;
CREATE TABLE `tp_topic` (
  `top_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课题编号',
  `name` varchar(100) DEFAULT NULL COMMENT '课题名称',
  `tea_number` char(20) DEFAULT NULL COMMENT '教师工号',
  `tea_name` varchar(20) DEFAULT NULL COMMENT '教师姓名',
  `genre` char(5) DEFAULT NULL COMMENT '类型(值为：论文或设计)',
  `seientific` char(2) DEFAULT NULL COMMENT '是否科研，值为：是 否',
  `practice` char(2) DEFAULT NULL COMMENT '是否为生产实际，值为：是否',
  `content` text COMMENT '内容及要求',
  `dep_id` int(11) DEFAULT NULL COMMENT '所属学院',
  `opt` tinyint(4) DEFAULT '1' COMMENT '可否选择该可以0表示不可以，1表示可以',
  `top_type` tinyint(4) DEFAULT NULL COMMENT '课题类型，1盲选，2指定选、3团队课题，4外出毕设',
  `url` varchar(200) DEFAULT NULL COMMENT ' 指导老师上传附件',
  `number` int(11) DEFAULT '0' COMMENT '总选题人数',
  `youxiao` tinyint(4) NOT NULL DEFAULT '0' COMMENT '盲选，有效被选择人数',
  `yixuan` tinyint(4) NOT NULL DEFAULT '0' COMMENT '已经选的学生',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态0.1.2',
  `advice` text COMMENT '专业负责人审核的意见（团队课题是院长）',
  `check_url` varchar(200) DEFAULT NULL COMMENT '系主任上传的附件',
  PRIMARY KEY (`top_id`),
  KEY `tea_number` (`tea_number`),
  KEY `top_id` (`top_id`),
  KEY `dep_id` (`dep_id`),
  CONSTRAINT `tp_topic_ibfk_1` FOREIGN KEY (`tea_number`) REFERENCES `tp_teacher` (`tea_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='课题表';

-- ----------------------------
-- Records of tp_topic
-- ----------------------------
INSERT INTO `tp_topic` VALUES ('1', '第一个课题', '4', '李四', '论文', '是', '是', '&lt;p&gt;45365546546546&lt;/p&gt;\r\n', '3', '1', '1', null, '0', '1', '0', '1', null, null);
INSERT INTO `tp_topic` VALUES ('2', '第二课题', '4', '李四', '论文', '否', '否', '&lt;p&gt;2&lt;/p&gt;\r\n', '3', '1', '1', null, '0', '2', '2', '1', null, null);
INSERT INTO `tp_topic` VALUES ('3', '第三课题', '4', '李四', '论文', '是', '是', '&lt;p&gt;撒旦撒打算&lt;/p&gt;\r\n', '3', '1', '1', null, '0', '2', '1', '1', null, null);
INSERT INTO `tp_topic` VALUES ('4', '第一答辩小组', '4', '李四', '论文', '是', '是', '&lt;p&gt;收购法国&lt;/p&gt;\r\n', '3', '1', '1', null, '0', '2', '0', '0', null, null);
INSERT INTO `tp_topic` VALUES ('5', '这是教师1的忙选课题', 'js1', '教师1', '论文', '是', '是', '&lt;p&gt;要求&lt;/p&gt;\r\n', '5', '1', '1', null, '0', '2', '0', '1', '', null);
INSERT INTO `tp_topic` VALUES ('6', '这是忙选课题', 'js1', '教师1', '论文', '是', '是', '&lt;p&gt;要求&lt;/p&gt;\r\n', '5', '1', '1', '/Public/Teacher/js1/2018-12-05/5c07c042de49b.docx', '0', '2', '0', '1', null, null);
INSERT INTO `tp_topic` VALUES ('7', '这是团队课题', 'js1', '教师1', '论文', '是', '是', '&lt;p&gt;要求&lt;/p&gt;\r\n', '5', '0', '3', '/Public/Teacher/js1/2018-12-05/5c07c080561b6.docx', '0', '0', '3', '1', '', null);
INSERT INTO `tp_topic` VALUES ('8', '这是指定选课题', 'js1', '教师1', '设计', '是', '是', '&lt;p&gt;要求&lt;/p&gt;\r\n', '5', '0', '2', '/Public/Teacher/js1/2018-12-05/5c07c0b094cfe.docx', '0', '0', '1', '1', null, null);

-- ----------------------------
-- Table structure for tp_topic_f
-- ----------------------------
DROP TABLE IF EXISTS `tp_topic_f`;
CREATE TABLE `tp_topic_f` (
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `dep_id` int(11) DEFAULT NULL COMMENT '专业',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态，0未审核，1通过审核，没通过的直接删除节省内存',
  `rele` tinyint(4) DEFAULT '0' COMMENT '是否发布0没发布，1发布（可以选题），2发布，学生可以查看结果',
  KEY `top` (`top_id`),
  KEY `dep_id` (`dep_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课题课题适合的专业';

-- ----------------------------
-- Records of tp_topic_f
-- ----------------------------
INSERT INTO `tp_topic_f` VALUES ('1', '5', '1', '2');
INSERT INTO `tp_topic_f` VALUES ('1', '6', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('2', '5', '1', '2');
INSERT INTO `tp_topic_f` VALUES ('2', '6', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('3', '5', '1', '2');
INSERT INTO `tp_topic_f` VALUES ('3', '6', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('4', '5', '0', '0');
INSERT INTO `tp_topic_f` VALUES ('4', '6', '0', '0');
INSERT INTO `tp_topic_f` VALUES ('5', '8', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('5', '9', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('6', '8', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('6', '9', '1', '0');
INSERT INTO `tp_topic_f` VALUES ('7', '8', '1', '2');
INSERT INTO `tp_topic_f` VALUES ('7', '9', '1', '2');
INSERT INTO `tp_topic_f` VALUES ('8', '9', '1', '0');

-- ----------------------------
-- Table structure for tp_top_temporary
-- ----------------------------
DROP TABLE IF EXISTS `tp_top_temporary`;
CREATE TABLE `tp_top_temporary` (
  `tea_number` char(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `top` tinyint(4) NOT NULL COMMENT '课题类型1盲选，2指定选，3团队选',
  `content` text NOT NULL COMMENT '内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='申请课题-保存表';

-- ----------------------------
-- Records of tp_top_temporary
-- ----------------------------

-- ----------------------------
-- Table structure for tp_waichu
-- ----------------------------
DROP TABLE IF EXISTS `tp_waichu`;
CREATE TABLE `tp_waichu` (
  `top_id` int(11) DEFAULT '0',
  `stu_number` char(20) NOT NULL DEFAULT '',
  `dep_id` int(11) NOT NULL DEFAULT '0',
  KEY `topws` (`top_id`),
  KEY `stu` (`stu_number`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_waichu
-- ----------------------------

-- ----------------------------
-- Table structure for tp_weekprogress
-- ----------------------------
DROP TABLE IF EXISTS `tp_weekprogress`;
CREATE TABLE `tp_weekprogress` (
  `bianhao` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `jinzhan` text COMMENT '工作完成情况',
  `down` text COMMENT '下阶段工作内容',
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `t` datetime DEFAULT NULL COMMENT '提交时间',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态012',
  `check_url` varchar(200) DEFAULT NULL COMMENT '审核附件',
  `pingyu` text COMMENT '评语',
  PRIMARY KEY (`bianhao`),
  KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`),
  KEY `audit` (`audit`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='学生周进展报告';

-- ----------------------------
-- Records of tp_weekprogress
-- ----------------------------

-- ----------------------------
-- View structure for tp_view_cla_stu_ove
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_cla_stu_ove`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_cla_stu_ove` AS select `cl`.`dep_id` AS `dep_id`,`cl`.`dep_name` AS `dep_name`,`cl`.`dep_father` AS `dep_father`,sum((case when isnull(`st`.`stu_number`) then 0 else 1 end)) AS `renshu`,sum((case when isnull(`ov`.`stu_number`) then 0 else 1 end)) AS `tijiao`,sum((case when (`ov`.`score` > 89) then 1 else 0 end)) AS `you`,sum((case when ((`ov`.`score` > 79) and (`ov`.`score` < 90)) then 1 else 0 end)) AS `lang`,sum((case when ((`ov`.`score` > 69) and (`ov`.`score` < 80)) then 1 else 0 end)) AS `zhong`,sum((case when ((`ov`.`score` > 60) and (`ov`.`score` < 70)) then 1 else 0 end)) AS `jige`,sum((case when ((`ov`.`score` >= 0) and (`ov`.`score` < 60)) then 1 else 0 end)) AS `bujige`,sum((case when isnull(`ov`.`score`) then 1 else 0 end)) AS `kong` from (`tp_class` `cl` join (`tp_student` `st` left join `tp_overall` `ov` on((`st`.`stu_number` = `ov`.`stu_number`)))) where (`cl`.`dep_id` = `st`.`dep_class`) group by `cl`.`dep_id` ;

-- ----------------------------
-- View structure for tp_view_col_spe
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_col_spe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_col_spe` AS select `tp_college`.`dep_name` AS `college`,`tp_specialty`.`dep_id` AS `dep_id`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_specialty`.`dep_father` AS `dep_father` from (`tp_college` join `tp_specialty`) where (`tp_college`.`dep_id` = `tp_specialty`.`dep_father`) ;

-- ----------------------------
-- View structure for tp_view_grade
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_grade`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_grade` AS select `s`.`stu_number` AS `stu_number`,`s`.`name` AS `name`,`s`.`dep_college` AS `dep_college`,`s`.`dep_major` AS `dep_major`,`s`.`dep_class` AS `dep_class`,`o`.`top_id` AS `top_id`,`o`.`top_name` AS `top_name`,`o`.`tea_name` AS `tea_name`,`o`.`tea_number` AS `tea_number`,`o`.`z_id` AS `z_id`,`o`.`z_name` AS `z_name`,`o`.`b_id` AS `b_id`,`o`.`b_name` AS `b_name`,`o`.`grade` AS `grade`,`o`.`zdgrade` AS `zdgrade`,`o`.`pingyuegrade` AS `pingyuegrade`,`o`.`dabiangrade` AS `dabiangrade`,`o`.`score` AS `score`,`o`.`genera` AS `genera`,`o`.`content1` AS `content1`,`o`.`content2` AS `content2`,`o`.`content3` AS `content3`,`o`.`pinyue` AS `pinyue`,`o`.`zhidao` AS `zhidao`,`o`.`dabian` AS `dabian`,`o`.`rele` AS `rele` from (`tp_student` `s` left join `tp_overall` `o` on((`s`.`stu_number` = `o`.`stu_number`))) order by `s`.`stu_number` ;

-- ----------------------------
-- View structure for tp_view_rssstt
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_rssstt`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_rssstt` AS select distinct `r`.`tea_number` AS `review1`,`s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`r`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`top_id` AS `top_id`,`t`.`name` AS `name` from ((((`tp_review` `r` join `tp_student` `s`) join `tp_specialty` `d`) join `tp_stu_topic` `st`) join `tp_topic` `t`) where ((`r`.`stu_number` = `s`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`s`.`stu_number` = `st`.`stu_number`) and (`st`.`top_id` = `t`.`top_id`)) ;

-- ----------------------------
-- View structure for tp_view_spe_stu_ove
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_spe_stu_ove`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_spe_stu_ove` AS select `sp`.`dep_id` AS `dep_id`,`sp`.`dep_name` AS `dep_name`,`sp`.`dep_father` AS `dep_father`,sum((case when isnull(`st`.`stu_number`) then 0 else 1 end)) AS `renshu`,sum((case when isnull(`ov`.`stu_number`) then 0 else 1 end)) AS `tijiao`,sum((case when (`ov`.`score` > 89) then 1 else 0 end)) AS `you`,sum((case when ((`ov`.`score` > 79) and (`ov`.`score` < 90)) then 1 else 0 end)) AS `lang`,sum((case when ((`ov`.`score` > 69) and (`ov`.`score` < 80)) then 1 else 0 end)) AS `zhong`,sum((case when ((`ov`.`score` > 60) and (`ov`.`score` < 70)) then 1 else 0 end)) AS `jige`,sum((case when ((`ov`.`score` >= 0) and (`ov`.`score` < 60)) then 1 else 0 end)) AS `bujige`,sum((case when isnull(`ov`.`score`) then 1 else 0 end)) AS `kong` from (`tp_specialty` `sp` join (`tp_student` `st` left join `tp_overall` `ov` on((`st`.`stu_number` = `ov`.`stu_number`)))) where (`sp`.`dep_id` = `st`.`dep_major`) group by `sp`.`dep_id` ;

-- ----------------------------
-- View structure for tp_view_spe_top
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_spe_top`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_spe_top` AS select `s`.`dep_id` AS `dep_id`,`s`.`dep_name` AS `dep_name`,`s`.`dep_father` AS `dep_father`,`t`.`opt` AS `opt`,`t`.`top_type` AS `top_type`,`f`.`audit` AS `audit`,`t`.`top_id` AS `top_id`,`f`.`rele` AS `rele` from ((`tp_specialty` `s` join `tp_topic` `t`) join `tp_topic_f` `f`) where ((`s`.`dep_id` = `f`.`dep_id`) and (`t`.`top_id` = `f`.`top_id`)) ;

-- ----------------------------
-- View structure for tp_view_ssstd
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_ssstd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_ssstd` AS select distinct `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`dr`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_stu_topic` `st`) join `tp_topic` `t`) join `tp_draft` `dr`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`t`.`top_id` = `st`.`top_id`) and (`dr`.`stu_number` = `s`.`stu_number`)) ;

-- ----------------------------
-- View structure for tp_view_sstsi
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_sstsi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_sstsi` AS select `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number`,`i`.`audit` AS `audit` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_topic` `t`) join `tp_stu_topic` `st`) join `tp_inspect` `i`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`st`.`top_id` = `t`.`top_id`) and (`i`.`stu_number` = `s`.`stu_number`)) ;

-- ----------------------------
-- View structure for tp_view_sststf
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_sststf`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_sststf` AS select distinct `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`f`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_topic` `t`) join `tp_stu_topic` `st`) join `tp_finalize` `f`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`st`.`top_id` = `t`.`top_id`) and (`f`.`stu_number` = `s`.`stu_number`)) ;

-- ----------------------------
-- View structure for tp_view_std
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_std`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_std` AS select `s`.`dep_college` AS `dep_college`,`s`.`dep_major` AS `dep_major`,`s`.`dep_class` AS `dep_class`,`s`.`stu_number` AS `stu_number`,`s`.`name` AS `stu_name`,`t`.`name` AS `t_name`,`t`.`top_id` AS `top_id`,`t`.`tea_number` AS `tea_number`,`t`.`tea_name` AS `tea_name`,`c`.`dep_name` AS `college`,`sp`.`dep_name` AS `specialty`,`cl`.`dep_name` AS `class` from (((((`tp_stu_topic` `st` join `tp_topic` `t`) join `tp_student` `s`) join `tp_college` `c`) join `tp_specialty` `sp`) join `tp_class` `cl`) where ((`st`.`stu_number` = `s`.`stu_number`) and (`st`.`top_id` = `t`.`top_id`) and (`s`.`dep_college` = `c`.`dep_id`) and (`s`.`dep_major` = `sp`.`dep_id`) and (`s`.`dep_class` = `cl`.`dep_id`)) ;

-- ----------------------------
-- View structure for tp_view_student
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_student`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_student` AS select `tp_college`.`dep_name` AS `college`,`tp_specialty`.`dep_name` AS `specialty`,`tp_class`.`dep_name` AS `class`,`tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_student`.`dep_college` AS `dep_college`,`tp_student`.`dep_major` AS `dep_major`,`tp_student`.`dep_class` AS `dep_class`,`tp_student`.`phone` AS `phone`,`tp_student`.`email` AS `email` from (((`tp_student` join `tp_college`) join `tp_specialty`) join `tp_class`) where ((`tp_student`.`dep_college` = `tp_college`.`dep_id`) and (`tp_student`.`dep_major` = `tp_specialty`.`dep_id`) and (`tp_student`.`dep_class` = `tp_class`.`dep_id`)) ;

-- ----------------------------
-- View structure for tp_view_stu_dep
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_stu_dep`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_dep` AS select `tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_student`.`phone` AS `phone`,`tp_student`.`email` AS `email`,`tp_student`.`qq` AS `qq` from (`tp_specialty` join `tp_student`) where (`tp_specialty`.`dep_id` = `tp_student`.`dep_major`) ;

-- ----------------------------
-- View structure for tp_view_stu_top
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_stu_top`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_top` AS select `co`.`dep_name` AS `college`,`cl`.`dep_name` AS `class`,`sp`.`dep_name` AS `specialty`,`st`.`stu_number` AS `stu_number`,`st`.`name` AS `stu_name`,`st`.`dep_college` AS `dep_college`,`st`.`dep_major` AS `dep_major`,`st`.`dep_class` AS `dep_class`,`to`.`top_id` AS `top_id`,`to`.`name` AS `name`,`to`.`tea_number` AS `tea_number`,`to`.`tea_name` AS `tea_name` from (((((`tp_college` `co` join `tp_class` `cl`) join `tp_specialty` `sp`) join `tp_student` `st`) join `tp_topic` `to`) join `tp_stu_topic` `s_t`) where ((`co`.`dep_id` = `st`.`dep_college`) and (`sp`.`dep_id` = `st`.`dep_major`) and (`cl`.`dep_id` = `st`.`dep_class`) and (`st`.`stu_number` = `s_t`.`stu_number`) and (`s_t`.`top_id` = `to`.`top_id`)) group by `st`.`stu_number` ;

-- ----------------------------
-- View structure for tp_view_stu_top_c
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_stu_top_c`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_top_c` AS select `tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_chaos_topic`.`top_id` AS `top_id`,`tp_chaos_topic`.`volunt` AS `volunt`,`tp_student`.`phone` AS `phone`,`tp_student`.`qq` AS `qq` from ((`tp_student` join `tp_specialty`) join `tp_chaos_topic`) where ((`tp_student`.`stu_number` = `tp_chaos_topic`.`stu_number`) and (`tp_student`.`dep_major` = `tp_specialty`.`dep_id`)) ;

-- ----------------------------
-- View structure for tp_view_teacher
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_teacher`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_teacher` AS select `tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`name` AS `name`,`tp_college`.`dep_id` AS `dep_id`,`tp_college`.`dep_name` AS `dep_name`,`tp_teacher`.`email` AS `email` from (`tp_teacher` join `tp_college`) where (`tp_teacher`.`dep_id` = `tp_college`.`dep_id`) ;

-- ----------------------------
-- View structure for tp_view_tea_rev
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_tea_rev`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tea_rev` AS select `tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`name` AS `name`,`tp_review`.`audit` AS `audit`,`tp_teacher`.`dep_id` AS `dep_id`,`tp_review`.`stu_number` AS `stu_number` from (`tp_teacher` join `tp_review`) where (`tp_teacher`.`tea_number` = `tp_review`.`tea_number`) ;

-- ----------------------------
-- View structure for tp_view_topic
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_topic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_topic` AS select `tp_topic_f`.`top_id` AS `top_id`,`tp_topic_f`.`dep_id` AS `zy`,`tp_topic_f`.`audit` AS `zy_audit`,`tp_topic`.`name` AS `name`,`tp_topic`.`tea_number` AS `tea_number`,`tp_topic`.`tea_name` AS `tea_name`,`tp_topic`.`genre` AS `genre`,`tp_topic`.`seientific` AS `seientific`,`tp_topic`.`practice` AS `practice`,`tp_topic`.`content` AS `content`,`tp_topic`.`opt` AS `opt`,`tp_topic`.`top_type` AS `top_type`,`tp_topic`.`youxiao` AS `youxiao`,`tp_topic`.`audit` AS `audit`,`tp_topic`.`dep_id` AS `dep_id`,`tp_topic_f`.`rele` AS `rele` from (`tp_topic_f` join `tp_topic`) where (`tp_topic`.`top_id` = `tp_topic_f`.`top_id`) ;

-- ----------------------------
-- View structure for tp_view_tts
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_tts`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tts` AS select `t`.`dep_id` AS `dep_id`,`t`.`dep_name` AS `dep_name`,`t`.`dep_father` AS `dep_father`,`s`.`tea_number` AS `tea_number`,`s`.`topic_strat` AS `topic_strat`,`s`.`topic_close` AS `topic_close`,`s`.`choice_strat` AS `choice_strat`,`s`.`choice_close` AS `choice_close`,`s`.`teacher_strat` AS `teacher_strat`,`s`.`teacher_close` AS `teacher_close`,`s`.`paper_close` AS `paper_close` from (`tp_teacher_specialty` `s` join `tp_specialty` `t`) where (`s`.`dep_id` = `t`.`dep_id`) group by `t`.`dep_id` ;
DROP TRIGGER IF EXISTS `tp_topic_blind_add`;
DELIMITER ;;
CREATE TRIGGER `tp_topic_blind_add` AFTER INSERT ON `tp_chaos_topic` FOR EACH ROW begin
update tp_topic set number=number+1 where top_id=new.top_id;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `tp_topic_blind_choice`;
DELIMITER ;;
CREATE TRIGGER `tp_topic_blind_choice` AFTER DELETE ON `tp_chaos_topic` FOR EACH ROW begin
 
update tp_topic set number=number-1 where top_id=old.top_id;
 
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `tp_choice_topic`;
DELIMITER ;;
CREATE TRIGGER `tp_choice_topic` AFTER INSERT ON `tp_stu_topic` FOR EACH ROW begin
update tp_topic set  yixuan=yixuan+1 where top_id=new.top_id;
delete from tp_chaos_topic where stu_number=new.stu_number;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `tp_delete_topic`;
DELIMITER ;;
CREATE TRIGGER `tp_delete_topic` AFTER DELETE ON `tp_stu_topic` FOR EACH ROW begin 
update tp_topic set  yixuan=yixuan-1 where top_id=old.top_id;
end
;;
DELIMITER ;
