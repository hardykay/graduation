<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 接受AJAX
 */
class AjaxController extends Controller {
    public function index(){
        obtain();
        $this->display();
    }
    /**
     * 接收ajax传过来的数据，取得该id的所有班级
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
    /**
     * 获得未选课题的学生
     */
    public function mStu(){
        obtain();
        if(!empty($_POST)){
           $dep = filter_input(INPUT_POST, 'dep');
            if(!empty($dep)){
                $sql = 'select stu_number from tp_stu_topic';
                $n = D("Student");//造一个nation表的模型对象
                $attr = $n->field('stu_number as d,name as n,dep_major as m')->where("stu_number not in ({$sql}) and dep_class={$dep}")->select();
                $this->ajaxReturn($attr);//ajax返回数据的方式，用ajaxReturn。
            }else{
                $this->error(C('error_talk'),C('error_go'));
            } 
        }else{
            $this->error(C('error_talk'),C('error_go'));
        }
        
    }
    /**
     * 专业
     */
    public function spe(){
        obtain();
        $dep = filter_input(INPUT_POST, 'dep');
        empty($dep)?exit:1;
        $arr = M('specialty')->field('dep_id as d,dep_name as n')->where('dep_father='.$dep)->select();
        $this->ajaxReturn($arr);
    }
    /**
     * 专业,用于申请课题时检测该专业是否可以申请课题
     */
    public function spe2(){
        obtain();
        $dep = filter_input(INPUT_POST, 'dep');
        empty($dep)?exit:1;
        $date = date('Y-m-d H:i:s');
        $sql = M('teacher_specialty')->field('dep_id')->where("(topic_close>'%s') and (topic_strat<'%s')",$date,$date)->buildSql();
        $arr = M('specialty')->field('dep_id as d,dep_name as n')->where('dep_father='.$dep.' and dep_id in '.$sql)->select();
        $this->ajaxReturn($arr);
    }
    /**
     * 班级
     */
    public function cla(){
        obtain();
        $dep = filter_input(INPUT_POST, 'dep');
        empty($dep)?exit:1;
        $arr = M('Class')->field('dep_id as d,dep_name as n')->where('dep_father='.$dep)->select();
        $this->ajaxReturn($arr);
    }
    /**
     * 获得班级里的学生
     */
    public function stu(){
        obtain();
        $dep = filter_input(INPUT_POST, 'dep');
        empty($dep)?exit:1;
        $arr = M('Student')->field('stu_number as d,name as n')->where('dep_class='.$dep)->select();
        $this->ajaxReturn($arr);
    }
}