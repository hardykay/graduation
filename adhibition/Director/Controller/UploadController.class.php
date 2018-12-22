<?php
namespace Student\Controller;
use Think\Controller;

/**
 * 在线编辑器专用文件上传
 */
class UploadController extends Controller {
	public function index(){
		obtain();
        $file = shangchuan('file');
        $this->ajaxReturn(__ROOT__.$file);
	}
}