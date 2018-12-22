/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : diploma_project

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-11 12:03:54
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='班级';

-- ----------------------------
-- Table structure for tp_college
-- ----------------------------
DROP TABLE IF EXISTS `tp_college`;
CREATE TABLE `tp_college` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`dep_id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='学院表';

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='模板表格';

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
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) DEFAULT NULL COMMENT '答辩编号',
  `tea_number` varchar(20) DEFAULT NULL COMMENT '教师工号',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩组成员';

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='专业';

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='答辩小组';

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='课题表';

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

-- ----------------------------
-- View structure for tp_view_waichu
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_waichu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_waichu` AS select `o`.`shenhe1` AS `shenhe1`,`o`.`shenhe2` AS `shenhe2`,`o`.`shenhe3` AS `shenhe3`,`o`.`stu_number` AS `stu_number`,`o`.`stu_name` AS `stu_name`,`o`.`id` AS `id`,`o`.`dep_college` AS `dep_college`,`o`.`college` AS `college`,`o`.`dep_major` AS `dep_major`,`o`.`major` AS `major`,`w`.`top_id` AS `top_id`,`o`.`phone` AS `phone`,`o`.`tea_number` AS `tea_number`,`o`.`tea_name` AS `tea_name` from (`tp_outside` `o` left join `tp_waichu` `w` on((`o`.`stu_number` = `w`.`stu_number`))) ;

-- ----------------------------
-- View structure for tp_view_yu_topic
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_yu_topic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_yu_topic` AS select `tp_topic`.`name` AS `name`,`tp_topic`.`tea_number` AS `tea_number`,`tp_topic`.`tea_name` AS `tea_name`,`tp_topic`.`genre` AS `genre`,`tp_chaos_topic`.`stu_number` AS `stu_number`,`tp_chaos_topic`.`volunt` AS `volunt`,`tp_topic`.`top_id` AS `top_id` from (`tp_topic` join `tp_chaos_topic`) where (`tp_topic`.`top_id` = `tp_chaos_topic`.`top_id`) order by `tp_chaos_topic`.`volunt` ;

-- ----------------------------
-- View structure for tp_view_tea_top
-- ----------------------------
DROP VIEW IF EXISTS `tp_view_tea_top`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tea_top` AS select `tp_topic`.`name` AS `name`,`tp_topic`.`tea_name` AS `tea_name`,`tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`phone` AS `phone`,`tp_teacher`.`email` AS `email`,`tp_teacher`.`qq` AS `qq`,`tp_topic`.`top_id` AS `top_id`,`tp_college`.`dep_name` AS `dep_name` from ((`tp_topic` join `tp_teacher`) join `tp_college`) where ((`tp_topic`.`tea_number` = `tp_teacher`.`tea_number`) and (`tp_topic`.`dep_id` = `tp_college`.`dep_id`)) group by `tp_topic`.`top_id` ;
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
