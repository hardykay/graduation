<?php
namespace Student\Controller;
use Think\Controller;

class StudentController extends Controller {
    public function index(){
        $stu = obtain();
        $resu = M('Student')->where('stu_number=\''.$stu.'\'')->find();
        $this->assign('s',$resu);
        $this->display();
    }
    public function look($tea){
        obtain();
        $resu = M('Student')->field('tea_number,name,dep_id,title,education,degree,post1,acaspe,belong,phone,email,qq')->where('tea_number=\''.$tea.'\'')->find();
       
        $c = M('College')->field('dep_name')->where('dep_id='.$resu['dep_id'])->find();
        $resu['dep_name']=$c['dep_name'];
        $this->assign('tea',$resu);
        $this->display();
    }
     public function check(){
        $tea = obtain();
        empty($_POST)?$this->error('非法操作'):1;
        $M = new  \Home\Model\StudentModel();
        $M->patchValidate = FALSE;
        if($M->create()){
            if($M->where('stu_number=\''.$tea.'\'')->save()){
                $this->success('修改成功',U('Student/Index'));
            }  else {
                $this->error('未能修改');
            }
        }else{
           $this->error($M->getError()); 
        } 
    }
    public function pass(){
        $stu = obtain();
        if(empty($_POST)){
            $this->display (); 
        }else{
            $mpass = encrypt(filter_input(INPUT_POST, 'mpass'));
            $newpass = encrypt(filter_input(INPUT_POST, 'newpass'));
            if(M('Student')->where('stu_number=\''.$stu.'\' and pwd=\''.$mpass.'\'')->save(array('pwd'=>$newpass))){
                $this->success('修改成功');
            }else{
                $this->error('密码错误');
            }
        }
    }
}