<?php
namespace Tool;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RetrieveTeacher
 *教师找回密码
 * 1、教师进入找回密码界面，输入信息，点击获取验证码，提交，完成
* 点击获取验证码：将账号及邮箱到数据库中查询，匹配成功，生成验证码，存入到数据库中，发送邮件
 * @author lenovo 点击获取验证码类
 * //1、验证身份
 * 2、生成验证码
 * //3、存入库中
 * 4、发送邮件
 */
class Code{
    private $tea;       //账号
    private $identity;  //身份，学生/教师 教师为1，其他为学生
    private $email;     //邮箱
    private $code;      //验证码
    /**
     * 
     * @param type $tea
     * @param type $email
     * @param type $identity等于1是教师，否则是学生
     */
    function __construct($tea,$email,$identity) {
       $this->tea = $tea;
       $this->identity = $identity;
       $this->email = $email;
   }
   /**
    * 调用内部函数
    * 1 邮箱格式不真确
    * 2 邮箱或者密码错误
    * 3 邮件发送成功，请查收
    * 4 邮件发送失败
    */
   public function flow(){
       //验证邮箱格式
       if(!$this->isEmail( $this->email)){
           return 1;
       }
       //验证身份
       if(!$this->identity()){
           return 2;
       }
       //生成验证码
       $this->code();
       
       //发邮件
       if($this->email()){
           return 3;
       }else{
           return 4;
       }
       //echo '发邮件';
   }
    
   /**
    * 验证是否为邮箱
    * @param type $email
    * @return boolean
    */
   private function isEmail($email){  
        $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';  
        if(preg_match($mode,$email)){  
            return true;  
        } else{  
            return false;  
        }  
    }  
   /**
    * 验证身份
    */
   private function identity(){
       if($this->identity == 1 ){
            return M('Teacher')->where(array('tea_number'=>$this->tea,'email'=>$this->email))->count();
       }  else {
            return M('Student')->where(array('stu_number'=>$this->tea,'email'=>$this->email))->count();
       }
   }
   
   /**
    * 生成验证码
    */
   private function code(){
       $c = rand(1000,9999);
       $this->code = ''.$c;
       session('email',$this->code);
   }

    /**
     * 发邮件
     */
   private function email(){
       $title  = '欢迎使用中国石油大学胜利学院毕业设计系统';
       $content = "您好！<br>&nbsp;&nbsp;&nbsp;&nbsp;您正在使用中国石油大学胜利学院毕业设计管理系统平台提供的找回密码功能，如果并非本人操作，请忽略本信息。&nbsp;&nbsp;&nbsp;&nbsp;您的验证码为：{$this->code}";
       return sendMail($this->email, $title, $content);
   }
}
