<?php

namespace Manager\Controller;

use Think\Controller;
use Think\Model;

class SquadController extends Controller {

    public function lookCollege(){
        $Model = M();
        $Count      = $Model->table('tp_teacher')->field('dep_id,count(*) as xs')->group('dep_id')->buildSql();
        $result     = $Model->table("tp_college c,($Count) p ")->field('c.dep_id,c.dep_name,p.xs')->where('c.dep_id=p.dep_id')->select();
        $this->assign('list', $result);
        $this->display('College');
    }
    public function index($dep) {
        obtain();
        //$Model = M('college');
        //tp_overall
        //select z_id,sum(case when dabian=0 then 1 else 0 end) as d0,sum(case when dabian=1 then 1 else 0 end) as d1,sum(case when dabian=2 then 1 else 0 end) as d2,sum(case when dabian=3 then 1 else 0 end) as d3 from tp_overall group by z_id,z_name;
        $over = 'select z_id,sum(case when dabian=0 then 1 else 0 end) as d0,sum(case when dabian=1 then 1 else 0 end) as d1,sum(case when dabian=2 then 1 else 0 end) as d2,sum(case when dabian=3 then 1 else 0 end) as d3 from tp_overall group by z_id';
        //tp_squad_stu
        $squ = 'select dep_id as id,count(*) as zu from tp_squad_stu group by dep_id';
        //select dep_id,count(*) as zu from tp_squad_stu group by dep_id;
        //tp_student
        $stu = 'select dep_major,count(*) as stu from tp_student group by dep_major';
        //tp_specialty
        $spe = "select dep_id,dep_name from tp_specialty where dep_father={$dep}";

        $Model = M();
        // $result = $Model->field('')->table("{$spe} sp,{$stu} st,{$squ} sq,{$over} ov")->_sql();
        $result = $Model->field('ov.d0,ov.d1,ov.d2,ov.d3,sp.dep_id,sp.dep_name,st.stu,sq.zu')
                        ->table("({$spe}) sp LEFT JOIN ({$stu}) st ON sp.dep_id=st.dep_major LEFT JOIN ({$squ}) sq ON sp.dep_id=sq.id LEFT JOIN ({$over}) ov ON ov.z_id=sp.dep_id")->select();
        //p($result);
        $this->assign('list', $result);
        $this->display();
    }

    /**
     * 修改答辩小组
     * @param type $dep
     */
    public function alert($id = 0, $dep = 0) {
        if (empty($_POST)) {
//            $d = explode(',', session('dep'));
//            in_array($dep, $d) ? 1 : $this->error('访问页面不存在', C('error_go'));
            $result = M('College')->select();
            $data = M('Squad')->where('id=' . $id . ' and dep_id=' . $dep)->find();
//            //p($data);
            empty($data) ? $this->error('访问页面不存在', C('error_go')) : 1;
            $sql = M('member')->field('tea_number')->where('id=' . $id)->buildSql();
            $tea = M('Teacher')->field('tea_number,name')->where('tea_number in' . $sql)->select();
            // p($tea);
            $this->assign('tea', $tea);
            $this->assign('data', $data);
            $this->assign('list', $result);
            //$this->assign('dep', $dep);
            $this->display();
            exit;
        }
        $Model = new \Director\Model\SquadModel();
        $res = $Model->create();

        $arr = filter_input_array(INPUT_POST);
        if ($res) {
            $Model->save($res);
            foreach ($arr['hao'] as $value) {
                $data[] = array('id' => $arr['id'], 'tea_number' => $value);
            }
            $Me = M('Member');
            $Me->where('id=' . $arr['id'])->delete();
            M('Member')->addAll($data) ? $this->success('修改成功', U('Squad/Index')) : $this->error('修改失败,请联系管理员');
            exit;
        } else {
            $this->error($Model->getError());
        }
    }

