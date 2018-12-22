<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 审阅开题报告
 */
class FinalizeController extends Controller {
    /**
     * 申请课题
     */
    public function index(){
        //$this->display();
        $tea = obtain();
        $map = array('tea_number'=>$tea);
        $Model = M('View_sststf');
        $result = $Model->where($map)->select();
        if($result){
            $this->assign('list', $result);
            $sql =$Model->table('tp_topic')->field('top_id')->where($map)->buildSql();
//            $Model = M('finalize');
//            $data['dingz'] = $Model->field('stu_number')->where('top_id in'.$sql)->count();//论文定稿总人数
//            $data['dingw'] = $Model->field('stu_number')->where('audit=0 and top_id in'.$sql)->count();//论文定稿未审核
//            $data['dingt'] = $Model->field('stu_number')->where('audit=1 and top_id in'.$sql)->count();//论文定稿已通过
//            $data['dingg'] = $Model->field('stu_number')->where('audit=2 and top_id in'.$sql)->count();//论文定稿退回修改
            $resul = $Model->table('tp_finalize')->field('count(*) as dingz,sum(case when audit=0 then 1 else 0 end) as dingw,sum(case when audit=1 then 1 else 0 end) as dingt,sum(case when audit=2 then 1 else 0 end) as dingg')->where('top_id in'.$sql)->select();
            $data = $resul[0];
            $data['zong'] = $Model->table('tp_stu_topic')->field('stu_number')->where('top_id in'.$sql)->count();
            $this->assign('zo', $data);
            $this->display();
        }  else {
            reminding('没有需要审核的论文定稿',0);
        }
    }
    public function thesisDetermine($name,$sname,$stu,$dep,$top){
        obtain();
        $data['name'] = $name;
        $data['sname'] = $sname;
        $data['stu'] = $stu;
        $data['dep'] = $dep;
        $data['top'] = $top;
        $map = array('audit'=>0,'stu_number'=>$stu);
        $result = M('finalize')->where($map)->find();
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
        $xuan =  filter_input(INPUT_POST,'audit');
        //$top  =  filter_input(INPUT_POST,'top'); 
        $stu  =  filter_input(INPUT_POST,'stu');

        if($xuan == 1){//评分
            $mod = M('topic');
            
            $re = $mod->table('tp_topic t ,tp_finalize f,tp_specialty d,tp_student s,tp_class c')
                ->field('t.name,s.name as sname,s.stu_number,d.dep_id,d.dep_name,s.dep_class,t.top_id,c.dep_name as class')
                ->where('f.stu_number=\''.$stu.'\' and s.stu_number=\''.$stu.'\' and t.tea_number=\''.$tea.'\' and f.audit=0 and s.dep_class=c.dep_id and s.dep_major=d.dep_id and t.top_id=f.top_id ')
                ->find();
            if(!$re){
                $this->error('未找到该页面');
            }
            //$c = M('specialty')->field('dep_name')->where('dep_id='.$re['dep_class'])->find();
            $this->assign('li',$re);
            //$this->assign('c',$c);
            $this->display('Pingfen');
            exit;
        }elseif ($xuan == 2) {//退回
            $mod = M('topic');
            $re = $mod->table('tp_topic t ,tp_finalize f')
                ->where('f.stu_number=\''.$stu.'\' and t.tea_number=\''.$tea.'\' and f.audit=0 and t.top_id=f.top_id')
                ->select();
            //p($re);
            if($re){
                if(M('finalize')->where('stu_number=\''.$stu.'\'')->save(array('audit'=>$xuan))){
                    $this->success('成功',U('Finalize/Index'));
                    exit;
                }
            }
        }
        $this->error('未找到该页面');
    }
    /**
     * 修改
     */
    
     public function check1($stu){
        $tea = obtain();
            $re = M('Overall')->field('top_name,stu_number,stu_name,z_name,b_name,grade,zdgrade,content1')
                    ->where('stu_number=\''.$stu.'\' and tea_number=\''.$tea.'\' and zhidao=1')->find();
           // p($re);
            $this->assign('li',$re);
            //$this->assign('c',$c);
            $this->display();
            exit;
    }
    /**
     * 添加评分
     */
    public function opinion(){
        $tea = obtain();
        if(empty($_POST)){
            $this->error('未找到该页面!');
        }
        $stu  =  filter_input(INPUT_POST,'stu_number');
        $mod = M('topic');
        $re = $mod->table('tp_topic t ,tp_finalize f,tp_specialty d,tp_student s,tp_class  c')
                ->field('t.name,t.tea_name,s.name as sname,s.stu_number,d.dep_id,d.dep_name,s.dep_class,t.top_id,c.dep_name as cname')
                ->where('s.dep_class=c.dep_id and s.dep_major=d.dep_id and t.top_id=f.top_id and f.stu_number=\''.$stu.'\' and s.stu_number=\''.$stu.'\' and t.tea_number=\''.$tea.'\'')
                ->find();
        if(!$re){
            $this->error('未找到该学生的相关信息!');
        }
        $_POST['tea_number'] = $tea;         
        $_POST['tea_name'] = $re['tea_name'];
        $_POST['top_id'] = $re['top_id'];
        $_POST['stu_name'] = $re['sname'];
        $_POST['top_name'] = $re['name'];
        $_POST['z_id'] = $re['dep_id'];
        $_POST['z_name'] = $re['dep_name'];
        $_POST['b_id'] = $re['dep_class'];
        $_POST['b_name'] = $re['cname'];
        $_POST['zhidao'] = 1;
        $Model = new \Teacher\Model\OverallModel();
        $result = $Model->create();
        if($result){
            if($t = M('Overall')->field('stu_number')->where('stu_number=\''.$stu.'\'')->find()){
               
                if ($Model->where('stu_number=\''.$stu.'\'')->save()) {
                    M('Finalize')->where('stu_number=\''.$stu.'\'')->save(array('audit'=>1));
                    $this->success('评分成功',U('Finalize/Index'));
                    echo '';
                }
                else{
                    //echo '未修改';
                    $this->error('未修改');
                }
            }else{
                if($Model->add()){
                    M('Finalize')->where('stu_number=\''.$stu.'\'')->save(array('audit'=>1));
                    $this->success('评分成功',U('Finalize/Index'));
                }else{
                    $this->error('评分失败');
                }
            }
            
        }else{
            $this->error($Model->getError());
        }
    }
}