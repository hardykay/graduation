<?php

namespace Director\Controller;

use Think\Controller;

/**
 * 设置评阅小组，进行一键分配评阅学生
 */
class RandomAllotReviewController extends Controller {

    /**
     * 显示所有小组
     * Show all groups
     */
    public function index() {
        $data['tea_number'] = obtain();
        $result = M('Grade_group')->where($data)->select();
        $teacher = M('Grade_group_teacher');
        $specialty = M('specialty');
        foreach ($result as $key => $value) {
            $str = '';
            $result[$key]['number'] = $teacher->where('id = '.$value['id'])->count();
            //p($specialty->field('dep_name')->where("dep_id in ({$value['domain']})")->select());
            $spe = $specialty->field('dep_name')->where("dep_id in ({$value['domain']})")->select();
            foreach ($spe  as $val) {
                
                $str .= $val['dep_name'].'<br>';
                //echo $val['dep_name'];
            }
            $result[$key]['specialty'] = $str;
        }
        //p($result);
        $this->assign('list', $result);
        $this->display('Index');
    }

    /**
     * 创建评阅小组的视图
     * Create a view of the review group.
     */
    public function createGroupView() {
        obtain();
        //p(session());
        $dep = session('dep');
        $result = M('Specialty')->where("dep_id in ({$dep})")->select();
        //p($result);
        $this->assign('list', $result);
        $this->display('CreateGroupView');
    }

    public function del($id) {
        M('Grade_group_teacher')->where("id={$id}")->delete();
        M('Grade_group')->where("id={$id}")->delete();
        $this->success('成功删除！');
    }

    /**
     * 显示学院视图
     * Add a review teacher's view.
     */
    public function collegeView($id) {
        obtain();
        $Model = M();
        $Count = $Model->table('tp_teacher')->field('dep_id,count(*) as num')->group('dep_id')->buildSql();
        $result = $Model->table("tp_college c,($Count) p ")->field('c.dep_id,c.dep_name,p.num')->where('c.dep_id=p.dep_id')->select();
        $this->assign('list', $result);
        $this->assign('id', $id);
        $this->display('CollegeView');
    }

    /**
     * 添加评阅老师的视图
     * Add a review teacher's view.
     */
    public function addTeacherView($dep, $id, $page = 0) {
        obtain();
        $sql = M('Grade_group_teacher')->field('tea_number')->where("id={$id}")->buildSql();
        //p(M('Grade_group_teacher')->field('tea_number')->where("id={$id}")->select());
        $User = M('Teacher');
//        $data['dep_id'] = $dep;
//        $data['tea_number']=array('not in',$sql);
        $count = $User->where("dep_id={$dep} and tea_number not in {$sql}")->count(); // 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $this->assign('id', $id);
        //p($pagenum);
        $result = $User->field('tea_number,name')->where("dep_id={$dep} and tea_number not in {$sql}")->order('tea_number')
                        ->limit($pagenum, 10)->select(); // 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        $this->assign('list', $result);
        $pageView = getPageHtml($page, $count, __CONTROLLER__ . "/addTeacherView/dep/{$dep}/id/{$id}");
        $this->assign('page', $pageView);
        $this->display('AddTeacherView');
    }

    /**
     * 设置评阅老师所带人数的视图
     * Set the view of the number of teachers.
     */
    public function setTeacherNumberView($id, $page = 0) {
        obtain();

        //p(M('Grade_group_teacher')->field('tea_number')->where("id={$id}")->select());
        $User = M('Grade_group_teacher');

//        $data['dep_id'] = $dep;
//        $data['tea_number']=array('not in',$sql);
        $count = $User->where("id={$id}")->count(); // 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $sql = $User->field('id,tea_number,number_people')->where("id={$id}")->order('tea_number ASC')->limit($pagenum, 10)->buildSql();
        //p($pagenum);
        $result = $User->table("{$sql} g,tp_teacher t")->field('g.id,g.tea_number,g.number_people,t.name')->where("g.tea_number=t.tea_number")->order('g.tea_number ASC')
                ->select(); // 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        $this->assign('list', $result);
        $this->assign('id', $id);
        $pageView = getPageHtml($page, $count, __CONTROLLER__ . "/SetTeacherNumberView/id/{$id}");
        $this->assign('page', $pageView);
        $this->display('SetTeacherNumberView');
    }

