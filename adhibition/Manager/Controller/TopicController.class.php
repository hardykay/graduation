<?php

namespace Manager\Controller;

use Think\Controller;
use Think\Model;

class TopicController extends Controller {


    public function index() {
        obtain();
        $Model = M();
        $Count      = $Model->table('tp_teacher')->field('dep_id,count(*) as xs')->group('dep_id')->buildSql();
        $result     = $Model->table("tp_college c,($Count) p ")->field('c.dep_id,c.dep_name,p.xs')->where('c.dep_id=p.dep_id')->select();
        $this->assign('list', $result);
        $this->display('College');
    }
    public function teacher(){
        obtain();
        $dep = session('dep_id');
        $re = M('Topic')->field('tea_number,tea_name,sum(yixuan) as yixaun')->where('dep_id='.$dep)->group('tea_number,tea_name')->order('yixaun')->select();
        $this->assign('list', $re);
        $this->display('Teacher');
    }
    public function student($tea){
        obtain();
        $sql = M('topic')->field('top_id')->where("tea_number='{$tea}'")->buildSql();
        $stu_topic = M('stu_topic')->where('top_id in '.$sql)->buildSql();
        $sql = M('stu_topic')->field('stu_number')->where('top_id in '.$sql)->buildSql();
        $stu = M('student')->field('stu_number,name')->where('stu_number in '.$sql)->buildSql();
        $stu = M()->table("{$stu_topic} s ,{$stu} t")->field('s.top_id,t.name as sanme,s.stu_number')->where('s.stu_number=t.stu_number')->buildSql();
        $topic = M('topic')->field('top_id,name,genre')->where("tea_number='{$tea}'")->buildSql();
        $result = M()->table("{$stu} s,{$topic} t")->where('s.top_id=t.top_id')->select();
        $this->assign('list',$result);
        $this->display('Student');
    }
}
