<?php
namespace Student\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        obtain();
        //p(session());
       $this->display();
        //echo '学生登录';
    }
    public function stamp(){
        obtain();
        $this->display();
    }
    public function time(){
        //p(session());
        obtain();
        $dep = session('zhuanye');
        $re = M('View_tts')->where('dep_id='.$dep)->find();
        //p($re);
        $this->assign('vo',$re);
        $this->display();
    }
}