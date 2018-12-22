<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 在学生或老师在没有填写邮箱等信息之前，就会调用这个类，来完善个人信息
 */
class CompleteController extends Controller {
    /**
     * 显示页面三种情况
     */
    public function index(){
        //unset(session('name'));

        if(session('?stu_number') && !empty(session('stu_number'))){
            //学生
            $this->display ('Student');
        }elseif(session('?tea_number') && !empty(session('tea_number'))){
            //教师
             $this->display ('Teacher');
        }else{
            //未登录
            $this->error(C('error_talk'),C('error_go'));
        }
    }
    /**
     * 认证学生登录信息
     */
    public function student(){
        //
        if(!session('?stu_number')){
            $this->error(C('error_talk'),C('error_go'));
         }
        $User =  new \Home\Model\StudentModel(); // 实例化User对象!
        $data = $User->create();
        if ($data){     // 验证通过 可以进行其他数据操作
            $stu = session('stu_number');
            $data['stu_number'] = session('stu_number');
            $result = $User->where(array('stu_number'=>$stu))->save($data);
             if($result !== false){
                //@sendMail($data['email'],' 欢迎使用中国石油大学胜利学院毕业设计管理系统', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们第一次认识,但我们即将在一年里长期共处，希望能相处愉快，若有何不足，敬请担待，因为开发这个系统的学长早已毕业工作了.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;祝你愉快毕业</p>');
                $this->redirect('Student/Index/Index');
            }else{
                $this -> assign('errorInfo',$User->getError());
                $this->display('Student'); 
            }
            
        }else{
         // 如果创建失败 表示验证没有通过 输出错误提示信息     
            $this -> assign('errorInfo',$User->getError());
            $this->display('Student'); 
        }
       
    }
    /**
     * 认证教师，并根据不同的身份跳转
     */
    public function teacher(){
        //
        if(!session('?tea_number')){
            $this->error(C('error_talk'),C('error_go'));
         }
        $User =  new \Home\Model\TeacherModel(); // 实例化User对象!
        $data = $User->create();
        //dump($data);
        if (!$data){  
            // 如果创建失败 表示验证没有通过 输出错误提示信息     
            $this -> assign('errorInfo',$User->getError());
            $this->display('Teacher'); 
        }else{ // 验证通过 可以进行其他数据操作  
            $tea = session('tea_number');
            $data['tea_number'] = session('tea_number');
            $result = $User->where(array("tea_number"=>$tea))->save($data);
            //dump($data);
            if($result !== false){
                //sendMail($data['email'],' 欢迎使用中国石油大学胜利学院毕业设计管理系统', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们第一次认识,但我们即将在一年里长期共处，希望能相处愉快，若有何不足，敬请担待，感谢老师的使用.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;祝你愉快毕业</p>');
                switch (session('rank')){
                    case 1:$this->redirect('Manager/Index/Index');break;//管理员
                    case 2:$this->redirect('Dean/Index/Index');break;//教学院长
                    case 3:$this->redirect('Director/Index/Index');break;//系主任
                    case 4:$this->redirect('Teacher/Index/Index');break;//指导老师
                    default :$this->error('您的身份未明，请联系教务处或教学院长',C('error_go'));
                }
            }else{
                $this->error('请求超时',C('error_go'));
                
            }
        }
    }
}