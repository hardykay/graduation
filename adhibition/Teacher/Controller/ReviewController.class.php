<?php

namespace Teacher\Controller;

use Think\Controller;

/**
 * 评分
 */
class ReviewController extends Controller {

    /**
     * 评分
     */
    public function index() {
        //$this->display();
        $tea = obtain();

        $Model = M('View_rssstt');
        $result = $Model->where(array('review1' => $tea))->select();
        if ($result) {
           // p($result);//exit;
            $this->assign('list', $result);
            $this->display();
        } else {
            echo '<div style="color:#eaeaea;font-size:60px;width:750px;margin:0 auto;height:200px;line-height:200px;">没有需要评阅的学生</div>';
        }
    }

    /**
     * 评阅老师评分
     * @param type $stu
     */
    public function thesisDetermine($stu) {
        $tea = obtain();
        $mod = M('view_stu_top');
        $re = $mod->where(array('stu_number' => $stu))->find();
        empty($re) ? $this->error('未找到该页面') : 0;
        $this->assign('li', $re);
        $this->display('Pingfen');
    }

    /**
     * 修改
     */
    public function check1($stu) {
        $tea = obtain();
        //拦截其他老师企图修改不是他负责的学生的成绩
        if(!M('Review')->where("stu_number='{$stu}' and tea_number='{$tea}'")->count()){
            $this->error('该页面不存在');
        }
        $map = array(
            'stu_number'=>$stu
        );
        $re = M('Overall')->field('top_name as name,stu_number,stu_name,z_name as specialty ,b_name as class,pingyuegrade,content2')->where($map)->find();
        if(!$re){
            $this->error('该页面不存在');
        }
        $this->assign('li', $re);
        $this->display('Pingfen');
    }

    /**
     * 添加评分
     */
    public function opinion() {
        obtain();
        empty($_POST) ? $this->error('未找到该页面!') : 0;
        $stu = filter_input(INPUT_POST, 'stu_number');
        empty($stu) ? $this->error('未找到该学生的相关信息!') : 0;
        $map = array('stu_number' => $stu);
        $_POST['pinyue'] = 1;
        //$this->score($stu);
        $Model = new \Teacher\Model\many\OverallModel();
        //开启事物
        $Model->startTrans();
        $result = $Model->create();
        if (!$result) {
            $this->error($Model->getError());
        }
        //事物指针,初始为真，假设都通过
        $flag = TRUE;
        if (M('Overall')->where($map)->count()) {
            if (!$Model->where($map)->save($result)) {//如果数据添加错误
                $flag = FALSE;
            }
           
        } else {
            if (!$Model->add($result)) {
                $flag = FALSE;
            }
            
        }
         $data = array('audit' => 1);
         if (!M('review')->where($map)->save($data)) {
             $flag = FALSE;
         }
        if (!$flag) {
            $Model->rollback();
            $this->error('评阅失败');
        } else {
            $Model->commit();
            $this->success('评分成功', U('Review/Index'));
        }
    }

    /**
     * 
     * @param type $stu计算总评成绩
     */
//    public function score($stu){
//        $t = M('Overall')->field('grage,zdgrade,pingyuegrade')->where(array('stu_number'=>$stu))->find();
//        $s = M('Scale')->where('id=1')->find();
//        $_POST['score'] = ceil(($t['grage']*$s['grage'] + $t['zdgrade']*$s['zdgrade'] + $t['pingyuegrade']*$s['pingyuegrade'] + $_POST['dabiangrade']*$s['dabiangrade'])/100.0);
//        switch ((int)($_POST['score']/10)) {
//            case 10: $_POST['genera'] = '优秀';
//                break;
//            case 9: $_POST['genera'] = '优秀';
//                break;
//            case 8: $_POST['genera'] = '良好';
//                break;
//            case 7: $_POST['genera'] = '中等';
//                break;
//            case 6: $_POST['genera'] = '及格';
//                break;
//
//            default: $_POST['genera'] = '不及格';
//                break;
//        }
//        
//    }
    public function downloadFile($stu) {
        obtain();
        $where = array('stu_number' => $stu);
        $dow = new \Tool\DownloadFile('finalize', 'paperpath', $where);
        if ($dow->check()) {
            $dow->downfile();
        }else{
            reminding('该学生的论文不存在，请等待上传，或联系该学生的指导老师! ',0,'#888');
        }
    }

}
