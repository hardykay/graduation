<?php

namespace Teacher\Controller;

use Think\Controller;

/**
 * 申请课题阶段
 */
class TopicController extends Controller {
    /*
     * 保存课题
     */

    public function bancun($i) {
        empty($_POST) ? $this->error('请求超时', C('error_go')) : 1;
        $_POST['tea_number'] = obtain();
        $_POST['top'] = $i;
        $model = new \Teacher\Model\Top_temporaryModel();
        $data = $model->create();
        if (empty($data)) {
            $this->error($model->getError());
        }
        $map = array(
            'tea_number' => $data['tea_number'],
            'top' => $data['top']
        );
        if (M('Top_temporary')->where($map)->count()) {
            $model->where($map)->save() ? $this->success('保存成功', U('Topic/ApplyFor')) : $this->error('未修改');
        } else {
            $model->add() ? $this->success('保存成功', U('Topic/ApplyFor')) : $this->error('保存失败');
        }
        exit;
    }

    public function applyFor() {
        obtain();
        $this->display();
    }

    /**
     * 盲选课题 
     * @return [type] [description] top_type=1
     */
    public function mapplyFor() {
        $tea = obtain();
        if (empty($_POST)) {
            $college = session('?dep_id') ? session('dep_id') : $this->error('请求超时', C('error_go'));
            $top = M('Specialty');
            $date = date('Y-m-d H:i:s');
            $sql = M('teacher_specialty')->field('dep_id')->where("(topic_close>'%s') and (topic_strat<'%s')", $date, $date)->buildSql();
            $data = $top->field('dep_id,dep_name')->where('dep_father=' . $college . ' and dep_id in ' . $sql)->select();
            if (empty($data)) {
                reminding('抱歉，没有找到这个时间段开始毕业设计课题申请的专业。');
            }
            $this->assign('list', $data);
            $re = M('Top_temporary')->field('name,content')->where("top=1 and tea_number='{$tea}'")->find();
            $this->assign('top', $re);
            $this->display();
        } else {
            //保存
            $cun = filter_input(INPUT_POST, 'submit'); //专业
            if (!empty($cun)) {
                $this->bancun(1);
            }

            $hao = I('post.hao');
            if (empty($hao)) {
                $this->error('请选择专业');
            }
            //设置初始化值
            $_POST['top_type'] = 1;
            $_POST['tea_number'] = $tea;
            $_POST['tea_name'] = session('name');
            $_POST['dep_id'] = session('dep_id');
            $_POST['opt'] = 1;
            $file = shangchuan('file');
            if ($file) {
                $_POST['url'] = $file;
            }
            //开启事务
            M()->startTrans();

            $User = new \Teacher\Model\TopicModel(); // 实例化User对象!
            //$data = $User->create();
            //dump($data);
            if (!$User->create()) {
                M()->rollback();
                $this->error($User->getError());
            }
            $result = $User->add(); // 写入数据到数据库  
            if (!$result) {
                M()->rollback();
                $this->error('请求超时');
            }
            foreach ($_POST['hao'] as $value) {
                $da[] = array('top_id' => $result, 'dep_id' => $value);
            }
            $User = M('topic_f');
            if (!$User->addAll($da)) {
                M()->rollback();
                $this->error('请求超时');
            }
            M('Top_temporary')->where("top=1 and tea_number='{$tea}'")->delete();
            M()->commit();
            $this->success('成功提交！', U('Topic/ApplyFor'));
        }
    }

