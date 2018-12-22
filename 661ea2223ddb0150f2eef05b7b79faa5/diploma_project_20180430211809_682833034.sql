/* This file is created by MySQLReback 2018-04-30 21:18:09 */
 /* 创建表结构 `tp_alteration` */
 DROP TABLE IF EXISTS `tp_alteration`;/* MySQLReback Separation */ CREATE TABLE `tp_alteration` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032228','于丽丽','1','2','基础科学学院','计算机科学与技术(专升本）','95','基于Mongodb数据库的******','基于J2EE技术的旅游管理系统设计与实现','&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;Mongodb数据库&lt;span id=&quot;pastemarkerend&quot;&gt;没有接触过，不会做。&lt;/span&gt;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','&lt;p&gt;旅游管理系统具体有管理员，会员，订单，酒店，站内新闻，友情链接，景点等功能&lt;/p&gt;
','&lt;p&gt;同意更改&lt;/p&gt;
','1','&lt;p&gt;可以&lt;/p&gt;
','1','2018-01-04 11:54:22','2018-01-04 11:54:22','2018-01-04 11:54:22'),('201606032222','王国华','1','2','基础科学学院','计算机科学与技术(专升本）','47','基于B/S架构的会议室预约管理系统','货运管理系统的设计与实现','&lt;p&gt;对会议室&amp;nbsp;不是很了解，&lt;/p&gt;
','&lt;p&gt;个人信息的管理模块，&amp;nbsp;司机信息的管理模块，反馈信息管理模块，储值客户信息管理模块，价值配置管理模块等各模块的实现&lt;/p&gt;
&lt;p style=&quot;margin: 0pt;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 12pt; font-style: normal; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;&lt;br&gt;
&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意 &lt;br&gt;
&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-01-10 09:14:31','2018-01-10 09:14:31','2018-01-10 09:14:31'),('201606032120','侯庆莹','1','2','基础科学学院','计算机科学与技术(专升本）','119','基于微信开发平台的东营旅游公众号的设计与实现','快递管理系统的设计与实现','&lt;p&gt;原来的题目涉及到的知识点有些没有学过。&lt;/p&gt;
','&lt;p&gt;新题目内容：搭建一个快递管理系统。利用快递信息管理，管理快递信息的签收情况和快递的取件情况，对快递进行查询、修改、删除等操作；&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;利用快递的邮寄管理来查询、修改、删除、添加需要邮寄的快递；通过留言板管理用户的留言和回复，也可以对留言进行查询；&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;2018年3月10号前，完成选题、调研，查阅资料，撰写开题报告。&lt;/p&gt;

&lt;p&gt;2018年3月10日前, 完成题目的调研和资料分析。&lt;/p&gt;

&lt;p&gt;2018年4月10日前, 完成软件的需求分析。&lt;/p&gt;

&lt;p&gt;2018年4月30日前，完成进行软件的设计。&lt;/p&gt;

&lt;p&gt;2018年5月25日前，完成对软件进行编码，并进一步测试、调试和完善软件。&lt;/p&gt;

&lt;p&gt;2018年6月10日前，完成毕业论文，提交毕业论文。&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意修改&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-01-29 21:32:50','2018-01-29 21:32:50','2018-01-29 21:32:50'),('201406012103','陈相礼','1','1','基础科学学院','计算机科学与技术','56','超市管理系统的设计与开发','基于Java Web技术的户外商品网上购物系统的设计与实现','&lt;p&gt;结合实习项目&lt;/p&gt;
','&lt;table width=&quot;501&quot; height=&quot;60&quot; style=&quot;width: 375.75pt;&quot;&gt;
&lt;colgroup&gt;&lt;col width=&quot;501&quot;&gt;
&lt;/colgroup&gt;

&lt;tbody&gt;

	&lt;tr height=&quot;60&quot;&gt;

		&lt;td x:str=&quot;&quot; height=&quot;60&quot; width=&quot;501&quot; style=&quot; vertical-align: middle; border-width: 0.5pt; border-color: rgb(0, 0, 0); height: 45pt; width: 375.75pt;&quot;&gt;网上购物系统的主要功能，前台包括会员注册，商品浏览、查询以及购买（购物车、订单管理）等功能，后台进行店铺管理、商品管理、顾客管理、订单处理等功能。&lt;/td&gt;

	&lt;/tr&gt;

&lt;/tbody&gt;

&lt;/table&gt;


&lt;table width=&quot;265&quot; height=&quot;60&quot; style=&quot;width: 198.75pt;&quot;&gt;
&lt;colgroup&gt;&lt;col width=&quot;265&quot;&gt;
&lt;/colgroup&gt;

&lt;tbody&gt;

	&lt;tr height=&quot;60&quot;&gt;

		&lt;td x:str=&quot;&quot; height=&quot;60&quot; width=&quot;265&quot; style=&quot; vertical-align: middle; border-width: 0.5pt; border-color: rgb(0, 0, 0); height: 45pt; width: 198.75pt;&quot;&gt;所需知识：B/S开发、数据库。开发工具：eclipse。数据库：Mysql等。&lt;/td&gt;

	&lt;/tr&gt;

&lt;/tbody&gt;

&lt;/table&gt;

&lt;span id=&quot;pastemarkerend&quot;&gt; &lt;/span&gt;
&lt;span id=&quot;pastemarkerend&quot;&gt; &lt;/span&gt;','&lt;p&gt;同意&lt;/p&gt;
','1','&lt;p&gt;543543543543&lt;/p&gt;
','1','2018-04-10 18:12:11','2018-04-10 18:12:11','2018-04-10 18:12:11');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014141','张亭亭','1','3','基础科学学院','软件工程','47','基于B/S架构的会议室预约管理系统','基于B/S架构的答疑平台的设计与实现','&lt;p&gt;更改后的课题与实习内容相近&lt;/p&gt;
','&lt;p&gt;该平台可以实现用户之间的交流，帮助用户提高学习质量和学习效率，解决了传统面对面答疑的局限性，给人们的生活带来方便。&lt;/p&gt;
','&lt;p&gt;同意&lt;br&gt;

&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-01-10 09:14:42','2018-01-10 09:14:42','2018-01-10 09:14:42');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014114','李赛赛','1','3','基础科学学院','软件工程','71','基于移动互联的程序设计训练平台','CRM客户关系管理系统的设计与实现','&lt;p&gt;外出培训学习了JavaWeb开发，想用JavaWeb技术完成一个自己的项目。&lt;/p&gt;
','&lt;p&gt;课题介绍：开发一个基于web的客户关系管理系统。客户关系管理系统主要内容包括系统总框架界面，系统首页，客户管理，商机管理，系统管理等模块以及模块对应的数据表的设计与实现。&lt;/p&gt;

&lt;p&gt;所用知识及设备：使用JavaWeb开发，数据库是Mysql&lt;/p&gt;

&lt;p&gt;进度计划：&lt;/p&gt;

&lt;p&gt;第1周：确定论文主题方向，进行论文题目的筛选。&lt;/p&gt;

&lt;p&gt;第2周：以论文题目为核心，对相关资料进行收集和翻阅。&lt;/p&gt;

&lt;p&gt;第3周：对已搜集的资料加以整理，论证分析论文的可行性、实际性，将论文题目和大致范围确定下来，进行开题报告。&lt;/p&gt;

&lt;p&gt;第4周：整合已有资料、构筑论文的大纲。&lt;/p&gt;

&lt;p&gt;第5—9周：专心外城项目程序的编写，实现程序功能，使得程序可完整运行。&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;

&lt;p&gt;第9—12周：根据查找的数据和相关资料，进行深入详实的论文编写工作，对论文编写过程中所发现的问题，研究其解决方案，推敲整合，并进行修改完善，准备论文中期检查。&lt;/p&gt;

&lt;p&gt;第13-15周：完成论文的初稿部分，向指导老师寻求意见，优化论文的结构，润色语句，修改不当之处，补充不足之处。&lt;/p&gt;

&lt;p&gt;第15-16周，论文资料整合，最终定稿，为最终的答辩做好各方面准备，熟悉论文内容，增强自己对论文内容的把握，进行一定的思维发散，设计论文答辩。&lt;/p&gt;

&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;完成任务的保障措施&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;：&lt;/span&gt;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;1 :因为本人在校外已有工作，毕业设计的进行是在校外导师的督促和指导下完成。&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;2：除了校外指导老师外，也会与校内指导老师进行沟通，以确保完成进度。&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意。请及时沟通，确保每个环节按时保质完成。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-01-29 21:33:09','2018-01-29 21:33:09','2018-01-29 21:33:09');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014129','王明莹','1','3','基础科学学院','软件工程','36','基于Android的旅游路线规划系统','基于web的保险销售公司业务管理系统','&lt;p style=&quot;margin-top: 10px; margin-bottom: 10px; padding: 0px;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Microsoft YaHei&quot;, arial, 宋体, sans-serif, tahoma; white-space: pre-wrap; word-wrap: break-word; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); min-height: 55px;&quot;&gt;经过一段时间的准备，觉得原定论文题目与我现阶段学习研究方向不一致，在我在学校学习阶段没有学习与&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;Android&lt;span id=&quot;pastemarkerend&quot;&gt; 有关的东西，而我现在已经在相关公司实习，&lt;/span&gt;&lt;/span&gt;来不及进行全面的深入研究&lt;span style=&quot;color: rgb(51, 51, 51); text-align: center;&quot;&gt;Android&lt;span id=&quot;pastemarkerend&quot;&gt; &lt;/span&gt;&lt;/span&gt;，为了更好的做好毕业设计（论文），顺利完成论文，与指导教师协商后，需更换题目，对Java web做深入研究。&lt;span id=&quot;pastemarkerend&quot;&gt; &lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;新题目内容：基于web的保险销售公司业务管理系统主要内容包括系统总框架界面，系统首页，系统管理，人员管理，代理人管理，团队管理，保险公司管理，保单管理，中介管理，协议管理，报表管理等模块以及模块对应的数据表的设计与实现。该项目基于SSM框架使用Oracle数据进行开发，通过设计该课题，可以加深对网络、j2EE企业级开发、数据库、SQL语言的认识，提高对这些知识的综合应用水平，提高开发应用软件的综合能力。开发出的系统有一定的实用价值。&lt;/p&gt;

&lt;p&gt;进度计划：2018年—01月——2018年—02月&amp;nbsp; &amp;nbsp; &amp;nbsp; 确定开发任务书及编写需求分析&lt;/p&gt;


&lt;blockquote&gt;

&lt;blockquote style=&quot;margin: 0px 0px 0px 40px; border: none; padding: 0px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp;2018年—02月——2018年—03月&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;设计数据库及项目原型并搭建项目环境，编写详细设计及数据库设计&lt;/span&gt;&lt;/span&gt;&lt;br&gt;

&lt;br&gt;

&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp;2018年—03月——2018年—04月&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/span&gt;&lt;span id=&quot;pastemarkerend&quot; style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp;分模块对项目进行开发&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp;2018年—04月——2018年—05月&lt;/span&gt;&lt;span id=&quot;pastemarkerend&quot; style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 对项目进行测试并完善项目，并撰写设计论文&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp;2018年—05月——2018年—06月&lt;/span&gt;&lt;span id=&quot;pastemarkerend&quot; style=&quot;color: rgb(0, 0, 0); font-style: normal;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 继续完善项目，修改设计论文，准备毕业答辩&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

&lt;/blockquote&gt;

&lt;/blockquote&gt;

&lt;p&gt;&lt;span id=&quot;pastemarkerend&quot;&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;完成任务的保障措施：每周向指导老师汇报项目进度&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;，并且此项目是跟随我所在实习公司的开发进度进行的，所以毕业答辩前会完成。&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;


&lt;blockquote style=&quot;margin: 0 0 0 40px; border: none; padding: 0px;&quot;&gt;

&lt;blockquote style=&quot;margin: 0 0 0 40px; border: none; padding: 0px;&quot;&gt;
&lt;/blockquote&gt;

&lt;/blockquote&gt;
','&lt;p&gt;同意题目变更&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:33:22','2018-01-29 21:33:22','2018-01-29 21:33:22');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014128','王洁','1','3','基础科学学院','软件工程','39','基于Android的实验室设备管理系统','慧医在线APP','&lt;p&gt;经过这几天的准备,觉得原定论文题目与我现阶段学习研究方向不一致，在学校学习阶段和培训阶段都没学习与Android 有关的东西，&lt;br&gt;

而我现在已经在相关公司实习，来不及进行全面的深入研究Android,为了更好的做好毕业设计，顺利完成论文，&lt;br&gt;

与指导教师协商后，需更换题目。&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;新题内容:功能模块&lt;br&gt;

预约页面:由预约、我的预约、医药百科图片组成：(1)预约页面列表行形式显示历史预约记录，点击列表行进入下一页，显示预约详情；&lt;br&gt;

点击预约图标，进入下一页预约页面，系统引导患者按医院-科室-医生的路径，找到有预约意向的医生。&lt;br&gt;

医院页面由桌面式导航组成，每个入口对应一所医院，用户从一个入口进入一家医院后，只处理该医院的科室，如要跳转至其他医院，必须先回到入口汇总界面；&lt;br&gt;

可增加更多的医院入口。可通过省、市、县联动下拉选，定位医院。&lt;br&gt;

科室页面搜索框，点击调出科室一级抽屉标签，内容为“皮肤科、眼科、妇产科、消化内科、耳鼻喉、儿科、内分泌科、神经内科”，&lt;br&gt;

选定后，当前页面刷新为符合查询条件的医生列表页；&lt;br&gt;

医生列表页由医生信息的列表行组成，列表行包括：头像、姓名。点击列表行进入预约页面；未登录用户只能操作到这一步。&lt;br&gt;

对未登录用户，在预约页面之前给一个注册/登录页面，提示未登录用户登录。&lt;br&gt;

之后进入预约录入信息页面，录入表单包含“患者姓名、患者电话、就诊时间、所患疾病、病情描述、预约按钮”；&lt;br&gt;

患者姓名、电话支持单行文本输入，所患疾病、病情描述支持多行文本输入，就诊时间下拉选，x月、x日、上午/下午（申请咨询，就诊时间不必填）。&lt;br&gt;

填写完患者、联系电话、就诊时间、所患疾病、病情描述，点击预约，预约完成。预约成功提示toast“预约成功”。&lt;br&gt;

在我的预约处可查看我的预约记录，同时预约将推送至医生app端-我的预约功能处，医生可登录app查看预约情况。&lt;br&gt;

(2)医疗百科：显示医疗百科的图片。&lt;br&gt;

预约给患者、医生赋使用权限。&lt;br&gt;

进度计划:2017年11月到2017年12月确定开发任务书及编写需求分析&lt;br&gt;

2017年—01月——2017年—02月&amp;nbsp; 设计数据库及项目原型并搭建项目环境，编写详细设计及数据库设计&lt;br&gt;

2018年—02月——2018年—04月&amp;nbsp; 分模块对项目进行开发&lt;br&gt;

2018年—04月——2018年—05月&amp;nbsp; 对项目进行测试并完善项目，并撰写设计论文&lt;br&gt;

2018年—05月——2018年—06月&amp;nbsp; 继续完善项目，修改设计论文，准备毕业答辩&amp;nbsp; &lt;br&gt;

完成任务的保障措施:两周向老师汇报项目进度,保证完成任务&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;变更后题目业务逻辑有些单薄，可以在细节上增加创新点和工作量。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:33:32','2018-01-29 21:33:32','2018-01-29 21:33:32');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201307042142','张浩哲','1','1','基础科学学院','计算机科学与技术','27','教科研项目管理系统的设计与实现','VR技术在计算机中的组装与维护的应用研究','&lt;p&gt;&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51);Microsoft Yahei&amp;quot;, arial, sans-serif; white-space: pre-wrap;&quot;&gt;经过一段时间的准备，觉得原定论文题目太大，范围太宽，涉及面过广，来不及进行全面的深入研究， 为了更好的做好毕业设计（论文），顺利完成论文，需更换题目，对其中一个问题 做深入研究。&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); letter-spacing: -0.81px; position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 2705px; height: 169px; top: 6397px; left: 1788px; z-index: 214;&quot;&gt;虚拟现实技术即虚拟现实。虚拟现实&lt;span style=&quot;color: rgb(68, 68, 68);&quot;&gt;(Virtual&amp;nbsp;Reality简称VR)是近年来出现的高&lt;/span&gt;&lt;/p&gt;

&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); letter-spacing: -0.77px; position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 6595px; height: 169px; top: 6700px; left: 1448px; z-index: 221;&quot;&gt;新技术。从本质上来说，虚拟现实是一种先进的计算机用户接口，它通过给用户同时提供&lt;/p&gt;

&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); letter-spacing: -0.77px; position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 6595px; height: 169px; top: 7001px; left: 1448px; z-index: 223;&quot;&gt;视、听、触等各种直观而又自然的实时感知交互手段，因此具有多感知性、存在感、交互&lt;/p&gt;

&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); letter-spacing: -0.77px; position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 6595px; height: 169px; top: 7303px; left: 1448px; z-index: 225;&quot;&gt;性、自主性等重要特征。虚拟现实技术并不是一项单一的技术，而是多种技术综合后产生&lt;/p&gt;

