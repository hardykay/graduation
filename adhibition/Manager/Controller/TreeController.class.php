<?php
namespace Manager\Controller;
use Think\Controller;

class TreeController extends Controller {
    /**
     * 显示树
     */
    public function index(){
        obtain();
        $co = M('College')->select();
        $this->assign('co', $co);
        $sp = M('Specialty')->select();
        $this->assign('sp', $sp);
        $ca = M('Class')->select();
        $this->assign('ca', $ca);
        $this->display();
    }
    /**
     * 添加学院
     */
    public function addColege(){
        obtain();
        empty($_POST)?exit:1;
        $Model = new \Manager\Model\CollegeModel();
        if($Model->create()){
            if($Model->add()){
                $this->success('创建成功');
            }else {
                $this->error('创建失败');
            }
        }  else {
            $this->error($Model->getError());
        }
    }
    /**
     * 删除学院
     * @param type $id
     */
    public function delColege($id){
        obtain();
        is_numeric($id)?1:exit;
        $Model = M();
        $sql = $Model->table('tp_specialty')->field('dep_id')->where(array('dep_father'=>$id))->buildSql();
        $Model->table('tp_class')->where('dep_father in'.$sql)->delete();
        $Model->table('tp_specialty')->where(array('dep_father'=>$id))->delete();
        if($Model->table('tp_college')->where(array('dep_id'=>$id))->delete()){
            $this->success('成功删除');
        }
    }
    /**
     * 添加专业
     */
    public function addSpecialty(){
        obtain();
        empty($_POST)?exit:1;
        $Model = new \Manager\Model\SpecialtyModel();
        if($Model->create()){
            if($Model->add()){
                $this->success('创建成功');
            }else {
                $this->error('创建失败');
            }
        }  else {
            $this->error($Model->getError());
        }
    }
    /**
     * 删除专业
     * @param type $id
     */
    public function delSpecialty($id){
        obtain();
        is_numeric($id)?1:exit;
        $Model = M();
        $Model->table('tp_class')->where(array('dep_father'=>$id))->delete();
        if($Model->table('tp_specialty')->where(array('dep_id'=>$id))->delete()){
            $this->success('成功删除');
        }
    }
    /**
     * 添加班级
     */
    public function addClass(){
        obtain();
        empty($_POST)?exit:1;
        $Model = new \Manager\Model\ClassModel();
        if($Model->create()){
            if($Model->add()){
                $this->success('创建成功');
            }else {
                $this->error('创建失败');
            }
        }  else {
            $this->error($Model->getError());
        }
    }
    /**
     * 删除班级
     * @param type $id
     */
    public function delClass($id){
        
        obtain();
        is_numeric($id)?1:exit;
        if(M('Class')->where(array('dep_id'=>$id))->delete()){
            $this->success('成功删除');
        }
    }
    
}
