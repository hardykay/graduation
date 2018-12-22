<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
        $Model = M();
        //表格模板 
        $word = $Model->table('tp_excel_word')->field('id,title,publish,url')->order('id desc')->limit(8)->select();
        $this->assign('word', $word);
        //p($word);
        //管理规定
        $gui = $Model->table('tp_school_govern')->field('id,title,publish')->order('id desc')->limit(8)->select();
        $this->assign('gui', $gui);
        //轮播
        $lun = $Model->table('tp_school_carrousel')->select();
        $this->assign('lun', $lun);
        //管理规定
        $gonggao = $Model->table('tp_school_notice')->field('id,title,publish')->order('id desc')->limit(12)->select();
        //p($gonggao);
        $coun = count($gonggao);
        //公告
        $list1 = array();
        $list2 = array();
        $list3 = array();
        for ($i = 0; $i < $coun; $i += 3) {
            $list1[] = $gonggao[$i];
            if (!empty($gonggao[$i + 1]))
                $list2[] = $gonggao[$i + 1];
            if (!empty($gonggao[$i + 2]))
                $list3[] = $gonggao[$i + 2];
        }
        ///公告
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $this->assign('list3', $list3);
        $this->display('index');
    }

    public function login() {
        $this->display();
    }

    public function login2() {
        $this->display();
    }

    /**
     * 进入系统
     */
    public function jinru() {
        if (session('?stu_number')) {
            $this->redirect('Student/Index/Index');
        } elseif (session('?tea_number')) {
            switch (session('rank')) {
                case 1:$this->redirect('Manager/Index/Index');
                    break; //管理员
                case 2:$this->redirect('Dean/Index/Index');
                    break; //教学院长
                case 3:$this->redirect('Director/Index/Index');
                    break; //系主任
                case 4:$this->redirect('Teacher/Index/Index');
                    break; //指导老师
                default :$this->error('您的身份未明，请联系教务处或教学院长', C('error_go'));
            }
        }
    }

    //显示公告
    public function info() {
        obtain();
        $dep = session('dep_id');
        empty($dep) ? exit : 1;
        $xiao = M('School_notice')->field('id,publish,title')->order('id desc')->limit(5)->select();
        $this->assign('list', $xiao);
        $xiao = M('School_college')->field('id,publish,title')->order('id desc')->select();
        $this->assign('yuan', $xiao);
        $this->display();
    }

    /**
     * 更多模版/表格下载
     */
    public function excelWord($id) {
        $url = M('excel_word')->field('url')->where(array('id' => $id))->find();
        downfile($url['url']);
    }

    /**
     * 更多管理规定
     */
    public function dowGovern($id) {
        $url = M('School_govern')->field('url')->where(array('id' => $id))->find();
        empty($url['url']) ? $this->error(C('error_talk'), C('error_go'),1) : downfile($url['url']);
        //p($url);
        
    }

    public function student() {
        $this->display();
    }

    /**
     * 公告
     */
    public function dowNotice($id) {
        $url = M('School_notice')->field('url')->where(array('id' => $id))->find();
        empty($url['url']) ? $this->error(C('error_talk'), C('error_go'),1) : downfile($url['url']);
        //p($url);
        
    }

    /**
     * 下载
     * @param type $url
     * @param type $name
     */
    public function download($url, $name = '', $tea = '') {
        $path = base64_decode($url);
        if (!empty($name)) {
            if (empty($tea)) {
                $name = base64_decode($name);
            } else {
                $name = base64_decode($tea) . ' ' . base64_decode($name);
            }
        }
        downfile($path, '.', $name);
    }
    /**
     * 下载
     * @param type $url
     * @param type $name
     */
    public function dow($file) {
        $path = base64_decode($file);
        downfile($path);
    }
}
