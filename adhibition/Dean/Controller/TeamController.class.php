<?php
namespace Dean\Controller;
use Think\Controller;
use Think\Model;
/**
 * 选题阶段
 */
class TeamController extends Controller {
    /**
     * 
     */
    public function index(){
        obtain();
        $dep = session('dep_id');
        $data = M('topic')->field('top_id,name,tea_number,tea_name,genre,audit')->where('top_type=3 and dep_id='.$dep)->order('audit asc')->select();
        //p($data);
       
        $this->assign('list', $data);
        $this->display();
    }
    public function check($top){
        is_numeric($top)?1:$this->error('不好意思，失联了');
        $res = M('topic')->field('top_id,name,genre,seientific,practice,content,url,audit')->where('top_id='.$top)->find();
        empty($res)?$this->error('未找到该页面'):1;
        $sql = M('stu_topic')->field('stu_number')->where('top_id='.$top)->buildSql();
        $stu = M('View_student')->field('stu_number,name,college,specialty,class')->where('stu_number in '.$sql)->select();
       // p($stu);
        $this->assign('data',$res);
        $this->assign('stu',$stu);
        $this->display();
    }
    /**
     * post1
     */
    public function post1(){
        obtain();
        empty($_POST)?$this->error('未找到该页面'):1;
        if($_POST['audit']==1){
           $_POST['rele'] = 2;
        }
        $m = new \Dean\Model\TopicModel();
        $re = $m->create();
        if($re){
            if(!$m->where('top_id='.$re['top_id'].' and dep_id='.session('dep_id'))->save()){
                $this->error('未修改',U('Team/Index'));
            }
            $Model = D('topic_f');
            $re = $Model->create();
            if(!$Model->where('top_id='.$re['top_id'])->save()){
                $this->error('未修改',U('Team/Index'));
            }
            $this->success('审核成功',U('Team/Index'));
            
        }else{
            $this->error($m->getError());
        }
        
    }
    public function look($top){
        is_numeric($top)?1:$this->error('不好意思，失联了');
        $res = M('topic')->field('top_id,name,advice,genre,seientific,practice,content,url,audit')->where(array('top_id' => $top))->find();
        empty($res)?$this->error('未找到该页面'):1;
        $sql = M('stu_topic')->field('stu_number')->where(array('top_id' => $top))->buildSql();
        $stu = M('View_student')->field('stu_number,name,college,specialty,class')->where('stu_number in '.$sql)->select();
       // p($stu);
        $this->assign('data',$res);
        $this->assign('stu',$stu);
        $this->display();
    }
}
