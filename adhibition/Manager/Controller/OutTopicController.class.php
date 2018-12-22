<?php

namespace Manager\Controller;

use Think\Controller;

class OutTopicController extends Controller {

    /**
     * 显示所有学院
     */
    public function index() {
        //$this->display();
        $Model = M();
        //查学院
        $college = $Model->table('tp_college')->select();
        foreach ($college as $key => $value) {
            //专业
            $college[$key]['zy'] = $Model->table('tp_specialty')->where('dep_father=' . $value['dep_id'])->count();
            //班级
            $sql = $Model->table('tp_specialty')->field('dep_id')->where('dep_father=' . $value['dep_id'])->buildSql();
            $college[$key]['bj'] = $Model->table('tp_class')->where('dep_father in ' . $sql)->count();
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_college=' . $value['dep_id'])->count();
        }
        $this->assign('list', $college);
        $this->display();
    }

    /**
     * 显示专业
     */
    public function specialty($dep) {
        $Model = M();
        $college = $Model->table('tp_specialty')->where(array('dep_father' => $dep))->select();
        foreach ($college as $key => $value) {
            $college[$key]['bj'] = $Model->table('tp_class')->where('dep_father=' . $value['dep_id'])->count();
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_major=' . $value['dep_id'])->count();
        }
        $this->assign('list', $college);
        $this->display();
    }

    /**
     * 显示班级
     */
    public function banji($dep, $name) {
        $Model = M();
        $college = $Model->table('tp_class')->where(array('dep_father' => $dep))->select();
        //p($college);
        foreach ($college as $key => $value) {
            //学生
            $college[$key]['xs'] = $Model->table('tp_student')->where('dep_class=' . $value['dep_id'])->count();
        }
        $name = base64_decode($name);
        $this->assign('zy', $name);
        $this->assign('list', $college);
        $this->display('Class');
    }

      /**
     * 打印，某个班级的课题
     * @param type $dep
     * @param type $name
     */
    public function claExcel($dep,$spe,$name){
//        obtain();
        $m = M('view_std');
        $data = $m->field('stu_number,stu_name,tea_name,t_name,specialty,class')->where('dep_class='.$dep)->order('stu_number asc')->select();
        //p($data);
        $letter = array('A','B','C','D','E','F');
        $tableheader = array('学号','姓名','指导老师','课题','专业','班级');

        $filename = base64_decode($spe).'--'.base64_decode($name);
        \Tool\PHPExcel::excel($letter, $tableheader, $data, $filename);
    }

}
