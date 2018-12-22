<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 教师上传单个文件
 */
function upload($file){
    $config = array(
   'maxSize'    =>    3145728,
        'savePath'   =>    '/Public/Uploads/',
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','Ymd'),
    );
    $upload = new \Think\Upload($config);// 实例化上传类
    $info   =   $upload->uploadOne($file);
    if(!$info) {// 上传错误提示错误信息 
        return false;
    }else{// 上传成功 获取上传文件信息
        echo $info['savepath'].$info['savename']; 
        return $info;
    }
}
