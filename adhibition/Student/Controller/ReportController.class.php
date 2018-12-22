<?php

namespace Student\Controller;

use Think\Controller;

/**
 * 开题报告
 */
class ReportController extends Controller {

    /**
     * 去选题表查得课题表编号
     * #已选课题
     *  去开题报告表查是否存在开题报告
     *    ##存在开题报告
     *          查看是否确认
     *              ###已确认
     *                  不能修改，不能查看。
     *              ###！未确认
     *                  可以修改
     *    ##！不存在开题报告
     *          上传开题报告
     * #！未选课题
     * 提示学生没有选择课题，结束
     */
    public function index() {
        $stu = obtain();
        //查看是否存在开题报告
       $result = topic();
        $report = M('report')->field('audit')->where('stu_number=\'' . $stu . '\'')->find();
        if (empty($report)) {//不存在
            $this->assign('li', $result);
            $this->display('Report');
        } else {//存在
            $result['audit'] = $report['audit'];
            $this->assign('li', $result);
            $this->display('File');
        }
    }

    public function sub() {
        $stu = obtain();
        //
        if (empty($_FILES))  $this->error(C('error_talk'), C('error_go'));
        //
        $m = M('Stu_topic')->field('top_id')->where('stu_number=\'' . $stu . '\'')->find();
        //
        if (!$m) $this->error(C('error_talk'), C('error_go'));
        //
        $_POST['top_id'] = $m['top_id'];
        $_POST['stu_number'] = $stu;
        $yuan = shangchuan('file1');
        //中文
        if ($yuan) {
            $_POST['wordpath'] = $yuan;
        } else {
            $this->error('上传文件失败', C('error_go'));
        }
        //外文
        $wai = shangchuan('file2');
        if ($wai) { $_POST['w_wordpath'] = $wai;}
        $Model = M('report');
        if (!$Model->create())
            $this->error('非法操作!');
        if (!$Model->add())
            $this->error('上传文件失败');
        $this->success('提交成功！', U('Report/Index'));        
    }

    public function aler() {
        $stu = obtain();
        if (empty($_FILES)) {
            $this->error(C('error_talk'), C('error_go'));
            exit;
        }
        $yuan = shangchuan('file1');
        $wai = shangchuan('file2');
        //中文
        if ($yuan) { $_POST['wordpath'] = $yuan; }
        //外文
        if ($wai) { $_POST['w_wordpath'] = $wai;}
        //审核初始化
        if ($yuan || $wai) { $_POST['audit'] = 0;}
        $Model = M('report');
        $i = $Model->create();
        if ($i) {
            $map = array(
                'stu_number' => $stu,
                'audit' => 0
            );
            if ($Model->where("stu_number='{$stu}' and audit<>1")->save()) {
                $this->success('修改成功！立即跳转...', U('Report/Index'));
            } else {
                $this->error('未修改!立即跳转...');
            }
        } else {
            $this->error('非法操作!');
        }
    }
//
//    public function click() {
//        $stu = obtain();
//        if (M('report')->where('stu_number=\'' . $stu . '\'')->save(array('queren' => 1))) {
//            $this->success('成功');
//        } else {
//            $this->error('失败');
//        }
//    }

    public function look() {
        $stu = obtain();
        $list = M('report')->where('stu_number=\'' . $stu . '\'')->find();
        if ($list) {
            $list['sname'] = session('name');
            $list['dep'] = session('dep_id');
            $this->assign('li', $list);
            $this->display();
        } else {
            $this->error('访问的页面不存在');
        }
    }

}
