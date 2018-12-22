<?php

return array(
    //'配置项'=>'配置值'
    'DEFAULT_FILTER' => 'htmlspecialchars,stripslashes',
    /** 配置邮件发送服务器 */
    'MAIL_HOST' => 'smtp.163.com', //smtp服务器的名称
    'MAIL_SMTPAUTH' => TRUE, //启用smtp认证
    'MAIL_USERNAME' => 'qq1755808168@163.com', //你的邮箱名
    'MAIL_FROM' => 'qq1755808168@163.com', //发件人地址
    'MAIL_FROMNAME' => '中国石油大学胜利学院', //发件人姓名
    'MAIL_PASSWORD' => '178621aa', //邮箱密码
    'MAIL_CHARSET' => 'utf-8', //设置邮件编码
    'MAIL_ISHTML' => TRUE, // 是否HTML格式邮件
    /* 数据库设置 */
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'diploma_project', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '123456', // 密码//4d3bdef6f9ad50ef9c2459427d5c0599
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'tp_', // 数据库表前缀

    /* 显示Trace */
    'SHOW_PAGE_TRACE' => true,
    /* 配置 URL_MODEL => 2 后生成的URL 是不带 index.php的呀！ */
    'URL_MODEL' => 2,
    /* 设置分组信息 */
    //'APP_GROUP_LIST'        =>  'Dean,Director,Home,Manager,Student,Teacher',
    'DEFAULT_GROUP' => 'Home',
    /* 如果是非法访问同意跳到这个页面去 */
    'error_go' => __ROOT__ . '/Home/Error',
    //提示语
    'error_talk' => '该页面不存在',
    /*     * 未登录统一跳到登录页面* */
    'login_go' => '/Home/Index/login',
    ////文件上传的大小
    'MAX_P_FILE' => '5553145728',
    //类型
    'FILE_P_TYPE' => array('jpg', 'gif', 'png', 'jpeg', 'rar', 'zip', 'doc', 'docx', 'pdf', 'xlsx', 'xls', 'mp4', 'mp3', 'ppt'), // 设置附件上传类型               
    //'ERROR_PAGE'=>'/Public/error.html' // 定义错误跳转页面URL地址
    //路径大小写
    'URL_CASE_INSENSITIVE' => false,
    //'SESSION_OPTIONS' => array('expire' => 30,)
);
