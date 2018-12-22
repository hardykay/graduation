<?php
namespace Teacher\Controller;
use Think\Controller;

class AlterationController extends Controller {

    /**
     * 题目变更
     */
    public function Index(){
        $tea =   obtain();
        //取得指导老师的所有课题
        $sql = M('topic')->field('top_id')->where('tea_number=\'%s\'',$tea)->buildSql();
        $result = M('Alteration')->field('stu_number,name,college_name,major_name,adviser_audit,college_audit')
                ->where('adviser_audit=0 and top_id in'.$sql)->select();
        //p($result);
        $this->assign('list',$result);
        $this->display();
    }
    /**
     * 提交和修改
     */
    public function updata(){
        $stu = I('post.stu');
        $adviser_audit = I('post.adviser_audit');
        $adviser = htmlspecialchars($_POST['adviser']);
        //thinkphp对时间操作有bug
        if(empty($adviser_audit)){
            $this->error('审核结果必须');
        }
        if(empty($adviser)){
            $this->error('审核意见必须');
        }
        $Model = M();
        //$sql = 'UPDATE `tp_alteration` SET `adviser_audit`='.$adviser_audit.',`adviser`=\''.$adviser.'\',`tea_time`=now() WHERE ( stu_number=\''.$stu.'\' )';
        $sql = "UPDATE `tp_alteration` SET `adviser_audit`={$adviser_audit},`adviser`='{$adviser}',`tea_time`=now() WHERE ( stu_number='{$stu}' )";
        $re = $Model->execute($sql);
        if($re){
            $this->success('审核成功',__CONTROLLER__.'/Index');
        }else{
            $this->error('系统繁忙，请稍候！');
        }
    }
      public function check($stu){
            obtain();
            $Model = M('Alteration');
            $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,department,college')->where('stu_number=\'%s\'',$stu)->find();
            $this->assign('vo',$result);
            $this->display();  
    }
     public function lookList(){
        $tea =   obtain();
        //取得指导老师的所有课题
        $sql = M('topic')->field('top_id')->where('tea_number=\'%s\'',$tea)->buildSql();
        $result = M('Alteration')->field('stu_number,name,college_name,major_name,adviser_audit,college_audit')
                ->where('adviser_audit!=0 and top_id in'.$sql)->select();
        //p($result);
        $this->assign('list',$result);
        $this->display();
    }
    /**
     * 查看
     * @param type $stu
     */
    public function look($stu){
            obtain();
            $Model = M('Alteration');
            $result = $Model->field('stu_number,name,college_name,major_name,top_name,new_name,cause,plan,adviser,department,college,adviser_audit')->where('stu_number=\'%s\'',$stu)->find();
           // p($result);
            $this->assign('vo',$result);
            $this->display();  
    }
}