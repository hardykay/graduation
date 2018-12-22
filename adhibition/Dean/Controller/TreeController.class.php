<?php
namespace Dean\Controller;
use Think\Controller;

class TreeController extends Controller {
    /**
     * 显示树
     */
    public function index(){
        obtain();
        $dep = session('dep_id');
        //
        $M = M('College');
        $co = $M->where(array('dep_id' => $dep))->select();
        $this->assign('co', $co);
        //
        $sp = $M->table('tp_specialty')->where(array('dep_father' => $dep))->select();
        foreach ($sp as $key => $value) {
            $sql = M('teacher_specialty')->field('tea_number')->where("dep_id=%s",$value['dep_id'])->buildSql();
            $teacherNmae = M('teacher')->field('name')->where("tea_number=({$sql})")->getField('name');
            if($teacherNmae)
                $sp[$key]['dep_name'] .= '（系主任：'.$teacherNmae.'）';
            else
                $sp[$key]['dep_name'] .= '（<b style="color:red">未设系主任</b>）';
        }
        $this->assign('sp', $sp);
        //
        $zy = $M->table('tp_specialty')->field('dep_id')->where(array('dep_father' => $dep))->buildSql();
        $ca = M('Class')->where('dep_father in '.$zy)->select();
        $this->assign('ca', $ca);
        //
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
