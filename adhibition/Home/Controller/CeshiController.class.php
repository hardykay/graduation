<?php

namespace Home\Controller;

use Think\Controller;

class CeshiController extends Controller {

    public function index() {
        //echo __DIR__;
        $data['stu_number'] = '201406012141';
        $overall = M('overall')->where($data)->find();
        $task = M('task')->where($data)->find();
        $inspect = M('inspect')->where($data)->find();
        p($task);
        //$overall = M('overall')->where($data)->find();

        
        $stu =  substr(__DIR__,0,-16);
        //成绩、课题、指导老师、
        
        require_once $stu.'/Tool/PHPWord/bootstrap.php';
        //$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($stu.'/Tool/PHPWord/Template.docx');
        //课题名称
        $templateProcessor->setValue('topic', $overall['top_name']);
        //学生姓名
        $templateProcessor->setValue('stu_name', $overall['stu_name']);
        //学生学号
        $templateProcessor->setValue('stu_number', $overall['stu_number']);
        //指导老师姓名
        $templateProcessor->setValue('tea_name', $overall['tea_name']);
        //专业
        $templateProcessor->setValue('z_name', $overall['z_name']);
        //班级
        $templateProcessor->setValue('b_name', $overall['b_name']);
        //论文成绩
        $templateProcessor->setValue('grade', $overall['grade']);
        //指导成绩
        $templateProcessor->setValue('zdgrade', $overall['zdgrade']);
        //评阅成绩
        $templateProcessor->setValue('pingyuegrade', $overall['pingyuegrade']);
        //答辩成绩
        $templateProcessor->setValue('dabiangrade', $overall['dabiangrade']);
        //总评成绩
        $templateProcessor->setValue('score', $overall['score']);
        //指导评语
        $templateProcessor->setValue('content1', $overall['content1']);
        //评阅评语
        $templateProcessor->setValue('content2', $overall['content2']);
        //答辩评语
        $templateProcessor->setValue('content3', $overall['content3']);
        //任务书
        //研究的主要内容
        $i1 = $this->guolv($task['research']);
        $templateProcessor->setValue('research',$i1 );
        /*//涉及知识和基本要求
        $templateProcessor->setValue('basic', $this->guolv($task['basic']));
        //预期目标
        $templateProcessor->setValue('expect', $this->guolv($task['expect']));
        //进度安排
        $templateProcessor->setValue('arrange', $this->guolv($task['arrange']));
        
        //$templateProcessor->setValue(array('City', 'Street'), array('Detroit', '12th Street'));*/
        $templateProcessor->saveAs($stu.'/Tool/PHPWord/Sample_07_TemplateCloneRow.docx');
   }
   public function guolv($str){
       $str = htmlspecialchars_decode($str);
       //$str = strip_tags($str);
       $str=preg_replace("/<(.*?)>(.*?)<(\/.*?)>/si","",$str); //过滤title标签 
       return $str;
   }
}
