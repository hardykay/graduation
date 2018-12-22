<?php
namespace Student\Controller;
use Think\Controller;
/**
 * 接受AJAX
 */
class AjaxController extends Controller {
    
    
    /**
     * 获取教师
     */
    public function teacher(){
        obtain();
        $dep = filter_input(INPUT_POST, 'dep');
        empty($dep)?exit:(is_numeric($dep)?1:exit);
        $result = M('Teacher')->field('tea_number as d,name as n')->where('dep_id='.$dep)->select();
        $this->ajaxReturn($result);//ajax返回数据的方式，用ajaxReturn。 
    }
    
    /**
     * 
     */
    public function ajaxchuli(){
        obtain();
        if(!empty($_POST)){
           $dep = filter_input(INPUT_POST, 'dep');
            if(!empty($dep)){
                $n = D("Class");//造一个nation表的模型对象
                $attr = $n->field('dep_id as d,dep_name as n')->where('dep_father='.$dep)->select();
                $this->ajaxReturn($attr);//ajax返回数据的方式，用ajaxReturn。
            }else{
                $this->error(C('error_talk'),C('error_go'));
            } 
        }else{
            $this->error(C('error_talk'),C('error_go'));
        }
        
    }
    /**
     * 获得班级id，取得该班级所有学生。
     */
    public function ajaxStu(){
        obtain();
        if(!empty($_POST)){
           $dep = filter_input(INPUT_POST, 'dep');
            if(!empty($dep)){
                $n = D("Student");//造一个nation表的模型对象
                $attr = $n->field('stu_number as d,name as n')->where('dep_class='.$dep)->select();
                $this->ajaxReturn($attr);//ajax返回数据的方式，用ajaxReturn。
            }else{
                $this->error(C('error_talk'),C('error_go'));
            } 
        }else{
            $this->error(C('error_talk'),C('error_go'));
        }
        
    }
}