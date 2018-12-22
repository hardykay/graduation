<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            
if(isset($_FILES['file']) && $_FILES['file']['error'] === 0){
   $upload = new \Think\Upload();// 实例化上传类    
    $upload->maxSize   =      C('MAX_P_FILE') ;// 设置附件上传大小    
    $upload->exts      =      C('FILE_P_TYPE');//文件类型// 设置附件上传类型  
    $rpath = $upload->rootPath  =    './Public/Director/';  
    $spath = $upload->savePath  =    encrypt(session('tea_number')).'/'; // 设置附件上传目录
    $str = __ROOT__.$rpath.$spath;
    if (!file_exists($str)){
        mkdir($str); 
    }
    $url = substr($rpath,1);
    // 上传单个文件     
    $info   =   $upload->uploadOne($_FILES['file']);    
    if(!$info) {// 上传错误提示错误信息        
        $this->error($upload->getError());
        exit();   
    }else{// 上传成功 获取上传文件信息         
        $_POST['check_url'] = $url.$info['savepath'].$info['savename'];   
    }
}