&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); letter-spacing: -0.77px; position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 6595px; height: 169px; top: 7604px; left: 1448px; z-index: 227;&quot;&gt;的，其核心的关键技术主要有动态环境建模技术、立体显示和传感器技术、系统开发工具&lt;/p&gt;

&lt;p style=&quot;margin: 0px; padding: 0px;4fb4000e10a6f524ccbf85710050001&amp;quot;, 宋体; color: rgb(68, 68, 68); position: absolute; word-break: keep-all; white-space: nowrap; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.004) 1px 1px 1px; width: 4567px; height: 169px; top: 7907px; left: 1448px; z-index: 228; letter-spacing: -0.73px;&quot;&gt;应用技术、实时三维图形生成技术、系统集成技术等五大项&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意变更题目&lt;br&gt;
&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-01-10 09:14:52','2018-01-10 09:14:52','2018-01-10 09:14:52');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014109','郝丽娜','1','3','基础科学学院','软件工程','15','文件解密解密系统','办公自动化系统','&lt;p&gt;经过一段时间的查阅资料和准备，觉得原定论文题目与我现阶段学习研究方向不一致，我现在已经在相关公司实习，来不及进行全面的深入研究与课题相关的技术，为了更好的做好毕业设计（论文），顺利完成论文，与指导教师协商后，需更换题目。 &lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','&lt;p&gt; 新题目：办公自动化系统&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;主要内容：包括系统总框架界面，个人办公，公文管理，签报管理，公文考评，工作安排，工作流转，督察督办，企业资料等模块以及模块对应的数据表的设计与实现。该项目基于SSM框架使用Oracle数据进行开发，通过设计该课题，可以加深对网络、j2EE企业级开发、数据库、SQL语言的认识，提高对这些知识的综合应用水平，提高开发应用软件的综合能力。开发出的系统有一定的实用价值。&lt;span id=&quot;pastemarkerend&quot;&gt; &lt;br&gt;

&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;&lt;span id=&quot;pastemarkerend&quot;&gt;完成任务的保障措施：每周向指导老师汇报项目进度&amp;nbsp;，并且此项目是跟随我所在实习公司的开发进度进行的，所以毕业答辩前能保证完成。&lt;span id=&quot;pastemarkerend&quot;&gt;&lt;/span&gt;&lt;br&gt;

&lt;/span&gt;&lt;/p&gt;

&lt;p&gt;&lt;span id=&quot;pastemarkerend&quot;&gt;&lt;br&gt;

&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;该生更改的题目，符合毕业设计要求的工作量及难度，能够对学生的实际应用能力有所提高，同意更改！&amp;nbsp;&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:33:41','2018-01-29 21:33:41','2018-01-29 21:33:41'),('201406012139','羊国聪','1','1','基础科学学院','计算机科学与技术','106','基于物联网的远程监控系统的设计与实现','基于微信平台的在线商城小程序开发','&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; 微信平台是目前国内最大用户群的移动互联网应用，它的相关用户体验已经非常的完善，用户的自用度非常的高。如今，微信已成为一种潮流，几乎每个人的手机里都可以看到这个软件的存在，它具有广泛的市场需求。所以我对该题目的兴趣非常大，其中应用到的技术也是我学习的方向，因此我想把题目改成基于微信平台的在线商城小程序开发，这样我不仅可以运用自己学到的技术还可以接触到新的领域提高自己，再加上我对之前的题目不是很了解，所以以上就是我想变更题目的原因，希望可以得到老师们的许可。&lt;/p&gt;
','&lt;p&gt;新题目内容：基于周边的微信公众平台，从功能上描述有四大功能，分别是咨询传媒、生活圈、服务指南、用户角色。每一个打的模块下又有许多字模块功能，便于人们对周边信息的检索。&lt;/p&gt;
&lt;p&gt;进度计划：开学之前完成开题报告，四月份之前完成基本架构，五月份之前完成系统&lt;/p&gt;
&lt;p&gt;完成任务的保障措施：有过类似项目的经验，认识项目相关的同学，可以随时指导我。&lt;/p&gt;
','&lt;p&gt;技术可行，审核通过&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:33:50','2018-01-29 21:33:50','2018-01-29 21:33:50');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032114','孙健','1','2','基础科学学院','计算机科学与技术(专升本）','122','基于web的城市二手商品交易系统的设计和实现','基于Java EE技术《信息管理系统》网站设计','&lt;p&gt;对于变更前的题目不太熟悉，对于更改后的题目相对熟悉，有利于后期程序的编写和论文的完成。&amp;nbsp;&lt;/p&gt;
','&lt;p style=&quot;margin: 0pt; line-height: 20pt; text-indent: 21pt; mso-char-indent-count: 2.0000; mso-line-height-rule: exactly;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;内容：信息管理系统使用市场上流行的&lt;/span&gt;&lt;/span&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;SSH&lt;/span&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;框架技术作为支撑并且应用新型的&lt;/span&gt;&lt;/span&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;MySql&lt;/span&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;数据库提高数据并发访问量，改善传统的高校信息系统集群运行效率低下、数据查询、更新和维护极大不便的弱点。此次开发过程中注重实际的业务流程，力求系统的全面性以及兼容性，使得本系统作为高校信息系统集群的基类信息管理系统是可靠的，论文将从系统的技术实现、系统设计、系统架构以及系统实际开发几个方面进行介绍。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;黑体&quot;&gt;进度安排&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;第一周：根据论文题目进行课题分析&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;第二、三周：查找并收集&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;整理、消化相关资料&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;，确定系统框架，&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;完成毕业设计开题报告&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;和任务书&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;第四、五、六、七周：编程实现功能界面，不断完善功能需求，中期检查&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span face=&quot;宋体&quot;&gt;第八、九周：撰写毕业论文&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt; mso-bidi-font-family: &quot;Times New Roman&quot;;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span face=&quot;宋体&quot;&gt;第十周：修改打印论文，准备&lt;/span&gt;ppt,准备答辩&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意更改。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-03-07 17:24:14','2018-03-07 17:24:14','2018-03-07 17:24:14');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032212','张晓晨','1','2','基础科学学院','计算机科学与技术(专升本）','101','VR技术在计算机中的应用研究','酒店客房管理系统的设计与实现','&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51);PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma;&quot;&gt;经过一段时间的准备，觉得原定论文题目太大，范围太宽，涉及面过广，来不及进行全面的深入研究，为了更好的做好&lt;/span&gt;&lt;a href=&quot;https://www.baidu.com/s?wd=%E6%AF%95%E4%B8%9A%E8%AE%BE%E8%AE%A1&amp;amp;tn=44039180_cpr&amp;amp;fenlei=mv6quAkxTZn0IZRqIHckPjm4nH00T1Y4mWFbmHRsPvDvryfsn1D10ZwV5Hcvrjm3rH6sPfKWUMw85HfYnjn4nH6sgvPsT6KdThsqpZwYTjCEQLGCpyw9Uz4Bmy-bIi4WUvYETgN-TLwGUv3EPjDvP1DYrHfd&quot; target=&quot;_blank&quot; rel=&quot;nofollow&quot; style=&quot;color: rgb(63, 136, 191); text-decoration: none;PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma;&quot;&gt;毕业设计&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51);PingFang SC&amp;quot;, &amp;quot;Lantinghei SC&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, arial, 宋体, sans-serif, tahoma;&quot;&gt;（论文），顺利完成论文，并且为以后的工作打好基础，&lt;span id=&quot;pastemarkerend&quot;&gt;在此请求更换题目&lt;/span&gt;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','&lt;p style=&quot;box-sizing: border-box; margin: 0px 0px 18px; word-wrap: break-word; color: rgb(42, 42, 42);Microsoft Yahei&amp;quot;;&quot;&gt;管理员是系统的核心用户，可以对系统的用户进行管理。&lt;/p&gt;

&lt;p style=&quot;box-sizing: border-box; margin: 0px 0px 18px; word-wrap: break-word; color: rgb(42, 42, 42);Microsoft Yahei&amp;quot;;&quot;&gt;客房经理的角色也很关键，主要对系统的客房进行管理。&lt;/p&gt;

&lt;p style=&quot;box-sizing: border-box; margin: 0px 0px 18px; word-wrap: break-word; color: rgb(42, 42, 42);Microsoft Yahei&amp;quot;;&quot;&gt;服务员可以对系统的客户进行管理，进行预定管理，入住管理，结账等一系列动作。&lt;/p&gt;

&lt;p style=&quot;box-sizing: border-box; margin: 0px 0px 18px; word-wrap: break-word; color: rgb(42, 42, 42);Microsoft Yahei&amp;quot;;&quot;&gt;客房预定、入住信息登记、查询住宿信息、换房操作、退房结账、客房查询，实现用户、角色（系统管理员、客房经理、前台服务员、客户）&lt;/p&gt;
','&lt;p&gt;同意改题&lt;br&gt;
&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:34:51','2018-01-29 21:34:51','2018-01-29 21:34:51'),('201606032119','侯祺丹','1','2','基础科学学院','计算机科学与技术(专升本）','104','基于Android 平台的助手软件的开发与实现','实验室教学管理系统的设计与实现','&lt;p&gt;原题目技术上有难度&lt;/p&gt;
','&lt;p&gt;实验室教学管理系统&lt;br&gt;
（1）通过管理员、老师、学生三种角色从不同的方面对实验室教学系统进行操作管理；&lt;br&gt;
（2）其主要功能是课程管理、布置作业、提交作业、发布公告、留言板等；&amp;nbsp;&lt;/p&gt;
','&lt;p&gt;有开发需求，技术可行，审核通过。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:34:59','2018-01-29 21:34:59','2018-01-29 21:34:59'),('201406014122','彭尚飞','1','3','基础科学学院','软件工程','40','文档填充系统的设计与实现','关联交易系统的设计与实现','&lt;p&gt;在公司实习，工作上正在进行的项目&lt;/p&gt;
','&lt;p&gt;内容是关联交易系统的设计与实现，包括了关联方信息管理、归档管理、实时查看管理等工能。系统目的是为了解决管理问题，建立统一的关联交易规则，统一的关联交易完工体系，统一的关联交易业务单据和统一的关联交易内部监控流程。进度计划目前为开发阶段，预计3月份完成项目。公司有严格的开发完成时间与制度来确保项目顺利进行。&lt;/p&gt;
','&lt;p&gt;同意题目更改。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:35:06','2018-01-29 21:35:06','2018-01-29 21:35:06');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032207','邢连月','1','2','基础科学学院','计算机科学与技术(专升本）','121','基于Android的人脸识别系统实现','基于B/S的城市二手商品信息交易系统','&lt;p&gt;由于是被调剂的，原来课题发生了比较大的变化，对于人脸识别系统不太了解。现已经重新拟定题目，并且写了任务书。&lt;/p&gt;
','&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;一、研究的&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;目的和要求&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;在当前社会上，许多各类型的电子商务类网站纷纷建立，可以很大程度上的解决人们信息资源的闭塞以及地域上的限制。在城市的发展中，伴随着人们购买能力的提高，也存在许多各种类型的二手商品，由于信息交流落后，很多只限于中介或者小区广告栏宣传的方式进行交易。这种方式有很多局限性和偶然性，并不能满足二手商品的畅通交流要求。于是一种新的二手商品信息交流的方式出现了，就是基于&lt;/span&gt;B/S&lt;span face=&quot;宋体&quot;&gt;的城市二手商品信息交易系统。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;通过这个系统，可以发现每一位网络用户都是系统的主人，大家可以非常方便的发布自己的信息，浏览别人发布的信息，还可以对各种二手商品信息作出横向比较，作出最佳选择。由此可见，该系统是一个交流二手商品的平台，与一般的电子商务类网站又有本质的区别。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;该系统功能实现应达到界面友好、美观、操作便捷，具有人性化的设计系统界面；系统的实用性，能够快速便捷的实现用户所执行的操作；系统的可移植性，可在其他电脑上正常的安装运行；系统的可靠性，系统能在给定的条件下完成所要求的基本功能，并运行出与预期一致的正确结果。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;二&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;、研究的&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;主要内容&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; line-height: 150%; text-indent: 24pt; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;城市二手商品信息交易系统&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;主要设计了用户设置功能、发布信息功能、信息管理功能、搜索信息功能、留言功能、及系统管理功能等模块。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

&lt;ol style=&quot;list-style-type: decimal; direction: ltr;&quot;&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); line-height: 150%; font-family: Calibri; font-size: 10.5pt; font-style: normal; font-weight: normal; margin-top: 0pt; margin-bottom: 0pt; mso-char-indent-count: 2.0000; mso-list: l0 level1 lfo1;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;用户设置功能主要是用户注册必须填写所要求的个人资料，完成个人资料登入。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;/li&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); line-height: 150%; font-family: Calibri; font-size: 10.5pt; font-style: normal; font-weight: normal; margin-top: 0pt; margin-bottom: 0pt; mso-char-indent-count: 2.0000; mso-list: l0 level1 lfo1;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;发布信息功能主要是为已经注册的用户服务，登录的用户可以及时发布自己的二手商品信息，立刻就能浏览到。这是本系统的主要功能。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;/li&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); line-height: 150%; font-family: Calibri; font-size: 10.5pt; font-style: normal; font-weight: normal; margin-top: 0pt; margin-bottom: 0pt; mso-char-indent-count: 2.0000; mso-list: l0 level1 lfo1;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;信息管理功能是帮助已发表信息的用户管理自身发布的二手商品信息的同时也管理短消息信息。此项功能也主要是服务于用户。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;/li&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;搜索信息功能是面向所登陆到本系统的人员，采用模糊查询的方法，遍历所有二手商品信息，搜索出浏览者感兴趣的内容。&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;留言功能分为两种：一种是对某一个二手商品信息进行留言；另一种是短消息的，可以在用户与用户之间，也可以在系统管理员与用户之间进行短消息联系。&lt;/span&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/li&gt;
	&lt;li style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;系统和管理功能时系统管理员对系统所有信息资源进行统一管理的一个模式。只针对系统和管理员账户，登陆方式采用了账户加验证码机制，提高了该模块的安全级别。&lt;/span&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;