    /**
     * 查看所有答辩小组
     * @param type $dep 专业
     */
    public function squad($dep) {
        obtain();
        is_numeric($dep) ? 1 : $this->error('未找到该专业的信息');
        $SQ = M('Squad');
        $result = $SQ->where('dep_id=' . $dep)->select();
        $stu = M('squad_stu');
        //p($result);
        foreach ($result as $key => $value) {
            $result[$key]['coun'] = $stu->where('id=' . $value['id'])->count();
        }
        $this->assign('dep', $dep);
        $this->assign('list', $result);
        $this->display();
    }

    /**
     * 添加答辩小组
     */
    public function add($dep = 0) {
        if (empty($_POST)) {
            $result = M('College')->select();
            $this->assign('list', $result);
            $this->assign('dep', $dep);
            $this->display();
            exit;
        }
        $Model = new \Director\Model\SquadModel();
        $res = $Model->create();
        //创建事物
        $Model->startTrans();
        //事物指针
        $flag = TRUE;
        $arr = filter_input_array(INPUT_POST);
        $dep = $arr['dep_id'];
        if (!$res) {
            $this->error($Model->getError());
        }
        $id = $Model->add();
        if (!$id) {
            $this->error('添加失败,请联系管理员');
        }
        foreach ($arr['hao'] as $value) {
            $data[] = array('id' => $id, 'tea_number' => $value);
        }
        if (!$Model->table('tp_member')->addAll($data)) {
            $flag = FALSE;
        }
        if ($flag) {
            $Model->commit();
            $this->success('成功添加', U('/Manager/Squad/Squad/dep/' . $dep));
        } else {
            $Model->rollback();
            $this->error('添加失败,请联系管理员');
        }
    }

    /**
     * 列出所有教师
     * @param type $dep
     * @param type $page
     */
    public function teacher($id, $dep = 0, $page = 0) {//$dep专业
        obtain();
//        $dep_id = session('?dep_id')? : $this->error('请求超时.');
        $dep_id = $dep == 0 ? session('dep_id') : (is_numeric($dep) ? $dep : 0);
//        is_numeric($id) ? 0 : $this->error('请求超时.');
        $data['id'] = $id;
        //$data['name'] = $name;
        $T = M('View_teacher');
        $count = $T->where('dep_id=' . $dep_id)->count();
        //分页
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $result = $T->where('dep_id=' . $dep_id)->order('tea_number asc')->limit($pagenum, 10)->select();
        if (!$result) {
            $this->error('不好意思，没查到相关教师信息');
        }
        $this->assign('data', $data);
        $this->assign('list', $result);
        $page = getPageHtml($page, $count, __ROOT__ . '/Manager/Squad/Teacher/id/' . $id . '/dep/' . $dep_id);
        $this->assign('page', $page);
        $this->display();
    }

    public function addtea($id, $tea, $tname, $email) {
        obtain();
        $data['tea_number'] = $tea;
        $data['id'] = $id;
        $data['tea_name'] = base64_decode($tname);
        $i = M('Squad')->where('id=' . $id)->save($data);
        if ($i == 0) {
            $this->error('设置失败');
        }
        $head = '中国石油大学胜利学院-毕业设计管理系统';
        $body = '系主任已经你设置为答辩秘书，赶紧上官网来查看吧!';
        @sendMail($email, $head, $body);
        $this->success('设置成功', U('Squad/Index'));
    }

    public function student($id, $dep, $page = 0) {
        obtain();

        //防止其他人进入这个页面，符合这个条件的只有系主任
//        $d = explode(',', session('dep'));
//        in_array($dep, $d) ? 1 : $this->error('访问页面不存在', C('error_go'));
        //tp_overall
        $sql = 'select stu_number from tp_squad_stu where id=' . $id;
        $count = M('Overall')->where("z_id={$dep} and dabian<>1 and stu_number not in  ({$sql})")->count();
        if ($count == 0) {
            $this->error('没找到符合条件的学生', U('Squad/Index'));
        }
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $result = M('Overall')->where("z_id={$dep} and dabian<>1 and  stu_number not in  ({$sql})")->order('stu_number asc')->limit($pagenum, 10)->select();
        $this->assign('list', $result);
        $data['id'] = $id;
        $data['dep'] = $dep;
        $this->assign('data', $data);
        $page = getPageHtml($page, $count, __ROOT__ . "/Manager/Squad/Student/id/{$id}/dep/{$dep}");
        $this->assign('page', $page);
        $this->display();
    }

