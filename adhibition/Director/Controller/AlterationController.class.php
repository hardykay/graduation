<?php

namespace Director\Controller;

use Think\Controller;

class AlterationController extends Controller {

    /**
     * 题目变更
     */
    public function Index() {
        //p(session());
        obtain();
        // exit;
        $dep = session('dep');
        //取得指导老师的所有课题
        $sql = M('topic')->field('top_id')->where('tea_number=\'%s\'', $tea)->buildSql();
        $result = M('Alteration')->field('stu_number,name,college_name,major_name,adviser_audit,college_audit')
                        ->where('adviser_audit=1 and college_audit=0 and dep_major in(' . $dep . ')')->select();
        //p($result);
        $this->assign('list', $result);
        $this->display();
    }

    /**
     * 提交和修改
     */
    public function updata() {
        $stu = I('post.stu');
        $college_audit = I('post.college_audit');
        $college = I('post.college');
        //thinkphp对时间操作有bug
        if (empty($college_audit)) {
            $this->error('审核结果必选');
        }
        if (empty($college)) {
            $this->error('审核意见必须');
        }
        //开启事物
        M()->startTrans();
        $Model = M();
        $sql = 'UPDATE `tp_alteration` SET `college_audit`=' . $college_audit . ',`college`=\'' . $college . '\',`college_time`=now() WHERE ( stu_number=\'' . $stu . '\' )';
        $re = $Model->execute($sql);
        if (!$re) {
            $this->error('系统繁忙，请稍候！');
        }
        $map = array('stu_number' => $stu);
        if ($college_audit == 1) {
            $result = M('alteration')->field('top_id,dep_major as dep_id,new_name as name,plan as content')->where($map)->find();
            $topp['top_id'] = $result['top_id'];
            $topic = M('Topic')->where('top_id=' . $result['top_id'])->find();
            $topic['top_id'] = 0; // 设主键为0
            $topic['name'] = $result['name'];
            $topic['content'] = $result['content'];
            $topic['url'] = NULL;
            $topic['check_url'] = NULL;
            $topic['yixuan'] = 1;
            $top = M('Topic')->add($topic);
            if (!$top) {
                //回滚
                M()->rollback();
                $this->error('创建表失败！请稍候再试！', U('Alteration/Index'));
            }
            //M('Topic')->where($topp)->setDec('yixuan', 1);
            //  清空任务表
            M('task')->where($map)->delete();
            M('stu_topic')->where($map)->delete();
            M('report')->where($map)->delete();
            M('inspect')->where($map)->delete();
            M('Draft')->where($map)->delete();
            M('finalize')->where($map)->delete();
            $topf = array(
                'top_id' => $top,
                'dep_id' => $result['dep_id'],
                'audit' => 1
            );
            //事物指针
            $flag = TRUE;
            if (!M('Topic_f')->add($topf)) {
                $flag = FALSE;
            }
//                        $map['top_id'] = $top;
            $sheng = array(
                'stu_number' => $stu,
                'top_id' => $top
            );
            if (!M('stu_topic')->add($sheng)) {
                $flag = FALSE;
            }
            if ($flag) {
                //提交事物
                M()->commit();
                $this->success('审核成功', __CONTROLLER__ . '/Index');
            } else {
                //回滚
                M()->rollback();
                $this->error('创建表失败！请稍候再试！', U('Alteration/Index'));
            }
        } else {
            //提交事物
            M()->commit();
            $this->success('审核成功', __CONTROLLER__ . '/Index');
        }
    }

    public function check($stu) {
        obtain();
        $Model = M('Alteration');
        $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,college')->where('stu_number=\'%s\'', $stu)->find();
        $this->assign('vo', $result);
        $this->display();
    }

    public function look($stu) {
        obtain();
        $Model = M('Alteration');
        $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,college,college_audit')->where('stu_number=\'%s\'', $stu)->find();
        $this->assign('vo', $result);
        $this->display();
    }

    public function lookList($page = 0) {
        obtain();
        $dep = session('dep');
        $count = M('Alteration')->where('adviser_audit=1 and college_audit!=0  and dep_major in(' . $dep . ')')->count();
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        //取得指导老师的所有课题
        $result = M('Alteration')->field('stu_number,name,college_name,major_name,adviser_audit,college_audit')
                        ->where('adviser_audit=1 and college_audit!=0  and dep_major in(' . $dep . ')')->limit($pagenum,10)->select();
        $pageView = getPageHtml($page,$count,__ROOT__.'/Director/Alteration/LookList');
        $this->assign('list', $result);
        $this->assign('page',$pageView);
        $this->display();
    }

}
