<?php
namespace Student\Controller;
use Think\Controller;

class TeacherController extends Controller {
    public function index(){
        obtain();
        $dep = session('dep_id');
        $re = M('Topic')->field('tea_name,sum(yixuan) as yixaun')->where('dep_id='.$dep)->group('tea_name')->order('yixaun')->select();
        $this->assign('list', $re);
        //p($re);
        $this->display();
    }
}