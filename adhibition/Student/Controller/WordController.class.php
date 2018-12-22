<?php
namespace Student\Controller;
use Think\Controller;

class WordController extends Controller {
    //任务书
    public function assignment(){
        $stu = obtain();
        $result = M('task')->field('research,basic,expect,arrange')->where("stu_number='%s'",$stu)->find();
        if(empty($result)){
            $this->error('该页面不存在');
        }
        $this->assign('vo',$result);
        //p($result);
        $this->display();
    }
    /**
     * 中期检查
     */
    public function teacher(){
        $stu = obtain();
        $result = M('overall')->field('content1')->where("stu_number='%s'",$stu)->find();
        if(empty($result)){
            $this->error('该页面不存在');
        }
        $this->assign('vo',$result);
        $this->display();
    }
    /**
     * 评阅老师的评语
     */
    public function pingyu(){
        $stu = obtain();
        $result = M('overall')->field('content2')->where("stu_number='%s'",$stu)->find();
        if(empty($result)){
            $this->error('该页面不存在');
        }
        $this->assign('vo',$result);
        $this->display();
    }
    /**
     * 答辩评语
     */
    public function dabian(){
        $stu = obtain();
        $result = M('overall')->field('content3')->where("stu_number='%s'",$stu)->find();
        if(empty($result)){
            $this->error('该页面不存在');
        }
        $this->assign('vo',$result);
        $this->display();
        
    }
}