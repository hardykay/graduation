<?php

namespace Student\Controller;

use Think\Controller;
use Think\Model;

class SquadController extends Controller {

    /**
     * 查看所有答辩小组
     * @param type $dep 专业
     */
    public function index() {
        $stu = obtain();
        topic();
        if (M('Overall')->where("dabian=1 and stu_number='{$stu}'")->count()) {
            reminding('你已经完成答辩，请等待答辩结果！');
        }
        $sql = M('Squad_stu')->field('id')->where('stu_number=\'' . $stu . '\'')->buildSql();
        $data = M('Squad')->where('id in ' . $sql)->find();
        if (empty($data)) {
            reminding('页面不存在，答辩信息还未发布');
        }
        $sql = M('member')->field('tea_number')->where('id in ' . $sql)->buildSql();
        $tea = M('Teacher')->field('tea_number,name')->where('tea_number in' . $sql)->select();
        // p($tea);
        $this->assign('tea', $tea);
        $this->assign('data', $data);
        $this->display('Index');
    }

}
