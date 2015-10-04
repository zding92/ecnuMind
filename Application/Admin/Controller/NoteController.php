<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class NoteController extends CommonController{
	public function getNoteInfo($tittle,$detail){
		$Form = M('ecnu_mind.notification');
		$data['user_id'] = session('user_id');
		$data['note_time'] = date('Y-m-d', time());
		$data['note_tittle'] = $tittle;
		$data['note_detail'] = $detail;
		$Form->add($data);
	}
}
?>