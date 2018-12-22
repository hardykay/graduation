<?php
namespace Student\Controller;
use Think\Controller;

class DraftController extends Controller {
    public function index(){
       $stu = obtain();
       $top = topic();
       $f = M('Draft')->field('audit,audit,pingyu,check_url')->where('stu_number=\''.$stu.'\'')->find();
       if(!$f){//不存在论文定稿
           $this->display();
       }else{//存在
          //p($f);
           $top = topic();
           $top['audit'] = $f['audit'];
           $top['pingyu'] = $f['pingyu'];
           $top['check_url'] = $f['check_url'];
           //p($top);
           $this->assign('li', $top);
           $this->display('Index2');
       }
       
        //echo '学生登录';
    }
    /**
     * 保存论文定稿
     */
    public function preserve(){
       $stu = obtain();
       if(!($file = shangchuan('file'))){
           $this->error('请求超时');
       }
       $top = topic();
       $_POST['paperpath'] = $file;
       $_POST['url'] = shangchuan('fujian');
       $_POST['stu_number'] = $stu;
       $_POST['top_id'] = $top['top_id'];
       $_POST['t'] = date('Y-m-d H:i:s');
       $M = M('Draft');
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
       if(!($file = shangchuan('file'))){
           $this->error('请求超时');
       }
       $top = topic();
       $_POST['paperpath'] = $file;
       if($file = shangchuan('fujian')){
           $_POST['url'] = $file;
       }
       
       $_POST['stu_number'] = $stu;
       $_POST['top_id'] = $top['top_id'];
       $_POST['audit'] = 0;
       $_POST['t'] = date('Y-m-d H:i:s');
       $M = M('Draft');
       $resu = $M->create();
       if($resu){
           ///p($r);exit;
           if($M->where('stu_number=\''.$stu.'\'')->save($resu)){
               $this->success('修改成功');
               exit;
           }
       }
       $this->error($M->getError());
    }
}