<?php
namespace Manager\Controller;
use Think\Controller;

class WordController extends Controller {
    /**
     * 公告列表tp_excel_word
     */
    public function index(){
        obtain();
        $re = M('Excel_word')->select();
        $this->assign('list', $re);
        $this->display();
    }
    /**
     * 添加公告
     */
    public function add(){
        obtain();
        if(empty($_POST)){
            $this->display();
            exit;
        }
        $m = new \Manager\Model\Excel_wordModel();
        $_POST['url'] = shangchuan('file');
        $_POST['publish'] = date('Y/m/d H:i:s');
        if($m->create()){
            if($m->add()){
                $this->success('发布成功');
            }else{
                $this->error('失败');
            }
        }else{
            $this->error($m->getError());
        }
    }
    /**
     * del删除公告
     */
    public function del($id){
        obtain();
        if(M('Excel_word')->where(array('id'=>$id))->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    /**
     * 修改公告
     */
    public function alter(){
        
    }
    public function uplo(){
        obtain();
        $file = shangchuan('file');
        $this->ajaxReturn(__ROOT__.$file);
    }
}
