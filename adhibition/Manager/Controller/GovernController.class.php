<?php
namespace Manager\Controller;
use Think\Controller;

class GovernController extends Controller {
    /**
     * 公告列表
     */
    public function index(){
        obtain();
        $re = M('School_govern')->field('id,title,publish')->select();
        $this->assign('list', $re);
        $this->display();
        //echo '管理员';
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
        $m = new \Manager\Model\School_governModel();
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
        if(M('school_govern')->where($_GET)->delete()){
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
