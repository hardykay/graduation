<?php
namespace Manager\Controller;
use Think\Controller;
/**
 * 成绩管理
 */
class ScoreController extends Controller {
    /**
     * 设置成绩比例，平时、指导、评阅、答辩等四个成绩
     */
    public function index(){
        //
        $tea = obtain();
        //不存在POST则加在模版，存在的话，修改数据库
        if(empty($_POST)){
            $result = M('Scale')->where('id=1')->find();
            $this->assign('vo',$result);
            $this->display();
        }  else {
            $_POST['id'] = 1;
            $Model = M('Scale');
            $data = $Model->create();
            if($data){
                if($Model->where('id=1')->save($data)){
                    $this->success('修改成功');
                }else{
                    if(M('Scale')->where('id=1')->find()){
                        $this->error('未修改');
                    }
                    if($Model->add($data)){
                        $this->success('添加成功');
                    }else{
                        $this->error('失败，请联系管理员');
                    }
                }
                
            }else{
                $this->error($Model->getError());
            }
        }
        
        
    }
}
