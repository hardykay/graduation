<?php
namespace Dean\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $tea = obtain();
        $sf = M('Teacher')->field('admin,dean,specialty,adviser')->where('tea_number=\''.$tea.'\'')->find();
        $this->assign('sf', $sf);
       $this->display();
        //echo '教学院长';
    }
}