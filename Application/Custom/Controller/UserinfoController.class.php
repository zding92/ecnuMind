<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class UserinfoController extends CommonController {
		protected function getJson() {
		require_once DATA_PATH.'ComboxData.php';
		$json_obj = json_decode($json_string,TRUE);
		if(!is_array($json_obj)) return false;
		return $json_obj;
		}
}