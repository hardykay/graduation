<?php
namespace Manager\Model;
use Think\Model;

class School_carrouselModel extends Model {
    //    protected $patchValidate = true;
    protected $_validate = array(
        array('img','require','图片必须',1), 
    );
}