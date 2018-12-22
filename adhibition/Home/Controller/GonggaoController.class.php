<?php
namespace Home\Controller;
use Think\Controller;

class GonggaoController extends Controller {
  /**
   * 校内公告
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
    public function index($id){
       $re = M('school_notice')->where(array('id'=>$id))->find();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('gao',$re);
       $this->display();
    }
    /**
     * 院内公告
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function college($id){
       $re = M('School_college')->where(array('id'=>$id))->find();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('gao',$re);
       $this->display('Index');
    }
    /**
     * 更多公告
     */
    public function gong(){
       $re = M('school_notice')->field('id,title,url,publish')->select();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('list',$re);
       $this->assign('geng','更多公告');
       $this->display();
    }
    /**govern
     * 管理规定
     */
    public function govern($id){
       $re = M('school_govern')->where(array('id'=>$id))->find();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('gao',$re);
       
       $this->display('Index_1');
    }
    /**
     * 更多管理规定
     */
    public function duogo(){
       $re = M('school_govern')->field('id,title,url,publish')->select();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('list',$re);
       $this->assign('geng','更多管理规定');
       $this->display('Duogo');
    }
    /**
     * 更多表格模板
     */
    public function word(){
       $re = M('excel_word')->select();
       empty($re)?$this->error(C('error_talk'),C('error_go')):1;
       $this->assign('word',$re);
       $this->display();
    }
}
