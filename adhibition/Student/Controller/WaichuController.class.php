<?php

namespace Student\Controller;

use Think\Controller;

/**
 * 审阅开题报告
 */
class WaichuController extends Controller {

    /**
     * 申请课题
     */
    public function index() {
        //echo date('Y/m/d H:i:s');
        $stu = obtain();
        $m = M('outside')->field('id,stu_number,stu_name,college,major,phone,shenhe1,shenhe3')->where('stu_number=\'' . $stu . '\'')->select();
        if ($m) {
            $this->assign('list', $m);
            
            $this->display();
        } else {
            $this->wai();
        }
    }

    /**
     * 外设
     */
    public function wai() {
        $stu = obtain();
        if (empty($_POST)) {
            $col = M('college')->select();
            $s = M('View_student')->where('stu_number=\'' . $stu . '\'')->find();
            $this->assign('s', $s);
            $this->assign('col', $col);
            $this->display('Wai');
        } else {
            // stu_number CHAR(20) comment '学号',
            //	dep_c INT comment '学院',
            //	college INT comment '学院',
            //	dep_s INT comment '专业',
            //	major INT comment '专业',
            $s = M('View_student')->field('college,specialty,name,dep_college,dep_major')->where('stu_number=\'' . $stu . '\'')->find();
            $_POST['college'] = $s['college'];
            $_POST['major'] = $s['specialty'];
            $_POST['dep_college'] = $s['dep_college'];
            $_POST['dep_major'] = $s['dep_major'];
            $_POST['stu_number'] = $stu;
            $_POST['stu_name'] = $s['name'];
            $_POST['url'] = shangchuan('file');
            $Out = new \Student\Model\OutsideModel();
            $res = $Out->create();
            if ($res) {
                if ($Out->add()) {
                    $this->success('提交成功，请等待审核结果');
                }
            } else {
                $this->error($Out->getError());
            }
        }
    }

    public function check() {
        $stu = obtain();
        //p($_POST);
        $_POST['shenhe1'] = 0;
        $_POST['shenhe3'] = 0;
        $id = $_POST['id'];
        $map = array('stu_number' => $stu, 'id' => $id);
        $Model = M('Outside');
        $post = $Model->create();
        if ($Model->where($map)->save($post)) {
            $this->success('修改成功',U('Waichu/Index'));
        } else {
            $this->error('未修改');
        }
    }

    public function look() {
        $stu = obtain();
        $res = M('Outside')->where('stu_number=\'' . $stu . '\'')->find();
        $this->assign('s', $res);
        $this->display();
    }

    public function topic($id, $stu) {
        $Model = M();
        $sql = $Model->table('tp_waichu')->field('top_id')->where('stu_number=\'' . $stu . '\'')->buildSql();

        $resu = $Model->table('tp_topic')->field('top_id')->where('top_type=4 and top_id in' . $sql)->find();

        if ($resu) {
            $this->success('课题已经申报');
            exit;
        }
        $result = $Model->table('tp_outside')->field('dep_college,stu_number,stu_name,college,dep_major,major,name')->where('shenhe3=1 and id=' . $id)->find();
        empty($result) ? $this->error('出错，教学院长未评阅') : 1;
        $this->assign('li', $result);
        $this->display();
    }

    public function topicLook($top) {
        
    }

    /**
     * 保存课题
     */
    public function top() {
        empty($_POST) ? $this->error('请求失败') : 1;
        $tea = obtain();
        $data['dep_id'] = filter_input(INPUT_POST, 'hao'); //专业
        $data['stu_number'] = filter_input(INPUT_POST, 'stun'); //学生
        (empty($data['dep_id']) || empty($data['stu_number'])) ? exit('数据在传输过程错了') : 1;
        $_POST['url'] = shangchuan('file');
        $_POST['top_type'] = 4;
        $_POST['tea_number'] = $tea;
        $_POST['tea_name'] = session('name');
        $_POST['dep_id'] = session('dep_id');
        $_POST['opt'] = 0;
        $User = new \Teacher\Model\TopicModel(); // 实例化User对象!
        $resu = $User->create();

        if ($resu) {
            $data['top_id'] = $User->add(); // 写入数据到数据库  
            if ($data['top_id']) {        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $Model = M();
                //存入课题附表
                $Model->table('tp_topic_f')->create($data);
                if (!$Model->add()) {//失败
                }
                //存入外设备选表
                $s = $Model->table('tp_waichu')->add($data);
                if (!$s) {//失败
                }
                $this->success('成功提交！', './Index');
            }
        } else {
            $this->error($User->getError());
        }
    }
    /**
     * 修改毕业设计
     */
    public function alter() {
        $stu = obtain();
        $res = M('Outside')->where('stu_number=\'' . $stu . '\'')->find();
        $this->assign('s', $res);
        $this->display();
    }
}