&lt;p style=&quot;color: rgb(0, 0, 0); font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;font face=&quot;黑体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;font face=&quot;黑体&quot;&gt;三&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 黑体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;、进度安排&lt;/span&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;
&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;span face=&quot;宋体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-hansi-font-family: Calibri; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt; mso-ascii-font-family: Calibri;\'&gt;&lt;font face=&quot;宋体&quot;&gt;&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; text-indent: 24pt; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;font face=&quot;宋体&quot;&gt;第一周：根据论文题目进行课题分析&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; text-indent: 24pt; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal; mso-char-indent-count: 2.0000;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;第二、三周：查找并收集&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;整理、消化相关资料&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;，确定系统框架，&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;完成毕业设计开题报告&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;和任务书&lt;/span&gt;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;第四、五、六、七周：编程实现功能界面，不断完善功能需求，中期检查&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span face=&quot;宋体&quot;&gt;第八、九周：撰写毕业论文&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span face=&quot;宋体&quot;&gt;第十周：修改打印论文，准备&lt;/span&gt;ppt,准备答辩&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;黑体&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;四、保障措施&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 12pt; font-style: normal; font-weight: normal;&quot;&gt;&lt;span style=\'line-height: 150%; font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;Times New Roman&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp; 现已签约中国电信德州市公司，课题更改后，我会及时按照老师的要求，完成各项作业；并且在每个阶段主动向老师汇报课题进展情况，做到及时查漏补缺。&lt;/span&gt;&lt;/p&gt;
&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;p style=&quot;color: rgb(0, 0, 0); line-height: 150%; font-family: Calibri; font-size: 10.5pt; font-style: normal; font-weight: normal; margin-top: 0pt; margin-bottom: 0pt; mso-char-indent-count: 2.0000; mso-list: l0 level1 lfo1;&quot;&gt;&lt;/p&gt;
&lt;/span&gt;&lt;p style=&quot;color: rgb(0, 0, 0); line-height: 150%; font-family: Calibri; font-size: 10.5pt; font-style: normal; font-weight: normal; margin-top: 0pt; margin-bottom: 0pt; mso-char-indent-count: 2.0000; mso-list: l0 level1 lfo1;&quot;&gt;&lt;br&gt;
&lt;/p&gt;
','&lt;p&gt;同意修改&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:35:14','2018-01-29 21:35:14','2018-01-29 21:35:14');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014124','苏惠惠','1','3','基础科学学院','软件工程','35','基于Android的个人理财管家设计与实现','                                        校园二手交易平台','&lt;p&gt;对于校园二手交易平台非常感兴趣,是一直非常想做的课题,想做一个功能齐全,新颖的网站能够真正用于我校的校园二手交易的网站,对于安卓的内容知识匮乏,对开发环境不熟悉,搭建环境一再出现问题,我希望自己的毕业设计是能够自己努力完成的,恳请老师允许修改课题.&lt;br&gt;
&lt;/p&gt;
','&lt;p&gt;校园二手交易平台主要功能介绍:&lt;br&gt;
&amp;nbsp;&amp;nbsp; 用户设置功能,发布信息功能,信息管理功能,搜索功能,留言功能以及系统管理功能.采用了分专区的模式,二手区,求购区和其他专区,其中二手区是包括二手类别包括物品的分类,求购区是发布的想要购买的信息;其他专区包括租房,兼职,周边商家活动,同校活动聚会等信息等其他功能附加功能(并做成webapp).&lt;/p&gt;
','&lt;p&gt;校园二手交易平台作为毕设内容略显不足，可从实际出发进行需求分析的再提炼，增加互操作性和工作量。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:35:44','2018-01-29 21:35:44','2018-01-29 21:35:44'),('201606032112','任祺光','1','2','基础科学学院','计算机科学与技术(专升本）','42','基于移动云教学的翻转课堂教学平台（网站开发与管理）','航班信息管理系统','&lt;p&gt;2017年7月至12月在软通进行java培训，此题目是培训期间做的项目，现在已经在北京的软通动力公司进行实习。&lt;/p&gt;
','&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 航班信息管理系统采用mvc结构，使用jsp+servlet+javabean技术，用Mybatis连接MySql数据库，前端使用Bootstrap框架。系统分为管理员模块和用户模块，管理员对飞机信息进行增删改查操作以及文件上传功能，对航班信息进行增删改查，管理用户信息，将数据导出为excel表格。用户模块进行登陆注册及密码修改，按照起始城市查询航班信息，查看飞机信息。&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 会处理好实习和毕设的时间，按照老师的进度计划进行，确保毕设的顺利完成。&lt;/p&gt;
','&lt;p&gt;题目符合工科学士学位毕业要求，同意修改毕业设计题目。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:36:04','2018-01-29 21:36:04','2018-01-29 21:36:04'),('201406014103','董文强','1','3','基础科学学院','软件工程','37','基于Android的特色配餐系统','基于python的网络爬虫及数据分析系统','&lt;p&gt;个人比较喜欢做爬虫，以及所得的数据分析，从而得到更有价值的信息，因此想基于python制作一个爬取某个网站网页，然后对此数据进行下一步操作的系统。&lt;/p&gt;
','&lt;p&gt;自己在无聊时间比较关注网络游戏直播，然而在如今有大量的游戏网络平台，每个平台有自己代表的主播，但是很多时候用户可能喜欢不同平台的主播，再就是在同一直播时间段可能在同一款游戏上有更好的直播主播，因此想在爬取一些网络平台上的数据进行分析，将同一时间不同平台主播进行观看人数排名，不同类型主播分类，以及分析更多数据，从而能够评测选出更多吸引用户的主播。以完成一个对于不同平台直播融合的系统。&lt;/p&gt;
','&lt;p&gt;关于爬虫的成熟程序代码很多，在研究过程中一定要有新意和立意。&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:36:13','2018-01-29 21:36:13','2018-01-29 21:36:13');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406014108','郭茂城','1','3','基础科学学院','软件工程','38','基于Unity3D的****游戏开发','基于Android的无线订餐系统','&lt;p&gt;对于Android开发有一些了解并很感兴趣，希望这次的毕业设计可以帮助我提高我的编程水平。&amp;nbsp;&lt;/p&gt;
','&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;新题目内容&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;与需求&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;：&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;随着无线移动端的迅速发展&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;，&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;无线移动端已经走进了餐饮业，他可以提高餐饮行业的工作效率、改善餐饮行业的服务质量，避免出现传统餐饮业订餐失误、上菜失误等问题，最终实现提高餐厅经济效益这个根本目的。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;本系统&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;主要功能包括用户登录模块、点菜管理功能模块、并台管理功能模块、转台管理功能模块、查台管理功能模块、结台管理功能模块、更新管理功能模块、注销功能模块、设置功能模块等等，并对各功能模块进行了详细的分析与设计。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;所用&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: 宋体; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255); mso-ascii-font-family: &quot;Times New Roman&quot;; mso-hansi-font-family: &quot;Times New Roman&quot;;\'&gt;&lt;span face=&quot;宋体&quot;&gt;工具&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;：&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;使用&lt;/span&gt;eclipse&lt;span face=&quot;宋体&quot;&gt;作为开发工具，数据库是&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;MySQL&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;进度计划：&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;1&lt;span face=&quot;宋体&quot;&gt;周：确定毕业设计系统方向，进行论文题目的筛选。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;2&lt;span face=&quot;宋体&quot;&gt;周：以论文题目为核心，对相关资料进行收集和翻阅。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;3&lt;span face=&quot;宋体&quot;&gt;周：对已搜集的资料加以整理，论证分析系统的可行性、实际性，将论文题目确定下来，进行开题报告。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;4&lt;span face=&quot;宋体&quot;&gt;周：整合已有资料，进行系统的编程工作。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;5—8&lt;span face=&quot;宋体&quot;&gt;周：根据确定好的设计方向，进行深入详实的系统编程工作，对编程过程中所发现的问题，研究其解决方案，推敲整合，并进行修改完善。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;9-13&lt;span face=&quot;宋体&quot;&gt;周：编写毕业设计论文，完成论文的初稿部分，向指导老师寻求意见，优化论文的结构，润色语句，修改不当之处，补充不足之处。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;14-15&lt;span face=&quot;宋体&quot;&gt;周，论文资料整合，最终定稿，为最终的答辩做好各方面准备，熟悉论文内容，增强自己对论文内容的把握，进行一定的思维发散，设计论文答辩。&lt;/span&gt;&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;br&gt;
&lt;/span&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;第&lt;/span&gt;16&lt;span face=&quot;宋体&quot;&gt;周：论文答辩。 &lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 15pt; line-height: 15.75pt; mso-pagination: widow-orphan;&quot;&gt;&lt;b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; font-weight: bold; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;保障措施：&lt;/span&gt;&lt;/span&gt;&lt;/b&gt;&lt;span style=\'background: rgb(255, 255, 255); font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-bidi-font-family: &quot;PT Sans&quot;; mso-font-kerning: 0.0000pt; mso-shading: rgb(255, 255, 255);\'&gt;&lt;span face=&quot;宋体&quot;&gt;我将严格按照预定的进度计划进行系统及论文的编写，经常与指导老师沟通编程的进度与出现的问题。&lt;/span&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt;&quot;&gt;&lt;span style=\'font-family: &quot;Times New Roman&quot;; font-size: 12pt; mso-spacerun: &quot;yes&quot;; mso-fareast-font-family: 宋体; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
','&lt;p&gt;同意题目变更&lt;br&gt;
&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:36:25','2018-01-29 21:36:25','2018-01-29 21:36:25');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032231','张潇','1','2','基础科学学院','计算机科学与技术(专升本）','27','教科研项目管理系统的设计与实现','失物招领系统','
&lt;pre id=&quot;best-content-2447942068&quot; accuse=&quot;aContent&quot; style=&quot;margin-top: 10px; margin-bottom: 10px; padding: 0px; white-space: pre-wrap; word-wrap: break-word; color: rgb(51, 51, 51); min-height: 55px; background-color: rgb(255, 255, 255);&quot;&gt;经过一段时间的准备，涉及面广，能力不足无法进行全面的深入研究， 为了更好的做好&lt;a href=&quot;https://www.baidu.com/s?wd=%E6%AF%95%E4%B8%9A%E8%AE%BE%E8%AE%A1&amp;amp;tn=44039180_cpr&amp;amp;fenlei=mv6quAkxTZn0IZRqIHckPjm4nH00T1YLrjfkPhPbm16znHNBnvRz0ZwV5Hcvrjm3rH6sPfKWUMw85HfYnjn4nH6sgvPsT6KdThsqpZwYTjCEQLGCpyw9Uz4Bmy-bIi4WUvYETgN-TLwGUv3EnH6znHnYrH64P1fzrjfLnWDsr0&quot; target=&quot;_blank&quot; rel=&quot;nofollow&quot; style=&quot;color: rgb(63, 136, 191); text-decoration: none;&quot;&gt;毕业设计&lt;/a&gt;，顺利完成论文，与指导教师协商后，需更换题目，对其中一个问题 做深入研究。&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/pre&gt;
','&lt;p&gt;失物招领系统&lt;/p&gt;
','&lt;p&gt;同意修改！&lt;br&gt;
&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:36:32','2018-01-29 21:36:32','2018-01-29 21:36:32');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201406012110','郭安浩','1','1','基础科学学院','计算机科学与技术','41','基于移动云教学的互动教学平台（手机前端开发）','基于jsp的在线商城设计与实现','&lt;p&gt;老师您好：&lt;/p&gt;
&lt;p&gt;      我于2018年12月28号离校参加了校外培训，估计要到五月份。进度较快，本校的毕业设计可能没时间做，现在这里有一个适合作为毕业设计的题目：《仿京东商城》，所以想更换更一下毕业设计的题目。望老师批准，十分感谢。&lt;/p&gt;
','&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;新题目内容：使用&lt;/span&gt;Eclipse&lt;span face=&quot;宋体&quot;&gt;作为开发工具，并运用&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;struts+spring+hibernate&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;的一个集成框架进行设计，采用&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;Tomcat&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;作为&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;web&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;服务器和&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;JSP&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;引擎，使用&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;AJAX&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;完成对用户名异步校验，采用&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;MySQL&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;作为后台数据库管理。最终搭建成基于&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;SSH&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;的网上购物系统并实现系统各个模块的功能。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;进度计划：开发前端页面：&lt;/span&gt; 1.&lt;span face=&quot;宋体&quot;&gt;实现查询一级分类模块及分类下所有的商品。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;2.&lt;span face=&quot;宋体&quot;&gt;查询最新及热门商品（限制个数&lt;/span&gt;&lt;span face=&quot;Times New Roman&quot;&gt;10&lt;/span&gt;&lt;span face=&quot;宋体&quot;&gt;个），查询二级商品。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;3.&lt;span face=&quot;宋体&quot;&gt;将商品信息添加到购物车，&lt;/span&gt;&lt;/span&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;将商品信息从购物车中移除。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;4.将购物车中的信息存入到数据库（生成订单），为订单付款。&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;5.查询我的订单，查询某个订单详情。&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span face=&quot;宋体&quot;&gt;后台：&lt;/span&gt; &amp;nbsp;1.添加/修改/删除/查询用户。&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;2.添加/修改/删除/查询一级分类、二级分类及查询所有二级分类。&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;3.添加/修改/删除/查询商品&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'color: rgb(0, 0, 0); line-height: 150%; font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;4.查询所有订单 &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;margin: 0pt; text-align: left; line-height: 150%;&quot;&gt;&lt;span style=\'font-family: 宋体; font-size: 10.5pt; mso-spacerun: &quot;yes&quot;; mso-font-kerning: 1.0000pt;\'&gt;&lt;span face=&quot;宋体&quot;&gt;完成任务的保障措施：开发完一小模块就进行首次测试，到最终开发完再进行数次测试，为系统实现各个模块的功能提高保障。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

