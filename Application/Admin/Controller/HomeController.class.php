<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class HomeController extends CommonController {
    public function home(){
    	$this->display();
  }
}