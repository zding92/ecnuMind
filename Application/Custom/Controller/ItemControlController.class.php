<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class ItemControlController extends CommonController {
	public function ItemControl(){
		//显示__app__/Custom/ItemControl/ItemControl页面
		$this->display();
	}
}