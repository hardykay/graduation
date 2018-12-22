<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 审核论文草稿
 */
class DraftController extends Controller {
    /**
     * 
     */
    public function index(){
        //$this->display();
        $tea = obtain();
        $map = array('tea_number'=>$tea);
        $Model = M('View_ssstd');
        $result = $Model->where($map)->select();
        if($result){
           // p($result);//exit;
            $this->assign('list', $result);
            $sql = $Model->table('tp_topic')->field('top_id')->where("tea_number='{$tea}'")->buildSql();
            //统计
            $resul = $Model->table('tp_draft')->field('count(*) as dingz,sum(case when audit=0 then 1 else 0 end) as dingw,sum(case when audit=1 then 1 else 0 end) as dingt,sum(case when audit=2 then 1 else 0 end) as dingg')->where('top_id in'.$sql)->select();//论文定稿退回修改
            $data = $resul[0];
            $data['zong'] = $Model->table('tp_stu_topic')->field('stu_number')->where('top_id in'.$sql)->count();
            $this->assign('zo', $data);
            $this->display();
        }  else {
            reminding('没有需要审核的论文草稿',0);

        }
    }
    public function thesisDetermine($name,$sname,$stu,$dep,$top){
        obtain();
        $data['name'] = $name;
        $data['sname'] = $sname;
        $data['stu'] = $stu;
        $data['dep'] = $dep;
        $data['top'] = $top;
        $map = array(
            'audit'=>0,'stu_number'=>$stu
        );
        $result = M('draft')->where($map)->find();
        if($result){
            $this->assign('list', $result); 
            $this->assign('data', $data);
            $this->display();
        }else{
            $this->error('未找到该页面');
        }
    }
    
    
    
    public function check(){
        $tea = obtain();
        //echo 'kdkd';
        if(empty($_POST)){
            $this->error('未找到该页面!');
        }
      // $xuan =  filter_input(INPUT_POST,'audit');
        $top  =  filter_input(INPUT_POST,'top'); 
        $stu  =  filter_input(INPUT_POST,'stu');
        $_POST['check_url'] = shangchuan('file');
        $M = M('Draft');
        $resu = $M->create();
        if($resu){
            //p($resu);   
            $map = array(
                'stu_number'=>$stu,'audit'=>0,'top_id'=>$top
            );
            if($M->where($map)->save($resu)){
                $this->success('评阅成功',U('Draft/Index'));
            }else{
                 $this->success('您已评阅',U('Draft/Index'));
            }
        }else{
            $this->error('未找到该页面');
        }
        
    }
    public function look($name,$sname,$stu,$dep,$top){
        $tea = obtain();
        $data['name'] = $name;
        $data['sname'] = $sname;
        $data['stu'] = $stu;
        $data['dep'] = $dep;
        $data['top'] = $top;
        $result = M('draft')->where('audit!=0 and stu_number=\''.$stu.'\'')->find();
        if($result){
            //p($result);
            $this->assign('list', $result); 
            $this->assign('data', $data);
            $this->display();
        }else{
            $this->error('未找到该页面');
        }
    }
    
}