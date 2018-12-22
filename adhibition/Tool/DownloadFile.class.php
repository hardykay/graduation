<?php
namespace Tool;
/**
 * 下载文件类
 */
class DownloadFile {
    private $where;
    private $field;
    private $table;
    private $url;
    private $file_dir;
    private $name;
    /**
     * 构造函数
     * @param type $table 表名
     * @param type $field 列名------保存文件路径列
     * @param type $where 条件，用数组表示
     * @param type $name 数据库中的字段，作为文件名使用
     * @param type $file_dir 根目录的路径
     */
    function __construct($table,$field,$where,$name='',$file_dir = './') {
       $this->field = $field;
       $this->where = $where;
       $this->table = $table;
       $this->file_dir = $file_dir;
       $this->name = $name;
    }
    /**
     * 去数据库中查询，并下载。
     */
    public function check(){
        /**
         * 有下载文件名，和没有下载文件名
         */
        if($this->name != ''){
            $data = M($this->table)->field($this->field.','.$this->name)->where($this->where)->find();
            if(empty($data)){
                return FALSE;
            }
            $this->url = $data[$this->field];
            $this->name = $data[$this->name];
        }else{
            $data = M($this->table)->field($this->field)->where($this->where)->find();
            if(empty($data)){
                return FALSE;  
            }
            $this->url = $data[$this->field];
        }
        return TRUE;
    } 
    
    public function downfile(){
         if(empty($this->name)){
            $this->name = end(explode('/', $this->url));
         }else{
            $this->name = $this->name.'.'.end(explode('.', $this->url));
         }
         import('ORG.Net.Http');
    $http = new \Org\Net\Http();
    $http->download($this->file_dir.$this->url,$this->name);
        //检查文件是否存在    
//        if (! file_exists ( $this->file_dir . $this->url )) {    
//            return FALSE;  
//        } else {      
//            $file = fopen ( $this->file_dir . $this->url, "r" );    
//            Header ( "Content-type: application/octet-stream" );    
//            Header ( "Accept-Ranges: bytes" );    
//            Header ( "Accept-Length: " . filesize ( $this->file_dir . $this->url ) );    
//            Header ( "Content-Disposition: attachment; filename=" . iconv("utf-8","gbk//IGNORE",$this->name) );    
//            echo fread ( $file, filesize ( $this->file_dir . $this->url ) );    
//            fclose ( $file );    
//        }  
    }
}
