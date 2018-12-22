<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 审阅周进展
 */
class WeekController extends Controller {
    /**
     * 申请课题
     */
    public function index(){
        $tea = obtain();
        $Model = M('Topic');
        $result = $Model->table('tp_student s,tp_specialty d,tp_topic t ,tp_stu_topic st,tp_weekprogress w')
                ->field('s.stu_number,s.name as sname,t.name,t.top_id,d.dep_name,sum(case w.audit when 0 then 1 else 0 end) wei,sum(case w.audit when 1 then 1 else 0 end) tong,sum(case w.audit when 2 then 1 else 0 end) butong')
                ->where('s.stu_number=st.stu_number and s.dep_major=d.dep_id and  st.top_id=t.top_id and s.stu_number=w.stu_number and t.tea_number=\''.$tea.'\'')->group('stu_number')
                ->select();
        //p($result);
        if($result){
            $this->assign('list', $result);
            $this->display();
        }  else {
            echo '<div style="color:#eaeaea;font-size:60px;width:750px;margin:0 auto;height:200px;line-height:200px;">没有需要审核的周进展报告</div>';

        }
    }
    public function wlook($stu,$top){
        obtain();
       //$top = topic();
       $M = M('weekprogress');
       $result = $M->field('stu_number,bianhao,title,t,audit')->where('audit=0 and stu_number=\''.$stu.'\' and top_id='.$top)->order('t asc')->select();
       //p($result);
       if($result){
           $this->assign('list',$result);
           $this->display();
       }else{
           $this->error('该学生没有未审核的周进展情况报告。');
          // echo '<br><br><br><span style="font-size:50px">&nbsp;&nbsp;孩子,你还没发起周进展，赶紧来<a href="'.U('Student/Week/Week').'" >发起</a>吧</span>';
       }
    }
    /**
     * 审核
     */
    public function check($b){
       if(!is_numeric($b)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $M = M('weekprogress')->where('bianhao='.$b)->find();
        if($M){
            $this->assign('li', $M);
            $this->display();
        }  else {
             $this->error(C('error_talk'),C('error_go'));
        }
    }
    /**
     * 保存审核
     */
    public function opinion(){
        obtain();
        if($file=  shangchuan('file')){
            $_POST['check_url']=$file;
        }
        //p($_POST);exit;
        $stu = filter_input(INPUT_POST,'stu_number');
        $bianhao = filter_input(INPUT_POST,'bianhao');
        $M = M('weekprogress');
        $redu = $M->create();
        if($redu){
            if($M->where('stu_number=\''.$stu.'\' and bianhao='.$bianhao)->save()){
                $this->success('评阅成功',U('Week/Index'));
                exit;
            }
        }
        $this->error('评阅失败');
    }
    public function look($stu,$name,$dep){
        obtain();
        $list = M('report')->where('audit=1 and queren=1 and stu_number=\''.$stu.'\'')->find();
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