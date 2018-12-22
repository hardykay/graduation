<?php

//测试使用

 function p($val) {
     dump($val);
 }
  function sp($sql) {
      $re = M()->query($sql);
     dump($re);
 }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 邮件发送函数
 * @param type $to 账号
 * @param type $title 标题
 * @param type $content 内容
 * @return type
 */
function sendMail($to, $title, $content) {
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host = C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD'); //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to, "尊敬的用户");
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet = C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject = $title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端，来自中国石油大学胜利学院"; //邮件正文不支持HTML的备用显示
    //echo 'jdsjdjdjjd';
    return($mail->Send());
}

/**
 * 密码加密
 */
function encrypt($pwd) {
    return md5($pwd);
}

/**
 * 加密，用于上传文件
 */
function encryptFile($dir) {
    //return md5($pwd);
    return $dir;
}

/**
 * 
 * param integer $page 当前页
 * @param integer $pages 总记录数
 * @param string $url 跳转url地址  链接的形式      链接（包含其他参数）+/page/页码，最后的页数以 '/page/i' 追加在url后面
 * @param type $zd  显示最多的页数
 * @param type $shi 每页显示多少条，默认十条
 * @return string
 */
function getPageHtml($page, $count, $url, $zd = 5, $shi = 10) {
    //处理页码，每页十条记录
//  if($count%10 == 0){
//    $pages = (int)($count/10);
//  }  else {
//    $pages = (int)($count/10 + 1);
//  }
    $pages = ($count % $shi == 0) ? (int) ($count / $shi) : (int) ($count / $shi + 1);
    //最多显示多少个页码
    $_pageNum = $zd;
    //当前页面小于1 则为1
    $page = $page < 1 ? 1 : $page;
    //当前页大于总页数 则为总页数
    $page = $page > $pages ? $pages : $page;
    //页数小当前页 则为当前页
    $pages = $pages < $page ? $page : $pages;

    //计算开始页
    $_start = $page - floor($_pageNum / 2);
    $_start = $_start < 1 ? 1 : $_start;
    //计算结束页
    $_end = $page + floor($_pageNum / 2);
    $_end = $_end > $pages ? $pages : $_end;

    //当前显示的页码个数不够最大页码数，在进行左右调整
    $_curPageNum = $_end - $_start + 1;
    //左调整
    if ($_curPageNum < $_pageNum && $_start > 1) {
        $_start = $_start - ($_pageNum - $_curPageNum);
        $_start = $_start < 1 ? 1 : $_start;
        $_curPageNum = $_end - $_start + 1;
    }
    //右边调整
    if ($_curPageNum < $_pageNum && $_end < $pages) {
        $_end = $_end + ($_pageNum - $_curPageNum);
        $_end = $_end > $pages ? $pages : $_end;
    }

    $_pageHtml = '<ul class="pagination">';
    /* if($_start == 1){
      $_pageHtml .= '<li><a title="第一页">«</a></li>';
      }else{
      $_pageHtml .= '<li><a  title="第一页" href="'.$url.'/page/1">«</a></li>';
      } */
    if ($page > 1) {
        $_pageHtml .= '<li><a  title="首页" href="' . $url . '/page/1">首页</a></li>';
    }
    if ($page > 1) {
        $_pageHtml .= '<li><a  title="上一页" href="' . $url . '/page/' . ($page - 1) . '">上一页</a></li>';
    }
    for ($i = $_start; $i <= $_end; $i++) {
        if ($i == $page) {
            $_pageHtml .= '<li class="active"><a>' . $i . '</a></li>';
        } else {
            $_pageHtml .= '<li><a href="' . $url . '/page/' . $i . '">' . $i . '</a></li>';
        }
    }
    /* if($_end == $pages){
      $_pageHtml .= '<li><a title="最后一页">»</a></li>';
      }else{
      $_pageHtml .= '<li><a  title="最后一页" href="'.$url.'/page/'.$pages.'">»</a></li>';
      } */
    if ($page < $_end) {
        $_pageHtml .= '<li><a  title="下一页" href="' . $url . '/page/' . ($page + 1) . '">下一页</a></li>';
    }
    if ($pages != 1 && $page != $pages) {
        $_pageHtml .= '<li><a  title="尾页" href="' . $url . '/page/' . ($pages) . '">尾页</a></li>';
    }
    $_pageHtml .= '</ul>';
    return $_pageHtml;
}

/**
 * 
 * @param type $file_name 当前目录的子目录
 * @param type $file_dir当前目录——》系统根目录
 */
function downfile($file_name, $file_dir = '.', $name = '') {
    if (empty($name)) {
        $name = end(explode('/', $file_name));
    } else {
        $name = $name . '.' . end(explode('.', $file_name));
    }
    import('ORG.Net.Http');
    $http = new \Org\Net\Http();
    $http->download($file_dir.$file_name,$name);
}

function reminding($string, $i = 1, $color = '#888888') {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div style="height:100px;"></div><div style="color:', $color, ';font-size:60px;width:750px;margin:0 auto">', $string, '</div>';
    if ($i == 1) {
        exit();
    }
}

/**
 * 读取json文件
 * @param type $url 路径
 */
function readJson($url='') {
    if($url==''){
        $url = __DIR__.'/systemSetting.json';
    }
    // 从文件中读取数据到PHP变量  
    $json_string = file_get_contents($url);
    // 把JSON字符串转成PHP数组  
    $data = json_decode($json_string, true);
    return $data;
}

/**
 * 写入json
 * @param type $data  写入的数组
 * @param type $url 路径
 */
function writeJson($data, $url='') {
    if($url==''){
        $url = __DIR__.'/systemSetting.json';
    }
    // 把PHP数组转成JSON字符串  
    $json_string = json_encode($data);
    // 写入文件  
    file_put_contents($url, $json_string);
}
