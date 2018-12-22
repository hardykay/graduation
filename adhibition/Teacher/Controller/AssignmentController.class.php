<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 老师发布任务书
 */

class AssignmentController extends Controller {
    public function index(){
        $tea = obtain();
        $SQL = " 
         select k.top_id,k.name,k.genre,s.stu_number,s.name as sname,s.dep_major,
         
                case 
                    when t.stu_number is null then '1'
                    else 2 end audit
                from
                (select stu_number,name,dep_major from tp_student where stu_number in (select stu_number from tp_stu_topic where top_id in (select top_id from tp_topic where audit=1 and tea_number='{$tea}'))) s
                    LEFT JOIN
                (select * from tp_stu_topic where top_id in (select top_id from tp_topic where tea_number='{$tea}')) x
                    ON s.stu_number=x.stu_number LEFT JOIN 
                (select top_id,name,genre from tp_topic where tea_number='{$tea}') k
                    ON x.top_id=k.top_id LEFT JOIN
                (select stu_number from tp_task where tea_number='{$tea}') t
                    ON s.stu_number=t.stu_number
                ";
        $result = M()->query($SQL);
        //p($result);
        $this->assign('list',$result);
        $this->display();
    }
    /**
     * 发布任务书
     */
    function assignment($top,$stu,$dep){
        $tea = obtain();
        $map = array(
            'stu_number'=>$stu,
            'top_id' => $top
        );
        if(!M("Stu_topic")->where($map)->find()){
            $this->error('请求超时！');
        }
        $map['dep'] = $dep;
        $this->assign('top', $map);
        $this->display('Assignment');
    }
    /**
     * 保存任务书内容
     */
    function assignment1(){
       $tea = obtain();
       empty($_POST)?$this->error(C('error_talk'),C('error_go')):1;
       $_POST['tea_number'] = $tea;
       //p($_POST);
       $url1 = shangchuan('file');
       if($url1){
           $_POST['url'] = $url1;   
       }
        $task = new \Teacher\Model\TaskModel();
        $result = $task->create();
        if($result){
            if($task->add()){
                $this->success('发布成功',U('Assignment/Index'));
            }  else {
                $this->error('请求超时！');
            }
        } else {
            $this->error($task->getError());
        } 
    }
    /**
     * 修改任务书内容
     */
    function assignment2(){
        $tea = obtain();
        if(empty($_POST)){
            $this->error(C('error_talk'),C('error_go'));
            exit();
        }
        $file = shangchuan('file');
        if($file){
            $_POST['url'] = $file;
        }
        $stu = filter_input(INPUT_POST, 'stu_number');
        $_POST['tea_number'] = $tea;
        $task = new \Teacher\Model\many\TaskModel();
        if($result = $task->create()){
            if($task->where("tea_number='{$tea}' and stu_number='{$stu}'")->save($result)){
                $this->success('修改成功',U('/Teacher/Assignment/Index'));
            }  else {
                $this->error('请求超时！');
            }
        } else {
            if(!strcmp($task->getError(),'您先登录')){
                echo '<script language="javascript"> alert("请您先登录！"); top.location=\''.__ROOT__.'/Home/Index/Index\'; </script> ';
            }else{
                $this->error($task->getError());
            }  
        } 
    }
    /**
     * 查看任务书审核结果
     */
    public function lookcheck($stu){
        $tea = obtain();
        $map = array(
            'tea_number'=>$tea,'stu_number'=>$stu
        );
        $rel = M('task')->where($map)->find();
        //p($rel);
        if($rel){
            $this->assign('li', $rel);
            $this->assign('stu', $stu);
            $this->display('Look');
        }
    }
    public function student(){
        $tea = obtain();
        $sql = M('topic')->field('top_id')->where("tea_number='{$tea}'")->buildSql();
        $stu_topic = M('stu_topic')->where('top_id in '.$sql)->buildSql();
        $sql = M('stu_topic')->field('stu_number')->where('top_id in '.$sql)->buildSql();
        $stu = M('student')->field('stu_number,name')->where('stu_number in '.$sql)->buildSql();
        $stu = M()->table("{$stu_topic} s ,{$stu} t")->field('s.top_id,t.name as sanme,s.stu_number')->where('s.stu_number=t.stu_number')->buildSql();
        $topic = M('topic')->field('top_id,name,genre')->where("tea_number='{$tea}'")->buildSql();
        $result = M()->table("{$stu} s,{$topic} t")->where('s.top_id=t.top_id')->select();
        $this->assign('list',$result);
        $this->display();
    }
    public function look($top,$stu){
        obtain();
        
        if(!is_numeric($top)){
            $this->error(C('error_talk'), C('error_go'));
        }
        $Model = M('task');
        $Model->create();
        $result = $Model->where("top_id={$top} and stu_number='{$stu}'")->find();
        if($result){
            //p($result);
            $this->assign('li', $result);
            $this->display('Assignment2');
        }else{
            $this->error('没有找到！'); 
        }
    }
}