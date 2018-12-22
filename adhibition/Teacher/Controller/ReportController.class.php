<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 审阅开题报告
 */
class ReportController extends Controller {
    /**
     * 
     */
    public function index(){
        $tea = obtain();
        $Model = M('Topic');
        $result = $Model->table('tp_student s,tp_specialty d,tp_topic t ,tp_stu_topic st,tp_report r')
                ->field('s.stu_number,s.name as sname,t.name,t.top_id,r.audit,d.dep_name')
                ->where('s.stu_number=st.stu_number and s.dep_major=d.dep_id and st.top_id=t.top_id and r.stu_number=s.stu_number and t.tea_number=\''.$tea.'\'')
                ->select();
        //p($result);
        if($result){
            $this->assign('list', $result);
            $this->display();
        }  else {
            reminding('没有需要审核的开题报告',0);
        }
    }
    public function check($stu,$name,$dep){
        obtain();
        //echo 'kdkd';
        $list = M('report')->field('top_id,stu_number,wordpath,w_wordpath')->where('audit=0 and stu_number=\''.$stu.'\'')->find();
        //p($list);
        
        if($list){
            $list['sname'] = $name;
            $list['dep'] = $dep;
            //p($list);
            $this->assign('li', $list);
            $this->display();
        }  else {
            $this->error('访问的页面不存在');
        }
    }
    public function opinion(){
        obtain();
        if($file=  shangchuan('file')){
            $_POST['url']=$file;
        }
        //p($_POST);exit;
        $stu = filter_input(INPUT_POST,'stu_number');
        $M = M('report');
        if($M->create()){
            if($M->where('stu_number=\''.$stu.'\'')->save()){
                $this->success('评阅成功',U('Report/Index'));
                exit;
            }
        }
        $this->error('评阅失败');
    }
    public function look($stu,$name,$dep){
        obtain();
        $list = M('report')->where('audit=1 and stu_number=\''.$stu.'\'')->find();
        if($list){
            $list['sname'] = $name;
            $list['dep'] = $dep;
            //p($list);
            $this->assign('li', $list);
            $this->display();
        }  else {
            $this->error('访问的页面不存在');
        }
    }
}