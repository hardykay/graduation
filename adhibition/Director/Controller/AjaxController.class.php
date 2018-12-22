<?php
namespace Director\Controller;
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
    public function teacher(){
        obtain();
        if(!empty($_POST)){
           $dep = filter_input(INPUT_POST, 'dep');
            if(!empty($dep)){
                $n = D("Teacher");//造一个nation表的模型对象
                $attr = $n->field('tea_number as d,name as n')->where('dep_id='.$dep)->select();
                //p($attr);
                $this->ajaxReturn($attr);//ajax返回数据的方式，用ajaxReturn。
                exit;
            }
        }
        //echo 'jdkjdjk';
        $this->error(C('error_talk'),C('error_go'));
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