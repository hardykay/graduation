<?php

namespace Dean\Controller;

use Think\Controller;

class AllocationController extends Controller {

    public function index() {
        obtain();
        $dep = session('dep_id');
        $Model = M('college');
        $result = $Model->table('tp_college c,tp_specialty s')->field('c.dep_name as college ,s.dep_name as spe_name ,s.dep_id')
                        ->where('s.dep_father=c.dep_id and c.dep_id =' . $dep)->select();
        $S = M('Student'); //学生总人数
        $SQ = M('Stu_topic'); //已分配的
        //p($result);

        foreach ($result as $key => $value) {
            $sql = $S->field('stu_number')->where('dep_major=' . $value['dep_id'])->buildSql();

            //求得专业学生总人数
            $result[$key]['szong'] = $S->where('dep_major=' . $value['dep_id'])->count('stu_number');
            //求得已分配的总人数
            $result[$key]['yifen'] = $SQ->where('stu_number in' . $sql)->count('stu_number');
            //求得未分配的总人数
            $result[$key]['wei'] = $result[$key]['szong'] - $result[$key]['yifen'];
        }
        $this->assign('list', $result);
        $this->display();
    }

    /**
     * 列出专业学生和课题
     * @param type $dep
     */
    public function student($dep, $page = 0) {
        obtain();
//        $re = M('view_std')->where('dep_major='.$dep)->order('stu_number')->select();
//        p($re);
        //取得学生的集合
        $student = M('student')->field('stu_number,name')->where('dep_major=' . $dep)->buildSql();
        //sp($student);
        //取得选课的集合
        $sql = M('student')->field('stu_number')->where('dep_major=' . $dep)->buildSql();
        $sql = M('stu_topic')->where('stu_number in' . $sql)->buildSql();
        //sp($sql);
        //$topic = M('topic ')->field('top_id,name,tea_number,tea_name')->where('top_id in'.$sql)->buildSql();
        $topic = M()->table("tp_topic t1,{$sql} s1")->field('t1.top_id,s1.stu_number,t1.name,t1.tea_name')->where('t1.top_id=s1.top_id')->buildSql();
        //sp($topic);
        //p($topic);
        $count = M()->table("{$student} s2 left join {$topic} t2 ON s2.stu_number=t2.stu_number")
                        ->field('s2.stu_number,s2.name as sname,t2.name as tname,t2.tea_name')->count();
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;

        $stu_top = M()->table("{$student} s2 left join {$topic} t2 ON s2.stu_number=t2.stu_number")
                        ->field('s2.stu_number,s2.name as sname,t2.name as tname,t2.tea_name')->order('stu_number')->limit($pagenum, 10)->select();
        $this->assign('list', $stu_top);
        $pageView = getPageHtml($page, $count, __CONTROLLER__ . '/Student/dep/' . $dep);
        $this->assign('page', $pageView);
        $this->display();
    }

    public function teacher($stu) {
        $re = M('Topic')->field('tea_number,tea_name,sum(yixuan) as yixaun')->group('tea_number,tea_name')->order('yixaun desc')->select();
        $this->assign('list', $re);
        $this->assign('stu', $stu);
        $this->display();
    }

    public function topic($tea, $stu) {
        obtain();
        $dep = session('dep');
        //去找没有被选的课题
        $re = M('topic')->field('top_id,name,tea_number,tea_name,youxiao,yixuan,top_type')->where('tea_number=\'%s\' ', $tea)->select();
        $this->assign('list', $re);
        $this->assign('stu', $stu);
        $this->display();
    }

    public function look($top) {
        obtain();
        $Model = M('stu_topic');
        $m = $Model->field('stu_number')->where(array('top_id' => $top))->buildSql();
        $stu = M('student')->where('stu_number in' . $m)->buildSql();
        $dep = M('specialty')->field('dep_id,dep_name')->buildSql();
        $result = $Model->table("{$stu} s,{$dep} d")->field('s.stu_number,s.name,d.dep_name,s.phone,s.email,s.qq')->where('s.dep_major=d.dep_id')->select();
        //p($result);

        if ($result) {
            $this->assign('list', $result);
            $this->assign('top', $top);
            $this->display();
        } else {
            $this->error('不好意思没有学生', U('/Dean/Allocation/Index'));
        }
    }

    public function fen($top, $stu) {
        obtain();
        M('stu_topic')->where("stu_number ='{$stu}'")->delete();
        $map = array(
            'top_id'=>$top,
            'stu_number'=>$stu,
        );
        if(!M('stu_topic')->add($map)){
            $this->error('分配失败',U('Allocation/Index'));
        }
        $this->success('分配成功',U('Allocation/Index'));
    }

}
