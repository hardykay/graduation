<?php
namespace Manager\Controller;
use Think\Controller;

class CollegeController extends Controller {
    /**
     * 显示学院名，添加学院，显示专业数，学院教师数，学院的学生数
     */
    public function index(){
        $tea = obtain();
        $sf = M('Teacher')->field('admin,dean,specialty,adviser')->where('tea_number=\''.$tea.'\'')->find();
        $this->assign('sf', $sf);
        $this->display();
        //echo '管理员';
    }
    
}
