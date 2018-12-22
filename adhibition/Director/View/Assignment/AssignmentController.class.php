<?php
namespace Director\Controller;
use Think\Controller;
use Think\Model;

class AssignmentController extends Controller {
  
    public function index(){
        obtain();
        $dep = session('dep');
        //去到tp_task表中查询，以dep_id作为分组，统计审核的、未审核的任务书个数
         $User = M('task');     
         $array = $User->field('dep_id,sum(case audit when 0 then 1 else 0 end) wei,sum(case audit when 1 then 1 else 0 end) yi,sum(case audit when 2 then 1 else 0 end) tui')
                ->where(' dep_id in('.$dep.')')->group('dep_id')->select();//;sum('case audit when 0 then 1 else 0 end');


          $Modle = M('specialty'); // 实例化view_topic对象      
         if($array){
             foreach ($array as $key => $value) {
                 $re = $Modle->field('dep_name')->where('dep_id='.$value['dep_id'])->find();
                 $array[$key]['name']=$re['dep_name'];
             }
           $this->assign('list', $array);
           $this->display();
         }else{
             echo '没找到';
             //$this->error(C('error_talk'),C('error_go'));
         }
    }
    /**
     * 设置系主任审核任务书
     */
    public function assignment($dep,$page=0){
        obtain();
        $a = explode(',', session('dep'));
        //p($a);
        if(!in_array($dep,$a)){
            $this->error(C('error_talk'), C('error_go'));
        }
        $Modle = new \Think\Model('topic');
        $count  = $Modle->table('tp_task p,tp_topic t,tp_student s')
                ->where('p.audit=0 and p.top_id=t.top_id and p.stu_number=s.stu_number and p.dep_id='.$dep)
                ->count();
    
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;
       // $Model->field('user.name,role.title')->table('think_user user,think_role role')->limit(10)->select();
        $list = $Modle->table('tp_task p,tp_topic t,tp_student s')->where('p.audit=0 and p.top_id=t.top_id and p.stu_number=s.stu_number and p.dep_id='.$dep)
                ->field('t.top_id as top,t.name as tname,t.tea_number as tnum,t.genre as genre,t.tea_name,s.stu_number as snum,s.name as sname')
                ->limit($pagenum,10)->select();
        
        $this->assign('list', $list);
        $page = getPageHtml($page,$count,__ROOT__.'/Director/Assignment/Assignment/dep/'.$dep);
        $this->assign('dep',$dep);
        $this->assign('page',$page);
       // p($list);
        $this->display();
        
    }
    public function assignment2($name,$top,$stu,$sname){
        obtain();
        
        if(!is_numeric($top)){
            $this->error(C('error_talk'), C('error_go'));
        }
        $Model = M('task');
        $Model->create();
        $result = $Model->field('dep_id,top_id,stu_number,research,basic,expect,arrange,url')->where("top_id={$top} and stu_number='{$stu}'")->find();
        if($result){
            //p($result);
            $result['name']= base64_decode($name);
            $result['sname']= base64_decode($sname);//iconv('Utf-8', 'Utf-8', $sname) ;
            $this->assign('li', $result);
            $this->display();
        }else{
           $this->error('没有找到！'); 
        }
        
    }
    /**
     * 审核提交处
     */
    public function assignment3(){
        obtain();
        if(empty($_POST)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $dep = filter_input(INPUT_POST, 'dep');
        $Model = M('task');
        $data = $Model->create();
        //p($data);
        if($data){
            $re = $Model->where('top_id='.$data['top_id'].' and stu_number=\''.$data['stu_number'].'\'')->save($data);
            if($re){
                $this->success('成功',__ROOT__.'/Director/Assignment/Assignment/dep/'.$dep);
            }
        }
        // $this->error('请求超时！');
    }
    public function whole($dep){
        obtain($dep);
        $Model = M('task');
        $audit = array(
            'audit'=>1
        );
        $num = $Model->where('dep_id=%d and audit=0',$dep)->save($audit);
        if($num){
            $this->success('成功审核'.$num.'个任务书！');
        }else{
            $this->error('并未有任务书被审核！');
        }
    }
}
