<?php
namespace Admin\Controller;
use Think\Controller;
import('ORG.Util.FileToZip');//引入zip下载类文件FileToZip

class CurrentCompController extends CompsinfoController {
    public function CurrentComp($showState=null) {
    	$this->returnAdminAccess();
    	if ($showState != null)
    		$this->assign('state', $showState);
    	$this->display();
    }
    
	public function showAllCurrentItem(){
		// 如果不存在（或超时--10分钟）该管理员权限能查看范围内的、且已结束竞赛的信息缓存，则重新从数据库载入。
	  		$condition['comp_state'] = array('in','待审批,审批通过,审批未通过,正在进行');
	  		
	  		$condition['comp_owner'] = session('access_id');
	  		
	  		// 根据条件获取返回前台的信息。
	  		$returnToFront = $this->getCompsByCondition($condition);
	  		
	  		// 2分钟更新一次缓存  		
  		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
	}
	
	
	//前台返回，checkedItemID（勾选中的行的comp_item_id的数组），judgeAction审批或获奖动作，judgeActionVal审批或获奖动作的值
	public function judgeItem() {
		//$checkedItemID为前台返回的checked的行的comp_item_id
		$checkedItemID = I('post.checkedItemID');
		//将$checkedItemID字符串（以逗号分隔）变为$checkedItemIDArray数组
		if(null == $checkedItemID) $this->ajaxReturn('unseleceted');
		$checkedItemIDArray = explode(',', $checkedItemID);
		
		//$judgeAction为前台进行的审批动作
		$judgeAction = I('post.judgeAction');
		//$judgeAction为前台进行的审批动作
		$judgeActionVal = I('post.judgeActionVal');
		//根据不同的前台操作给予后台不同的数据库赋值
 		switch ($judgeActionVal){
			case 'approved': 
				$dataToSql[$judgeAction] ='审批通过';
				break;
			case 'disapproved': 
				$dataToSql[$judgeAction] ='审批未通过';
				break;
			case 'country1':
				$dataToSql[$judgeAction] ='全国一等奖';
				break;
			case 'country2':
				$dataToSql[$judgeAction] ='全国二等奖';
				break;
			case 'country3':
				$dataToSql[$judgeAction] ='全国三等奖';
				break;
			case 'city1':
				$dataToSql[$judgeAction] ='省市一等奖';
				break;
			case 'city2':
				$dataToSql[$judgeAction] ='省市二等奖';
				break;				
			case 'city3':
				$dataToSql[$judgeAction] ='省市三等奖';
				break;
			case 'school1':
				$dataToSql[$judgeAction] ='校级一等奖';
				break;
			case 'school2':
				$dataToSql[$judgeAction] ='校级二等奖';
				break;
			case 'school3':
				$dataToSql[$judgeAction] ='校级三等奖';
				break;
			default:
				break;
		}
		
		$compItemModel = M('ecnu_mind.competition_main');
		
		//取出所有选中的compItemID,每一行进行写入数据库操作
		foreach ($checkedItemIDArray as $key=>$val){
			$compItemModel->where("comp_item_id=$val")->save($dataToSql);
		}
		$this->ajaxReturn('success','EVAL');
	}
	
	
	public function groupDownload(){
		$fileCount = 0;
		//从前台获取那些comp_item_id的文件需要下载
		$downloadItemIdArr = explode(',',I('get.checkedItemID'));
		if (count($downloadItemIdArr) == 0 || $downloadItemIdArr[0] == '') exit();
		//从前台获取是下载报名表还是下载作品
		$downloadDir = I('get.action');
		
		if ($downloadDir == 'CompItemApply') {
			$name = '报名表';
		} else {
			$name = '竞赛作品';
		}
		
		//申明zip文件地址
 		$save_path = "./Public/Temp/downLoad.zip";
 		$save_path = iconv("UTF-8","gb2312",$save_path);
 		
 		//新建一个ZipArchive的对象
 		$zip = new \ZipArchive;
 		//新建一个Zip的文件
 		$zip->open($save_path, \ZipArchive::CREATE);
 		
 		// 产生的所有临时文件都将由windows定时任务清除。
 		foreach ($downloadItemIdArr as $downloadItemId){
 			$fileName = $this->getFileNameFromDir("./Public/".$downloadDir."/".$downloadItemId);	
 			if ($fileName == '') continue;
 			mkdir("./DownLoadFiles/$downloadItemId");
 			$fileName=iconv("UTF-8","gb2312",$fileName);
 			copy("./Public/".$downloadDir."/".$downloadItemId."/".$fileName, "./DownLoadFiles/".$downloadItemId."/".$fileName);
 			$zip->addFile("DownLoadFiles/".$downloadItemId."/".$fileName);
 			$fileCount ++;
//  			$fullFileName = "./public/".$downloadDir."/".$downloadItemId."/".$fileName;
//  			$fullFileName=iconv("UTF-8","gb2312",$fullFileName);
  			//在zip文件中添加待压缩文件
 		}
	
 		if ($fileCount == 0) {
 			$this->redirect('CurrentComp/CurrentComp', array('showState'=>'not_exist'));
 		}
 		
//  		$cur_file1 = './public/CompForm/1/您好.zip';
//  		$cur_file2 = './public/CompForm/2/大夏杯.zip';
//  		$cur_file1=iconv("UTF-8","gb2312",$cur_file1);
//  		$cur_file2=iconv("UTF-8","gb2312",$cur_file2);
//  		$zip->addFile($cur_file1);//假设加入的文件名是image.txt，在当前路径下
//  		$zip->addFile($cur_file2);//假设加入的文件名是image.txt，在当前路径下
 		$zip->close();
 
 		$this->delFile("./DownLoadFiles", true);
 		
 		$this->download($save_path, $name);
 			
	}
	
	
	public function getFileNameFromDir($dir){
		$fileNames = "";
		$fileNamesCnt = 0;
		$dir = iconv("UTF-8","gb2312",$dir);
		//如果dir是文件夹
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					//echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
					$fileNames = $file;
					$fileNames=iconv("gb2312","UTF-8",$fileNames);
				}
				closedir($dh);
			}
		}
		return $fileNames;
	}
	
	private function download($file,$name=''){
		$fileName = $name ? $name : pathinfo($file,PATHINFO_FILENAME);
		$filePath = realpath($file);
	
		$fp = fopen($filePath,'rb');
	
		if(!$filePath || !$fp){
			header('HTTP/1.1 404 Not Found');
			echo "Error: 404 Not Found.(server file path error)<!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding -->";
			exit;
		}
	
		$fileName = $fileName .'.'. pathinfo($filePath,PATHINFO_EXTENSION);
		$encoded_filename = urlencode($fileName);
		$encoded_filename = str_replace("+", "%20", $encoded_filename);
	
		header('HTTP/1.1 200 OK');
		header( "Pragma: public" );
		header( "Expires: 0" );
		header("Content-type: application/octet-stream;charset=gbk");
		header("Content-Length: ".filesize($filePath));
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".filesize($filePath));
	
		$ua = $_SERVER["HTTP_USER_AGENT"];
		if (preg_match("/MSIE/", $ua)) {
			header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {
			header('Content-Disposition: attachment; filename*="utf8\'\'' . $fileName . '"');
		} else {
			header('Content-Disposition: attachment; filename="' . $fileName . '"');
		}
	
		ob_end_clean(); 
		// 输出文件内容
		fpassthru($fp);
		fclose($fp);
		
		unlink($filePath);
		exit;	
	}
	
	private function delFile($dirName) {
	    if(file_exists($dirName) && $handle=opendir($dirName)){
	        while(false!==($item = readdir($handle))){
	            if($item!= "." && $item != ".."){
	                if(is_dir($dirName.'/'.$item)){
	                    $this->delFile($dirName.'/'.$item);
	                } else {
	                    unlink($dirName.'/'.$item);
	                    rmdir($dirName);
	                }
	            }
	        }
	    }
	    closedir( $handle);
    }
}