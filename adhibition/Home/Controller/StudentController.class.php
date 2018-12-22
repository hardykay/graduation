<?php
namespace Home\Controller;
use Think\Controller;

class StudentController extends Controller {
    public function index($stu){
        obtain();
        $student = M('Student')->where("stu_number='{$stu}'")->buildSql();
        $result = M()->table("{$student} s,tp_college c,tp_specialty z,tp_class b")->field('s.*,c.dep_name as c,z.dep_name as z,b.dep_name as b')
                ->where('s.dep_college =c.dep_id and s.dep_major=z.dep_id and s.dep_class=b.dep_id')->find();
        $this->assign('s',$result);
        $this->display();
    }
    public function look(){
        obtain();
        $this->display();
    }
    public function check(){
        $tea = obtain();
        empty($_POST)?exit:1;
        $M = new  \Home\Model\TeacherModel();
        if($M->create()){
            if($M->where('stu_number=\''.$tea.'\'')->save()){
                $this->success('修改成功');
                exit;
            }
        }
        $this->error('未修改');
        //$this->display();
    }
}