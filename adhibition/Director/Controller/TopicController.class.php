<?php

namespace Director\Controller;

use Think\Controller;
use Think\Model;

class TopicController extends Controller {

    /**
     * 实例化检测session是否存在
     */
    public function index() {
        obtain();
        $this->display();
        //echo '系主任';
    }

    /**
     * 审核课题
     * 1、去课题表查询未审核的课题
     */
    public function look($page = 1) {
        obtain();
        $dep = session('?dep') ? session('dep') : 0;
        $sql = M('topic_f')->field('top_id')->where('(top_type=1 or top_type=2) and audit=1 and dep_id in(' . $dep . ')')->group('top_id   ')->buildSql();
        $User = M('Topic');
        $count = $User->where('(top_type=1 or top_type=2) and audit=1 and top_id in' . $sql)->count(); // 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        //p($pagenum);
        $redult = $User->where('audit=1 and top_id in' . $sql)
                        ->limit($pagenum, 10)->select();
        if (empty($redult)) {
            $this->display();
            //p($redult);
        } else {//成功
            $this->assign('list', $redult);
            $page = getPageHtml($page, $count, __ROOT__ . '/Director/Topic/Look');
            //P($page);
            $this->assign('page', $page);
            $this->display();
        }
    }

    /**
     * 审核课题
     * 1、去课题表查询未审核的课题
     */
    public function reviewProcess($page = 1) {
        obtain();
        $dep = session('?dep') ? session('dep') : 0;
        //dump($dep);
        $Model = new Model();
        //$sql = 'select * from tp_topic where top_id in(select top_id from tp_topic_f where dep_id in('.$dep.') group by top_id)';
        //$sql = 'select top_id from tp_topic_f where dep_id in('.$dep.') group by top_id';
        //统计
        $sqlCount = 'select count(top_id) as page from tp_topic where (top_type=1 or top_type=2) and audit!=2 and top_id in(select top_id from tp_topic_f where audit=0 and dep_id in(' . $dep . ') group by top_id)';
        $pages = $Model->query($sqlCount);
        //dump($pages);
        $pages = $pages[0]['page'];
        //处理掉用户传来的不合理数据
        if ($page < 2 || (($page - 1) * 10) > $pages) {
            $pagenum = 0;
        } else {
            $pagenum = ($page - 1) * 10;
        }

        ///查询，排除退回修改的
        $sql = 'select top_id,name,tea_number,tea_name,genre,top_type from tp_topic where (top_type=1 or top_type=2) and audit!=2 and top_id in(select top_id from tp_topic_f where audit=0 and dep_id in(' . $dep . ') group by top_id)  limit ' . $pagenum . ',10';
        //echo $sql;
        $result = $Model->query($sql);
        //echo $pages;
        if (empty($result)) {
            $this->display();
        } else {//成功
            $this->assign('list', $result);
            $page = getPageHtml($page, $pages, __ROOT__ . '/Director/Topic/ReviewProcess');
            $this->assign('page', $page);
            $this->display();
        }
    }

    /**
     * 课题详情
     * @param type $page课题编号
     */
    public function reviewProcess2($top,$i=0) {
        obtain();
        $dep = session('?dep_id') ? session('dep_id') : 0;
        $Model = M('Topic');
        $result = $Model->field('name,seientific,practice,genre,content,tea_name,tea_number,top_id,audit,url')->where("top_id=$top and dep_id=$dep")->find();
        //dump($result);
        
        if ($result) {
            $Model = new Model();
            $sql = 'select dep_name from tp_specialty where dep_id in(select dep_id from tp_topic_f where top_id=' . $top . ' group by dep_id) ';
            //echo $sql;
            $zhunaye = $Model->query($sql);
            if($i==2){
                $d = session('dep');
                $sql = M('stu_topic')->field('stu_number')->where(array('top_id'=>$top))->buildSql();
                $sql = M('student')->field('stu_number,name,dep_major')->where('stu_number in'.$sql)->buildSql();
                $dsql = M('specialty')->field('dep_id,dep_name')->where("dep_id in ({$d})")->buildSql();
                $student = M()->table("{$sql} s,{$dsql} d")->field('s.stu_number,s.name,d.dep_name')->where('d.dep_id=s.dep_major')->find();
                //p($student);
                $this->assign('stu', $student);
            }
            $this->assign('zhuanye', $zhunaye);
            $this->assign('topic', $result);
            $this->display();
            //p($result);
        } else {
            $this->error(C('error_talk'), C('error_go'));
        }
    }

