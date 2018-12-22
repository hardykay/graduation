<?php
namespace Student\Controller;
use Think\Controller;
/**
 * 任务书
 */
class AssignmentController extends Controller {
    public function index(){
        $stu = obtain();
         $result = topic();
        $Model = M('task');
        $Model->create();
        $result = $Model->field('dep_id,top_id,stu_number,research,basic,expect,arrange,url')->where('stu_number=\''.$stu.'\'')->find();
        if($result){
            $result['name']= $name;
            $result['sname']= $sname;
            $this->assign('li', $result);
            $this->display();
        }else{
            echo '<div style="color:#888;font-size:60px;width:750px;margin:0 auto;height:200px;line-height:200px;">老师未下达任务书</div>';
        }
    }
}