<?php

namespace Dean\Controller;

use Think\Controller;
use Think\Model;

/**
 * 选题阶段
 */
class TopicController extends Controller {

    /**
     * 
     */
    public function index() {
        obtain();
        $dep = session('dep_id');
        $data['student'] = M('student')->where('dep_college='.$dep)->count();
        $data['teacher'] = M('teacher')->where('dep_id='.$dep)->count();
        $data['topic'] = M('topic')->where('dep_id='.$dep)->count();
        $data['audit'] = M('topic')->where('audit=1 and dep_id='.$dep)->count();
        $sql = M('topic')->field('top_id')->where('dep_id='.$dep)->buildSql();
        $data['stuTopic'] = M('stu_topic')->where('top_id in '.$sql)->count();
        $this->assign('top',$data);
        $sql = M('specialty')->field('dep_id,dep_name')->where('dep_father='.$dep)->buildSql();
        $student = M('student')->field('dep_major,count(dep_major) as student')->group('dep_major')->buildSql();
        $student = M()->table("{$sql} d1,{$student} s1")->where('d1.dep_id=s1.dep_major')->buildSql();

        $choose = M('stu_topic')->field('stu_number')->buildSql();
        $choose = M('student')->field('dep_major,count(dep_major) as notset')->where('stu_number in '.$choose)->group('dep_major')->buildSql();

        $result = M()->table("{$student} s2 ,{$choose} c")->where('s2.dep_id=c.dep_major')->select();
        //p($result);
        $this->assign('dep',$result);
        $this->display();
    }

    /**
     * 发布选题
     */
    public function affirm() {
        obtain();
        $dep_id = session('?dep_id') ? session('dep_id') : 0;
        $User = M(); // 实例化view_topic对象
        $sql = 'select dep_id,dep_name,sum(case when rele=0 then 1 else 0 end) as wei,sum(case when rele=1 then 1 when rele=2 then 1 else 0 end) as yi from tp_view_spe_top where audit=1 and opt=1 and dep_father=' . $dep_id . ' group by dep_id';
        //$sql = 'select * from tp_view_topic ';
        $re = $User->query($sql);
        //p($re);
        $this->assign('list', $re);
        $this->display();
    }

    public function affirm2($dep, $page = 0) {//$dep专业
        obtain();
        //$dep_id = session('?dep_id') ? session('dep_id') : 0;
        if (!is_numeric($dep)) {
            $this->error('请求超时.');
        }
        $sql = M('topic_f')->field('top_id')->where('rele=0 and audit=1 and dep_id=' . $dep)->buildSql();
        //if(M('topic')->where('top_id in'.$sql)->save(array('rele'=>1))){
        $User = M('topic'); // 实例化view_topic对象
        //opt可选 rele发布 zy_audit系主任审核 top_type盲选 zy专业
        $count = $User->where("top_type=1 and top_id in  {$sql}")->count(); // 查询满足要求的总记录数
        if ($page < 2 || (($page - 1) * 10) > $count) {
            $pagenum = 0;
        } else {
            $pagenum = ($page - 1) * 10;
        }
        //opt可选 rele发布 zy_audit系主任审核 top_type盲选 zy专业
        $result = $User->where("top_type=1 and top_id in  {$sql}")->limit($pagenum, 10)->select(); // 查询满足要求的总记录数
        //dump($result);
        if ($result) {
            $this->assign('list', $result);
            $page = getPageHtml($page, $count, __ROOT__ . '/Dean/Topic/Affirm2/dep/' . $dep);
            $this->assign('page', $page);//$dep
            $this->assign('dep',$dep);
            $this->display();
        } else {
            $this->error('没有可发布发布的课题');
        }
    }

