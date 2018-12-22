<?php

function shangchuan($name) {
    $dir = session('tea_number');
    //p($dir);
    if (isset($_FILES[$name]) && $_FILES[$name]['error'] === 0) {
        $upload = new \Think\Upload(); // 实例化上传类    
        $upload->maxSize = C('MAX_P_FILE'); // 设置附件上传大小    
        $upload->exts = C('FILE_P_TYPE'); //文件类型// 设置附件上传类型  
        $rpath = $upload->rootPath = '/Public/Manager/';
        $spath = $upload->savePath = encryptFile($dir) . '/'; // 设置附件上传目录
        $str = __ROOT__ . $rpath . $spath;
        if (!file_exists($str)) {
            //p($str);
            mkdir('.' . $str);

            $file_path = $str . 'index.html';
            $fp = fopen($file_path, "w+");
            fwrite($fp, '<h1 style="text-align:center">哟！出错了！劝君莫要搞事情！</h1>');
            fclose($fp);
        }
        $url = substr($rpath, 1);
        // 上传单个文件     
        $info = $upload->uploadOne($_FILES[$name]);
        if (!$info) {// 上传错误提示错误信息 
            $u = $upload->getError();
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><h1>{$u}</h1><button onclick='history.go(-1)'>返回</button>";
            exit();
        } else {// 上传成功 获取上传文件信息         
            return $url . $info['savepath'] . $info['savename'];
        }
    } else {
        return FALSE;
    }
}

function pimg($name) {
    $dir = session('stu_number');
    if (isset($_FILES[$name]) && $_FILES[$name]['error'] === 0) {
        $upload = new \Think\Upload(); // 实例化上传类    
        $upload->maxSize = C('MAX_P_FILE'); // 设置附件上传大小    
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); //文件类型// 设置附件上传类型  
        $rpath = $upload->rootPath = './Public/setting/';
        $spath = $upload->savePath = encrypt($dir) . '/'; // 设置附件上传目录
        $str = __ROOT__ . $rpath . $spath;
        if (!file_exists($str)) {
            mkdir($str);
        }
        $url = substr($rpath, 1);
        // 上传单个文件     
        $info = $upload->uploadOne($_FILES[$name]);
        if (!$info) {// 上传错误提示错误信息        
            $u = $upload->getError();
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><h1>{$u}</h1><button onclick='history.go(-1)'>返回</button>";
            exit();
        } else {// 上传成功 获取上传文件信息         
            return $url . $info['savepath'] . $info['savename'];
        }
    } else {
        return FALSE;
    }
}

/**
 * 取得session stu_number 
 * @return type
 */

/**
 * 检测教师
 * @return type
 */
function obtain() {
    if (session('?tea_number') && session('?rank') && session('rank') == 1) {
        return session('tea_number');
    } else {
        session(null);
        echo '<script language="javascript"> alert("请您先登录！"); top.location=\'' . __ROOT__ . '/Home/Index/index\'; </script> ';
        exit;
    }
}

//处理方法
function rmdirr($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
}

//公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}
