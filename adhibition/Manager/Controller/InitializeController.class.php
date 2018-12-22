<?php
namespace Manager\Controller;
use Think\Controller;

class InitializeController extends Controller {
    public function index(){
        echo '错误访问';
    }
    /**
     * 初始化教师密码
     * [teacher description]
     * @return [type] [description]
     */
    public function teacher($number){
    	obtain();
    	$t['pwd'] = encrypt($number);
       	M('teacher')->where ('tea_number=\'%s\'',$number)->save($t);
       	$this->success('成功重置该老师密码！');
    }
    /**
     * 初始化学生密码
     * [student description]
     * @return [type] [description]
     */
    public function student($number){
    	obtain();
        $t['pwd'] = encrypt($number);
       	M('Student')->where ('stu_number=\'%s\'',$number)->save($t);
		$this->success('成功重置该学生密码！');
    }
    public function delstudent($number){
    	obtain();
    	if (M('student')->where ('stu_number=\'%s\'',$number)->delete()){
       		$this->success('成功删除该学生！');
       	} else {
       		$this->error('未能删除，请检查原因，可能是该学生已经已经毕业设计！');
       	}
        
    }

    public function delteacher($number){
    	obtain();
       	if (M('teacher')->where ('tea_number=\'%s\'',$number)->delete()){
       		$this->success('成功删除该老师！');
       	} else {
       		$this->error('未能删除，请检查原因，可能是该老师已经已经毕业设计！');
       	}
    }
    
}