    public function addstu() {
        obtain();
        //过滤
        $arr = filter_input_array(INPUT_POST);
        empty($arr) ? $this->error(C('error_talk'), C('error_go')) : 0;
        //p($arr);
        //排除
        is_numeric($arr['id']) ? 1 : $this->error(C('error_talk'), C('error_go'));
        is_numeric($arr['dep']) ? 1 : $this->error(C('error_talk'), C('error_go'));
        $str = '';

        foreach ($arr['checkbox'] as $val) {
            $data[] = array('id' => $arr['id'], 'dep_id' => $arr['dep'], 'stu_number' => $val);
            $str .= "'$val',";
        }
        //echo $str;
        $str = substr($str, 0, -1);
        //先删除再添加，这样比较快，因为stu_number不允许重复值
        M('Squad_stu')->where('stu_number in(' . $str . ')')->delete();
        if (M('Squad_stu')->addAll($data)) {
            $this->success('分配学生成功');
        } else {
            $this->error('分配失败，请联系管理员');
        }
    }

    public function look($id, $dep, $page = 0) {
        obtain();
//        $d = explode(',', session('dep'));
//        //防止其他人进入这个页面，符合这个条件的只有系主任
//        in_array($dep, $d) ? 1 : $this->error('访问页面不存在', C('error_go'));
        M('Squad')->where('id=' . $id . ' and dep_id=' . $dep)->count() ? 1 : $this->error('访问页面不存在', C('error_go'));

        $data['id'] = $id;
        $data['dep'] = $dep;
        $sql = M('squad_stu')->field('stu_number')->where('id=' . $id . ' and dep_id=' . $dep)->buildSql();

        $count = M('view_std')->where('stu_number  in ' . $sql)
                ->count();
        $pagenum = ($page < 2 || (($page - 1) * 10) > $count) ? 0 : ($page - 1) * 10;
        $result = M('view_std')->where('stu_number  in ' . $sql)
                        ->order('stu_number asc')->limit($pagenum, 10)->select();
        if ($result) {
            $this->assign('list', $result);
            $this->assign('data', $data);
            $page = getPageHtml($page, $count, __ROOT__ . "/Manager/Squad/Student/id/{$id}/dep/{$dep}");
            $this->assign('page', $page);
            $this->display();
        } else {
            $this->error('没有学生', U('Squad/Index'));
        }
    }

    function deletestu() {
        obtain();
        //过滤
        $arr = filter_input_array(INPUT_POST);
        empty($arr) ? $this->error(C('error_talk'), C('error_go')) : 0;
        //防止其他人进入这个页面，符合这个条件的只有系主任
//        $d = explode(',', session('dep'));
//        //p($arr);
//
//        in_array($arr['dep'], $d) ? 1 : $this->error('访问页面不存在', C('error_go'));
        M('Squad')->where('id=' . $arr['id'] . ' and dep_id=' . $arr['dep'])->count() ? 1 : $this->error('访问页面不存在', C('error_go'));
        $str = '';
        foreach ($arr['checkbox'] as $val) {
            $str .= "'$val',";
        }
        $str = substr($str, 0, -1);
        //先删除再添加，这样比较快，因为stu_number不允许重复值
        if (M('Squad_stu')->where('stu_number in(' . $str . ')')->delete()) {
            $this->success('删除成功');
            exit();
        } else {
            $this->error('删除失败');
        }
    }

    public function del($id, $dep) {
        obtain();
//        $d = explode(',', session('dep'));
//        //防止其他人进入这个页面，符合这个条件的只有系主任
//        in_array($dep, $d) ? 1 : $this->error('访问页面不存在', C('error_go'));
        if (M('Squad')->where('id=' . $id . ' and dep_id=' . $dep)->delete()) {
            M('Squad_stu')->where('id=' . $id)->delete();
            M('Member')->where('id=' . $id)->delete();
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

}
