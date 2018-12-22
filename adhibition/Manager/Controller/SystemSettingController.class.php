<?php

namespace Manager\Controller;

use Think\Controller;

class SystemSettingController extends Controller {

    public function index() {
        obtain();
        $data = readJson();
        //p($data);
        $this->assign('list', $data);
        $this->display();
        //
    }

    /**
     * 修改InstructorTheTeacherLookGrade的值
     */
    function alerSetting() {
        obtain();
        $data = readJson();
        if ($data['InstructorTheTeacherLookGrade'] == 'ON') {
            $data['InstructorTheTeacherLookGrade'] = 'OFF';
        } else {
            $data['InstructorTheTeacherLookGrade'] = 'ON';
        }
        writeJson($data);
    }

}