    /**
     * 显示所有老师
     */
    public function teacherView($id, $page = 0) {
        $User = M('Grade_group_teacher');
        $count = $User->where("id={$id}")->count(); // 查询满足要求的总记录数
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $sql = $User->field('id,tea_number,number_people')->where("id={$id}")->order('tea_number ASC')->limit($pagenum, 10)->buildSql();
        //p($pagenum);
        $amount = M('Review')->field('tea_number,count(*) as amount')->group('tea_number')->buildSql();
        $sql = $User->table("{$sql} g,tp_teacher t")->field('g.id,g.tea_number,g.number_people,t.name')
                ->where("g.tea_number=t.tea_number")->order('tea_number')
                ->buildSql(); // 查询已发布，可以选择，并且通过审核的课题，其实已经发布就可以了
        $result = $User->table("{$sql} s")->join("Left join ($amount) am ON am.tea_number=s.tea_number")
                ->field('s.id,s.tea_number,s.number_people,s.name,case when am.amount is null then 0 else am.amount end as amount')->select();
        //p($result);
        $this->assign('list', $result);
        $this->assign('id', $id);
        $pageView = getPageHtml($page, $count, __CONTROLLER__ . "/TeacherView/id/{$id}");
        $this->assign('page', $pageView);
        $this->display('TeacherView');
    }

    public function deleteTeacher($id, $tea_number) {
        obtain();
        if (M('Grade_group_teacher')->where($_GET)->delete()) {
            $this->success('成功删除');
        } else {
            $this->success('删除失败！');
        }
    }

    /**
     * 创建评阅小组（处理）
     * Create a review group.
     */
    public function createGroup() {
        obtain();
        $_POST['tea_number'] = obtain();
        $specialty = I('post.hao');
        if(!$specialty){
            $this->error('错误，专业必须');
        }
        $_POST['domain'] = implode(",", $specialty);
        $User = D("Grade_group"); // 实例化User对象
        if (!$User->create()) {
            $this->error($User->getError());
        }
        if ($User->add()) {
            $this->success('创建成功！', U('RandomAllotReview/index'));
        } else {
            $this->error('创建失败，请联系开发者！');
        }
    }

    /**
     * 添加评阅老师
     * Add a review teacher.
     */
    public function addTeacher() {
        obtain();
        $array = I('post.checkbox');
        $id = I('post.id');
        foreach ($array as $key => $value) {
            $data[$key]['id'] = $id;
            $data[$key]['tea_number'] = $value;
        }
        $User = D('Grade_group_teacher');
        if ($User->addAll($data)) {
            $this->success('添加成功！');
        } else {
            $this->error('添加失败！');
        }
    }

    public function Onekey($id) {
        obtain();
        $domain = M('Grade_group')->where($_GET)->getField('domain');
        if (!$domain) {
            $this->error('出错');
        }
        //p($domain);
        $sql = M('Review')->field('tea_number,count(*) as amount')->group('tea_number')->buildSql();
        //获取所有老师
        $Molde = M('Grade_group_teacher t');
        $result = $Molde->join(" LEFT JOIN {$sql} r ON t.tea_number = r.tea_number")
                        ->field('t.tea_number,t.id,CASE WHEN r.amount is null THEN t.number_people WHEN (t.number_people-r.amount)<0 THEN 0 else (t.number_people-r.amount) END AS amount')->where('t.id=' . $_GET['id'])->select();
        $student = M('Student');
        $review = M('Review');
        $topic = M('Topic');
        $stu_topic = M('stu_topic');
        $sum = 0;
        foreach ($result as $value) {
            //p($value);
            if ($value['amount'] > 0) {
                //去取出教师所带的学生
                $sql = $topic->field('top_id')->where('tea_number=\'%s\'', $value['tea_number'])->buildSql();
                //p($sql);
                $sql = $stu_topic->field('stu_number')->where("top_id in {$sql}")->buildSql();
                $reviewStudent = $review->field('stu_number')->where(" dep_id in ({$domain}) ")->buildSql();
                //p($reviewStudent);
                //$sql = '(' . $sql . ' UNION  ' . $reviewStudent . ')';
                $list = $student->field("(select '{$value['tea_number']}') as tea_number,stu_number,dep_major as dep_id")->where(" dep_major in ({$domain}) and stu_number not in {$sql} and stu_number not in {$reviewStudent}")->limit($value['amount'])->select();
                //$sql = $student->field("(select '{$value['tea_number']}') as tea_number,stu_number,dep_major as dep_id")->where(" dep_major in ({$domain}) and stu_number not in {$sql} and stu_number not in {$reviewStudent}")->limit($value['amount'])->buildSql();
                
                //$$Molde->table("(select {$value['tea_number']})")
//                $SQL = "insert  into tp_review (tea_nmber,stu_number,dep_id) values {$sql}";
//                $result =$Molde->execute($SQL);
//                p($result);
                //p($list);
                $sum += $review->addAll($list);
            }
            
        }
        $this->success("成功分配{$sum}名学生！");
        //p($result);
    //
    }

    /**
     * 设置评阅老师所带人数
     * Set the number of teachers.
     */
    public function alterAjax() {
        $map['id'] = I('post.id');
        $map['tea_number'] = I('post.tea');
        $data['number_people'] = I('post.num');
//        $this->ajaxReturn($map['tea_number']);
        if (M('Grade_group_teacher')->where($map)->save($data)) {
            $this->ajaxReturn(1);
        } else {
            $this->ajaxReturn(0);
        }
    }

}
