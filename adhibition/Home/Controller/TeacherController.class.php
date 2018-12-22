<?php
namespace Home\Controller;
use Think\Controller;

class TeacherController extends Controller {
    public function index(){
        $tea = obtain();
        $resu = M('Teacher')->where('tea_number=\''.$tea.'\'')->find();
        $this->assign('tea',$resu);
        $this->display();
    }
    public function look($tea){
        obtain();
        $resu = M('Teacher')->field('tea_number,name,dep_id,title,education,degree,post1,acaspe,belong,phone,email,qq')->where('tea_number=\''.$tea.'\'')->find();
       
        $c = M('College')->field('dep_name')->where('dep_id='.$resu['dep_id'])->find();
        $resu['dep_name']=$c['dep_name'];
        $this->assign('tea',$resu);
        $this->display();
    }
     public function check(){
        $tea = obtain();
        empty($_POST)?$this->error():1;
        //p($_POST);
        $M = new  \Home\Model\TeacherModel();
        $result = $M->create();
//        p($result);
//        exit;
        if($result){
            if($M->where('tea_number=\''.$tea.'\'')->save()){
                $this->success('修改成功');
                exit;
            }  else {
                $this->error('未能修改');
            }
        }else{
            $this->error($M->getError());
        }
//        $this -> assign('errorInfo',$M->getError());
//        $this->display ('Index'); 
    }
    public function pass(){
        $tea = obtain();
        if(empty($_POST)){
            $this->display (); 
        }else{
            $mpass = encrypt(filter_input(INPUT_POST, 'mpass'));
            $newpass = encrypt(filter_input(INPUT_POST, 'newpass'));
            if(M('Teacher')->where('tea_number=\''.$tea.'\' and pwd=\''.$mpass.'\'')->save(array('pwd'=>$newpass))){
                $this->success('修改成功');
            }else{
                $this->error('未能修改');
            }
        }
    }
    public function teacher($tea){
        obtain();
        $re = M('Teacher')->where("tea_number='%s'",$tea)->find();
        $this->assign('tea',$re);
        $this->display (); 
    }
}