<?php
namespace Teacher\Controller;
use Think\Controller;
/**
 * 审阅中期检查
 */
class InspectController extends Controller {
    /**
     * 申请课题
     */
    public function index(){
        $tea = obtain();
        $result = M('View_sstsi')->where(array('tea_number'=>$tea))->select();
        if($result){
            $this->assign('list', $result);
            $this->display();
        }  else {
            reminding('没有需要审核的中期检查',0);
        }
    }
    public function check($stu,$name,$dep){
        obtain();
        $map = array(
            'audit'=>0,'stu_number'=>$stu
        );
        $list = M('inspect')->where($map)->find();
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
    public function alert(){
        obtain();
        
        $stu = filter_input(INPUT_POST,'stu_number');
        $M = M('Inspect');
        $result = $M->create();
        //p($result);exit;
        if($M->create()){
            if($M->where('stu_number=\''.$stu.'\'')->save()){
                $this->success('评阅成功',U('Inspect/Index'));
            }else{
                $this->success('已经评阅',U('Inspect/Index'));
            }
        }else{
            $this->error('评阅失败');
        }
    }
    public function look($stu,$name,$dep){
        obtain();
        $map = array(
            'audit'=>1,
            'stu_number'=>$stu,
        );
        $list = M('inspect')->where($map)->find();
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