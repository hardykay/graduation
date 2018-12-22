<?php
namespace Teacher\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $tea = obtain();
        $sf = M('Teacher')->field('admin,dean,specialty,adviser')->where('tea_number=\''.$tea.'\'')->find();
        //确认课题
        $map = array('top_type' =>1,'tea_number' => $tea,'audit'=>1);
        $s = M('topic')->field('top_id')->where($map)->buildSql();
        $data['Choose'] = M('chaos_topic')->where('top_id in'.$s)->count();
        
        //下达任务书
       // $map = array('audit' =>1);
        //查的教师的所有课题
        $sql = M('Topic')->field('top_id')->where("audit=1 and tea_number='{$tea}'")->buildSql();
        $data['Assignment'] = M('stu_topic')->where('top_id in'.$sql)->count() - M('task')->where('top_id in '.$sql)->count();
        
        //审核外出毕业设计
        // sum(case when a.DEBT_TYPE = 1 then LOANEE_AMOUNT else 0 end) as 'EJZ'
        $data['Waichu'] = M('outside')->where('shenhe1=0 and tea_number=\'' . $tea . '\'')->count();
        //开题报告
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Report'] = M('report')->where('audit=0 and top_id in '.$sql)->count();
        
        
        //周进展报告
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Week'] = M('weekprogress')->where('audit=0 and top_id in '.$sql)->count();
        
        //中期检查报告
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Inspect'] = M('inspect')->where('audit=0 and top_id in '.$sql)->count();
        
        //论文草稿
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Draft'] = M('Draft')->where('audit=0 and top_id in '.$sql)->count();
        
        //论文定稿
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Finalize'] = M('Finalize')->where('audit=0 and top_id in '.$sql)->count();
        
        //评阅的学生
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Review'] = M('Review')->where("audit=0 and  tea_number='{$tea}'")->count();
        
         //题目更改
        //$sql = M('Topic')->field('top_id')->where(array('tea_number' => $tea))->buildSql();
        $data['Alteration'] = M('Alteration')->where('adviser_audit=0 and  top_id in '.$sql)->count();
        $data['Alteration'] = M('Alteration')->where('adviser_audit=0 and  top_id in '.$sql)->count();
        $Instructor = readJson();
        $data['InstructorTheTeacherLookGrade'] =  $Instructor['InstructorTheTeacherLookGrade'];
        //p($data);
        $this->assign('data', $data);
        $this->assign('sf', $sf);
        $this->display();
    }
    public function time(){
        $dep = session('dep_id');
        $re = M('View_tts')->where('dep_father='.$dep)->select();
        $this->assign('list',$re);
        $this->display();
    }
}