','&lt;p&gt;题目能否改一下，比如：基于？？？的在线商城&lt;/p&gt;
&lt;p&gt;新题目的内容要写：采用什么软件或者技术实现什么系统，主要实现？？和？等功能。&lt;/p&gt;
&lt;p&gt;进度计划：各阶段严格按照学院要求提交完成&lt;/p&gt;
&lt;p&gt;保障措施：目前正在进行这方面的工作&lt;/p&gt;
','1','&lt;p&gt;同意&lt;/p&gt;
','1','2018-03-07 17:24:23','2018-03-07 17:24:23','2018-03-07 17:24:23');/* MySQLReback Separation */
 /* 插入数据 `tp_alteration` */
 INSERT INTO `tp_alteration` VALUES ('201606032113','宋远征','1','2','基础科学学院','计算机科学与技术(专升本）','28','新生录取信息处理系统的设计与实现','基于java的高校图书管理系统','&lt;p&gt;自己在大学期间根据学习的理论知识及自身对JAVA程序有比较大的兴趣，故借毕业设计的机会，做一下关于Java方面的毕业设计，恳请指导老师及院领导的批准。老师辛苦了。&lt;/p&gt;
','&lt;p&gt; &amp;nbsp; &amp;nbsp;《基于Java的高校图书管理系统》，进度计划会和指导老师及院里要求的时间相吻合，一定不会造成整个小组及指导老师的正常进度。&lt;/p&gt;
&lt;p&gt; &amp;nbsp; &amp;nbsp;完成任务的保障措施：在进行开题报告之前，会详细的进行资料的查找以及向同学老师请教，并且会制定一个详细的时间表来规划毕业设计所需要的工作。并会和同小组同学相互监督，相互询问，保证所在小组的毕业设计按照老师及院要求的时间认真完成。&lt;/p&gt;
','&lt;p&gt;&lt;br&gt;
同意修改！&lt;/p&gt;
','1','&lt;p&gt;同意&lt;span id=&quot;pastemarkerend&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;

&lt;/p&gt;
','1','2018-01-29 21:36:44','2018-01-29 21:36:44','2018-01-29 21:36:44');/* MySQLReback Separation */
 /* 创建表结构 `tp_chaos_topic` */
 DROP TABLE IF EXISTS `tp_chaos_topic`;/* MySQLReback Separation */ CREATE TABLE `tp_chaos_topic` (
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `volunt` tinyint(4) NOT NULL COMMENT '志愿，1,2,3志愿',
  UNIQUE KEY `stu_number_2` (`stu_number`,`volunt`),
  UNIQUE KEY `top_id` (`top_id`,`stu_number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-盲选课题表';/* MySQLReback Separation */
 /* 创建表结构 `tp_class` */
 DROP TABLE IF EXISTS `tp_class`;/* MySQLReback Separation */ CREATE TABLE `tp_class` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  `dep_father` int(11) DEFAULT NULL COMMENT '专业编号',
  PRIMARY KEY (`dep_id`),
  KEY `dep_id` (`dep_id`),
  KEY `dep_father` (`dep_father`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='班级';/* MySQLReback Separation */
 /* 插入数据 `tp_class` */
 INSERT INTO `tp_class` VALUES ('1','一班','1'),('2','一班','3'),('3','一班','2'),('4','二班','2'),('5','1班','4');/* MySQLReback Separation */
 /* 创建表结构 `tp_college` */
 DROP TABLE IF EXISTS `tp_college`;/* MySQLReback Separation */ CREATE TABLE `tp_college` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`dep_id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='学院表';/* MySQLReback Separation */
 /* 插入数据 `tp_college` */
 INSERT INTO `tp_college` VALUES ('1','基础科学学院'),('2','测试学院');/* MySQLReback Separation */
 /* 创建表结构 `tp_draft` */
 DROP TABLE IF EXISTS `tp_draft`;/* MySQLReback Separation */ CREATE TABLE `tp_draft` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文草稿';/* MySQLReback Separation */
 /* 插入数据 `tp_draft` */
 INSERT INTO `tp_draft` VALUES ('201406014111','9','/Public/Student/c48880b847479aa21b4e33be8a0abf37/2018-04-11/5acd6b107a568.doc','2018-04-11 09:55:28','','0','','');/* MySQLReback Separation */
 /* 创建表结构 `tp_excel_word` */
 DROP TABLE IF EXISTS `tp_excel_word`;/* MySQLReback Separation */ CREATE TABLE `tp_excel_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 名称',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `url` varchar(200) DEFAULT NULL COMMENT ' 文件',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='模板表格';/* MySQLReback Separation */
 /* 插入数据 `tp_excel_word` */
 INSERT INTO `tp_excel_word` VALUES ('1','本科毕业设计（论文）手册撰写规范','2017-12-16 21:20:25','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351d9978eac.doc'),('2','本科生毕业设计（论文）模板','2017-12-16 21:20:45','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351dad06e1b.doc'),('3','本科生毕业设计（论文）手册模板','2017-12-16 21:20:56','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351db81695a.doc'),('4','本科生毕业设计(论文)撰写规范','2017-12-16 21:21:06','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351dc2235dc.doc');/* MySQLReback Separation */
 /* 创建表结构 `tp_finalize` */
 DROP TABLE IF EXISTS `tp_finalize`;/* MySQLReback Separation */ CREATE TABLE `tp_finalize` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文定稿';/* MySQLReback Separation */
 /* 插入数据 `tp_finalize` */
 INSERT INTO `tp_finalize` VALUES ('201406014111','9','/Public/Student/201406014111/2018-04-11/5acd6d4dafb29.doc','2018-04-11 10:05:01','','0','','');/* MySQLReback Separation */
 /* 创建表结构 `tp_inspect` */
 DROP TABLE IF EXISTS `tp_inspect`;/* MySQLReback Separation */ CREATE TABLE `tp_inspect` (
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `progress` text COMMENT '进展情况',
  `url` varchar(200) DEFAULT NULL COMMENT '附件',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态,0,1,2 ',
  KEY `top_id` (`top_id`),
  KEY `stu_number` (`stu_number`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='中期检查';/* MySQLReback Separation */
 /* 插入数据 `tp_inspect` */
 INSERT INTO `tp_inspect` VALUES ('9','201406014111','&lt;p&gt;53454354&lt;/p&gt;
','/Public/Student/201406014111/2018-04-11/5acd6b36c0264.doc','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_member` */
 DROP TABLE IF EXISTS `tp_member`;/* MySQLReback Separation */ CREATE TABLE `tp_member` (
  `id` int(11) DEFAULT NULL COMMENT '答辩编号',
  `tea_number` varchar(20) DEFAULT NULL COMMENT '教师工号',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩组成员';/* MySQLReback Separation */
 /* 插入数据 `tp_member` */
 INSERT INTO `tp_member` VALUES ('1','023'),('1','022');/* MySQLReback Separation */
 /* 创建表结构 `tp_outside` */
 DROP TABLE IF EXISTS `tp_outside`;/* MySQLReback Separation */ CREATE TABLE `tp_outside` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='校外毕业设计申请表';/* MySQLReback Separation */
 /* 创建表结构 `tp_overall` */
 DROP TABLE IF EXISTS `tp_overall`;/* MySQLReback Separation */ CREATE TABLE `tp_overall` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='总评成绩';/* MySQLReback Separation */
 /* 创建表结构 `tp_report` */
 DROP TABLE IF EXISTS `tp_report`;/* MySQLReback Separation */ CREATE TABLE `tp_report` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='开题报告';/* MySQLReback Separation */
 /* 插入数据 `tp_report` */
 INSERT INTO `tp_report` VALUES ('116','201406014138','/Public/Student/bcd4c6bfbb4a2ef6272564baa3ae8a0a/2018-02-10/5a7e96805a1e7.doc','','0','','','1'),('56','201406012113','/Public/Student/715259e25d48a9b6220a21a1cc9483db/2018-03-02/5a98d8deab773.doc','','0','','','1'),('84','201406014144','/Public/Student/a157415632ecfbb0d084c9e6529b2d9b/2018-03-08/5aa151ba10c6a.docx','','0','','','0'),('93','201406012130','/Public/Student/b4a6e1746834fd12ddd1f9e580b8eb9c/2018-03-09/5aa24a5e9664b.docx','','0','','','0'),('9','201406014111','/Public/Student/201406014111/2018-04-11/5acd6b95e48d8.doc','','0','','','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_review` */
 DROP TABLE IF EXISTS `tp_review`;/* MySQLReback Separation */ CREATE TABLE `tp_review` (
  `stu_number` char(20) DEFAULT NULL COMMENT '学号',
  `tea_number` char(20) DEFAULT NULL COMMENT '评阅教师工号',
  `dep_id` int(11) DEFAULT NULL COMMENT '专业编号',
  `audit` tinyint(4) DEFAULT '0' COMMENT '评阅01',
  UNIQUE KEY `stu` (`stu_number`),
  KEY `dep_id` (`dep_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分配评阅老师';/* MySQLReback Separation */
 /* 创建表结构 `tp_scale` */
 DROP TABLE IF EXISTS `tp_scale`;/* MySQLReback Separation */ CREATE TABLE `tp_scale` (
  `id` tinyint(4) NOT NULL COMMENT '编号',
  `grade` tinyint(4) DEFAULT NULL COMMENT '平时成绩比例',
  `zdgrade` tinyint(4) DEFAULT NULL COMMENT '指导老师评分比例',
  `pingyuegrade` tinyint(4) DEFAULT NULL COMMENT '评阅老师评分比例',
  `dabiangrade` tinyint(4) DEFAULT NULL COMMENT '答辩评分比例',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='总评成绩比例';/* MySQLReback Separation */
 /* 插入数据 `tp_scale` */
 INSERT INTO `tp_scale` VALUES ('1','25','25','25','25');/* MySQLReback Separation */
 /* 创建表结构 `tp_school_carrousel` */
 DROP TABLE IF EXISTS `tp_school_carrousel`;/* MySQLReback Separation */ CREATE TABLE `tp_school_carrousel` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `head` varchar(50) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `tp_school_carrousel` */
 INSERT INTO `tp_school_carrousel` VALUES ('1','中国石油大学胜利学院','中国石油大学胜利学院','http://218.59.189.229/','/Public/setting/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351465937ff.jpg'),('5','','','','/Public/setting/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a35191d13a5c.png'),('4','','','','/Public/setting/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a35161d99864.jpg');/* MySQLReback Separation */
 /* 创建表结构 `tp_school_college` */
 DROP TABLE IF EXISTS `tp_school_college`;/* MySQLReback Separation */ CREATE TABLE `tp_school_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` text COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='院内公告通知表';/* MySQLReback Separation */
 /* 创建表结构 `tp_school_govern` */
 DROP TABLE IF EXISTS `tp_school_govern`;/* MySQLReback Separation */ CREATE TABLE `tp_school_govern` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` longtext COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';/* MySQLReback Separation */
 /* 插入数据 `tp_school_govern` */
 INSERT INTO `tp_school_govern` VALUES ('1','学生使用说明书','2017-12-16 21:08:51','学生使用说明书','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351ae3f28be.pdf'),('2','指导老师使用说明书','2017-12-19 22:23:42','指导老师使用手册','/Public/tt.pdf'),('3','系主任使用说明书','2017-12-16 21:15:16','系主任使用说明书','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351c64f3b57.pdf'),('5','教学院长使用手册','2017-12-16 21:17:23','教学院长使用说明书','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351ce35db7f.pdf'),('6','管理员使用手册','2017-12-16 21:17:51','管理员使用手册','/Public/Manager/d41d8cd98f00b204e9800998ecf8427e/2017-12-16/5a351cfff2288.pdf');/* MySQLReback Separation */
 /* 创建表结构 `tp_school_notice` */
 DROP TABLE IF EXISTS `tp_school_notice`;/* MySQLReback Separation */ CREATE TABLE `tp_school_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) DEFAULT NULL COMMENT ' 标题',
  `publish` datetime DEFAULT NULL COMMENT '发布时间',
  `content` longtext COMMENT '内容',
  `url` varchar(200) DEFAULT NULL COMMENT ' 附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='校内公告通知表';/* MySQLReback Separation */
 /* 插入数据 `tp_school_notice` */
 INSERT INTO `tp_school_notice` VALUES ('2','关于毕业设计','2017-12-16 21:31:38','&lt;p data-indent=&quot;1&quot;&gt;大家好，很高心能在这里看见我给大家的留言，如果大家在使用的过程中遇到某些问题或者bug，欢迎加入群：&lt;font color=&quot;#ef6559&quot;&gt;683424298。&lt;/font&gt;谢谢！&lt;/p&gt;&lt;p data-indent=&quot;1&quot;&gt;最好有截图哦！&amp;gt;_&amp;lt;&lt;/p&gt;','');/* MySQLReback Separation */
 /* 创建表结构 `tp_setting` */
 DROP TABLE IF EXISTS `tp_setting`;/* MySQLReback Separation */ CREATE TABLE `tp_setting` (
  `dep_id` int(11) NOT NULL COMMENT '专业编号',
  `topic_strat` datetime DEFAULT NULL COMMENT '申请课题开始的时间',
  `topic_close` datetime DEFAULT NULL COMMENT '申请课题结束的时间',
  `choice_strat` datetime DEFAULT NULL COMMENT '学生选择课题开始时间',
  `choice_close` datetime DEFAULT NULL COMMENT '学生选择课题结束时间',
  `teacher_strat` datetime DEFAULT NULL COMMENT '指导老师选择学生开始时间',
  `teacher_close` datetime DEFAULT NULL COMMENT '指导老师选择学生结束时间',
  `paper_close` datetime DEFAULT NULL COMMENT '论文提交结束时间',
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='各个专业的时间设置';/* MySQLReback Separation */
 /* 创建表结构 `tp_specialty` */
 DROP TABLE IF EXISTS `tp_specialty`;/* MySQLReback Separation */ CREATE TABLE `tp_specialty` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `dep_name` varchar(20) DEFAULT NULL COMMENT '名称',
  `dep_father` int(11) DEFAULT NULL COMMENT '学院编号',
  PRIMARY KEY (`dep_id`),
  KEY `specol` (`dep_father`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='专业';/* MySQLReback Separation */
 /* 插入数据 `tp_specialty` */
 INSERT INTO `tp_specialty` VALUES ('1','计算机科学与技术','1'),('2','计算机科学与技术(专升本）','1'),('3','软件工程','1'),('4','测试专业','2');/* MySQLReback Separation */
 /* 创建表结构 `tp_squad` */
 DROP TABLE IF EXISTS `tp_squad`;/* MySQLReback Separation */ CREATE TABLE `tp_squad` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='答辩小组';/* MySQLReback Separation */
 /* 插入数据 `tp_squad` */
 INSERT INTO `tp_squad` VALUES ('1','1','王劲松','023','001','刘颖','第一答辩小组','等等','烦烦烦');/* MySQLReback Separation */
 /* 创建表结构 `tp_squad_stu` */
 DROP TABLE IF EXISTS `tp_squad_stu`;/* MySQLReback Separation */ CREATE TABLE `tp_squad_stu` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '答辩小组编号',
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `dep_id` int(11) NOT NULL DEFAULT '0' COMMENT '专业编号',
  `squad` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否有答辩小组0没答辩，1，已经通过，2进入二辩，3进入优秀',
  KEY `id` (`id`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='答辩学生';/* MySQLReback Separation */
 /* 创建表结构 `tp_stu_ret_pwd` */
 DROP TABLE IF EXISTS `tp_stu_ret_pwd`;/* MySQLReback Separation */ CREATE TABLE `tp_stu_ret_pwd` (
  `num` char(20) NOT NULL,
  `code` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `tp_stu_ret_pwd` */
 INSERT INTO `tp_stu_ret_pwd` VALUES ('201406014111','68fc266c3090819707d3c4c6cdcc1ed5');/* MySQLReback Separation */
 /* 创建表结构 `tp_stu_topic` */
 DROP TABLE IF EXISTS `tp_stu_topic`;/* MySQLReback Separation */ CREATE TABLE `tp_stu_topic` (
  `stu_number` char(20) NOT NULL COMMENT '学号',
  `top_id` int(11) NOT NULL COMMENT '课题编号',
  UNIQUE KEY `stu` (`stu_number`) USING BTREE,
  KEY `top_id` (`top_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-选题表';/* MySQLReback Separation */
 /* 插入数据 `tp_stu_topic` */
 INSERT INTO `tp_stu_topic` VALUES ('201406014104','8'),('201406014112','8'),('201406014102','9'),('201406014107','9'),('201406014110','9'),('201406014111','9'),('201406014103','11'),('201406014105','12'),('201406014106','12'),('201406014108','13'),('201406014109','13'),('201406012103','14');/* MySQLReback Separation */
 /* 创建表结构 `tp_student` */
 DROP TABLE IF EXISTS `tp_student`;/* MySQLReback Separation */ CREATE TABLE `tp_student` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生';/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('11','11','6512bd43d9caa6e02c990b0a82652dca','2','4','5','','','','','','',''),('201307042119','孙建坤','8707ccc92d814d9bcaf34d49fe138b4e','1','1','1','17686556685','1015287661@qq.com','','','','',''),('201307042123','王斌','95266545e208f746f50f320678bf9df3','1','1','1','18354681252','1579613426@qq.com','1579613426','山东省青岛市黄岛区海青镇宋家岭村7号','共青团员','24','软件工程师'),('201307042133','吴建坤','fd0dc3e9c47b6fcdef5eb3a041db8bc2','1','1','1','18354681001','861526818@qq.com','861526818','青州市瓜市后巷31号','团员','24',''),('201307042134','徐明超','2e88e98f183449eefd90306894b1c485','1','1','1','15552786203','1195010833@qq.com','1195010833','山东省威海市','团员','22',''),('201307042142','张浩哲','6d68464527dddd717cf56b60182da64c','1','1','1','18663565606','540183369@qq.com','','山东聊城','','',''),('201307042143','张凯','b515248c62bf09aaa8643286e7a34542','1','1','1','17564300325','4085187442@qq.com','408518744','山东省汶上县郭楼镇王坝口村230号','共青团员','',''),('201406012101','蔡智宏','2b8087ae99a7eaa3462737832161a2a9','1','1','1','18590500912','1045335841@qq.com','1045335841','新疆','共青团员','22','无'),('201406012102','陈琨','2ca4478dea3d459e22a5fa1294d42e90','1','1','1','18653699630','437080038@qq.com','437080038','安徽省肥东县店埠镇','团员','22','学生'),('201406012103','陈相礼','b2d84ada4d14a3103576c4605b81eb5f','1','1','1','18522551576','1473090459@qq.com','1473090459','山东省乐陵市化楼镇陈家村','共青团员','21','上班族'),('201406012104','丁威宇','893b0a760e889dca8d4128c82427bdd5','1','1','1','17862127254','964160569@qq.com','964160569','黑龙江省大庆市','团员','22','学生'),('201406012105','段庆宸','88ad4891af2528a4e6e6bdc1b8855ada','1','1','1','','duan13597@sina.com','','','','',''),('201406012106','范庆贺','08cd1afac2e2baebb26c76563a100440','1','1','1','18254815989','18254815989@163.com','814020702','山东省泰安市高新区天宝镇时家庄村','共青团员','21','实习生'),('201406012107','付宇','8de922da9c966dc395ee9384e5c44982','1','1','1','18410056350','1392021027@qq.com','1392021027','北京市房山区长沟镇南正村3区128号','共青团员','21','学生'),('201406012109','苟莎','20c7f3cd357c9b7712cd5e03102f7c4a','1','1','1','18653760731','1776653461@qq.com','1776653461','四川省阆中市河溪镇东岳庙3组4号','团员','21',''),('201406012110','郭安浩','9d6ef9ace26351931871ff40ac32d39e','1','1','1','15552760731','2223707302@qq.com','2223707302','中国山东省济南市章丘区龙山街道办胡家村','团员','23','学生'),('201406012111','韩晓莹','c1c13eecd8e24a22d3deb60e1ec6ec81','1','1','1','15552748810','1439281798@qq.com','','山东省潍坊市寿光市','共青团员','',''),('201406012112','胡素琛','e1c038c128a8cfdda9989434384df383','1','1','1','','690888645@qq.com','','','','',''),('201406012113','贾兴光','715259e25d48a9b6220a21a1cc9483db','1','1','1','17862123722','884797097@qq.com','884797097','山东省东营市广饶县稻庄镇高柳村','共青团员','21','学生'),('201406012114','李博','0a8102b1bcad4046a274d76105a0090a','1','1','1','15553845155','1586637872@qq.com','1586637872','山东省菏泽市','共青团员','20',''),('201406012115','李俊彦','ff8d084aa021bd875c88bd037c7a3876','1','1','1','15552755709','315562963@qq.com','315562963','山东省东营市广饶县稻庄镇辛庄村','共青团员','22','学生'),('201406012117','李乃君','c3cab6fe36ce4ae8257958f3d562b004','1','1','1','15314300691','837277568@qq.com','837277568','山东省聊城市冠县范寨乡宁辛庄村','团员','22','学生'),('201406012118','李婷婷','a29679830bf4fe756cfaf562c2091b94','1','1','1','13205493299','misstimeli@163.com','903499810','山东济南','共青团员','21',''),('201406012120','刘佳','07d38ad0c0a604c0d3e5eef19200a764','1','1','1','','675938125@qq.com','','','','',''),('201406012121','刘明月','a6b4253b0e053cf9aa38a34d219c145e','1','1','1','15249475421','649677654@qq.com','649677654','内蒙古呼伦贝尔市鄂伦春自治旗','共青团员','23',''),('201406012122','刘晓飞','16e62d31b5d716780a88ee8407f49ba3','1','1','1','17862123731','605662508@qq.com','605662508','山东省威海市','团员','22','学生'),('201406012124','刘旭','772d5bf3de7bdfac5ef8b7fb101e28d9','1','1','1','','1157234034@qq.com','','','','',''),('201406012125','娄振鹏','56c63f8fc1b55d569edcfaf988dbb586','1','1','1','17862123719','396741000@qq.com','396741000','山东省菏泽市东明县焦园乡','团员','23','学生'),('201406012126','孟凡竣','9226902716101de79f18649995220c6d','1','1','1','13230897374','957478525@qq.com','957478525','河北省唐山市滦南县南堡镇廒上村','共青团员','23',''),('201406012128','齐强','7f5b62a99e74c70743a1fcbb1d7f5ab2','1','1','1','17343048201','2583411235@qq.com','2583411235','黑龙江省鹤岗市','团员','22','学生'),('201406012129','生洁','6b2bba5a881c1e3b31127f4927a69e96','1','1','1','18254629603','1297946752@qq.com','1297946752','山东东营','共青团员','21','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201406012130','苏子昊','fbdc9b2894553e17440101f246361227','1','1','1','13205483799','785023674@qq.com','785023674','山东滨州','团员','','');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201406012131','隋晓奇','6b9aa25e96e794218d49450ea649f273','1','1','1','17640471377','602340954@qq.com','602340954','辽宁省丹东市','团员','23','学生'),('201406012132','王成信','6dc7ee4f0e746abc03ff87bdc12bfd6d','1','1','1','17862123707','2239765606@qq.com','2239765606','山东省泰安市东平县新湖镇','共青团员','20','学生'),('201406012133','王承奇','a47c59882d5c35e44c28f26f16f86ac0','1','1','1','13287303637','2338366136@qq.com','2338366136','山东省青岛市','团员','24',''),('201406012134','王俊亮','e8e7cdd97ef26601869513d67c716d8e','1','1','1','17694952971','1329964155@qq.com','1329964155','山东省阳信县洋湖乡银子王村','共青团员','23','学生'),('201406012135','王楠','629e80914d125a0f6c24de993b9c5ddb','1','1','1','18863643385','1037218232@qq.com','1037218232','山东省潍坊市','团员','21','学生'),('201406012136','王宇','a5cb141cfdd4333182f4b4fe85c4732e','1','1','1','17695656457','790444312@qq.com','790444312','河北省唐山市','共青团团员','21','学生'),('201406012137','王云凤','53b9e3f1881beb0fbb7f1e5206f7fb16','1','1','1','15505462723','928478118@qq.com','928478118','山东省临沂市平邑县','团员','22',''),('201406012138','徐文超','59c7b5d06e2672e01c096071e957ca18','1','1','1','','2689641743@qq.com','2689641743','内蒙古赤峰','团员','',''),('201406012139','羊国聪','2ec31ae0144c1a1648f8fdc212e86ddd','1','1','1','','1347911234@qq.com','1347911234','','','',''),('201406012140','尹思宇','ca8125c6094d609c86bf47817dcfe033','1','1','1','18562108610','yinsiyu979@163.com','992397212','','','21',''),('201406012141','张后义','0af71a192a232fb786e08d7e9b310947','1','1','1','13287310697','Zhr52118@163.com','919779595','山东省枣庄市滕州市','团员','23','学生'),('201406012142','张栗玮','f4384c31af7cfe9d8e494fa2256f5685','1','1','1','15545770630','1208999396@qq.com','1208999396','','团员','22',''),('201406012143','张敏慧','c0accc976527004b3485170d1f210599','1','1','1','15552791273','247015261@qq.com','247015261','山东淄博','共青团员','21','无'),('201406012144','张琦','348f370f98e0d07db19df69447c86a23','1','1','1','13287317256','1074666190@qq.com','1074666190','山东临沂','共青团员','21',''),('201406012145','张旭','ec5bdf59f247873ecec281e5872ae102','1','1','1','18340040155','985404071@qq.com','985404071','山东省莱芜市和庄镇张家台村','团员','22',''),('201406012146','赵海瑞','319150f50dc2c7a46c39e938d2d7feef','1','1','1','17862123153','951292798@qq.com','951292798','','','',''),('201406012147','赵燕阁','e2ccf4536b29b21e09fb49b7a4162783','1','1','1','13287368917','976673414@qq.com','976673414','聊城市','团员','22','无'),('201406012148','赵昱植','8f6997fa3f0c554f8e547892d4a5d592','1','1','1','17852217065','498051065@qq.com','498051065','甘肃','共青团员','21','在校学生'),('201406012150','郑文山','38d5a0bd2f7933286d3af57610070870','1','1','1','','','','','','',''),('201406012151','周健','e7ed4cdf974e3ea0ad54f2edf37645b2','1','1','1','15110219405','1298816190@qq.com','1298816190','河北保定易县','团员','23','群众'),('201406014102','程大龙','03a6c4137ea0fd802a07a1dae86bd56c','1','3','2','17862127270','1061071661@qq.com','1061071661','黑龙江绥化','共青团员','22',''),('201406014103','董文强','397574041b7573412aef474796dba1d8','1','3','2','17862177375','keasion166@166.com','943843699','','','',''),('201406014104','樊俊飞','0371cbe55b5085ff1e6dc00bbe5d3f53','1','3','2','17862123978','210089015@qq.com','210089015','山东东营','团员','21','无'),('201406014105','付稳稳','7855407395602f4f2cc6869cbb80f0e5','1','3','2','15550561280','1363307612@qq.com','1363307612','山东省菏泽市','共青团员','23','学生'),('201406014106','付雨明','c3af645909db070d533f23971252600c','1','3','2','15315057539','1014899385@qq.com','1014899385','山西','团员','22',''),('201406014107','公伟','d5dd5e88c10df6be2465179e33223e28','1','3','2','17862123991','1948393707@qq.com','1948393707','山东省临沂市沂水县','共青团员','21','学生'),('201406014108','郭茂城','03a6c4137ea0fd802a07a1dae86bd56c','1','3','2','17862123965','846291392@qq.com','846291392','山东临沂','共青团员','23','学生'),('201406014109','郝丽娜','689949f0dda758497959532c34774863','1','3','2','17778022795','17778022795@163.com','1099740593','河北省','共青团员','22',''),('201406014110','胡志承','89a931bc0b7aea58c3467e7ac6f4e2d0','1','3','2','17686555698','hugooood@outlook.com','','','','',''),('201406014111','黄茂富','03a6c4137ea0fd802a07a1dae86bd56c','1','3','2','15552745099','1755808168@qq.com','1755808168','广东','共青团','23','学生'),('201406014112','李倩','72eca1f34fe6d1a8df5310366802091c','1','3','2','17862123986','1506142584@qq.com','1506142584','山东省莱州市','团员','23','学生'),('201406014113','李檠','e837549db4ef3fea1ac521a94b28e67d','1','3','2','15552798780','1446394623@qq.com','1446394623','云南','共青团员','21','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201406014114','李赛赛','b88509887703cbca5c31d832c1b79642','1','3','2','17862123983','17862123983@163.com','809607695','山东省临沂市','共青团员','23','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201406014115','李胜山','21c3ab1305bb05ad52717737da8c9d1e','1','3','2','17862123988','1780094091@qq.com','1780094091','山东德州陵城区斜庙村','共青团员','23','学生'),('201406014116','刘占福','7e90b5f57de68a80aeaf5da465ddf414','1','3','2','','630220085@qq.com','','','','',''),('201406014117','吕堃堃','ad08c054d0c2de96a88c315af285d620','1','3','2','17862123977','357490793@qq.com','357490793','山东省莱芜市','共青团员','22','无'),('201406014118','吕娜','a8391bcf7b5c2d6c273c0ec44fd1a943','1','3','2','17602291766','1436199346@qq.com','1436199346','山东省聊城市东昌府区斗虎屯镇西吕村','团员','23','学生'),('201406014119','马壮','d968c5d3aafa641479f5b200bebc4d21','1','3','2','17862127049','1592929007@qq.com','1592929007','辽宁省丹东市','团员','22','学生'),('201406014120','门敬文','7ef7bfe1deadd76aa58737377dee3571','1','3','2','17695756142','2505998310@qq.com','2505998310','山东省聊城市东阿县姜楼镇','团员','22','学生'),('201406014121','孟鑫庆','d62200bf965323812d46157df6479305','1','3','2','15554668770','490076382@qq.com','490076382','山东聊城','共青团员','23','无'),('201406014122','彭尚飞','843a4f7b4f54b9178900f586a47afe69','1','3','2','17862123995','1034278197@qq.com','1034278197','','','',''),('201406014123','叔雨婷','75de9477b1fe73f771ee1fdfecf42c72','1','3','2','15553840521','58321529@qq.com','58321529','黑龙江省安达市','团员','22','学生'),('201406014124','苏惠惠','7227221511ffe2c7cacea99948d30238','1','3','2','15552416919','15552416919@163.com','2365224009','山东济宁','预备党员','22','无'),('201406014125','孙张品','61775967b663d739327b4cb087cf5ea7','1','3','2','17862177289','szp2015@163.com','762986701','','','',''),('201406014126','谭朝勋','9fffe1af908f053c0aa69381507483aa','1','3','2','','TanZX2018@163.com','','','','',''),('201406014127','王朝阳','b66e904478aade14ff913c8457d4c8c8','1','3','2','15553820871','836490515@qq.com','836490515','山东省德州市','共青团员','21','学生'),('201406014128','王洁','36aa4b9acbdc5154f8020f942f957a7d','1','3','2','15554617682','875852208@qq.com','875852208','安徽','团员','23',''),('201406014129','王明莹','60bc75c64b84eb0fd19451f25c67b3e5','1','3','2','17611685506','1172157739@qq.com','','河北保定','汉','',''),('201406014130','王清','0aa2d5d835b43cff69232502fd106214','1','3','2','17862125828','1003485391@qq.com','1003485391','云南省大理白族自治州大理市下关镇','团员','22','学生'),('201406014131','王森','852290e98e9f143ebabdad1d63e533b0','1','3','2','13287645641','1169956381@qq.com','1169956381','陕西省宜君县','共青团员','20','学生'),('201406014132','王文豪','69b3a186ec75ec65a2d9b6750f0c6304','1','3','2','17852210500','1255032789@qq.com','1255032789','山东济宁','团员','20','学生'),('201406014133','王有川','9a3fa025421052772f9a3927d40bab60','1','3','2','17862123985','1653839733@qq.com','1653839733','山东巨野','团员','18','学生'),('201406014134','王禹','40559f6979d62c7d52923d3f09dd10b5','1','3','2','17862123981','190148554@qq.com','190148554','山东省济宁市鱼台县','团员','23','学生'),('201406014135','吴敬圻','2fa70d6467f9474f0a69b1d4d16e3000','1','3','2','15253688261','823730052@qq.com','823730052','山东潍坊','共青团员','22','学生'),('201406014136','吴明明','b4777e2542ab1b84876246feb709daed','1','3','2','15510894520','15510894520@163.com','1176649929','山东省临沂市平邑县','共青团员','22','学生'),('201406014137','颜浩然','61775967b663d739327b4cb087cf5ea7','1','3','2','13287366800','yhr99999@126.com','444962128','山东省济宁市任城区南张镇','团员','22','学生'),('201406014138','杨星辰','bcd4c6bfbb4a2ef6272564baa3ae8a0a','1','3','2','15550558962','435583115@qq.com','435583115','山东省威海市','共青团员','22','学生'),('201406014139','张浩凯','f1d11153c358103b70dee306cb0683b3','1','3','2','13276472577','987363568@QQ.com','987363568','河北石家庄','团员','22','学生'),('201406014140','张敏','6a79d6509042672f23f66427f8016912','1','3','2','13255602354','547613406@qq.com','547613406','山东省临沂市','团员','22','学生'),('201406014141','张亭亭','3e03d525f7624a3ae78866424f13ea90','1','3','2','15552750189','1207440986@qq.com','1207440986','山东省日照市岚山区黄墩镇张蒲汪村','团员','22',''),('201406014142','张云凯','a18b5bdf74075f02064cd1ddfe213795','1','3','2','15552776839','1130218450@qq.com','1130218450','河北省石家庄市栾城区冶河镇南客村','共青团员','23','学生'),('201406014143','张振洲','70b714a1dde6c8014c470202de832e7c','1','3','2','13285465189','894837369@qq.com','894837369','山东省滕州市','团员','22','学生'),('201406014144','赵晶晶','e8125c2f0caf034b69dfeb54fe7b9cce','1','3','2','15552743820','1242774099@qq.com','1242774099','山东济宁','团员','22','人民群众'),('201406014145','周晨晨','0aa2d5d835b43cff69232502fd106214','1','3','2','15552732259','1594770978@qq.com','1594770978','山东省金乡县','团员','22','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201406014146','周天娇','b133e9caa9e0ab598c7136a355993602','1','3','2','13920653802','2511898845@qq.com','2511898845','辽宁省铁岭市','团员','22','程序员');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201606032101','卜勇健','6997e2cfa5fdaee0b81841085a86905c','1','2','3','13287308167','1612817775@qq.com','1612817775','山东省滨州市滨城区','团员','24','学生'),('201606032102','巩传玉','8922899c2a7eaaa6af327124178c18d5','1','2','3','15554650907','1101858492@qq.com','1101858492','山东省临沂市','共青团员','24','学生'),('201606032103','韩冬','ce71ae9869476c1887accdecb1750e5a','1','2','3','15554616592','371254840@qq.com','371254840','山东聊城冠县','团员','24','学生'),('201606032104','韩蛟','c9c88be04994199279bceb128c91314f','1','2','3','18560276279','727097170@qq.com','727097170','山东省淄博市临淄区','团员','22','学生'),('201606032105','康佳飞','de7d2dcfd52d955ec964147ff5107c89','1','2','3','13287309163','978147028@qq.com','978147028','山东省菏泽市巨野县田桥镇','共青团员','23','无'),('201606032106','康立波','60ee0e9182fd08e7cfe763aa7394b48f','1','2','3','13275469573','1426830024@qq.com','1426830024','东营市东营区辛镇村','团员','22','教师'),('201606032107','李建','ad6289869bef9aa495bd4f2049d271e5','1','2','3','18765762395','1205589644@qq.com','1205589644','山东潍坊','共青团员','23','学生'),('201606032108','梁冰','4423069bceaf124bb421fdf31a5912f1','1','2','3','13176839006','2862329096@qq.com','2862329096','山东省泰安市','团员','23','学生'),('201606032109','刘承旭','e9fc251debeede296f4927a5a4df8c5c','1','2','3','13287318223','liuchengxu1994@gmail.com','772092761','山东省莱阳市','共青团员','22','学生'),('201606032110','刘新富','f6e984c795ab67f8881132ed0a2c7c73','1','2','3','','','','','','',''),('201606032111','刘雪松','9d0eca3ce27ae294c6e39bda300a1043','1','2','3','13127130029','798954293@qq.com','798954293','山东省济南市','团员','23',''),('201606032112','任祺光','01aa8e20e8cda83a345e4a6b4db78f09','1','2','3','18678229492','384296713@qq.com','384296713','山东省淄博市桓台县索镇镇','团员','22','群众'),('201606032113','宋远征','5f6974a3bfb4c81676c675f00e17faf1','1','2','3','15552401977','906423838@qq.com','906423838','山东','共青团员','24','学生'),('201606032114','孙健','6c17c4fae356874b22538270eb1f8f85','1','2','3','13287308906','778792260@qq.com','778792260','山东菏泽','共青团员','23',''),('201606032115','王春鹏','162e92d4a2ca918f586fa537ad35efac','1','2','3','15554612160','1836379400@qq.com','1836379400','山东省潍坊安丘','团员','23','学生'),('201606032116','王伟利','4b34f33ac78be240910140e78b38bb48','1','2','3','13287307662','395434926@qq.com','395434926','山东潍坊','共青团员','23',''),('201606032117','成梦飞','fff7932378a508c99d9223de5a103a4e','1','2','3','13287310692','948630489@qq.com','948630489','山东省东营市广饶县','共青团员','22','无'),('201606032118','冯海燕','0e44d86a43c5fed25e8a171b433d7632','1','2','3','18562079633','835397975@qq.com','835397975','山东省淄博市','共青团员','23','无'),('201606032119','侯祺丹','0efcc9c9d395d3c3eeceeb0a61ff1f39','1','2','3','15552742258','641244245@qq.COM','641244245','山东枣庄','共青团员','24','无'),('201606032120','侯庆莹','7b7f6643f87e69cec325bd26ef63177a','1','2','3','15554696059','2831646106@qq.com','2831646106','山东省济宁市','共青团员','22',''),('201606032121','姜清欣','05d373e2a8882e32fd22eb13492e9139','1','2','3','15552419322','1047880275@qq.com','1047880275','山东省日照市五莲县','共青团员','22','学生'),('201606032122','李丽萍','4beca7b43ee7f99d9f71f0164acdda60','1','2','3','13287319096','1971036665@qq.com','1971036665','山东省临沂市平邑县白彦镇山阴村','共青团员','23','学生'),('201606032123','李梦瑶','ce8ba8bc777373c42a7838eb8791183a','1','2','3','15552752522','872236304@qq.com','872236304','山东省滨州市阳信县','团员','23','学生'),('201606032124','李余敏','4593c352e7520b3d0f1d1e625b579a3d','1','2','3','18860622835','2834365032@qq.com','2834365032','山东省东营市垦利区垦利街道','共青团员','24','学生'),('201606032125','刘艳','a0a3f47762f701244b0f7d70340cf979','1','2','3','15066063031','1289505271@qq.com','1289505271','山东菏泽单县','团员','23','学生'),('201606032126','鲁红婕','8a5eb0cd6c46d881933d9628c85a52c6','1','2','3','18860622858','1273314407@qq.com','1273314407','山东省济南市','团员','23',''),('201606032127','栾赟','76eec9d14fe0a6565ae87094826a78c6','1','2','3','18561226632','271050213@qq.com','271050213','山东省青岛市城阳区','中共党员','22','学生'),('201606032128','毛琳琳','3f7483b0653d7ee17b7dbfc7c61cbad7','1','2','3','13287306212','1355178571@qq.com','1355178571','山东省临沂市平邑县','中共党员','23','学生'),('201606032129','任凯英','5965d120bae9b592cfde2f77b2af1ef5','1','2','3','18860622865','2872641264@qq.com','2872641264','山东省菏泽市东明县','团员','24',''),('201606032130','孙婧','e05f583864b67d8e956d5037151f45f4','1','2','3','18860622872','945222184@qq.com','945222184','山东省滨州市邹平县','共青团员','24','无');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201606032201','王晓旭','a6d6f697cde90a13d02ef018984bf3e9','1','2','4','15552418873','1213716127@qq.com','1213716127','山东滨州','中共党员','22','');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201606032202','王钰浩','c6456d85d9f2601f48a22c7f76be08d3','1','2','4','15554613287','510269596@qq.com','510269596','山东省济南市长清区张夏镇','共青团员','24','学生'),('201606032203','魏长健','f0b71aafad193a9deb661d1350d97b8d','1','2','4','18669931036','912626516@qq.com','912626516','山东省临沂市平邑县','团员','25',''),('201606032204','谢汝成','58e8f40772da54b5c648cc1a264b1fdb','1','2','4','13287361466','xierucheng@foxmail.com','1466718864','山东省济宁市兖州区','共青团员','23','学生'),('201606032205','谢衍凯','5c7a3eed8a1297c7ad42e57eb4dd1a90','1','2','4','15864490993','15864490993@163.com','317743614','山东淄博','团员','22',''),('201606032206','辛震','975c6080400b04381a82a5ea8846c3ff','1','2','4','15615822019','809052516@qq.com','809052516','山东省滨州市邹平县','共青团员','23','学生'),('201606032207','邢连月','eb2ae4a928c3e2df60208f7d40e49e1c','1','2','4','18766799994','384717718@qq.com','384717718','山东省德州市武城县','团员','23','学生'),('201606032208','许皆民','b736beafe1cb98685d30d205730c858e','1','2','4','15553890273','2398731053@qq.com','2398731053','','','',''),('201606032209','张瑞东','a2d34be699844313734d9c303009d729','1','2','4','18661969408','278203862@qq.com','278203862','山东省青岛市市北区浮山后二小区B3号楼四单元602','团员','22','学生'),('201606032210','张世杰','803c0ffe32e4148636e87070901b7a0c','1','2','4','13287307358','1532139357@qq.com','1532139357','汉族','团员','23','3'),('201606032211','张树顺','5800610bf6ee01387011c1523d0db5ae','1','2','4','15552731233','331828503@qq.com','331828503','山东省菏泽市','共青团员','22',''),('201606032212','张晓晨','c1be73b071864e4112dd4a9d728cc91e','1','2','4','15762186588','745452177@qq.com','745452177','山东滨州','共青团员','23',''),('201606032213','张兴杨','5d6e0d95dadc57ff1ab4948f3847aeaf','1','2','4','15615041562','zhang280317414@qq.com','280317414','山东省青州市云门山南路5358号','共青团员','23','学生'),('201606032214','赵庆祥','cd80667f5afc059b38c7723c29065eb0','1','2','4','15275051010','927971645@qq.com','927971645','山东省菏泽市','共青团员','26','学生'),('201606032215','赵玉科','4205a06bba927ca372f56a26645a68bd','1','2','4','18860622930','2775699652@qq.com','2775699652','山东省青岛市黄岛区','共青团员','23',''),('201606032216','朱陈康','19b28531270d780ce983f7721cae8bef','1','2','4','18905491970','zck195@163.com','65751905','山东省日照市东港区','团员','23','学生'),('201606032217','孙雯','b28e1b88bbc085e175cf18d0b902f4c5','1','2','4','18860622873','592139814@qq.com','592139814','山东省青岛市即墨区','共青团员','23','无'),('201606032218','孙晓彤','72e9085e6862ac74ed35af5c642a3027','1','2','4','18860622875','593164001@qq.com','593164001','山东省青州市','共青团员','24','无'),('201606032219','田一凡','156f4bb22ffe34b70c8badfb080bb3c3','1','2','4','15106700698','714558820@qq.com','714558820','山东省济宁市金乡县','共青团员','22',''),('201606032220','王贝贝','f4a1fe803e30626aec3a34cc0d398261','1','2','4','15564612511','1256587112@qq.com','1256587112','.山东省潍坊市','团员','22','无'),('201606032221','王博琳','34fcf35e96b6f0378b163afca2b9ea19','1','2','4','18561226721','462827807@qq.com','462827807','山东省淄博市桓台县新城镇乔北村','共青团员','23','群众'),('201606032222','王国华','c3d9af42be2352f33181b0ddaf8b45b0','1','2','4','15554601077','2827338325@qq.com','2827338325','山东省曹县魏湾镇申庄寨行政村','共青团员','26',''),('201606032223','王海迪','b5e745e254661f5c77647245f22ce8f3','1','2','4','18860622889','862695035@qq.com','862695035','','','',''),('201606032224','王娟','f018cb87d0275117d10f079cc09316f6','1','2','4','18562940705','2457116834@qq.com','2457116834','山东省东营市河口区河滨小区','共青团员','22',''),('201606032225','吴嫚嫚','4f964bf8131bc348b4bb56feb11d941a','1','2','4','18366147521','970936474@qq.com','970936474','山东省菏泽市郓城县李集镇范庄村','共青团员','23',''),('201606032226','胥丹宁','cc15ce83535ffe91fc1f9383c7642094','1','2','4','18860622908','tanninxu@163.com','506950265','山东省东营市东城锦苑一区','团员','22','群众'),('201606032227','许薰尹','7c45d691e12638bf6bd46a9ca31c4f8d','1','2','4','15552797391','xuxy1215@163.com','1174324828','山东省淄博市临淄区齐陵街道办事处淄河新村','共青团员','22','学生'),('201606032228','于丽丽','3d8a12cd61ab37ac91a739ba2dac1a84','1','2','4','15621539611','1370372142@qq.com','1370372142','山东省济宁市梁山县韩岗镇房村','共青团员','23',''),('201606032229','张君','37a8ee266275e31a63a847a15325c68a','1','2','4','13006541026','877397101@qq.com','877397101','山东省东营市','团员','23','学生'),('201606032230','张胜南','97ade7c220cdbf4c9e87855acff0df9d','1','2','4','18354683393','1292760089@qq.com','1292760089','山东省济宁市汶上县','团员','23','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('201606032231','张潇','61cebcddc1f7df1d7d7dad78087f7a2c','1','2','4','17862175367','842003415@qq.com','842003415','山东省菏泽市定陶区','共青团员','23','学生');/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('22','22','b6d767d2f8ed5d21a44b0e5886680cb9','1','3','2','','1755808168@qq.com','','','','',''),('33','33','182be0c5cdcd5072bb1864cdee4d3d6e','1','3','2','','1755808168@qq.com','','','','','');/* MySQLReback Separation */
 /* 创建表结构 `tp_task` */
 DROP TABLE IF EXISTS `tp_task`;/* MySQLReback Separation */ CREATE TABLE `tp_task` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师下达任务书';/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201406014111','1','009','3','&lt;p&gt;你好&lt;/p&gt;','&lt;p&gt;你好&lt;/p&gt;','&lt;p&gt;你好&lt;br&gt;&lt;/p&gt;','&lt;p&gt;你好&lt;br&gt;&lt;/p&gt;','','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201606032106','14','012','2','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 该系统要求实现图的可视化建立和图的遍历的动态演示，主要模块包括图中节点的建立，弧（边）的建立，节点的插入和删除动态演示，图的深度优先遍历和广度优先遍历的动态演示，支持图的自动销毁和建立，以及图的存储结构的直观演示。&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求界面简洁美观，使用简单易操作，功能完善。&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;编程实现客户端系统，采用&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;C&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;或者&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;java&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;编程工具实现相关模块的编程。&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求查阅相关&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发语言、数据结构相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有关数据结构的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;软件能够演示插入节点、删除节点、图的存储结构的直观演示并实现图的遍历动态演示过程。&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','/Public/Teacher/d2490f048dc3b77a457e3e450ab4eb38/2018-03-05/5a9d35203cb7c.docx','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201406012101','16','012','1','&lt;ol&gt;&lt;li&gt;&lt;p&gt;学习掌握相关程序开发语言、网络协议知识。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;对系统进行前期调研，做出详细的需求分析，提出总体设计方案功能模块的设计步骤。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;该系统要求实现一个简单的PC与PC，ＰＣ与phone，phone与phone之间的通话功能，利用传输控制协议和互联网协议原理，winsoch以及流式套接字来完成设计，用电脑客户端实现通话功能功能。要求掌握VisualC++6.0，winsock,tcpip协议，网络知识。要求熟悉Visual C++6.0开发环境。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;要求界面简洁美观，使用简单易操作，功能完善。&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1. 要求查阅相关&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发语言、网络协议等相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有网络的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;能够简单实现PC与PC，ＰＣ与phone，phone与phone之间的通话功能。&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','/Public/Teacher/d2490f048dc3b77a457e3e450ab4eb38/2018-03-05/5a9d371fbc292.docx','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201606032102','16','012','2','&lt;ol&gt;&lt;li&gt;&lt;p&gt;学习掌握相关程序开发语言、网络协议知识。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;对系统进行前期调研，做出详细的需求分析，提出总体设计方案功能模块的设计步骤。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;该系统要求实现一个简单的PC与PC，ＰＣ与phone，phone与phone之间的通话功能，利用传输控制协议和互联网协议原理，winsoch以及流式套接字来完成设计，用电脑客户端实现通话功能功能。要求掌握VisualC++6.0，winsock,tcpip协议，网络知识。要求熟悉Visual C++6.0开发环境。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;要求界面简洁美观，使用简单易操作，功能完善。&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1。&amp;nbsp;&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求查阅相关&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发语言、网络协议等相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有网络的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;要求实现一个简单的PC与PC，ＰＣ与phone，phone与phone之间的通话功能。&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','/Public/Teacher/d2490f048dc3b77a457e3e450ab4eb38/2018-03-05/5a9d376ddcde4.docx','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201406014140','17','012','3','&lt;ol&gt;&lt;li&gt;&lt;p&gt;学习掌握相关网络开发知识。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;对系统进行前期调研，做出详细的需求分析，提出总体设计方案功能模块的设计步骤。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;试题库管理系统可辅助教师对所教科目的各种试题的题型、知识点、难度等相关资料进行保存、查询等信息管理；并在需要对学生进行测验、评估的时候，从题库中抽取出相应要求的题目，组成一套试卷，进行考试。要求掌握Asp.net，C++，Java等，数据库知识，SQL数据库。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;要求界面简洁美观，使用简单易操作，功能完善。&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求查阅相关网络&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发、数据库等相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有关网络开发及数据库应用的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;试题库管理系统可辅助教师对所教科目的各种试题的题型、知识点、难度等相关资料进行保存、查询等信息管理；并在需要对学生进行测验、评估的时候，从题库中抽取出相应要求的题目，组成一套试卷，进行考试&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201606032101','17','012','2','&lt;ol&gt;&lt;li&gt;&lt;p&gt;学习掌握相关网络开发知识。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;对系统进行前期调研，做出详细的需求分析，提出总体设计方案功能模块的设计步骤。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;试题库管理系统可辅助教师对所教科目的各种试题的题型、知识点、难度等相关资料进行保存、查询等信息管理；并在需要对学生进行测验、评估的时候，从题库中抽取出相应要求的题目，组成一套试卷，进行考试。要求掌握Asp.net，C++，Java等，数据库知识，SQL数据库。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;要求界面简洁美观，使用简单易操作，功能完善。&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求查阅相关网络&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发、数据库等相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有关网络开发及数据库应用的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;试题库管理系统可辅助教师对所教科目的各种试题的题型、知识点、难度等相关资料进行保存、查询等信息管理；并在需要对学生进行测验、评估的时候，从题库中抽取出相应要求的题目，组成一套试卷，进行考试。&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','','1','');/* MySQLReback Separation */
 /* 插入数据 `tp_task` */
 INSERT INTO `tp_task` VALUES ('201406014109','134','012','3','&lt;ol&gt;&lt;li&gt;&lt;p&gt;学习掌握相关网络开发知识。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;对系统进行前期调研，做出详细的需求分析，提出总体设计方案功能模块的设计步骤。&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;主要内容：包括系统总框架界面，个人办公，公文管理，签报管理，公文考评，工作安排，工作流转，督察督办，企业资料等模块以及模块对应的数据表的设计与实现。该项目基于SSM框架使用Oracle数据进行开发，通过设计该课题，可以加深对网络、j2EE企业级开发、数据库、SQL语言的认识，提高对这些知识的综合应用水平，提高开发应用软件的综合能力。开发出的系统有一定的实用价值。要求界面简洁美观，使用简单易操作，功能完善。&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;1. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;要求查阅相关网络&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;开发、数据库等相关资料。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;2. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;检索相关文献资料，翻译有关网络开发及数据库应用的一些英文资料一篇。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3. &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文撰写要求：&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）要求提交功能完善，可操作性强的成型软件，并对软件进行功能测试；&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;2&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;） 提交完整的毕业设计说明书，并提供核心程序代码。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;（&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;）外文文献及翻译&lt;/font&gt;&lt;/p&gt;','&lt;p&gt;能够实现个人办公，公文管理，签报管理，公文考评，工作安排，工作流转，督察督办，企业资料等模块以及模块对应的数据表的设计与实现。&lt;br&gt;&lt;/p&gt;','&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;3&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 3 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt; 31&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;熟悉设计内容，查阅相关文献，撰写开题报告。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;课题详细调研，整理需求分析及详细设计。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;4&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;软件设计开发。 &lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;16&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;b&gt;&lt;font color=&quot;#000000&quot;&gt;~&lt;/font&gt;&lt;/b&gt;&lt;font color=&quot;#000000&quot;&gt; 5&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;30&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;毕业设计论文撰写。&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;1&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;经审查合格后打印装订论文&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;10&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日 &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;~6&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;月&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;15&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;日&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;论文答辩&lt;/font&gt;&lt;/p&gt;','','1','');/* MySQLReback Separation */
 /* 创建表结构 `tp_tea_ret_pwd` */
 DROP TABLE IF EXISTS `tp_tea_ret_pwd`;/* MySQLReback Separation */ CREATE TABLE `tp_tea_ret_pwd` (
  `num` char(20) NOT NULL COMMENT '教师工号',
  `code` char(32) NOT NULL COMMENT '验证码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `tp_tea_ret_pwd` */
 INSERT INTO `tp_tea_ret_pwd` VALUES ('admin','30c0a496a57bcc2c7c6c481342526729');/* MySQLReback Separation */
 /* 创建表结构 `tp_teacher` */
 DROP TABLE IF EXISTS `tp_teacher`;/* MySQLReback Separation */ CREATE TABLE `tp_teacher` (
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
  `qq` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为管理员',
  `dean` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为院长',
  `specialty` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为系主任',
  `adviser` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否为指导老师',
  `total_stu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '该老师所带的学生数的最大值',
  `nowadays_stu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教师当前所带的学生数',
  PRIMARY KEY (`tea_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='教师';/* MySQLReback Separation */
 /* 创建表结构 `tp_teacher_specialty` */
 DROP TABLE IF EXISTS `tp_teacher_specialty`;/* MySQLReback Separation */ CREATE TABLE `tp_teacher_specialty` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='专业毕设负责人，所负责的专业';/* MySQLReback Separation */
 /* 插入数据 `tp_teacher_specialty` */
 INSERT INTO `tp_teacher_specialty` VALUES ('1','009','2017-12-17 00:00:00','2018-03-17 00:00:00','2017-12-17 00:00:00','2018-03-17 00:00:00','2017-12-17 00:00:00','2018-03-17 00:00:00','2018-06-30 00:00:00'),('2','009','2017-12-17 00:00:00','2018-03-17 00:00:00','2017-12-17 00:00:00','2018-03-17 00:00:00','2017-12-17 00:00:00','2018-03-17 00:00:00','2018-06-30 00:00:00'),('3','009','2017-12-17 00:00:00','2018-04-27 00:00:00','2017-12-17 00:00:00','2018-04-25 00:00:00','2017-12-17 00:00:00','2018-04-26 00:00:00','2018-06-30 00:00:00'),('4','11','2018-03-20 00:00:00','2018-05-24 00:00:00','2018-03-29 00:00:00','2018-06-13 00:00:00','2018-03-29 00:00:00','2018-06-13 00:00:00','2018-10-24 00:00:00');/* MySQLReback Separation */
 /* 创建表结构 `tp_top_temporary` */
 DROP TABLE IF EXISTS `tp_top_temporary`;/* MySQLReback Separation */ CREATE TABLE `tp_top_temporary` (
  `tea_number` char(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `top` tinyint(4) NOT NULL COMMENT '课题类型1盲选，2指定选，3团队选',
  `content` text NOT NULL COMMENT '内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='申请课题-保存表';/* MySQLReback Separation */
 /* 创建表结构 `tp_topic` */
 DROP TABLE IF EXISTS `tp_topic`;/* MySQLReback Separation */ CREATE TABLE `tp_topic` (
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
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课题表';/* MySQLReback Separation */
 /* 创建表结构 `tp_topic_f` */
 DROP TABLE IF EXISTS `tp_topic_f`;/* MySQLReback Separation */ CREATE TABLE `tp_topic_f` (
  `top_id` int(11) DEFAULT NULL COMMENT '课题编号',
  `dep_id` int(11) DEFAULT NULL COMMENT '专业',
  `audit` tinyint(4) DEFAULT '0' COMMENT '审核状态，0未审核，1通过审核，没通过的直接删除节省内存',
  `rele` tinyint(4) DEFAULT '0' COMMENT '是否发布0没发布，1发布（可以选题），2发布，学生可以查看结果',
  KEY `top` (`top_id`),
  KEY `dep_id` (`dep_id`),
  KEY `audit` (`audit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课题课题适合的专业';/* MySQLReback Separation */
 /* 创建视图 `tp_view_cla_stu_ove` */
 DROP VIEW IF EXISTS `tp_view_cla_stu_ove`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_cla_stu_ove` AS select `cl`.`dep_id` AS `dep_id`,`cl`.`dep_name` AS `dep_name`,`cl`.`dep_father` AS `dep_father`,sum((case when isnull(`st`.`stu_number`) then 0 else 1 end)) AS `renshu`,sum((case when isnull(`ov`.`stu_number`) then 0 else 1 end)) AS `tijiao`,sum((case when (`ov`.`score` > 89) then 1 else 0 end)) AS `you`,sum((case when ((`ov`.`score` > 79) and (`ov`.`score` < 90)) then 1 else 0 end)) AS `lang`,sum((case when ((`ov`.`score` > 69) and (`ov`.`score` < 80)) then 1 else 0 end)) AS `zhong`,sum((case when ((`ov`.`score` > 60) and (`ov`.`score` < 70)) then 1 else 0 end)) AS `jige`,sum((case when ((`ov`.`score` >= 0) and (`ov`.`score` < 60)) then 1 else 0 end)) AS `bujige`,sum((case when isnull(`ov`.`score`) then 1 else 0 end)) AS `kong` from (`tp_class` `cl` join (`tp_student` `st` left join `tp_overall` `ov` on((`st`.`stu_number` = `ov`.`stu_number`)))) where (`cl`.`dep_id` = `st`.`dep_class`) group by `cl`.`dep_id`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_col_spe` */
 DROP VIEW IF EXISTS `tp_view_col_spe`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_col_spe` AS select `tp_college`.`dep_name` AS `college`,`tp_specialty`.`dep_id` AS `dep_id`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_specialty`.`dep_father` AS `dep_father` from (`tp_college` join `tp_specialty`) where (`tp_college`.`dep_id` = `tp_specialty`.`dep_father`);/* MySQLReback Separation */
 /* 创建视图 `tp_view_grade` */
 DROP VIEW IF EXISTS `tp_view_grade`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_grade` AS select `s`.`stu_number` AS `stu_number`,`s`.`name` AS `name`,`s`.`dep_college` AS `dep_college`,`s`.`dep_major` AS `dep_major`,`s`.`dep_class` AS `dep_class`,`o`.`top_id` AS `top_id`,`o`.`top_name` AS `top_name`,`o`.`tea_name` AS `tea_name`,`o`.`tea_number` AS `tea_number`,`o`.`z_id` AS `z_id`,`o`.`z_name` AS `z_name`,`o`.`b_id` AS `b_id`,`o`.`b_name` AS `b_name`,`o`.`grade` AS `grade`,`o`.`zdgrade` AS `zdgrade`,`o`.`pingyuegrade` AS `pingyuegrade`,`o`.`dabiangrade` AS `dabiangrade`,`o`.`score` AS `score`,`o`.`genera` AS `genera`,`o`.`content1` AS `content1`,`o`.`content2` AS `content2`,`o`.`content3` AS `content3`,`o`.`pinyue` AS `pinyue`,`o`.`zhidao` AS `zhidao`,`o`.`dabian` AS `dabian`,`o`.`rele` AS `rele` from (`tp_student` `s` left join `tp_overall` `o` on((`s`.`stu_number` = `o`.`stu_number`))) order by `s`.`stu_number`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_rssstt` */
 DROP VIEW IF EXISTS `tp_view_rssstt`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_rssstt` AS select distinct `r`.`tea_number` AS `review1`,`s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`r`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`top_id` AS `top_id`,`t`.`name` AS `name` from ((((`tp_review` `r` join `tp_student` `s`) join `tp_specialty` `d`) join `tp_stu_topic` `st`) join `tp_topic` `t`) where ((`r`.`stu_number` = `s`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`s`.`stu_number` = `st`.`stu_number`) and (`st`.`top_id` = `t`.`top_id`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_spe_stu_ove` */
 DROP VIEW IF EXISTS `tp_view_spe_stu_ove`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_spe_stu_ove` AS select `sp`.`dep_id` AS `dep_id`,`sp`.`dep_name` AS `dep_name`,`sp`.`dep_father` AS `dep_father`,sum((case when isnull(`st`.`stu_number`) then 0 else 1 end)) AS `renshu`,sum((case when isnull(`ov`.`stu_number`) then 0 else 1 end)) AS `tijiao`,sum((case when (`ov`.`score` > 89) then 1 else 0 end)) AS `you`,sum((case when ((`ov`.`score` > 79) and (`ov`.`score` < 90)) then 1 else 0 end)) AS `lang`,sum((case when ((`ov`.`score` > 69) and (`ov`.`score` < 80)) then 1 else 0 end)) AS `zhong`,sum((case when ((`ov`.`score` > 60) and (`ov`.`score` < 70)) then 1 else 0 end)) AS `jige`,sum((case when ((`ov`.`score` >= 0) and (`ov`.`score` < 60)) then 1 else 0 end)) AS `bujige`,sum((case when isnull(`ov`.`score`) then 1 else 0 end)) AS `kong` from (`tp_specialty` `sp` join (`tp_student` `st` left join `tp_overall` `ov` on((`st`.`stu_number` = `ov`.`stu_number`)))) where (`sp`.`dep_id` = `st`.`dep_major`) group by `sp`.`dep_id`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_spe_top` */
 DROP VIEW IF EXISTS `tp_view_spe_top`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_spe_top` AS select `s`.`dep_id` AS `dep_id`,`s`.`dep_name` AS `dep_name`,`s`.`dep_father` AS `dep_father`,`t`.`opt` AS `opt`,`t`.`top_type` AS `top_type`,`f`.`audit` AS `audit`,`t`.`top_id` AS `top_id`,`f`.`rele` AS `rele` from ((`tp_specialty` `s` join `tp_topic` `t`) join `tp_topic_f` `f`) where ((`s`.`dep_id` = `f`.`dep_id`) and (`t`.`top_id` = `f`.`top_id`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_ssstd` */
 DROP VIEW IF EXISTS `tp_view_ssstd`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_ssstd` AS select distinct `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`dr`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_stu_topic` `st`) join `tp_topic` `t`) join `tp_draft` `dr`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`t`.`top_id` = `st`.`top_id`) and (`dr`.`stu_number` = `s`.`stu_number`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_sstsi` */
 DROP VIEW IF EXISTS `tp_view_sstsi`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_sstsi` AS select `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number`,`i`.`audit` AS `audit` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_topic` `t`) join `tp_stu_topic` `st`) join `tp_inspect` `i`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`st`.`top_id` = `t`.`top_id`) and (`i`.`stu_number` = `s`.`stu_number`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_sststf` */
 DROP VIEW IF EXISTS `tp_view_sststf`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_sststf` AS select distinct `s`.`stu_number` AS `stu_number`,`s`.`name` AS `sname`,`t`.`name` AS `name`,`t`.`top_id` AS `top_id`,`f`.`audit` AS `audit`,`d`.`dep_name` AS `dep_name`,`t`.`tea_number` AS `tea_number` from ((((`tp_student` `s` join `tp_specialty` `d`) join `tp_topic` `t`) join `tp_stu_topic` `st`) join `tp_finalize` `f`) where ((`s`.`stu_number` = `st`.`stu_number`) and (`s`.`dep_major` = `d`.`dep_id`) and (`st`.`top_id` = `t`.`top_id`) and (`f`.`stu_number` = `s`.`stu_number`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_std` */
 DROP VIEW IF EXISTS `tp_view_std`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_std` AS select `s`.`dep_college` AS `dep_college`,`s`.`dep_major` AS `dep_major`,`s`.`dep_class` AS `dep_class`,`s`.`stu_number` AS `stu_number`,`s`.`name` AS `stu_name`,`t`.`name` AS `t_name`,`t`.`top_id` AS `top_id`,`t`.`tea_number` AS `tea_number`,`t`.`tea_name` AS `tea_name`,`c`.`dep_name` AS `college`,`sp`.`dep_name` AS `specialty`,`cl`.`dep_name` AS `class` from (((((`tp_stu_topic` `st` join `tp_topic` `t`) join `tp_student` `s`) join `tp_college` `c`) join `tp_specialty` `sp`) join `tp_class` `cl`) where ((`st`.`stu_number` = `s`.`stu_number`) and (`st`.`top_id` = `t`.`top_id`) and (`s`.`dep_college` = `c`.`dep_id`) and (`s`.`dep_major` = `sp`.`dep_id`) and (`s`.`dep_class` = `cl`.`dep_id`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_stu_dep` */
 DROP VIEW IF EXISTS `tp_view_stu_dep`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_dep` AS select `tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_student`.`phone` AS `phone`,`tp_student`.`email` AS `email`,`tp_student`.`qq` AS `qq` from (`tp_specialty` join `tp_student`) where (`tp_specialty`.`dep_id` = `tp_student`.`dep_major`);/* MySQLReback Separation */
 /* 创建视图 `tp_view_stu_top` */
 DROP VIEW IF EXISTS `tp_view_stu_top`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_top` AS select `co`.`dep_name` AS `college`,`cl`.`dep_name` AS `class`,`sp`.`dep_name` AS `specialty`,`st`.`stu_number` AS `stu_number`,`st`.`name` AS `stu_name`,`st`.`dep_college` AS `dep_college`,`st`.`dep_major` AS `dep_major`,`st`.`dep_class` AS `dep_class`,`to`.`top_id` AS `top_id`,`to`.`name` AS `name`,`to`.`tea_number` AS `tea_number`,`to`.`tea_name` AS `tea_name` from (((((`tp_college` `co` join `tp_class` `cl`) join `tp_specialty` `sp`) join `tp_student` `st`) join `tp_topic` `to`) join `tp_stu_topic` `s_t`) where ((`co`.`dep_id` = `st`.`dep_college`) and (`sp`.`dep_id` = `st`.`dep_major`) and (`cl`.`dep_id` = `st`.`dep_class`) and (`st`.`stu_number` = `s_t`.`stu_number`) and (`s_t`.`top_id` = `to`.`top_id`)) group by `st`.`stu_number`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_stu_top_c` */
 DROP VIEW IF EXISTS `tp_view_stu_top_c`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_stu_top_c` AS select `tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_specialty`.`dep_name` AS `dep_name`,`tp_chaos_topic`.`top_id` AS `top_id`,`tp_chaos_topic`.`volunt` AS `volunt`,`tp_student`.`phone` AS `phone`,`tp_student`.`qq` AS `qq` from ((`tp_student` join `tp_specialty`) join `tp_chaos_topic`) where ((`tp_student`.`stu_number` = `tp_chaos_topic`.`stu_number`) and (`tp_student`.`dep_major` = `tp_specialty`.`dep_id`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_student` */
 DROP VIEW IF EXISTS `tp_view_student`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_student` AS select `tp_college`.`dep_name` AS `college`,`tp_specialty`.`dep_name` AS `specialty`,`tp_class`.`dep_name` AS `class`,`tp_student`.`stu_number` AS `stu_number`,`tp_student`.`name` AS `name`,`tp_student`.`dep_college` AS `dep_college`,`tp_student`.`dep_major` AS `dep_major`,`tp_student`.`dep_class` AS `dep_class`,`tp_student`.`phone` AS `phone`,`tp_student`.`email` AS `email` from (((`tp_student` join `tp_college`) join `tp_specialty`) join `tp_class`) where ((`tp_student`.`dep_college` = `tp_college`.`dep_id`) and (`tp_student`.`dep_major` = `tp_specialty`.`dep_id`) and (`tp_student`.`dep_class` = `tp_class`.`dep_id`));/* MySQLReback Separation */
 /* 创建视图 `tp_view_tea_rev` */
 DROP VIEW IF EXISTS `tp_view_tea_rev`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tea_rev` AS select `tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`name` AS `name`,`tp_review`.`audit` AS `audit`,`tp_teacher`.`dep_id` AS `dep_id`,`tp_review`.`stu_number` AS `stu_number` from (`tp_teacher` join `tp_review`) where (`tp_teacher`.`tea_number` = `tp_review`.`tea_number`);/* MySQLReback Separation */
 /* 创建视图 `tp_view_tea_top` */
 DROP VIEW IF EXISTS `tp_view_tea_top`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tea_top` AS select `tp_topic`.`name` AS `name`,`tp_topic`.`tea_name` AS `tea_name`,`tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`phone` AS `phone`,`tp_teacher`.`email` AS `email`,`tp_teacher`.`qq` AS `qq`,`tp_topic`.`top_id` AS `top_id`,`tp_college`.`dep_name` AS `dep_name` from ((`tp_topic` join `tp_teacher`) join `tp_college`) where ((`tp_topic`.`tea_number` = `tp_teacher`.`tea_number`) and (`tp_topic`.`dep_id` = `tp_college`.`dep_id`)) group by `tp_topic`.`top_id`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_teacher` */
 DROP VIEW IF EXISTS `tp_view_teacher`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_teacher` AS select `tp_teacher`.`tea_number` AS `tea_number`,`tp_teacher`.`name` AS `name`,`tp_college`.`dep_id` AS `dep_id`,`tp_college`.`dep_name` AS `dep_name`,`tp_teacher`.`email` AS `email` from (`tp_teacher` join `tp_college`) where (`tp_teacher`.`dep_id` = `tp_college`.`dep_id`);/* MySQLReback Separation */
 /* 创建视图 `tp_view_topic` */
 DROP VIEW IF EXISTS `tp_view_topic`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_topic` AS select `tp_topic_f`.`top_id` AS `top_id`,`tp_topic_f`.`dep_id` AS `zy`,`tp_topic_f`.`audit` AS `zy_audit`,`tp_topic`.`name` AS `name`,`tp_topic`.`tea_number` AS `tea_number`,`tp_topic`.`tea_name` AS `tea_name`,`tp_topic`.`genre` AS `genre`,`tp_topic`.`seientific` AS `seientific`,`tp_topic`.`practice` AS `practice`,`tp_topic`.`content` AS `content`,`tp_topic`.`opt` AS `opt`,`tp_topic`.`top_type` AS `top_type`,`tp_topic`.`youxiao` AS `youxiao`,`tp_topic`.`audit` AS `audit`,`tp_topic`.`dep_id` AS `dep_id`,`tp_topic_f`.`rele` AS `rele` from (`tp_topic_f` join `tp_topic`) where (`tp_topic`.`top_id` = `tp_topic_f`.`top_id`);/* MySQLReback Separation */
 /* 创建视图 `tp_view_tts` */
 DROP VIEW IF EXISTS `tp_view_tts`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_tts` AS select `t`.`dep_id` AS `dep_id`,`t`.`dep_name` AS `dep_name`,`t`.`dep_father` AS `dep_father`,`s`.`tea_number` AS `tea_number`,`s`.`topic_strat` AS `topic_strat`,`s`.`topic_close` AS `topic_close`,`s`.`choice_strat` AS `choice_strat`,`s`.`choice_close` AS `choice_close`,`s`.`teacher_strat` AS `teacher_strat`,`s`.`teacher_close` AS `teacher_close`,`s`.`paper_close` AS `paper_close` from (`tp_teacher_specialty` `s` join `tp_specialty` `t`) where (`s`.`dep_id` = `t`.`dep_id`) group by `t`.`dep_id`;/* MySQLReback Separation */
 /* 创建视图 `tp_view_waichu` */
 DROP VIEW IF EXISTS `tp_view_waichu`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_waichu` AS select `o`.`shenhe1` AS `shenhe1`,`o`.`shenhe2` AS `shenhe2`,`o`.`shenhe3` AS `shenhe3`,`o`.`stu_number` AS `stu_number`,`o`.`stu_name` AS `stu_name`,`o`.`id` AS `id`,`o`.`dep_college` AS `dep_college`,`o`.`college` AS `college`,`o`.`dep_major` AS `dep_major`,`o`.`major` AS `major`,`w`.`top_id` AS `top_id`,`o`.`phone` AS `phone`,`o`.`tea_number` AS `tea_number`,`o`.`tea_name` AS `tea_name` from (`tp_outside` `o` left join `tp_waichu` `w` on((`o`.`stu_number` = `w`.`stu_number`)));/* MySQLReback Separation */
 /* 创建视图 `tp_view_yu_topic` */
 DROP VIEW IF EXISTS `tp_view_yu_topic`;/* MySQLReback Separation */ CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tp_view_yu_topic` AS select `tp_topic`.`name` AS `name`,`tp_topic`.`tea_number` AS `tea_number`,`tp_topic`.`tea_name` AS `tea_name`,`tp_topic`.`genre` AS `genre`,`tp_chaos_topic`.`stu_number` AS `stu_number`,`tp_chaos_topic`.`volunt` AS `volunt`,`tp_topic`.`top_id` AS `top_id` from (`tp_topic` join `tp_chaos_topic`) where (`tp_topic`.`top_id` = `tp_chaos_topic`.`top_id`) order by `tp_chaos_topic`.`volunt`;/* MySQLReback Separation */
 /* 创建表结构 `tp_waichu` */
 DROP TABLE IF EXISTS `tp_waichu`;/* MySQLReback Separation */ CREATE TABLE `tp_waichu` (
  `top_id` int(11) DEFAULT '0',
  `stu_number` char(20) NOT NULL DEFAULT '',
  `dep_id` int(11) NOT NULL DEFAULT '0',
  KEY `topws` (`top_id`),
  KEY `stu` (`stu_number`),
  KEY `dep_id` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `tp_weekprogress` */
 DROP TABLE IF EXISTS `tp_weekprogress`;/* MySQLReback Separation */ CREATE TABLE `tp_weekprogress` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学生周进展报告';/* MySQLReback Separation */