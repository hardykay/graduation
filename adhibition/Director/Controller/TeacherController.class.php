<?php

namespace Director\Controller;

use Think\Controller;
use Think\Model;

class TeacherController extends Controller {

    public function index() {
        //p(session());
        $dep['dep_id'] = session('dep_id');
        $re = M('Topic')->field('tea_number,tea_name,sum(yixuan) as yixaun')->where($dep)->group('tea_number,tea_name')->order('yixaun desc')->select();
        $this->assign('list', $re);
        $this->display();
    }
    public function topic($tea) {
        obtain();
        $dep = session('dep');
        //去找没有被选的课题
        $re = M('topic')->field('top_id,name,tea_number,tea_name,youxiao,yixuan,top_type')->where('tea_number=\'%s\' ' ,$tea)->select();
        $this->assign('list', $re);
        $this->display();
    }
    public function look($top) {
        obtain();
        $Model = M('stu_topic');
        $m = $Model->field('stu_number')->where(array('top_id' => $top))->buildSql();
        $stu = M('student')->where('stu_number in' . $m)->buildSql();
        $dep = M('specialty')->field('dep_id,dep_name')->buildSql();
        $result=$Model->table("{$stu} s,{$dep} d")->field('s.stu_number,s.name,d.dep_name,s.phone,s.email,s.qq')->where('s.dep_major=d.dep_id')->select();
        //p($result);
        
        if ($result) {
            $this->assign('list', $result);
            $this->assign('top', $top);
            $this->display();
        } else {
            $this->error('不好意思没有学生',U('/Director/Teacher/Index'));
        }
    }
    
     /**
     * 删除已选课题的学生
     */
    public function d($stu,$top){
        $tea = obtain();
        $data['stu_number'] = $stu;
        $data['top_id'] = $top;
        if(!M('stu_topic')->where($data)->delete()){
            $this->error('删除失败！');
        }
        $this->success('删除成功！');
    }
}
