<?php
namespace Student\Controller;
use Think\Controller;

class InspectController extends Controller {
    public function index(){
       $stu = obtain();
       $top = topic();
       $M = M('Inspect')->field('audit')->where('stu_number=\''.$stu.'\'')->find();
       if(!$M){//不存在中期检查报告
           $this->display();
       }else{//存在
           //p($M);
           $this->assign('li', $M);
           $this->display('Inspect');
       }
       
    }
    /**
     * 保存
     */
    public function preserve(){
       $stu = obtain();
       $top = topic();
       $_POST['url'] = shangchuan('file');
       $_POST['stu_number'] = $stu;
       $_POST['top_id'] = $top['top_id'];
       $M = new \Student\Model\InspectModel();
       if($M->create()){
           ///p($r);exit;
           if($M->add()){
               $this->success('发布成功');
               exit;
           }
       }
       $this->error($M->getError());
    }
    /**
     * 修改
     */
    public function alert(){
        $stu = obtain();
       $top = topic();
       if($file = shangchuan('file')){
           $_POST['url'] = $file;
       }
       
       $_POST['stu_number'] = $stu;
       $_POST['audit'] = 0;
       $M = new \Student\Model\InspectModel();
       if($r = $M->create()){
           ///p($r);exit;
           if($M->where('stu_number=\''.$stu.'\'')->save($r)){
               $this->success('修改成功',U('Inspect/index'));
               exit;
           }
       }
       $this->error($M->getError());
    }
     public function look(){
       $stu = obtain();
       $top = topic();
       $M = M('Inspect')->field('progress')->where('stu_number=\''.$stu.'\'')->find();
       if(!$M){//不存在中期检查报告
           $this->error('请求超时');
       }else{//存在
           //p($M);
           $this->assign('li', $M);
           $this->display('Look');
       }
       
        //echo '学生登录';
    }
    /**
     * 没通过，修改
     */
     public function look2(){
         $stu = obtain();
       $top = topic();
       $M = M('Inspect')->field('progress')->where('stu_number=\''.$stu.'\'')->find();
       if(!$M){//不存在中期检查报告
           $this->error('请求超时');
       }else{//存在
           //p($M);
           $this->assign('li', $M);
           $this->display();
       }
     }
}