<?php
namespace Director\Controller;
use Think\Controller;
/**
 * 审阅开题报告
 */
class WaichuController extends Controller {
    /**
     * 申请课题
     */
    public function index(){
        //echo date('Y/m/d H:i:s');
        obtain();
        $dep = session('dep_id');
        $m = M('outside')->field('id,stu_name,college,major,phone,shenhe3')->where(  'shenhe1=1 and dep_college='.$dep)->select();
        if($m){
            $this->assign('list', $m);
            $this->display();
        }  else {
            echo '没有';
        }
    }
    public function check(){
        empty($_POST)?$this->error('未找到该页面！',C('error_go')):1;
       obtain();
        $dep = session('dep_id');
        $res = new \Dean\Model\OutsideModel();
        $id = filter_input(INPUT_POST,'id');
        if($res->create()){
            if($res->where(  'shenhe1=1 and dep_college='.$dep.' and id='.$id)->save()){
                $this->success('审核成功',U('Waichu/Index'));
                exit;
            }
        }
        $this->error($res->getError());
    }
    /**
     * 
     * @param type $id查看
     */
    public function look($id){
        obtain();
        $dep = session('dep_id');
        $res = M('Outside')->where('id='.$id.' and shenhe1=1 and dep_college='.$dep)->find();
        $this->assign('s', $res);
        $this->display();
    }
     /**
     * 
     * @param type $id审核或修改
     */
    public function alter($id){
        obtain();
        $dep = session('dep_id');
        $res = M('Outside')->where('id='.$id.' and shenhe1=1 and dep_college='.$dep)->find();
        $this->assign('s', $res);
        $this->display();
    }
}