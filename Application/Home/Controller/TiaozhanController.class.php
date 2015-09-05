<?php
namespace Home\Controller;
use Think\Controller;
class TiaozhanController extends Controller {
    public function Tiaozhan() {
		//显示__app__/home/Tiaozhan/Tiaozhan页面
		$this->display();
	}
	
	/**
	 * 将挑战杯的数据录入数据库
	 */
public function TiaozhanAddData(){
		// 将comp_Tiaozhan数据表实例化
		$Data = M('ecnu_mind.tiaozhan_basic_info',null);		
		// 根据表单提交的POST数据创建数据对象
		$Data->create();
		// 获取具体表格b1,b2 or b3
		$bn = $Data->data()->type_selector;
		$Data->add();
		
		$BnTable = M('ecnu_mind.tiaozhan_'.$bn,null);
		$BnTable->create();
		$BnTable->add();

		// 根据条件保存修改的数据
		if ($Data->save()) $this->ajaxReturn("var tiaozhanDataWri=true;","EVAL"); 	
}