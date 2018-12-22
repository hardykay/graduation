<?php

namespace Student\Controller;

use Think\Controller;

class TopicController extends Controller {

//
    //如果是未选课题，列出，先去tp_teacher_specialty表查询，是否在规定时间内
    public function index() {
        $stu = obtain();
        $sub = M("stu_topic")->field('top_id')->where('stu_number=\'' . $stu . '\'')->find();
        if ($sub['top_id']) {
            if(!M('topic_f')->where('rele=2 and top_id='.$sub['top_id'])->find()){
                reminding('你已被教师选中，请等待结果发布！');
            }else{
                $sql = M('Topic')->field('top_id,name,tea_number')->where('top_id=' . $sub['top_id'])->buildSql();
                $result = M()->table("{$sql} s,tp_teacher t")->field('s.top_id,s.name,t.name as tea_name,t.phone,t.email,t.qq')->where('s.tea_number=t.tea_number')->find();
                if ($result) {
                    $this->assign('vo', $result);
                    $this->display('Look');
                } else {
                    reminding('出错！');
                }
                exit;
            }
            
        }
        $dep = session('zhuanye');
        $result = M('teacher_specialty')->where('dep_id=' . $dep)->find();
        if (!$result) {
            reminding('请等待，还没开始毕业设计');
        }
        if (time() < strtotime($result['choice_strat']) || time() > strtotime($result['choice_close'])) {
            
            reminding('不好意思，该专业的选题系统已关闭，请联系指导老师或者校领导');
        }
        $sql = M('chaos_topic')->field('top_id')->where("stu_number='{$stu}'")->buildSql();
        $topic = M('Topic')->field('top_id,name,tea_number,tea_name,genre')->where('top_id in' . $sql)->group('top_id')->buildSql();
        $sql = M('chaos_topic')->where("stu_number='{$stu}'")->buildSql();
        $result = M()->table("{$topic} t,{$sql} s")->where('t.top_id=s.top_id')->order('volunt')->select();
        foreach ($result as $value) {
            $this->assign('list' . $value['volunt'], $value);
        }
        $this->assign('zhuanye', $dep);
        $this->display();
    }

    //查看我的课题
    public function look() {
        $stu = obtain();
        $sql = M('stu_topic')->field('top_id')->where('stu_number=\'' . $stu . '\'')->buildSql();
        $sql = M('Topic')->field('top_id,name,tea_number')->where('top_id=' . $sql)->buildSql();
        $result = M()->table("{$sql} s,tp_teacher t")->field('s.name,t.name as tea_name,t.phone,t.email,t.qq')->where('s.tea_number=t.tea_number')->find();
        if ($result) {
            $this->assign('vo', $result);
            $this->display('Look');
        } else {
            echo '<div style="color:#888;font-size:60px;width:750px;margin:0 auto;height:200px;line-height:200px;">您还没有课题</div>';
        }
    }

    ///盲选课题选择
    /**
     * 显示所有盲选课题
     * @param type $xuan
     * @param type $page
     */
    public function chooseSubjects($xuan, $page = 0) {
        $stu = obtain();
        if ($xuan != 1 && $xuan != 2 && $xuan != 3) {
            $this->error(C('error_talk'), C('error_go'));
        }
        //非法操作
        $data['stu_number'] = $stu;
        if (M('stu_topic')->where($data)->count()) {
            $this->error('你已经有课题了', U('Topic/Index'));
        }
        //非法操作
        $data['volunt'] = $xuan;
        if (M('chaos_topic')->where($data)->count()) {
            $this->error(C('error_talk'), C('error_go'));
        }
        $dep = session('zhuanye');
        $chaos = M('chaos_topic')->field('top_id')->where("stu_number='{$stu}'")->buildSql();
        $sql = M('topic_f')->field('top_id')->where("top_id not in {$chaos} and audit=1 and rele!=0 and dep_id={$dep}")->buildSql();
        $User = M('topic');
        //满足记录的条件：1、可选 2、已发布 3、通过系主任的审核 4、盲选课题 5、该课题可以给该专业选取 
        $count = $User->where("opt=1 and top_type=1 and top_id in {$sql}")->count();
        if ($page < 2 || (($page - 1) * 10) > $count) {
            $pagenum = 0;
        } else {
            $pagenum = ($page - 1) * 10;
        }
        $result = $User->field('top_id,name,tea_number,tea_name,genre,number,youxiao')->where('opt=1 and top_type=1 and top_id in' . $sql)->limit($pagenum, 10)->select();
        $this->assign('list', $result);
        $this->assign('xuan', $xuan);
        //$this->assign('list', $result);
        $page = getPageHtml($page, $count, __ROOT__ . '/Student/Topic/ChooseSubjects/xuan/' . $xuan);
        $this->assign('page', $page);
        $this->display();
    }

    /**
     * 提交选择的结果
     * @param type $top
     * @param type $xuan
     */
    public function choose($top, $xuan) {
        $stu = obtain();
        //$xuan只有三个取值
        if ($xuan != 1 && $xuan != 2 && $xuan != 3) {
            $this->error(C('error_talk'), C('login_go'));
        }
         $map = array('top_id' => $top, 'stu_number' => $stu, 'volunt' => $xuan);
        $choose = M('chaos_topic');
        //创建失败
        if (!$choose->create($map)) {
            $this->error('选择失败', U('Topic/Index'));
        }
        //添加失败
        if (!$choose->add()) {
            $this->error('选择失败', U('Topic/Index'));
        }
        $this->success('选择成功', U('Topic/Index'));
        
    }

    /**
     * 取消选题
     * @param type $xuan
     */
    public function cancel($xuan, $top) {
        $stu = obtain();
        $data = array(
            'volunt' => $xuan,
            'stu_number' => $stu,
            'top_id' => $top
        );
        if (!M('Chaos_topic')->where($data)->delete()) {
            $this->error('取消失败');
        }
        $this->success('成功取消！请重新选择！');
    }

}
