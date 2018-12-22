<?php

namespace Teacher\Controller;

use Think\Controller;

/**
 * 管理课题，和任务书
 */
class MagerTopController extends Controller {

    public function index() {

        $tea = obtain();
        $Model = M('topic');
        $map = array(' tea_number' => $tea);
        $result = $Model->field('top_id,name,genre,number,opt,yixuan,audit,top_type')->where($map)->select();
        if (!$result) {
            reminding('不好意思，没有找到课题！');
        }
//        p($result);
        $this->assign('list', $result);
        $this->display();
    }

    //修改
    public function ApplyFor($id) {
        $date['tea_number'] = obtain();
        $date['top_id'] = $id;
        $result = M('Topic')->field('top_id,name,genre,seientific,practice,content,url,youxiao')->where($date)->find();
        if(empty($result)){
            $this->error('页面不存在！');
        }
        $this->assign('top',$result);
        $this->display();
    }

    public function alert() {
        $data['tea_number'] = obtain();
        $top = $_POST['top_id'];
        $data['top_id'] = $top;
        $_POST['audit'] = 0;
       // $_POST['rele'] = 0;
        $_POST['opt'] = 1;
        $_POST['advice'] = '';
         $file = shangchuan('file');
        if($file){
            $_POST['url'] = $file;
        }
        $m = D('Topic');
        $result = $m->create();
        if(!M('Topic')->where($data)->save($result)) {
            $this->error('失败了');
        }
        $map = array(
            'audit' => 0,
            'rele' => 0
        );
        M('topic_f')->where(array('top_id' => $top))->save($map);
        $this->success('已修改',U('MagerTop/Index'));
    }
    /**
     * 更改
     */
    public function change($top_id){
        $_GET['audit'] = 0;
        $_GET['tea_number'] = obtain();
        $result = M('Topic')->field('top_id,name,genre,seientific,practice,content,url,youxiao')->where($_GET)->find();
        if(empty($result)){
            $this->error('该课题不允许更改！');
        }
        $this->assign('top',$result);
        $this->display();
    }
    public function update(){
        $tea = obtain();
        empty($_POST)?$this->error('页面不存在'):1;
        $file = shangchuan('file');
        if($file){
            $_POST['url'] = $file;
        }
        $d = D('topic');
        $re = $d->create();
        if(!$re){
           $this->error($d->getError()); 
        }
        $map = array(
            'tea_number'=>$tea,
            'audit'     =>0,
            'top_id'    =>$re['top_id'],
        );
        if($d->where($map)->save()){
            $this->success('更改成功',U('MagerTop/Index'));
        }else{
            $this->error('更改失败',U('MagerTop/Index'));
        }
    }
      /**
     * 已经优化
     * @param type $top
     */
    public function look($top) {
        obtain();
        $Model = M('stu_topic');
        $m = $Model->field('stu_number')->where(array('top_id' => $top))->buildSql();
        $stu = M('student')->where('stu_number in' . $m)->buildSql();
        $dep = M('specialty')->field('dep_id,dep_name')->buildSql();
        $result=$Model->table("{$stu} s,{$dep} d")->field('s.stu_number,s.name,d.dep_name,s.phone,s.email,s.qq')->where('s.dep_major=d.dep_id')->select();
        //p($result);
        
        if ($result) {
            $this->assign('list', $result);
            $this->assign('top', $top);
            $this->display();
        } else {
            $this->error('不好意思没有学生',U('MagerTop/Index'));
        }
    }
     /**
     * 删除已选课题的学生
     */
    public function d($stu,$top){
        $tea = obtain();
        $data['stu_number'] = $stu;
        $data['top_id'] = $top;
        if(!M('stu_topic')->where($data)->delete()){
            $this->error('删除失败！');
        }
        $this->success('删除成功！');
    }
}
