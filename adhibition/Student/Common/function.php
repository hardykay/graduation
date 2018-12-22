<?php


 function shangchuan($name){
    $dir = session('stu_number');
    if(isset($_FILES[$name]) && $_FILES[$name]['error'] === 0){
        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize   =      C('MAX_P_FILE') ;// 设置附件上传大小    
        $upload->exts      =      C('FILE_P_TYPE');//文件类型// 设置附件上传类型  
        $rpath = $upload->rootPath  =    './Public/Student/';  
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
 //学生是有选择课题
 function topic(){
     $stu = session('stu_number');
     $m = M('stu_topic')->field('top_id')->where('stu_number=\''.$stu.'\'')->find();
        if(empty($m)){
          reminding('您未选择课题，或是教师未选择您。<br>敬请关注!');
        }
        
        $top = $m['top_id'];
        if(!M('topic_f')->where('rele=2 and top_id='.$top)->find()){
            reminding('选题结果未发布，不能进行其他操作！');
        }
        $result = M('topic')->field('top_id,tea_number,name,genre,tea_name')->where('top_id='.$top)->find();
        return $result;
 }
 /**
  * 取得session stu_number 
  * @return type
  */
 function obtain(){
      if(session('?stu_number')){
          return session('stu_number');
      }  else {
         echo  '<script language="javascript"> alert("请您先登录！"); top.location=\''.__ROOT__.'/Home/Index/index\'; </script> ';
         exit;
      }
     
 }