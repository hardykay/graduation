<?php
namespace Student\Controller;
use Think\Controller;

class WeekController extends Controller {
    public function index(){
       $stu    =   obtain();
       $top = topic();
       $M = M('weekprogress');
       $result = $M->field('bianhao,title,t,audit')->where('stu_number=\''.$stu.'\'')->order('t asc')->select();
       //p($result);
       if($result){
           $this->assign('list',$result);
           $this->display();
       }else{
           echo '<div style="color:#888;font-size:60px;width:750px;margin:0 auto;height:200px;line-height:200px;">同学,你还没发起周进展，立即<a href="'.U('Student/Week/Week').'" >填写</a>！</div>';
       }
       
        //echo '学生登录';
    }
    /**
     * 
     */
    public function week(){
        obtain();
       $this->display();
    }
    /**
     * 保存周进展
     */
    public function preserve(){
        $stu    =   obtain();
       if(empty($_POST)){
           $this->error(C('error_talk'),C('error_go'));
       }
       $_POST['url'] = shangchuan('file');
       $top = topic();
       $_POST['top_id'] = $top['top_id'];
       $_POST['t'] = date("Y-m-d H:i:s");
       $_POST['stu_number'] =$stu;
       
       $Model = new \Student\Model\WeekprogressModel();
       if($Model->create()){
           if($Model->add()){
               $this->success('成功填写周进展报告',U('Week/Index'));
           }
       }else{
           $this->error($Model->getError());
       }     
    }
    /**
     * 查看周进展
     */
    public function look($b){
        $stu = obtain();
        if(!is_numeric($b)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $M = M('weekprogress')->field('title,jinzhan,down,url,t,audit,check_url,pingyu')->where('bianhao='.$b.' and stu_number=\''.$stu.'\'')->find();
        if($M){
            //p($M);
            $this->assign('li', $M);
            $this->display();
        }  else {
             $this->error(C('error_talk'),C('error_go'));
        }
    }
}