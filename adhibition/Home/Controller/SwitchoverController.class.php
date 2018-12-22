<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 角色切换
 */
class SwitchoverController extends Controller {
 
    public function manager(){
        $tea = obtain();
        $result = M('Teacher')->where('admin=1 and  tea_number=\''.$tea.'\'')->find();
        if($result){
            session(null);
            session('tea_number',$result['tea_number']);
            session('name',$result['name']);
            session('dep_id',$result['dep_id']);
            session('rank',1);
            $this->redirect('Manager/Index/Index');
        }  else {
            $this->redirect('Home/Login/DropOut');
        }
        
    }
    public function dean(){
        $tea = obtain();
        $result = M('Teacher')->where('dean=1 and  tea_number=\''.$tea.'\'')->find();
        if($result){
            session(null);
            session('tea_number',$result['tea_number']);
            session('name',$result['name']);
            session('dep_id',$result['dep_id']);
            session('rank',2);
            $this->redirect('Dean/Index/Index');
        }  else {//dropOut
            $this->redirect('Home/Login/DropOut');
        }
        
    }
    public function director(){
        $tea = obtain();
        $result = M('Teacher')->where('specialty=1 and  tea_number=\''.$tea.'\'')->find();
        if($result){
            session(null);
            session('tea_number',$result['tea_number']);
            session('name',$result['name']);
            session('dep_id',$result['dep_id']);
            session('rank',3);
            $T= session('tea_number');
            $User = M('Teacher_specialty');
            $list = $User->field('dep_id')->where("tea_number='$T'")->select();
            if(!empty($list)){
                $i = 0;
                foreach ($list as $val){
                    $arr[$i] = $val['dep_id'];
                    $i++;
                }
                session('dep',implode(',', $arr));//系主任所管辖的专业
            }else{
                session('dep',0);//系主任所管辖的专业
            }
            $this->redirect('Director/Index/Index');
        }  else {//dropOut
            $this->redirect('Home/Login/DropOut');
        }
    }
    public function teacher(){
        $tea = obtain();
        $result = M('Teacher')->where('adviser=1 and  tea_number=\''.$tea.'\'')->find();
        if($result){
            session(null);
            session('tea_number',$result['tea_number']);
            session('name',$result['name']);
            session('dep_id',$result['dep_id']);
            session('rank',4);
            $this->redirect('Teacher/Index/Index');   
        }  else {//dropOut
            $this->redirect('Home/Login/DropOut');
        }  
    }
}
