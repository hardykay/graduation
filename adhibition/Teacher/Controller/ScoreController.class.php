<?php
namespace Teacher\Controller;
use Think\Controller;

class ScoreController extends Controller {
  
    
    /**
     * 查看所有答辩小组
     * @param type $dep 专业
     */
    public function index(){
        $tea = obtain();
        
        $result = M('Squad')->where('tea_number=\''.$tea.'\'')->select();
        if(!$result){
            reminding('答辩小组未建立'); 
        }
        $Model = M('Squad_stu');
        foreach ($result as $key => $value) {
           $result[$key]['coun'] = $Model->where('id='.$value['id'])->count();
           $result[$key]['wei'] = $Model->where('squad=0 and  id='.$value['id'])->count();
           $result[$key]['yi'] = $Model->where('squad!=0 and  id='.$value['id'])->count();
        }
         //p($result);
        $this->assign('list', $result);
        $this->display();
    }
    /**
     * 查看未答辩答辩
     * @param type $id
     * @param type $dep
     * @param type $page
     */
    public function Score($id,$page=0){
        obtain();
        is_numeric($id)?1:$this->error('访问页面不存在',C('error_go'));
        $sql = M('squad_stu')->field('stu_number')->where('squad=0 and id='.$id)->buildSql();
        $Model = M('overall');
        $count  = $Model->where('stu_number in'.$sql)->count();// 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;   
        $re = $Model->field('stu_number,stu_name,top_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera,dabian ,rele')
                ->where('stu_number in'.$sql)->limit($pagenum,10)->order('stu_number')->select();
        //p($re);
        $page = getPageHtml($page,$count,__ROOT__.'/Teacher/Score/Score/id/'.$id);
        $this->assign('list', $re); 
        $this->assign('page',$page);
        $this->assign('id',$id);
        $this->display();
    }
       /**
     * 查看未答辩答辩
     * @param type $id
     * @param type $dep
     * @param type $page
     */
    public function imScore($id,$page=0){
        $tea = obtain();
        is_numeric($id)?1:$this->error('访问页面不存在',C('error_go'));
        $sql = M('squad_stu')->field('stu_number')->where('squad<>0 and id='.$id)->buildSql();
        $Model = M('overall');
        $count  = $Model->where('stu_number in'.$sql)->count();// 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page-1)*10)>$count)?0:($page-1)*10;   
        $re = $Model->field('stu_number,stu_name,top_name,grade,zdgrade,pingyuegrade,dabiangrade,score,genera,dabian ,rele')
                ->where('stu_number in'.$sql)->limit($pagenum,10)->select();
        //p($re);
        $page = getPageHtml($page,$count,__ROOT__.'/Teacher/Score/ImScore/id/'.$id);
        $this->assign('list', $re); 
        $this->assign('page',$page);
        $this->assign('id',$id);
        $this->display();
    }
    /**
     * 
     * @param type $stu评分
     */
    public function pingfen($stu,$id){
        $tea = obtain();
        $sql = M('Squad_stu')->field('stu_number')->where("stu_number='{$stu}'")->buildSql();
        $re = M('Overall')->field('top_name,stu_number,stu_name,z_name,b_name,dabiangrade,content3')
                    ->where("stu_number='{$stu}'")->find();
       //p($re);
            $this->assign('li',$re);
            $this->assign('id',$id);
            $this->display();
    }
    public function alert($stu){
        $tea = obtain();
        //限制，只有答辩秘书才可以进入这个页面
        $map = array('stu_number'=>$stu);
        //首先取到学生所在的答辩组
        
        $sql = M('Squad_stu')->field('id')->where($map)->group('id')->buildSql();
        //第二，查询该组的答辩老师的答辩秘书是否为本人
        if(!M('Squad')->where("tea_number='{$tea}' and id in ".$sql)){
            $this->error(C('error_talk'),C('error_go'));
        }
        $re = M('Overall')->field('top_name,stu_number,stu_name,z_name,b_name,dabiangrade,content3,dabian')
                    ->where($map)->find();
//        p($re);
        $this->assign('li',$re);
        $this->display();
    }
    public function opinion(){
        $da = filter_input(INPUT_POST,'dabiangrade');
        $stu = filter_input(INPUT_POST,'stu_number');
        $id = I('post.id');
        //echo $stu;
        $map = array('stu_number'=>$stu);
       
        $M = M('Overall');
        $re = $M->field('grade,zdgrade,pingyuegrade')->where($map)->find();
        $co = $M->table('tp_scale')->where('id=1')->find();
        $val = $re['grade']*$co['grade'] + $re['zdgrade']*$co['zdgrade'] + $re['zdgrade']*$co['zdgrade'] + $da*$co['dabiangrade'];
        $_POST['score']  = $val = round($val/100.0);
        switch ((int)($val/10)) {
            case 10:
            case 9:$_POST['genera'] = '优秀';break;
            case 8:$_POST['genera'] = '良好';break;
            case 7:$_POST['genera'] = '中等';break;
            case 6:$_POST['genera'] = '及格';break;
            default:$_POST['genera'] = '不及格';break;
        }  
        M()->startTrans();
        $resul = $M->create();
        if(!$resul){
            $this->error('该页面不存！',__CONTROLLER__."/Score/id/".$id);
        }
        
        //事物指针，假设都成功
        $flag = TRUE;
        M('Overall')->where($map)->save($resul);
        $data = array('squad'=>1);
        if(!M('squad_stu')->where($map)->save($data)){
            $flag = FALSE;
        }
        if($flag){
            M()->commit();
            $this->success('评分成功',__CONTROLLER__."/Score/id/".$id);
        }else{
            M()->rollback();
            $this->error('评分失败');
        }
    }
    public function opinion2(){
        $da = filter_input(INPUT_POST,'dabiangrade');
        $stu = filter_input(INPUT_POST,'stu_number');
        $map = array('stu_number'=>$stu);
        $M = M('Overall');
        $re = $M->field('grade,zdgrade,pingyuegrade')->where($map)->find();
        $co = $M->table('tp_scale')->where('id=1')->find();
        $val = $re['grade']*$co['grade'] + $re['zdgrade']*$co['zdgrade'] + $re['zdgrade']*$co['zdgrade'] + $da*$co['dabiangrade'];
        $_POST['score']  = round($val/100.0);
        if($_POST['score']>=90){
            $_POST['genera'] = '优秀';
        }  elseif($_POST['score']>=80) {
            $_POST['genera'] = '良好';
        } elseif($_POST['score']>=60) {
            $_POST['genera'] = '及格';
        }  else {
            $_POST['genera'] = '不及格';
        }
        //p($_POST);
        $model = M('Overall');
        $resul = $model->create();
        if(!$resul){
            $this->error('该页面不存！');
        }
        if(!$model->where($map)->save($resul)){
            $this->error('未能修改！');
        }else{
            $this->success('修改成功',U('Score/Index'));
        }  
    }
    /**
     * 显示所有成绩
     */
    function scoreAllView(){
        $data['tea_number'] = obtain();
        $sql = M('topic')->field('top_id')->where($data)->buildSql();
        $sql = M('stu_topic')->field('stu_number')->where('top_id in '.$sql)->buildSql();
        $stu = M('overall')->where('stu_number in '.$sql)->buildSql();
        $student = M('Student s');
        $result = $student->join("LEFT JOIN  ({$stu}) t ON  s.stu_number=t.stu_number")->field('s.stu_number,s.name,t.grade,t.zdgrade,t.pingyuegrade,t.dabiangrade,t.score')->where('s.stu_number in '.$sql)->select();
        //p($result);
        $this->assign('list', $result);
        $this->display('ScoreAllView');
    }
}