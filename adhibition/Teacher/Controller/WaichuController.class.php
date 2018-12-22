<?php

namespace Teacher\Controller;

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
        $tea = obtain();
        $m = M('view_waichu')->where('tea_number=\'' . $tea . '\'')->select();
        //p($m);
        // $m = M('outside')->field('id,stu_number,stu_name,college,major,phone,shenhe1,shenhe2,shenhe3')->where('tea_number=\''.$tea.'\'')->select();
        if ($m) {
            $this->assign('list', $m);
            $this->display();
        } else {
            reminding('没有外出毕业设计申请', 0);
        }
    }

    public function check() {
        empty($_POST) ? $this->error('未找到该页面！', C('error_go')) : 1;
        $tea = obtain();
        $res = new \Teacher\Model\OutsideModel();
        $id = filter_input(INPUT_POST, 'id');
        if ($res->create()) {
            $map = array(
                'tea_number' => $tea,
                'id' => $id
            );
            if ($res->where($map)->save()) {
                $this->success('审核成功', U('Waichu/Index'));
                exit;
            }
        }
        $this->error($res->getError());
    }
/**
 * 查看外出毕设
 * @param type $id
 */
    public function look($id) {
        $tea = obtain();
        $map = array(
            'tea_number' => $tea,
            'id' => $id
        );
        $res = M('Outside')->where($map)->find();
        $this->assign('s', $res);
        $this->display();
    }
    /**
 * 审核或者修改外出毕设
 * @param type $id
 */
    public function Alter($id) {
        $tea = obtain();
        $map = array(
            'tea_number' => $tea,
            'id' => $id
        );
        $res = M('Outside')->where($map)->find();
        $this->assign('s', $res);
        $this->display();
    }

    public function topic($id, $stu) {
        $Model = M();
        $sql = $Model->table('tp_waichu')->field('top_id')->where('stu_number=\'' . $stu . '\'')->buildSql();

        $resu = $Model->table('tp_topic')->field('top_id')->where('top_type=4 and top_id in' . $sql)->find();
        //p($resu);
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
        $data['stu_number'] = $stu = filter_input(INPUT_POST, 'stun'); //学生
        $map = array('stu_number' => $stu);
        (empty($data['dep_id']) || empty($data['stu_number'])) ? exit('数据在传输过程错了') : 1;
        $_POST['url'] = shangchuan('file');
        $_POST['top_type'] = 4;
        $_POST['tea_number'] = $tea;
        $_POST['tea_name'] = session('name');
        $_POST['dep_id'] = session('dep_id');
        $_POST['opt'] = 0;
        $_POST['audit'] = 1;
        //$_POST['rele'] = 2;
        $User = new \Teacher\Model\TopicModel(); // 实例化User对象!
        $resu = $User->create();

        if ($resu) {
            $data['top_id'] = $User->add(); // 写入数据到数据库  
            if ($data['top_id']) {        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $Model = M();
                //存入课题附表
                $data['audit'] = 1;
                //p($data);
                //课题附表
                $Model->table('tp_topic_f')->where($map)->delete();
                $Model->table('tp_topic_f')->create($data);
                if (!$Model->add()) {//失败
                }
                //学生选题表
                $Model->table('tp_stu_topic')->where($map)->delete();
                $Model->table('tp_stu_topic')->create($data);
                $Model->add();
                //存入外设备选表
                $Model->table('tp_waichu')->where($map)->delete();
                $Model->table('tp_waichu')->create($data);
                $s = $Model->add();
                if (!$s) {//失败
                }
                //任务书
                M('task')->where($map)->delete();
                //中期检查
                M('report')->where($map)->delete();
                //中期检查
                M('inspect')->where($map)->delete();
                $this->success('成功提交！', './Index');
            }
        } else {
            $this->error($User->getError());
        }
    }

}
