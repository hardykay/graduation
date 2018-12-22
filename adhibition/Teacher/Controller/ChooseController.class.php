<?php

namespace Teacher\Controller;

use Think\Controller;

/**
 * 申请课题阶段
 */
class ChooseController extends Controller {

    /**
     * 申请课题
     */
    public function index() {
        $tea = obtain();
        $Model = M('topic');
        $map = array('opt'=>1,'top_type' => 1, ' tea_number' => $tea, 'audit' => 1);
        $result = $Model->field('top_id,name,genre,number,opt,yixuan,audit')->where($map)->select();
        if (!$result) {
            reminding('没有需要确认的课题');
        }
        $this->assign('list', $result);
        $this->display();
    }

    public function choose($top) {
        $tea = obtain();
        if (!is_numeric($top)) {
            $this->error('请求超时！');
            exit();
        }
        $Model = M('topic');
        $name = $Model->field('name,genre')->where('top_type=1 and tea_number=\'' . $tea . '\'  and top_id=' . $top)->find();
        // p($name);
        if ($name) {
            $Modle = M('view_stu_top_c');
            $result = $Modle->where('top_id=' . $top)->select();
            //p($result);
            if ($result) {
                //p($result);
                $this->assign('list', $result);
                $this->assign('name', $name);
                $this->display();
            } else {
                $this->error('没有学生选择这个课题');
            }
        }
    }

    /**
     * 
     * @param type $top 课题编号
     * @param type $stu 学号
     * @param type $volunt 志愿123
     */
    public function choose1($top, $stu, $volunt) {
        obtain();
        $Modle = M('chaos_topic');
        $arr = array('top_id' => $top, 'stu_number' => $stu, 'volunt' => $volunt);
        if ($Modle->where($arr)->count()) {
            $data['stu_number'] = $stu;
            $data['top_id'] = $top;
            if (!M('stu_topic')->add($data)) {
                $this->error('请求超时！该学生已经被其他老师选择！', U('/Teacher/Choose/Index'));
            }
            $this->success('选取成功！', U('/Teacher/Choose/Index'));
        } else {
            $this->error('请求超时！该信息不存在', U('/Teacher/Choose/Index'));
        }
    }

    /**
     * 
     * @param type $top 课题编号
     * @param type $stu 学号
     * @param type $volunt 志愿123
     */
    public function delete($top, $stu, $volunt) {
        obtain();
        /**
         * 这里没有拦截，毕竟拦截需要时间，要拦截的话，需要查询这个课题是否为该老师所带。
         * 我就不拦截了
         */
        $map = array(
            'stu_number' => $stu,
            'top_id' => $top,
            'volunt' => $volunt,
        );
        $Modle = M('chaos_topic');
        $result = $Modle->where($map)->delete();
        if ($result) {
            // $Modle = M('topic');
            // $sql = 'UPDATE tp_topic SET number=number-' . $result . ' where top_id=' . $top;
            // $Modle->execute($sql);
            $this->success('删除成功！', __ROOT__ . '/Teacher/Choose/Index');
        } else {
            $this->error('请求超时！', U('Choose/Index'));
        }
    }

    /**
     * 确认课题
     * @param type $top
     */
    public function verify($top) {
        $tea = obtain();
        if (!is_numeric($top)) {
            $this->error('请求超时！');
        }
        //修改topic
        $data['number'] = 0;
        $data['youxiao'] = 0;
        $data['opt'] = 0;
        M()->startTrans();
        $Model = M('Topic');
        $result = $Model->where("top_id={$top} and tea_number='{$tea}' and top_type=1")->save($data);
        if ($result) {
            //删除预选
            if (M('chaos_topic')->where('top_id=' . $top)->delete()) {
                M()->commit();
                $this->success('确认成功，该课题选择学生已经到此结束！');
                exit();
            } else {
                M()->commit();
                $this->success('确认成功，该课题选择学生已经到此结束！');
                exit();
            }
        }
        M()->rollback();
        $this->error('请求超时！');
    }
    public function verify1($top) {
        $tea = obtain();
        if (!is_numeric($top)) {
            $this->error('请求超时！');
        }
        //修改topic
        $data['number'] = 0;
        $data['youxiao'] = 1;
        $data['opt'] = 1;
        $Model = M('Topic');
        $result = $Model->where("top_id={$top} and tea_number='{$tea}' and top_type=1")->save($data);
        if ($result) {
             $this->success('成功开启');
        }else{
            $this->error('该课题类型不能修改！');
        }
        
    }
    /**
     * 已经优化
     * @param type $top
     */
    public function look($top) {
        obtain();
        $Model = M('stu_topic');
        $m = $Model->field('stu_number')->where(array('top_id' => $top))->buildSql();
        $stu = M('student')->where('stu_number in' . $m)->buildSql();
        $dep = M('specialty')->field('dep_id,dep_name')->buildSql();
        $result=$Model->table("{$stu} s,{$dep} d")->field('s.stu_number,s.name,d.dep_name,s.phone,s.email,s.qq')->where('s.dep_major=d.dep_id')->select();
        //p($result);
        
        if ($result) {
            $this->assign('list', $result);
            $this->assign('top', $top);
            $this->display();
        } else {
            $this->error('不好意思没有学生',U('Choose/Index'));
        }
    }

    /**
     * 
     */
    public function del($top) {
        $tea = obtain();
        if (!is_numeric($top)) {
            $this->error('请求超时！');
            exit();
        }
        if (!M('Topic')->where('top_id=' . $top . ' and tea_number=\'' . $tea . '\'')->count()) {
            $this->success('非法操作');
        }
        M()->startTrans();
        $t = array('top_id' => $top);
        $sql = M('stu_topic')->field('stu_number')->where($t)->buildSql();
        M('chaos_topic')->where($t)->delete();
        // M('chaos_topic')->where($t)->delete();
        M('stu_topic')->where($t)->delete();
        M('Topic_f')->where($t)->delete();
        M('Topic')->where($t)->delete();
        M()->commit();
        $this->success('删除成功');
    }
    
    /**
     * 删除已选课题的学生
     */
    public function d($stu,$top){
        $tea = obtain();
        $data['stu_number'] = $stu;
        $data['top_id'] = $top;
        if(!M('stu_topic')->where($data)->delete()){
            $this->error('删除失败！');
        }else{
            $this->success('删除成功！');
        }
        
    }
}
