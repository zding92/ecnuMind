<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//         $Data = M('信息');
//         $map['NAME'] = array('like','%于天%');
//         $result = $Data->where($map)->select();
//         $this->assign('result', $result);
        $this->display();
    }
}