    /**
     * 系主任审核课题
     * 1、第一次审核的
     * 1、通过提交的数据，先去判断，是否有老师审核
     */
    public function reviewProcess3() {
        obtain();
        // dump($_POST);
        //dump($_FILES);
        if (empty($_POST)) {
            $this->error(C('error_talk'), C('error_go'));
        }
        $top = filter_input(INPUT_POST, 'top');
        if (!is_numeric($top)) {
            $this->error(C('error_talk'), C('error_go'));
        }
        $_POST['top_id'] = $top;
        $dep = session('?dep') ? session('dep') : $this->error('错误');
        $Model = M('Topic');
        $result = $Model->where('audit!=1 and top_id=' . $top)->count(); //查找通过某个负责人审核的
        //p($result);
        /**
         * 两种状态
         * 1、其他人审核
         * 2、还没审核
         */
        if (!$result) {//已经通过审核（已经有人审核的）
            $i = filter_input(INPUT_POST, 'i');
            if ($i != 1) {
                $this->error('请求超时，请重新审核！', U('Topic/ReviewProcess'));
            }
            $Model = M('Topic');
            $result = $Model->where('audit=2 and top_id=' . $top)->find(); //查找通过退回修改的
            if (!$result) {
                $Model = D('Topic_f');
                $resu = $Model->create();
                if ($resu) {
                    if ($resu['audit'] == 0) {//不同意就删除
                        if ($Model->where('top_id=' . $resu['top_id'] . ' and dep_id in (' . $dep . ')')->delete()) {
                            $this->success('审核成功', U('Topic/ReviewProcess'));
                        }
                    } elseif ($resu['audit'] == 1) {//同意就修改值
                        if ($Model->where('top_id=' . $resu['top_id'] . ' and dep_id in (' . $dep . ')')->save($resu)) {
                            $this->success('审核成功', U('Topic/ReviewProcess'));
                        }
                    }
                }
            } else {
                $this->error('请求超时！', U('Topic/ReviewProcess'));
            }
        } else {//没通过审核的
            //文件上传
            $u = shangchuan('file');
            if ($u) {
                $_POST['check_url'] = $u;
            }
            $Model = new \Director\Model\TopicModel(); // 实例化Topic对象
            $advice = $Model->create();
            if ($advice) {
                if (!$Model->save($advice)) {
                    $this->error('请求超时，请重新审核！', U('Topic/ReviewProcess'));
                }
            } else {
                $this->error('请求超时，请重新审核！', U('Topic/ReviewProcess'));
            }
            if ($advice['audit'] == 1) {
                $Model = M('Topic_f');
                $resu = $Model->create();
                if ($resu['audit'] == 1) {//同意就修改值
                    if ($Model->where('top_id=' . $resu['top_id'] . ' and dep_id in (' . $dep . ')')->save($resu)) {
                        $this->success('审核成功', U('Topic/ReviewProcess'));
                    }
                }
            } else {
                $this->success('审核成功', U('Topic/ReviewProcess'));
            }
        }
    }

    public function word($top, $tea, $name) {
        $word = new \Tool\CreateWord('http://localhost/graduation/Home/Topic/Word/top/' . $top);
        $word->word();
        $n = base64_decode($tea) . '-' . base64_decode($name);
        $word->download($n);
    }

    /**
     * 下载课题附件
     * @param type $top
     */
    public function dowf($top) {
        //创建文件下载对象
        $file = new \Tool\DownloadFile('Topic', 'url', array('top_id' => $top), 'name');
        //检查
        if (!$file->check()) {
            echo '找不到该文件';
            exit();
        }
        ///下载
        if (!$file->downfile()) {
            echo '找不到该文件';
            exit();
        }
    }

    /*     * 批处理
     *
     */

    public function pichuli() {
        $i = filter_input(INPUT_POST, 'submit');
        if ($i == 1) {
            $this->pitongguo();
        } elseif ($i == 2) {
            $this->pishanchu();
        } else {
            $this->error('页面不存在');
        }
    }

    /**
     * 批量通过
     */
    public function pitongguo() {
        $array = I('post.checkbox');
        if(empty($array)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $dep = session('dep');
        //p(session());
        $i = 0;
        $str = '(';
        foreach ($array as $value) {
            if ($i !== 0) {
                $str .= ',';
            }
            $str .= $value;
            $i = 1;
        }
        $str = $str.')';
        M()->startTrans();
        if(!M('topic')->where('top_id in '.$str)->save(array('audit'=>1))){
            M()->rollback();
            $this->success('审核失败，系统繁忙请稍候！');
        }
        if(!M('topic_f')->where("top_id in {$str} and dep_id in ({$dep})")->save(array('audit'=>1))){
            M()->rollback();
            $this->success('审核失败，系统繁忙请稍候！');
        }
        M()->commit();
        $this->success('审核成功！');
    }

    //批量退回
    public function pishanchu() {
        $array = I('post.checkbox');
        if(empty($array)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $dep = session('dep');
        //p(session());
        $i = 0;
        $str = '(';
        foreach ($array as $value) {
            if ($i !== 0) {
                $str .= ',';
            }
            $str .= $value;
            $i = 1;
        }
        $str = $str.')';
        M()->startTrans();
        //第一步处理首次审核的课题 条件 audit=0
        //p(M('topic')->where('audit=0 and top_id in'.$str)->select());
        if(!M('topic')->where('audit=0 and top_id in'.$str)->save(array('audit'=>2))){
            M()->rollback();
            $this->success('审核失败，请逐一审核');
        }
        //第二步审核非首次审核的课题，第一审核已经通过
        $sql = M('topic')->field('top_id')->where('audit=1 and top_id in'.$str)->buildSql();
        M('topic_f')->where("top_id in {$sql} and dep_id in ({$dep})")->delete();
        M()->commit();
        $this->success('审核成功！');
    }
    
}
