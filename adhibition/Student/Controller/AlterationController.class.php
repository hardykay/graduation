<?php

namespace Student\Controller;

use Think\Controller;

class AlterationController extends Controller {

    /**
     * 题目变更
     */
    public function Index() {
        //p(session());
        $stu = obtain();
        $result = M('Alteration')->field('new_name,adviser_audit,college_audit')->where('stu_number=\'%s\'', $stu)->find();
        if ($result) {
            $this->assign('vo', $result);
            $this->display('Index2');
        } else {
            $Model = M('view_stu_top');
            $result = $Model->where('stu_number=\'%s\'', $stu)->find();
            $this->assign('vo', $result);
            $this->display();
        }
    }

    /**
     * 变更题目申请
     */
    public function add() {
        //p(session());
        $_POST['stu_number'] = $stu = obtain();
        $_POST['name'] = session('name');
        $_POST['dep_college'] = session('dep_id');
        $_POST['dep_major'] = session('zhuanye');
        $_POST['stu_time'] = date('Y-m-d H:i:s');
        $Model = new \Student\Model\AlterationModel();
        $f = $Model->create();
        if (!$f) {
            $this->error($Model->getError());
        }
        if ($Model->add($f)) {
            $this->success('提交成功！', U('Alteration/Index'));
        } else {
            $this->error('系统繁忙！');
        }
    }

    public function alter() {
        $stu = obtain();
        $Model = M('Alteration');
        $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,department,college')->where('stu_number=\'%s\'', $stu)->find();
        // p($result);
        $this->assign('vo', $result);
        $this->display();
    }

    /**
     * 提交和修改
     */
    public function updata() {
        //p(session());
        $_POST['stu_number'] = $stu = obtain();
        $_POST['name'] = session('name');
        $_POST['dep_college'] = session('dep_id');
        $_POST['dep_major'] = session('zhuanye');
        $_POST['stu_time'] = date('Y-m-d H:i:s');
        $Model = new \Student\Model\AlterationModel();
        $f = $Model->create();
        if (!$f) {
            $this->error($Model->getError());
        }
        $f['adviser_audit'] = 0;
        $f['college_audit'] = 0;
        if ($Model->where('stu_number=\'%s\'', $stu)->save($f)) {
            $this->success('修改成功！', U('Alteration/Index'));
        } else {
            $this->error('修改失败！');
        }
    }

    public function look() {
        $stu = obtain();
        $Model = M('Alteration');
        $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,department,college')->where('stu_number=\'%s\'', $stu)->find();
        // p($result);
        $this->assign('vo', $result);
        $this->display();
    }

}
