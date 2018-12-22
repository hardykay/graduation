<?php
namespace Manager\Controller;
use Think\Controller;

class RankController extends Controller {
    public function index(){
        $tea = obtain();
        $sf = M('Teacher')->field('admin,dean,specialty,adviser')->where('tea_number=\''.$tea.'\'')->find();
        $this->assign('sf', $sf);
        $this->display();
        //echo '管理员';
    }
    public function admin(){
        obtain();
        empty($_POST)?exit:1;
        $tea = filter_input(INPUT_POST, 'tea');
        $val = filter_input(INPUT_POST, 'val');
        ($val != 0 && $val != 1)?exit:1;
        if(M('Teacher')->where(array('tea_number'=>$tea))->save(array('admin'=>$val))){
            $this->ajaxReturn(array('val'=>1));
        }else{
            $this->ajaxReturn(array('val'=>0));
        }
    }
    public function dean(){
        obtain();
        empty($_POST)?exit:1;
        $tea = filter_input(INPUT_POST, 'tea');
        $val = filter_input(INPUT_POST, 'val');
        ($val != 0 && $val != 1)?exit:1;
        if(M('Teacher')->where(array('tea_number'=>$tea))->save(array('dean'=>$val))){
            $this->ajaxReturn(array('val'=>1));
        }else{
            $this->ajaxReturn(array('val'=>0));
        }
    }
    public function specialty(){
        obtain();
        empty($_POST)?exit:1;
        $tea = filter_input(INPUT_POST, 'tea');
        $val = filter_input(INPUT_POST, 'val');
        ($val != 0 && $val != 1)?exit:1;
        if(M('Teacher')->where(array('tea_number'=>$tea))->save(array('specialty'=>$val))){
            $this->ajaxReturn(array('val'=>1));
        }else{
            $this->ajaxReturn(array('val'=>0));
        }
    }
    public function adviser(){
        obtain();
        empty($_POST)?exit:1;
        $tea = filter_input(INPUT_POST, 'tea');
        $val = filter_input(INPUT_POST, 'val');
        ($val != 0 && $val != 1)?exit:1;
        if(M('Teacher')->where(array('tea_number'=>$tea))->save(array('adviser'=>$val))){
            $this->ajaxReturn(array('val'=>1));
        }else{
            $this->ajaxReturn(array('val'=>0));
        }
    }
}
