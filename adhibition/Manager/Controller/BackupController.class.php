<?php

namespace Manager\Controller;

use Think\Controller;

class BackupController extends Controller {

    public function index() {
        obtain();
        $this->redirect("Bak/index");
    }

    public function vacumup() {
        obtain();
        $bak = new \Manager\Controller\BakController();
        $bak->index(1);
        $this->traversal();
        $this->success('初始化完成',U('Bak/index'),10);
    }

    /**
     * 截断数据表
     */
    public function truncation($array) {
        $sql = 'truncate table tp_' . $array[0];
        $clear = M();
        $clear->execute($sql);
        //echo $array[1] . '<b style="color:#888">，数据表已经清空</b><br>';
    }

    /**
     * 遍历表
     */
    public function traversal() {
        //获取数据表
        $array = $this->dblist();
        foreach ($array as $value) {
            $this->truncation($value);
        }
    }

    /**
     * 数据表列表
     */
    public function dblist() {
        $arr = array(
            //array('数据表','数据表功能名称'),
            array('alteration', '题目变更'),
            array('chaos_topic', '盲选课题'),
            array('draft', '论文草稿'),
            array('finalize', '论文定稿'),
            array('inspect', '中期检查'),
            array('member', '答辩组成员'),
            array('outside', '校外毕业设计申请表'),
            array('overall', '总评成绩'),
            array('report', '开题报告'),
            array('review', '分配评阅老师'),
            array('squad', '答辩小组'),
            array('squad_stu', '答辩学生'),
            array('student', '学生'),
            array('stu_topic', '学生-选题表'),
            array('task', '教师下达任务书'),
            array('topic', '课题表'),
            array('topic_f', '课题课题适合的专业'),
            array('top_temporary', '申请课题-保存表'),
            array('waichu', '外出毕设'),
            array('weekprogress', '学生周进展报告'),
        );
        return $arr;
    }

}