    /**
     * 定选课题 top_type =2
     * @return [type] [description]
     */
    public function dapplyFor() {
        // dump($_POST);
        $tea = obtain();
        //盲选，课题表，适合的专业表
        if (!empty($_POST)) {
            //保存
            $cun = filter_input(INPUT_POST, 'submit'); //专业
            if (!empty($cun)) {
                $this->bancun(2);
            }
            $hao = filter_input(INPUT_POST, 'hao'); //专业
            if (empty($hao)) {
                $this->error('请选择专业');
            }
            $num = filter_input(INPUT_POST, 'nunber'); //专业
            if (empty($num)) {
                $this->error('请选择学生');
            }
            //检测是否已被其他老师选择
            if (!empty(M('Stu_topic')->where("stu_number='{$num}'")->count())) {
                $this->error('您来晚了，有个别学生已经被选为指定选或团队选课题，请重新选择！');
            }
            $_POST['url'] = shangchuan('file');
            $_POST['top_type'] = 2;
            $_POST['tea_number'] = $tea;
            $_POST['tea_name'] = session('name');
            $_POST['dep_id'] = session('dep_id');
            $_POST['dep_id'] = session('dep_id');
            $_POST['opt'] = 0;
            M()->startTrans();
            $flag = TRUE;
            $User = new \Teacher\Model\TopicModel(); // 实例化User对象!
            $data = $User->create();
            //dump($data);
            if ($data) {
                $result = $User->add(); // 写入数据到数据库  
                if ($result) {        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    //存入课题附表
                    $User = M('Topic_f');
                    $data = array();
                    $data['top_id'] = $result;
                    $data['dep_id'] = $hao; //$_POST['hao'];
                    // $re = $User->data($data)->add();
                    if (!$User->data($data)->add()) {//失败
                        $User->rollback();
                        $this->error('请求失败');
                    }
                    //存入学生选题表
                    M('Stu_topic')->where("stu_number='{$num}'")->delete();

                    $User = M('Stu_topic');
                    $data['stu_number'] = $num;
                    if (!$User->create($data) || !$User->add($data)) {//失败
                        $User->rollback();
                        $this->error('请求失败');
                    }
                    M('Top_temporary')->where("top=2 and tea_number='{$tea}'")->delete();
                    $User->commit();
                    $this->success('成功提交！', U('Topic/ApplyFor'));
                }
            } else {
                $User->rollback();
                $this->error('请求失败');
            }
        } else {
            $top = M('Specialty');
            $college = session('dep_id');
            $date = date('Y-m-d H:i:s');
            $sql = M('teacher_specialty')->field('dep_id')->where("(topic_close>'%s') and (topic_strat<'%s')", $date, $date)->buildSql();
            $data = $top->field('dep_id,dep_name')->where('dep_father=' . $college . ' and dep_id in ' . $sql)->select();

            //$data = $top->field('dep_id,dep_name')->where('dep_father='.$college)->select();
            $this->assign('list', $data);
            $re = M('Top_temporary')->field('name,content')->where("top=2 and tea_number='{$tea}'")->find();
            $this->assign('top', $re);
            $this->display();
        }
    }

    /**
     * 团队课题
     */
    public function team() {
        // dump($_POST);
        $tea = obtain();
        if (!empty($_POST)) {
            //保存
            $cun = filter_input(INPUT_POST, 'submit'); //专业
            if (!empty($cun)) {
                $this->bancun(3);
            }
            empty($_POST['hao']) ? $this->error('未选择学生') : 1;
            $_POST['url'] = shangchuan('file');
            $_POST['top_type'] = 3;
            $_POST['tea_number'] = $tea;
            $_POST['tea_name'] = session('name');
            $_POST['dep_id'] = session('dep_id');
            $_POST['opt'] = 0;
            //数据库自己统计（触发器）
            //$_POST['yixuan'] = count($_POST['hao']);
            M()->startTrans();
            $flag = TRUE;
            $User = new \Teacher\Model\TopicModel(); // 实例化User对象!
            $data = $User->create();
            //创建数据失败
            if (!$data) {
                M()->rollback();
                $this->error($User->getError());
            }
            //$result = $User->add(); // 写入数据到数据库 
            $result = $User->add();
            if (!$result) {        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                M()->rollback();
                $this->error('服务器繁忙，添加失败！请稍后再试！');
            }
            $arr = filter_input_array(INPUT_POST);
            $ds = null;
            $dsp = null;
            empty($arr['hao']) ? $this->error('请选择学生！') : 1;
            foreach ($arr['hao'] as $value) {
                $pstu = explode(',', $value);
                //p($p);
                //学生
                $str .= "'{$pstu[0]}',";
                $ds[] = array('top_id' => $result, 'stu_number' => $pstu[0]);
                //专业
                if (empty($dsp)) {
                    $dsp[] = array('top_id' => $result, 'dep_id' => $pstu[1]);
                } else {
                    $pointer = 0;
                    foreach ($dsp as $value) {
                        if ($value['dep_id'] == $pstu[1]) {
                            $pointer = 1;
                        }
                    }
                    if ($pointer == 0) {
                        $dsp[] = array('top_id' => $result, 'dep_id' => $pstu[1]);
                    }
                }
            }
            $str = substr($str, 0, -1);
            //检测是否已被其他老师选择
            if (!empty(M('Stu_topic')->where('stu_number in(' . $str . ')')->count())) {
                M()->rollback();
                $this->error('您来晚了，有个别学生已经有课题，请重新选择！');
            }
            if (!M('stu_topic')->addAll($ds)) {//失败
                M()->rollback();
                $this->error('个别学生已经有课题，请重新选择！');
            }
            if (!M('topic_f')->addAll($dsp)) {//失败
                M()->rollback();
                $this->error('系统繁忙请稍候继续');
            }
            M('Top_temporary')->where("top=3 and tea_number='{$tea}'")->delete();
            //提交事务
            M()->commit();
            $this->success('成功提交！', U('Topic/ApplyFor'));
        } else {
            $data = M('College')->select();
            $this->assign('list', $data);
            $re = M('Top_temporary')->field('name,content')->where("top=3 and tea_number='{$tea}'")->find();
            $this->assign('top', $re);
            $this->display();
        }
    }

    public function topic() {
        
    }

}