    public function affirm3() {
        obtain();
        if (empty($_POST)) {
            $this->error('失败');
        }
        $str = implode(',', $_POST['checkbox']);
        $dep = $_POST['dep'];
        $m = M('Topic_f');
        $m->rele = 1;
        if ($m->where("dep_id={$dep} and top_id in({$str})")->save()) {
            $this->success('成功发布', U('Topic/Affirm'));
        }else{
            $this->error('失败');
        }
    }
    /**
     * 发布双选结果
     */
    public function two($dep,$page = 0) {
        obtain();
        $dep1 = session('dep_id');
        $sql = "(select top_id from tp_topic_f where audit=1 and rele!=2 and dep_id ={$dep})";
        /*  p(M()->query($sql));
        $User = M('topic');
        //满足记录的条件：1、可选 2、已发布 3、通过系主任的审核 4、盲选课题 5、该课题可以给该专业选取 
        $count = $User->where('yixuan>0 and top_id in '.$sql)->count(); // 查询满足要求的总记录数*/
        $count = M('topic')->where('yixuan>0 and top_id in '.$sql)->count();
     
        //取得记录条数
        if ($page < 2 || (($page - 1) * 10) > $count) {
            $pagenum = 0;
        } else {
            $pagenum = ($page - 1) * 10;
        }
        $result = M('topic')->field('top_id,name,tea_number,tea_name,genre,yixuan,top_type')->where('yixuan>0 and top_id in '.$sql)->limit($pagenum, 10)->select();
        $this->assign('list', $result);
        $page = getPageHtml($page, $count, __ROOT__ . '/Dean/Topic/Two');
        $this->assign('page', $page);
        $this->assign('dep', $dep);
        $this->display();
    }

    /**
     * 发布双选结果
     */
    public function checkOuter() {
        obtain();
        if (!empty($_POST)) {
            if (!isset($_POST['checkbox']) || empty($_POST['checkbox'])) {
                $this->error('发布课题为空，空操作！',U('Topic/Specialty'));
            }
            $dep = filter_input(INPUT_POST, 'dep');//Dean/Topic/two/dep/3
    
            $top = implode(',', $_POST['checkbox']);
            $data['rele'] = 2;
            $result = M('Topic_f')->where("dep_id={$dep} and top_id in ({$top})")->save($data);
            if ($result) {
                $this->success("成功发布双选结果<b style='color:red'>{$result}</b>条！",U('/Dean/Topic/two/dep/'.$dep));
            } else {
                $this->success('发布失败，系统繁忙！',U('Topic/Specialty'));
            }
        }
    }

    /**
     * 一键发布（发布选题）
     * @param type $dep_id
     */
    public function yijian($dep_id) {
        // p($dep_id);
        obtain();
        $i = M('topic_f')->where("rele=0 and  audit=1 and dep_id={$dep_id}")->save(array('rele' => 1));
        if ($i) {
            $this->success("发布成功！");
        } else {
            $this->success('发布结果为空，发布失败！');
        }
        //echo $sql;
    }
     /**
     * 一键发布（发布双选）
     * @param type $dep_id
     */
    public function towcon($dep_id) {
        // p($dep_id);
        obtain();
        $i = M('topic_f')->where("rele!=2 and  audit=1 and dep_id={$dep_id}")->save(array('rele' => 2));
        if ($i) {
            $this->success("发布成功<span style='color:red'>{$i}个</span>课题！");
        } else {
            $this->success('发布结果为空，发布失败！');
        }
        //echo $sql;
    }
    public function specialty(){
        obtain();
        $dep_id = session('?dep_id') ? session('dep_id') : 0;
        $User = M(); // 实例化view_topic对象
        $sql = '(select dep_id,sum(case when rele<>2 then 1 else 0 end) as wei,sum(case when rele=2 then 1 else 0 end) as yi from tp_topic_f where audit=1 group by dep_id)';
        $sql = "select f.wei,f.yi,p.dep_id,p.dep_name from {$sql} f,tp_specialty p where f.dep_id=p.dep_id and dep_father={$dep_id}";
        
//$sql = 'select * from tp_view_topic ';
        $re = $User->query($sql);
        //p($re);
        $this->assign('list', $re);
        $this->display('Specialty');
    }
}
