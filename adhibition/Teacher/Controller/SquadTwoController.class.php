<?php
namespace Teacher\Controller;
use Think\Controller;
use Think\Model;

class SquadTwoController extends Controller {
  
    
    /**
     * 查看所有答辩小组
     * @param type $dep 专业
     */
    public function index(){
        $tea = obtain();
        $sql = M('Member_two')->field('id')->where('tea_number=\''.$tea.'\'')->buildSql();
        $result = M('Squad_two')->where('tea_number=\''.$tea.'\' or id in '.$sql)->select();
        if(!$result){
            reminding('答辩小组未创建！'); 
        }
        $this->assign('list', $result);
        $this->display();
    }
    /**
     * 查看
     * @param type $id
     * @param type $dep
     * @param type $page
     */
    public function alert($id){
            $data = M('Squad_two')->where('id='.$id)->find();
            //p($data);
            empty($data)?$this->error('访问页面不存在',C('error_go')):1;
            $sql = M('member_two')->field('tea_number')->where('id='.$id)->buildSql();
            $tea = M('Teacher')->field('tea_number,name')->where('tea_number in'.$sql)->select();
           // p($tea);
            $this->assign('tea', $tea);        
            $this->assign('data', $data);
            //$this->assign('dep', $dep);
            $this->display();
    }
}
