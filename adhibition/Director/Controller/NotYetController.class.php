<?php

namespace Director\Controller;

use Think\Controller;
use Think\Model;

class NotYetController extends Controller {

    public function index() {
        obtain();
        $dep = session('dep');
        $Model = M('college');
        $result = $Model->table('tp_college c,tp_specialty s')->field('c.dep_name as college ,s.dep_name as spe_name ,s.dep_id')
                        ->where('s.dep_father=c.dep_id and s.dep_id in(' . $dep . ')')->select();
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

    public function topic($dep, $tea) {
        obtain();
        $sql = M('topic_f')->field('top_id')->where('audit=1 and  dep_id=%d and tea_number=\'%s\'', $dep, $tea)->buildSql();
        //去找没有被选的课题
        $re = M('topic')->field('top_id,name,tea_number,tea_name,youxiao,yixuan')->where('opt=1 and top_type=1 and yixuan<youxiao and top_id in' . $sql)->select();

        $this->assign('list', $re);
        $this->assign('dep', $dep);
        $this->display();
    }

    public function student($top, $dep, $page = 0) {//$dep专业
        obtain();
        $sql = M('stu_topic')->field('stu_number')->buildSql();
        $m = M('Student');
        $count = $m->where('dep_major=' . $dep . ' and stu_number not in' . $sql)
                ->count();
        //分页

        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        //$result = $T->field('tea_number,name')->where('adviser=1 and dep_id='.$dep_id)->limit($pagenum,10)->select();
        //班级 专业 学生
        $res = $m->field('name,stu_number')
                        ->where('dep_major=' . $dep . ' and stu_number not in' . $sql)
                        ->order('stu_number asc')->limit($pagenum, 10)->select();
        //p($res);
        $this->assign('list', $res);
        $this->assign('top', $top);
        $this->assign('dep', $dep);
        $pageView = getPageHtml($page, $count, __ROOT__ . "/Director/NotYet/Student/top/{$top}/dep/{$dep}");
        $this->assign('page', $pageView);
        $this->display();
    }

    public function fenpei() {
        obtain();
        empty($_POST) ? $this->error('未找到该页面') : 1;
        //
        $arr = filter_input_array(INPUT_POST);
        $dep = $arr['dep'];
        if (!M('topic_f')->where('top_id=' . $arr['top_id'] . ' and dep_id in(' . session('dep') . ')')->find()) {
            $this->error('未找到该页面');
        }
        M()->startTrans();
        $data = null;
        //将表单传过来的值做成数组，批量插入数据库中
        foreach ($arr['checkbox'] as $value) {
            $data[] = array('stu_number' => $value, 'top_id' => $arr['top_id']);
        }
        $m = M('stu_topic');
        if (!($i = $m->addAll($data))) {
            M()->rollback();
            $this->error('分配失败', U('/Director/NotYet/Teacher/dep/' . $dep));
        }
        M()->commit();
        $this->success('分配成功', U('/Director/NotYet/Teacher/dep/' . $dep));
    }

    public function teacher($dep) {
        obtain();
         $dep_id['dep_id'] = session('dep_id');
        $re = M('Topic')->field('tea_number,tea_name,sum(yixuan) as yixaun')->where($dep_id)->group('tea_number,tea_name')->order('yixaun')->select();

        $this->assign('list', $re);
        $this->assign('dep', $dep);
        $this->display();
    }

    /**
     * 思路1、按志愿，按班级，按课题
     */
    public function allot($dep) {
        obtain();
        //获得所有该专业的课题
        //
       /* $sql = M('topic_f')->field('top_id')->where('dep_id=%d and audit=1',$dep)->buildSql();
          $array = M('Topic')->field('top_id,(youxiao-yixuan)as num,top_type,opt,number')->having ('top_type=1 and opt=1 and number>0 and num>0 and top_id in '.$sql)->order('num desc')->select();
          //查
          $chaos_topic = M('chaos_topic');
          //增
          $stu_topic = M('stu_topic');
          foreach ($array as $value) {
          $date = $chaos_topic->field('top_id,stu_number')->where('top_id='. $value['top_id'])->order('volunt')->limit($value['num'])->select();
          $stu_topic->addAll($date);
          }
          $this->success('成功分配！'); */

        //按志愿分配
        $sql = M('topic_f')->field('top_id')->where('dep_id=%d and audit=1', $dep)->buildSql();  //查
        $chaos_topic = M('chaos_topic');
        $stu_topic = M('stu_topic');
        for ($index = 1; $index < 4; $index++) {
            $array = M('Topic')->field('top_id,(youxiao-yixuan)as num,top_type,opt,number')->having('top_type=1 and opt=1 and number>0 and num>0 and top_id in ' . $sql)->order('num desc')->select();
            foreach ($array as $value) {
                $date = $chaos_topic->field('top_id,stu_number')->where("top_id={$value['top_id']} and volunt={$index}")->limit($value['num'])->select();
                $stu_topic->addAll($date);
            }
        }
        $this->success('分配完成！');
    }

}
