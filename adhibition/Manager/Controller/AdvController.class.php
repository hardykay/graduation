<?php
namespace Manager\Controller;
use Think\Controller;

class AdvController extends Controller {
    public function index(){
        $lun = M('School_carrousel')->select();
        $this->assign('lun', $lun);
        $this->display();
    }
    /**
     * 添加、修改
     */
    public function add(){
        obtain();
        empty($_POST)?$this->error():1;
        $id = filter_input(INPUT_POST,'id');
        if(empty($id)){
            $m = new \Manager\Model\School_carrouselModel();
            $_POST['img']=  pimg('file');
            if(!$m->create()){
                $this->error($m->getError());
            }
            if($m->add()){
                $this->success('发布成功');
            }  else {
                $this->error('失败');
            }
            
        }  else {
            if($file=pimg('file')){
                $_POST['img'] = $file;
            }
            $m = M('School_carrousel');
            $m->create();
            if(!$m->save()){
                $this->error('修改失败');
            }
            $this->success('修改成功');
        }
        
    }
    /**
     * 删除
     */
    public function del($id){
        obtain();
        if(M('School_carrousel')->where('id='.$id)->delete()){
            $this->success('删除成功');
        }  else {
            $this->error('删除失败');
        }
    }
}
