<?php

 /**
  * 上传文件
  */
 
 function shangchuan($name){
    $dir = session('tea_number');
    if(isset($_FILES[$name]) && $_FILES[$name]['error'] === 0){
        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize   =      C('MAX_P_FILE') ;// 设置附件上传大小    
        $upload->exts      =      C('FILE_P_TYPE');//文件类型// 设置附件上传类型  
        $rpath = $upload->rootPath  =    './Public/Home/';  
        $spath = $upload->savePath  =    encryptFile($dir).'/'; // 设置附件上传目录
        $str = __ROOT__.$rpath.$spath;
        if (!file_exists($str)){
            mkdir($str); 
        }
        $url = substr($rpath,1);
        // 上传单个文件     
        $info   =   $upload->uploadOne($_FILES[$name]);    
        if(!$info) {// 上传错误提示错误信息        
           $u = $upload->getError();
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><h1>{$u}</h1><button onclick='history.go(-1)'>返回</button>";
            exit();   
        }else{// 上传成功 获取上传文件信息         
            return $url.$info['savepath'].$info['savename'];   
        }
    }else{
        return FALSE;
    }
 }
 /**
  * 检测教师
  * @return type
  */
 function obtain(){
      if(session('?tea_number')){
          return session('tea_number');
      }  elseif(session('?stu_number')) {
          return session('stu_number');
      }else{
         echo  '<script language="javascript"> alert("请您先登录！"); top.location=\''.__ROOT__.'/Home/Index/index\'; </script> ';
         exit;
     }
     
 }
 function getBrowser(){
    $agent=$_SERVER["HTTP_USER_AGENT"];
    if(strpos($agent,'MSIE')!==false || strpos($agent,'rv:11.0')) //ie11判断
    return "ie";
    else if(strpos($agent,'Firefox')!==false)
    return "firefox";
    else if(strpos($agent,'Chrome')!==false)
    return "chrome";
    else if(strpos($agent,'Opera')!==false)
    return 'opera';
    else if((strpos($agent,'Chrome')==false)&&strpos($agent,'Safari')!==false)
    return 'safari';
    else
    return 'unknown';
}

