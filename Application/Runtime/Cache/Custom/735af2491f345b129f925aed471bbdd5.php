<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>查看我的比赛</title>
   <meta charset="utf-8" />
  <link rel="Stylesheet" type="text/css" href="/Eclipse_For_PHP/ecnu_mind/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/Eclipse_For_PHP/ecnu_mind/Public/css/tiaozhanView.css" />

  
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/bootstrap.min.js"></script>

</head>
<body style="padding-bottom:20px">
<div class='tiaozhanViewContainer'>
	<ul id="myTab" class="nav nav-tabs">
	   <li class="active"><a href="#Page1" data-toggle="tab">作品申报书封面</a></li>
	   <li><a href="#Page2" data-toggle="tab">项目授权书</a></li>
	   <li><a href="#Page3" data-toggle="tab">项目基本信息</a></li>
	   <li><a href="#Page4" data-toggle="tab" style = "<?php echo ($type_selector=='B1' ? 'display: block' : 'display: none'); ?>">
	   		申报作品情况B1</a></li>
	   <li><a href="#Page5" data-toggle="tab" style = "<?php echo ($type_selector=='B2' ? 'display: block' : 'display: none'); ?>">
	   		申报作品情况B2</a></li>
	   <li><a href="#Page6" data-toggle="tab" style = "<?php echo ($type_selector=='B3' ? 'display: block' : 'display: none'); ?>">
	   		申报作品情况B3</a></li>
	   <li><a href="#Page7" data-toggle="tab">当前国内外同类课题研究水平概述</a></li>
	   <li><a href="#Page8" data-toggle="tab">推荐者情况及对作品的说明</a></li>
	   
	</ul>
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade in active" id="Page1">
		<p class=MsoNormal align=center style='text-align:center;line-height:150%'><b><span
		style='font-size:16.0pt;mso-bidi-font-size:18.0pt;line-height:150%;font-family:
		宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>第十四届“挑战杯”全国大学生课外学术科技作品竞赛华东师范大学预选赛</span></b><b><span
		lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
		style='font-size:14.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:隶书'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
		style='mso-fareast-font-family:隶书'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span
		style='font-size:42.0pt;font-family:隶书;mso-ascii-font-family:"Times New Roman"'>作品申报书</span></b><b><span
		lang=EN-US style='font-size:42.0pt;mso-fareast-font-family:隶书'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:45.2pt;mso-char-indent-count:3.75'><b><span
		lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:48.35pt;mso-char-indent-count:3.44;
		line-height:150%;text-align:center'><b><span style='font-size:14.0pt;line-height:150%;font-family:
		宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品全称</span></b><b><span
		lang=EN-US style='font-size:14.0pt;line-height:150%'><span
		style='mso-spacerun:yes'>&nbsp; </span><u><span style='mso-tab-count:12'><?php echo ($comp_item_name); ?></span><o:p></o:p></u></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></b></p>
		<p class=MsoNormal style='text-indent:48.35pt;mso-char-indent-count:3.44;
		line-height:150%'><b><span style='font-size:14.0pt;line-height:150%;font-family:
		宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>项目类型：</span></b><b><span
		lang=EN-US style='font-size:14.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:41.3pt;mso-char-indent-count:3.44;
		line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		font-family:黑体;mso-bidi-font-weight:bold'>□ </span><span style='font-size:12.0pt;
		line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
		mso-hansi-font-family:"Times New Roman";mso-bidi-font-weight:bold'>个人项目</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%;mso-bidi-font-weight:bold'>A1</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman";mso-bidi-font-weight:
		bold'>（</span><span style='font-size:12.0pt;line-height:150%;font-family:宋体;
		mso-bidi-font-weight:bold'> <?php echo ($group_type == 'A1' ? '√' : ''); ?></span><span style='font-size:12.0pt;line-height:
		150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
		"Times New Roman";mso-bidi-font-weight:bold'>）</span><span lang=EN-US
		style='font-size:12.0pt;line-height:150%;mso-bidi-font-weight:bold'><o:p></o:p></span></p>
		
		<p class=MsoNormal style='text-indent:41.3pt;mso-char-indent-count:3.44;
		line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		font-family:黑体;mso-bidi-font-weight:bold'>□ </span><span style='font-size:12.0pt;
		line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
		mso-hansi-font-family:"Times New Roman";mso-bidi-font-weight:bold'>集体项目</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%;mso-bidi-font-weight:bold'>A2</span>
		<span style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman";mso-bidi-font-weight:
		bold'>（</span>
		<span lang=EN-US style='font-size:12.0pt;line-height:150%;
		mso-bidi-font-weight:bold'><span style='mso-spacerun:yes'><?php echo ($group_type == 'A2' ? '√' : ''); ?></span>
		</span>
		<span	style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman";mso-bidi-font-weight:
		bold'>）</span>
		<u><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		mso-bidi-font-weight:bold'><o:p></o:p></span></u></p>
		
		<p class=MsoNormal style='line-height:150%'><b><span lang=EN-US
		style='font-size:14.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:48.35pt;mso-char-indent-count:3.44;
		line-height:150%'><b><span style='font-size:14.0pt;line-height:150%;font-family:
		宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品类型（单选）</span></b><b><span
		lang=EN-US style='font-size:14.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:41.45pt;mso-char-indent-count:3.44;
		line-height:150%'><b><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		font-family:黑体'><?php echo ($type_selector=='B1' ? '√' : '□'); ?></span></b><span lang=EN-US style='font-size:12.0pt;
		line-height:150%;mso-bidi-font-weight:bold'> </span><b><span style='font-size:
		12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
		mso-hansi-font-family:"Times New Roman"'>自然科学类学术论文</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>B1</span></b><b><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>（</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><span
		style='mso-spacerun:yes'><?php echo ($B1Type); ?></span></span></b><b><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>）</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:48.0pt;mso-char-indent-count:4.0;
		line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>A</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>机械与控制</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>B</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>信息技术</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>C</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>数理</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>D</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>生命科学</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>E</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>能源化工</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
		
		<p class=MsoNormal style='text-indent:41.45pt;mso-char-indent-count:3.44;
		line-height:150%'><b><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		font-family:黑体'><?php echo ($type_selector=='B2' ? '√' : '□'); ?></span></b><b><span style='font-size:12.0pt;line-height:150%;
		font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
		"Times New Roman"'>哲学社会科学类社会调查报告和学术论文</span></b><b><span lang=EN-US
		style='font-size:12.0pt;line-height:150%'>B2</span></b><b><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>（</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><span
		style='mso-spacerun:yes'><?php echo ($B2Type); ?></span></span></b><b><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>）</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:48.0pt;mso-char-indent-count:4.0;
		line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>A</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>哲学</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>B</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>经济</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>C</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>社会</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>D</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>法律</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>E</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>教育</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>F</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>管理</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
		
		<p class=MsoNormal style='text-indent:41.45pt;mso-char-indent-count:3.44;
		line-height:150%'><b><span lang=EN-US style='font-size:12.0pt;line-height:150%;
		font-family:黑体'><?php echo ($type_selector=='B3' ? '√' : '□'); ?></span></b><b><span style='font-size:12.0pt;line-height:150%;
		font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
		"Times New Roman"'>科技发明制作</span></b><b><span lang=EN-US style='font-size:12.0pt;
		line-height:150%'>B3</span></b><b><span style='font-size:12.0pt;line-height:
		150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
		"Times New Roman"'>（</span></b><b><span lang=EN-US style='font-size:12.0pt;
		line-height:150%'><span style='mso-spacerun:yes'><?php echo ($B3Type); ?></span></span></b><b><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>）</span></b><b><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></b></p>
		
		<p class=MsoNormal style='text-indent:48.0pt;mso-char-indent-count:4.0;
		line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>A</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>机械与控制</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>B</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>信息技术</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>C</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>数理</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>D</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>生命科学</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'>E</span><span
		style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
		"Times New Roman";mso-hansi-font-family:"Times New Roman"'>能源化工</span><span
		lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
		<br>
		
		<p class=MsoNormal style='text-indent:41.3pt;mso-char-indent-count:3.43'><b><span
		style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
		mso-hansi-font-family:"Times New Roman"'>注意：所填内容务必与内表一致</span></b><b><span
		lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p></o:p></span></b></p>
		     
		  </div>
		  <div class="tab-pane fade" id="Page2">
		<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体'>序号</span><u><span
		lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span></u></p>
		
		<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体'>编码</span><u><span
		lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span></u></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
		style='font-size:16.0pt'>&nbsp;</span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
		style='font-size:16.0pt'>&nbsp;</span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center;line-height:150%'><b><span
		style='font-size:16.0pt;line-height:150%;font-family:宋体'>第十四届“挑战杯”全国大学生课外学术科技作品竞赛华东师范大学预选赛</span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US style='font-size:16.0pt'>&nbsp;</span></b></p>
		
		<p class=MsoNormal><b><span lang=EN-US>&nbsp;</span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span
		style='font-size:36.0pt;font-family:隶书'>授权书</span></b></p>
		
		<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
		style='font-size:36.0pt'>&nbsp;</span></b></p>
		
		<p class=MsoNormal align=left style='text-align:left;text-indent:28.0pt;
		line-height:150%;text-autospace:none'><span style='font-size:14.0pt;line-height:
		150%;font-family:黑体'>本人完全了解华东师范大学有关保留、使用学术论文的规定，学校有权保留学术论文并向国家主管部门或其他指定机构送交论文的电子版和纸质版。有权将学术论文用于非营利目的少量复制并允许论文进入图书馆被查阅。有权将学术论文的内容编入有关数据库进行检索。有权将学术论文的标题和摘要汇编出版。保密的学术论文在解密后使用本规定。</span></p>
		
		<p class=MsoNormal align=left style='text-align:left;text-indent:40.0pt;
		line-height:150%;text-autospace:none'><span lang=EN-US style='font-size:20.0pt;
		line-height:150%;font-family:黑体'>&nbsp;</span></p>
		
		<p class=MsoNormal align=left style='text-align:center;line-height:150%;
		text-autospace:none'><span style='font-size:14.0pt;line-height:150%;font-family:
		黑体'>作品全称：</span><span lang=EN-US style='font-size:20.0pt;line-height:150%;
		font-family:黑体'><?php echo ($comp_item_name); ?></span></p>
		
		<p class=MsoNormal><b><span lang=EN-US>&nbsp;</span></b></p>
		
		<p class=MsoNormal style='margin-right:40.0pt;text-autospace:none'><b><span
		lang=EN-US>&nbsp;</span></b></p>
		
		<p class=MsoNormal style='margin-right:40.0pt;text-autospace:none'><b><span
		lang=EN-US>&nbsp;</span></b></p>
		
		<p class=MsoNormal style='margin-right:40.0pt;text-indent:163.4pt;text-autospace:
		none'><b><span lang=EN-US>&nbsp;</span></b></p>
		
		<p class=MsoNormal style='margin-right:40.0pt;text-indent:35.0pt;line-height:
		150%;text-autospace:none'><span style='font-size:14.0pt;line-height:150%;
		font-family:黑体'>著作权所有人（手写签名）：<span lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span></span></p>
		
		<p class=MsoNormal style='margin-right:40.0pt;line-height:150%;text-autospace:
		none'><span lang=EN-US style='font-size:14.0pt;line-height:150%;font-family:
		黑体'>&nbsp;</span></p>
		
		<p class=MsoNormal align=right style='text-align:right;line-height:150%;
		text-autospace:none;word-break:break-all'><span style='font-size:14.0pt;
		line-height:150%;font-family:黑体'>年<span lang=EN-US>&nbsp; &nbsp;</span>月 <span
		lang=EN-US>&nbsp;&nbsp;</span>日</span></p>
		  </div>
		  <div class="tab-pane fade" id="Page3">	
					<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体;
					mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>序号</span><u><span
					lang=EN-US><span
					style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</span><o:p></o:p></span></u></p>
					
					<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体;
					mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>编码</span><u><span
					lang=EN-US><span
					style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</span><o:p></o:p></span></u></p>
					
					<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体;
					mso-bidi-font-weight:bold'>A.</span><span style='font-size:16.0pt;mso-bidi-font-size:
					12.0pt;font-family:黑体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
					"Times New Roman";mso-bidi-font-weight:bold'>情况</span><span lang=EN-US
					style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体;
					mso-bidi-font-weight:bold'><o:p></o:p></span></p>
					
					<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					style='font-size:15.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体;
					mso-bidi-font-weight:bold'><o:p>&nbsp;</o:p></span></p>
					
					<p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
					"Times New Roman";mso-hansi-font-family:"Times New Roman"'>说明：</span><span
					lang=EN-US style='font-size:12.0pt'>1</span><span style='font-size:12.0pt;
					font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
					"Times New Roman"'>．必须由申报者本人按要求填写；</span><span lang=EN-US style='font-size:
					12.0pt'><o:p></o:p></span></p>
					
					<p class=MsoNormal style='text-indent:36.0pt'><span lang=EN-US
					style='font-size:12.0pt'>2</span><span style='font-size:12.0pt;font-family:
					宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．申报者代表必须是作者中学历最高者，其余作者按学历高低排列；</span><span
					lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					
					<p class=MsoNormal style='text-indent:36.0pt'><span lang=EN-US
					style='font-size:12.0pt'>3</span><span style='font-size:12.0pt;font-family:
					宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．申报项目若无指导教师，请在指导教师姓名一栏填“无”；</span><span
					lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					
					<p class=MsoNormal style='text-indent:36.0pt'><span lang=EN-US
					style='font-size:12.0pt'>4</span><span style='font-size:12.0pt;font-family:
					宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．本表中各院系的签章视为申报者情况的确认。</span><span
					lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
							  					  		
				<div align=center>		
					<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
					 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
					 mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;
					 mso-border-insidev:.5pt solid windowtext'>
					 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
					  height:20.45pt'>
					  <td width=42 rowspan=6 style='width:25.0pt;border:solid windowtext 1.0pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>申报者情况</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=120 colspan=2 style='width:71.8pt;border:solid windowtext 1.0pt;
					  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>姓名</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=136 colspan=2 style='width:81.65pt;border:solid windowtext 1.0pt;
					  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=68 style='width:40.9pt;border:solid windowtext 1.0pt;border-left:
					  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
					  padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>性别</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=61 style='width:36.85pt;border:solid windowtext 1.0pt;border-left:
					  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
					  padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=141 colspan=2 style='width:84.55pt;border:solid windowtext 1.0pt;
					  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>出生年月</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=190 colspan=4 style='width:114.25pt;border:solid windowtext 1.0pt;
					  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.45pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:22.1pt'>
					  <td width=180 colspan=3 style='width:107.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>系别、专业、年级</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=537 colspan=9 style='width:322.2pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["academy"]); ?>、<?php echo ($author1_info["department"]); ?>、<?php echo ($author1_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:2;page-break-inside:avoid;height:20.6pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>学历</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>学制</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=68 style='width:40.9pt;border-top:none;border-left:none;border-bottom:
					  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
					  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=61 style='width:36.85pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>学号</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=141 colspan=2 style='width:84.55pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["student_id"]); ?></o:p></span></p>
					  </td>
					  <td width=66 colspan=3 style='width:39.55pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>校区</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=125 style='width:74.7pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.6pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:3;page-break-inside:avoid;height:21.1pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>作品全称</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=610 colspan=11 style='width:365.85pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($comp_item_name); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:4;page-break-inside:avoid;height:21.1pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>通讯地址</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=278 colspan=5 style='width:167.05pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["address"]); ?></o:p></span></p>
					  </td>
					  <td width=156 colspan=4 style='width:93.4pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>手机号码</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=176 colspan=2 style='width:105.4pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["phone"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:5;page-break-inside:avoid;height:28.85pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:28.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>常住地</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>通讯地址</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=278 colspan=5 style='width:167.05pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:28.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["phone"]); ?></o:p></span></p>
					  </td>
					  <td width=156 colspan=4 style='width:93.4pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:28.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>住宅电话</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=176 colspan=2 style='width:105.4pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:28.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author1_info["phone"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:6;page-break-inside:avoid;height:19.9pt'>
					  <td width=42 rowspan=6 style='width:25.0pt;border:solid windowtext 1.0pt;
					  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
					  padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
					  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>其他作者情况</span><span
					  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman";position:relative;top:3.0pt;
					  mso-text-raise:-3.0pt'>姓名</span><span lang=EN-US style='font-size:12.0pt;
					  position:relative;top:3.0pt;mso-text-raise:-3.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>性别</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>学历</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>年级</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.9pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>系别、专业</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:7;page-break-inside:avoid;height:21.3pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author2_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author2_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author2_info["grade"]); ?></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author2_info["academy"]); ?>、<?php echo ($author2_info["department"]); ?>、<?php echo ($author2_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:8;page-break-inside:avoid;height:21.15pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author3_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author3_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author3_info["grade"]); ?></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author3_info["academy"]); ?>、<?php echo ($author3_info["department"]); ?>、<?php echo ($author3_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:9;page-break-inside:avoid;height:21.3pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author4_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author4_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author4_info["grade"]); ?></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.3pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author4_info["academy"]); ?>、<?php echo ($author4_info["department"]); ?>、<?php echo ($author4_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:10;page-break-inside:avoid;height:20.95pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author5_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author5_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author5_info["grade"]); ?></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author5_info["academy"]); ?>、<?php echo ($author5_info["department"]); ?>、<?php echo ($author5_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:11;page-break-inside:avoid;height:20.85pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author6_info["name"]); ?></o:p></span></p>
					  </td>
					  <td width=73 colspan=2 style='width:43.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author6_info["gender"]); ?></o:p></span></p>
					  </td>
					  <td width=76 style='width:45.65pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					  <td width=130 colspan=2 style='width:77.75pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author6_info["grade"]); ?></o:p></span></p>
					  </td>
					  <td width=331 colspan=6 style='width:198.8pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($author5_info["academy"]); ?>、<?php echo ($author5_info["department"]); ?>、<?php echo ($author5_info["major"]); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:12;page-break-inside:avoid;height:24.15pt'>
					  <td width=42 rowspan=4 style='width:25.0pt;border:solid windowtext 1.0pt;
					  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
					  padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>指导教师情况</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>姓名</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=149 colspan=3 style='width:89.3pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_name); ?></o:p></span></p>
					  </td>
					  <td width=68 style='width:40.9pt;border-top:none;border-left:none;border-bottom:
					  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
					  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>性别</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=61 style='width:36.85pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_gender); ?></o:p></span></p>
					  </td>
					  <td width=86 style='width:51.8pt;border-top:none;border-left:none;border-bottom:
					  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
					  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
					  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>年龄</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=59 colspan=2 style='width:35.45pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_age); ?></o:p></span></p>
					  </td>
					  <td width=61 colspan=2 style='width:36.85pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>职称</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=125 style='width:74.7pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.15pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:13;page-break-inside:avoid;height:22.95pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>工作单位</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=610 colspan=11 style='width:365.85pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.95pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_job); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:14;page-break-inside:avoid;height:24.55pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.55pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>通讯地址</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=278 colspan=5 style='width:167.05pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.55pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_add); ?></o:p></span></p>
					  </td>
					  <td width=145 colspan=3 style='width:87.25pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.55pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>邮政编码</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=186 colspan=3 style='width:111.55pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.55pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_zipcode); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:15;page-break-inside:avoid;height:23.4pt'>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.4pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>单位电话</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=278 colspan=5 style='width:167.05pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.4pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_workphone); ?></o:p></span></p>
					  </td>
					  <td width=145 colspan=3 style='width:87.25pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.4pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>住宅电话</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=186 colspan=3 style='width:111.55pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.4pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
					  style='font-size:12.0pt'><o:p><?php echo ($teacher_homephone); ?></o:p></span></p>
					  </td>
					 </tr>
					 <tr style='mso-yfti-irow:16;mso-yfti-lastrow:yes;page-break-inside:avoid;
					  height:142.8pt'>
					  <td width=42 style='width:25.0pt;border:solid windowtext 1.0pt;border-top:
					  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
					  padding:0cm 5.4pt 0cm 5.4pt;layout-flow:vertical-ideographic;height:142.8pt'>
					  <p class=MsoNormal align=center style='margin-right:5.65pt;text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman";letter-spacing:9.5pt;mso-font-kerning:
					  0pt'>资格认</span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
					  "Times New Roman";mso-hansi-font-family:"Times New Roman";mso-font-kerning:
					  0pt'>定</span><span lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=107 style='width:64.15pt;border-top:none;border-left:none;
					  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:142.8pt'>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>院系团委或导师</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
					  mso-hansi-font-family:"Times New Roman"'>意见</span><span lang=EN-US
					  style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					  <td width=610 colspan=11 style='width:365.85pt;border-top:none;border-left:
					  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
					  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
					  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:142.8pt'>
					  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
					  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>本作品是否为课外学术科技或社会实践活动成果</span><span
					  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					  <p class=MsoNormal style='margin-left:18.0pt;text-indent:-18.0pt;mso-list:
					  l0 level1 lfo1;tab-stops:list 18.0pt'><![if !supportLists]><span lang=EN-US
					  style='font-size:12.0pt;font-family:宋体;mso-bidi-font-family:宋体'><span
					  style='mso-list:Ignore'><?php echo ($practice_type == '1' ? '√' : '□'); ?><span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
					  style='font-size:12.0pt;font-family:宋体'>是<span lang=EN-US><span
					  style='mso-spacerun:yes'>&nbsp; </span></span><?php echo ($practice_type == '1' ? '□' : '√'); ?>否<span lang=EN-US> <o:p></o:p></span></span></p>
					  <p class=MsoNormal style='margin-left:18.0pt'><span lang=EN-US
					  style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
					  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
					  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
					  style='font-size:12.0pt;font-family:宋体'>负责人签名：<span lang=EN-US><o:p></o:p></span></span></p>
					  <p class=MsoNormal align=center style='text-align:center'><span
					  style='font-size:12.0pt;font-family:宋体'>　　　　　　　　　　　　年　　月　　日　</span><span
					  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
					  </td>
					 </tr>
					 <![if !supportMisalignedColumns]>
					 <tr height=0>
					  <td width=47 style='border:none'></td>
					  <td width=105 style='border:none'></td>
					  <td width=13 style='border:none'></td>
					  <td width=59 style='border:none'></td>
					  <td width=75 style='border:none'></td>
					  <td width=67 style='border:none'></td>
					  <td width=61 style='border:none'></td>
					  <td width=84 style='border:none'></td>
					  <td width=53 style='border:none'></td>
					  <td width=5 style='border:none'></td>
					  <td width=10 style='border:none'></td>
					  <td width=50 style='border:none'></td>
					  <td width=120 style='border:none'></td>
					 </tr>
					 <![endif]>
					</table>
					
					</div>
							  		
		  </div>
		  <div class="tab-pane fade" id="Page4">
		  	
<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体'>B1.</span><span
style='font-size:16.0pt;mso-bidi-font-size:12.0pt;font-family:黑体;mso-ascii-font-family:
"Times New Roman";mso-hansi-font-family:"Times New Roman"'>申报作品情况（自然科学类学术论文）</span><span
lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:
黑体'><o:p></o:p></span></p>

<p class=MsoNormal style='text-indent:36.0pt;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
"Times New Roman";mso-hansi-font-family:"Times New Roman"'>说明：</span><span
lang=EN-US style='font-size:12.0pt;line-height:150%'>1</span><span
style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．必须由申报者本人填写；</span><span
lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal style='text-indent:72.0pt;mso-char-indent-count:6.0;
line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>2</span><span
style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．本部分中的各院系的签章视为对申报者所填内容的确认；</span><span
lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal style='text-indent:72.0pt;mso-char-indent-count:6.0;
line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>3</span><span
style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．作品分类请按作品的学术方向或所涉及的主要学科领域填写；</span><span
lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>

<div align=center>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=696
 style='width:900px;margin-left:4.6pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:29.2pt'>
  <td width=146 style='width:100px;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:29.2pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>作品全称</span><span lang=EN-US
  style='font-size:12.0pt'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:29.2pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt;text-align:center;'><o:p><?php echo ($comp_item_name); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:189.25pt'>
  <td width=146 valign=top style='width:100px;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:189.25pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt'><span lang=EN-US
  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt'><span lang=EN-US
  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:5.65pt;
  margin-bottom:0cm;margin-left:5.65pt;margin-bottom:.0001pt;mso-para-margin-top:
  0cm;mso-para-margin-right:5.65pt;mso-para-margin-bottom:0cm;mso-para-margin-left:
  .54gd;mso-para-margin-bottom:.0001pt;text-align:center;text-indent:24.0pt;
  mso-char-indent-count:2.0'><span style='font-size:12.0pt;font-family:宋体;
  mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品分类（单选）</span><span
  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:189.25pt'>
  <p class=MsoNormal align=left style='margin-left:48.0pt;text-align:left;
  text-indent:-48.0pt;mso-char-indent-count:-4.0;line-height:150%'><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'>(&nbsp;	<?php echo ($B1Type); ?><span
  style='mso-spacerun:yes'>&nbsp; </span>)A</span><span style='font-size:
  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>．机械与控制（包括机械、仪器仪表、自动化控制、工程、交通、建筑等）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=left style='text-align:left;text-indent:24.0pt;
  mso-char-indent-count:2.0;line-height:150%'><span lang=EN-US
  style='font-size:12.0pt;line-height:150%'>B</span><span style='font-size:
  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>．信息技术（包括计算机、电信、通讯、电子等）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=left style='text-align:left;text-indent:24.0pt;
  mso-char-indent-count:2.0;line-height:150%'><span lang=EN-US
  style='font-size:12.0pt;line-height:150%'>C</span><span style='font-size:
  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>．数理（包括数学、物理、地球与空间科学等）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=left style='margin-left:47.95pt;mso-para-margin-left:
  2.28gd;text-align:left;text-indent:-24.0pt;mso-char-indent-count:-2.0;
  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>D</span><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>．生命科学（包括生物、农学、药学、医学、健康、卫生、食品等）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=left style='margin-left:47.95pt;mso-para-margin-left:
  2.28gd;text-align:left;text-indent:-24.0pt;mso-char-indent-count:-2.0;
  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>E</span><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>．能源化工（包括能源、材料、石油、化学、化工、生态、环保等）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:107.8pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:107.8pt'>
  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>作品撰写的目的和基本思路</span><span lang=EN-US
  style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:107.8pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_1); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:95.2pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:95.2pt'>
  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>作品的科学性、先进性及独特之处</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:95.2pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_2); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;height:114.15pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:114.15pt'>
  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>作品的实际应用价值和现实意义</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:114.15pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_3); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;page-break-inside:avoid;height:403.5pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:403.5pt'>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:5.65pt;
  margin-bottom:0cm;margin-left:5.65pt;margin-bottom:.0001pt;text-align:center;
  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>学</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><span
  style='mso-spacerun:yes'>&nbsp; </span></span><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>　　术</span><span style='font-size:
  12.0pt;line-height:150%'> </span><span style='font-size:12.0pt;line-height:
  150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
  "Times New Roman"'>　</span><span style='font-size:12.0pt;line-height:150%'> </span><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>　论　</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><span
  style='mso-spacerun:yes'>&nbsp; </span></span><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>　文</span><span lang=EN-US
  style='font-size:12.0pt;line-height:150%'><span
  style='mso-spacerun:yes'>&nbsp; </span></span><span style='font-size:12.0pt;
  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>　</span><span style='font-size:12.0pt;
  line-height:150%'> </span><span style='font-size:12.0pt;line-height:150%;
  font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
  "Times New Roman"'>文</span><span lang=EN-US style='font-size:12.0pt;
  line-height:150%'><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>摘</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:403.5pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_4); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;page-break-inside:avoid;height:254.65pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品在何时、何地、何种机构举行的会议上或报刊上发表及所获奖励</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_5); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;page-break-inside:avoid;height:254.65pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>鉴定结果</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_6); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8;page-break-inside:avoid;height:254.65pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>请提供对于理解、审查、评价所申报作品具有参考价值的现有技术及技术文献的检索目录</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_7); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9;page-break-inside:avoid;height:254.65pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>申报材料清单（申报论文一篇，相关资料名称及数量）</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b1_8); ?></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes;page-break-inside:avoid;
  height:254.65pt'>
  <td width=146 style='width:87.6pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>各院系确认</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>并签章</span><span
  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=550 valign=top style='width:330.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:254.65pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span
  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>年</span><span lang=EN-US
  style='font-size:12.0pt'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>月</span><span lang=EN-US
  style='font-size:12.0pt'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>日</span><span lang=EN-US
  style='font-size:12.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
</table>
		  	
		  </div>
	 </div>
		  <div class="tab-pane fade" id="Page5">			  		
				<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;
				mso-fareast-font-family:黑体'>B2</span><span style='font-size:16.0pt;mso-bidi-font-size:
				12.0pt;line-height:150%;font-family:黑体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．申报作品情况</span><span lang=EN-US
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;mso-fareast-font-family:
				黑体'><o:p></o:p></span></p>
				
				<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;font-family:
				黑体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>（哲学社会科学类社会调查报告和学术论文）</span><span
				lang=EN-US style='font-size:15.0pt;mso-bidi-font-size:12.0pt;line-height:150%;
				mso-fareast-font-family:黑体'><o:p></o:p></span></p>
				
				<p class=MsoNormal><span lang=EN-US style='font-size:15.0pt;mso-bidi-font-size:
				12.0pt;mso-fareast-font-family:黑体'><o:p>&nbsp;</o:p></span></p>
				
				<p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>说明：</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'>1</span><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．必须有申报者本人填写；</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='text-indent:36.0pt;mso-char-indent-count:3.0;
				line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>2</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．本部分中的各院系的签章视为对申报者所填内容的确认。</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<div align=center>
				
				<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=758
				 style='width:455.0pt;border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
				 mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;
				 mso-border-insidev:.5pt solid windowtext'>
				 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:51.75pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;mso-border-alt:
				  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:51.75pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品全称</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border:solid windowtext 1.0pt;
				  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
				  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:51.75pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($comp_item_name); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:1;height:40.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:40.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品所属领域</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>（单选）</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:40.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>（<?php echo ($B2Type); ?>）</span><span lang=EN-US
				  style='font-size:12.0pt'>A </span><span style='font-size:12.0pt;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>哲学</span><span
				  lang=EN-US style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;
				  </span>B </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>经济</span><span
				  lang=EN-US style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;
				  </span>C </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>社会</span><span
				  lang=EN-US style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;
				  </span>D </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>法律</span><span
				  lang=EN-US style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;
				  </span>E </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>教育</span><span
				  lang=EN-US style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;
				  </span>F </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>管理</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:2;height:176.25pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:176.25pt'>
				  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品撰写的目的和基本思路</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:176.25pt'>
				  <p class=MsoNormal style=''><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($b2_1); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:3;height:5.0cm'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:5.0cm'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品的科学性、先进性及独特之处</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:5.0cm'>
				  <p class=MsoNormal style=''><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($b2_2); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:4;height:150.75pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:150.75pt'>
				  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品的实际应用价值和现实指导意义</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:150.75pt'>
				  <p class=MsoNormal  style=''><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($b2_3); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:5;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:5.65pt;
				  margin-bottom:0cm;margin-left:5.65pt;margin-bottom:.0001pt;mso-para-margin-top:
				  0cm;mso-para-margin-right:5.65pt;mso-para-margin-bottom:0cm;mso-para-margin-left:
				  .54gd;mso-para-margin-bottom:.0001pt;text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品摘要</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b2_4); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:6;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
				  12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
				  "Times New Roman"'>作品在何时、何地、何种机构举行的会议或报刊上发表登载、所获奖励及评定结果</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b2_5); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:7;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
				  12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
				  "Times New Roman"'>请提供对于理解、审查、评价所申报作品，具有参考价值的现有对比数据及作品中资料来源的检索目录</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($b2_6); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:8;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>调查方式</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 style='width:371.5pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体'><?php echo ($b2_c_1=='on'?'√':'□'); ?>走访<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_2 =='on'?'√':'□'); ?>问卷<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_3 =='on'?'√':'□'); ?>现场采访<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_4 =='on'?'√':'□'); ?>人员介绍<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_5 =='on'?'√':'□'); ?>个别交谈<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_6 =='on'?'√':'□'); ?>亲临实践<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_7 =='on'?'√':'□'); ?>会议<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_8 =='on'?'√':'□'); ?>图片、照片<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_9 =='on'?'√':'□'); ?>书报刊物<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_10 =='on'?'√':'□'); ?>统计报表<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp; </span></span><?php echo ($b2_c_11 =='on'?'√':'□'); ?>影视资料<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_12 =='on'?'√':'□'); ?>文件<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_13 =='on'?'√':'□'); ?>集体组织<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_14 =='on'?'√':'□'); ?>自发<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><?php echo ($b2_c_2 =='on'?'√':'□'); ?>其它</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:9;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>主要调查单位及调查</span><span
				  style='font-size:12.0pt;line-height:150%'> </span><span style='font-size:
				  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>数</span><span style='font-size:12.0pt;
				  line-height:150%'> </span><span style='font-size:12.0pt;line-height:150%;
				  font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
				  "Times New Roman"'>量</span><span lang=EN-US style='font-size:12.0pt;
				  line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=619 style='width:371.5pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span lang=EN-US
				  style='font-size:12.0pt;line-height:150%'><?php echo ($b2_7); ?></span></p>
				  </td>	
				 </tr>
				 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes;height:233.4pt'>
				  <td width=139 style='width:83.5pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>各院系确认并签章</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=619 valign=top style='width:371.5pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:233.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  </span><o:p></o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal align=right style='text-align:right'><span lang=EN-US
				  style='font-size:12.0pt'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  </span><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>年</span><span lang=EN-US
				  style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>月</span><span lang=EN-US
				  style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>日</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				</table>
				
				</div>
						  		
		  </div>
		  <div class="tab-pane fade" id="Page6">						  		
				<p class=MsoNormal align=center style='text-align:center;line-height:150%'><b><span
				lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;
				mso-fareast-font-family:黑体'>B3</span></b><b><span style='font-size:16.0pt;
				mso-bidi-font-size:12.0pt;line-height:150%;font-family:黑体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．</span></b><span
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;font-family:
				黑体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>申报作品情况（科技发明制作）</span><span
				lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;line-height:150%;
				mso-fareast-font-family:黑体'><o:p></o:p></span></p>
				
				<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				style='font-size:15.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体'><o:p>&nbsp;</o:p></span></p>
				
				<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				style='font-size:14.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体'><o:p>&nbsp;</o:p></span></p>
				
				<p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>说明：</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'>1</span><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．必须由申报者本人填写；</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='text-indent:36.0pt;mso-char-indent-count:3.0;
				line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>2</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．本部分中的各院系的签章视为对申报者所填内容的确认；</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='margin-left:59.8pt;mso-para-margin-left:3.41gd;
				text-indent:-24.0pt;mso-char-indent-count:-2.0;line-height:150%'><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'>3</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．本表中必须附有研究报告，并提供图表、曲线、试验数据、原理结构图、外观图（照片），也可附鉴定证书和应用证书；</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='text-indent:36.0pt;mso-char-indent-count:3.0;
				line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>4</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．作品分类请按照作品发明点或创新点所在类别填报。</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<div align=center>
				
				<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=867
				 style='width:520.1pt;margin-left:-65.5pt;border-collapse:collapse;border:none;
				 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
				 0cm 5.4pt 0cm 5.4pt'>
				 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;mso-border-alt:
				  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品全称</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border:solid windowtext 1.0pt;
				  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
				  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:1'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal align=left style='margin-left:5.65pt;mso-para-margin-left:
				  .54gd;text-align:left'><span style='font-size:12.0pt;font-family:宋体;
				  mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>作品分类（单选）</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal align=left style='margin-left:48.0pt;text-align:left;
				  text-indent:-48.0pt;mso-char-indent-count:-4.0;line-height:150%'><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'>(<span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span>)A</span><span style='font-size:
				  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>．机械与控制（包括机械、仪器仪表、自动化控制、工程、交通、建筑等）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=left style='text-align:left;text-indent:24.0pt;
				  mso-char-indent-count:2.0;line-height:150%'><span lang=EN-US
				  style='font-size:12.0pt;line-height:150%'>B</span><span style='font-size:
				  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>．信息技术（包括计算机、电信、通讯、电子等）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=left style='text-align:left;text-indent:24.0pt;
				  mso-char-indent-count:2.0;line-height:150%'><span lang=EN-US
				  style='font-size:12.0pt;line-height:150%'>C</span><span style='font-size:
				  12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>．数理（包括数学、物理、地球与空间科学等）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=left style='margin-left:47.95pt;mso-para-margin-left:
				  2.28gd;text-align:left;text-indent:-24.0pt;mso-char-indent-count:-2.0;
				  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>D</span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>．生命科学（包括生物、农学、药学、医学、健康、卫生、食品等）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=left style='margin-left:47.95pt;mso-para-margin-left:
				  2.28gd;text-align:left;text-indent:-24.0pt;mso-char-indent-count:-2.0;
				  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>E</span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>．能源化工（包括能源、材料、石油、化学、化工、生态、环保等）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:2'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品设计、发明的目的和基本思路，创新点，技术关键和主要技术指标</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:3'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品的科学性先进性（必须说明与现有技术相比、该作品是否具有突出的实质性技术特点和显著进步。请提供技术性分析说明和参考文献资料）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:4'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品在何时、何地、何种机构举行的评审、鉴定、评比、展示等活动中获奖及鉴定结果</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:5'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal style='text-indent:12.0pt;mso-char-indent-count:1.0'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作</span><span style='font-size:12.0pt'>
				  </span><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>品</span><span
				  style='font-size:12.0pt'> </span><span style='font-size:12.0pt;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>所</span><span
				  style='font-size:12.0pt'> </span><span style='font-size:12.0pt;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>处</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  <p class=MsoNormal style='text-indent:24.0pt;mso-char-indent-count:2.0'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>阶</span><span lang=EN-US
				  style='font-size:12.0pt'><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>段</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:12.0pt;mso-char-indent-count:1.0;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>（　）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'>A</span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>实验室阶段</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><span
				  style='mso-spacerun:yes'>&nbsp; </span>B</span><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>中试阶段</span><span lang=EN-US
				  style='font-size:12.0pt;line-height:150%'><span
				  style='mso-spacerun:yes'>&nbsp; </span>C</span><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>生产阶段</span><span lang=EN-US
				  style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal style='text-indent:24.0pt;mso-char-indent-count:2.0;
				  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>D__________</span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>（自填）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:6;height:53.6pt'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:53.6pt'>
				  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>技术转让方式</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:53.6pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:7'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>作品可展示的形式</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体'>□实物、产品<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□模型<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□图纸<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□磁盘<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp; </span></span>□现场演示<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□图片<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□录像<span lang=EN-US><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>□样品</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:8'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>使用说明及该作品的技术特点和优势，提供该作品的适应范围及推广前景的技术性说明及市场分析和经济效益预测</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:9'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>专利申报情况</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='margin-left:18.0pt;text-indent:-18.0pt;line-height:
				  150%;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt'><![if !supportLists]><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%;font-family:宋体;
				  mso-bidi-font-family:宋体'><span style='mso-list:Ignore'>□<span
				  style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体'>提出专利申报<span
				  lang=EN-US><o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:120.0pt;mso-char-indent-count:10.0;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体'>申报号<span lang=EN-US>____________<o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:120.0pt;mso-char-indent-count:10.0;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体'>申报日期<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>年<span
				  lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span>月<span
				  lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>日<span
				  lang=EN-US><o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='margin-left:18.0pt;text-indent:-18.0pt;line-height:
				  150%;mso-list:l0 level1 lfo1;tab-stops:list 18.0pt'><![if !supportLists]><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%;font-family:宋体;
				  mso-bidi-font-family:宋体'><span style='mso-list:Ignore'>□<span
				  style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体'>已获专利权批准<span
				  lang=EN-US><o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:120.0pt;mso-char-indent-count:10.0;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体'>批准号<span lang=EN-US>____________<o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:120.0pt;mso-char-indent-count:10.0;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体'>批准日期<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>年<span
				  lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>月<span
				  lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span>日<span
				  lang=EN-US><o:p></o:p></span></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0;
				  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%;
				  font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:168.0pt;mso-char-indent-count:14.0'><span
				  lang=EN-US style='font-size:12.0pt;font-family:宋体'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span style='font-size:12.0pt;font-family:宋体'>□未提出专利申请</span><span
				  lang=EN-US style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes'>
				  <td width=135 style='width:80.7pt;border:solid windowtext 1.0pt;border-top:
				  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>各院系确认</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>并签章</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=732 valign=top style='width:439.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal style='text-indent:180.0pt'><span style='font-size:12.0pt;
				  font-family:宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:
				  "Times New Roman"'>年</span><span lang=EN-US style='font-size:12.0pt'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>月</span><span lang=EN-US
				  style='font-size:12.0pt'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>日</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				 </tr>
				</table>
				
				</div>
				
						  		
		  </div>
		  <div class="tab-pane fade" id="Page7">
				
				<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体'>C</span><span
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;font-family:黑体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．当前国内外同类课题研究水平概述</span><span
				lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:
				黑体'><o:p></o:p></span></p>
				<p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>说明：</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'>1</span><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．申报者可根据作品类别和情况填写；</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='text-indent:36.0pt;mso-char-indent-count:3.0;
				line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'>2</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．填写此栏有助于评审。</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<div align=center>
				
				<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
				 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
				 mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;
				 mso-border-insidev:.5pt solid windowtext'>
				 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
				  height:591.25pt'>
				  <td width=758 valign=top style='width:455.0pt;border:solid windowtext 1.0pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:591.25pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($CTable); ?></o:p></span></p>
				  </td>
				 </tr>
				</table>
				
				</div>
	  	
		  </div>
		  <div class="tab-pane fade" id="Page8">		  	
				<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体;
				mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>序号</span><u><span
				lang=EN-US><span
				style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</span><o:p></o:p></span></u></p>
				
				<p class=MsoNormal style='line-height:150%'><span style='font-family:宋体;
				mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>编码</span><u><span
				lang=EN-US><span
				style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</span><o:p></o:p></span></u></p>
				
				<p class=MsoNormal align=center style='text-align:center;text-indent:48.0pt;
				mso-char-indent-count:3.0'><span lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:
				12.0pt;mso-fareast-font-family:黑体'><o:p>&nbsp;</o:p></span></p>
				
				<p class=MsoNormal align=center style='text-align:center;text-indent:48.0pt;
				mso-char-indent-count:3.0'><span lang=EN-US style='font-size:16.0pt;mso-bidi-font-size:
				12.0pt;mso-fareast-font-family:黑体'>D</span><span style='font-size:16.0pt;
				mso-bidi-font-size:12.0pt;font-family:黑体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．推荐者情况及对作品的说明</span><span lang=EN-US
				style='font-size:16.0pt;mso-bidi-font-size:12.0pt;mso-fareast-font-family:黑体'><o:p></o:p></span></p>
				
				<p class=MsoNormal align=center style='text-align:center;text-indent:45.0pt;
				mso-char-indent-count:3.0'><span lang=EN-US style='font-size:15.0pt;mso-bidi-font-size:
				12.0pt;mso-fareast-font-family:黑体'><o:p>&nbsp;</o:p></span></p>
				
				
				<p class=MsoNormal style='line-height:150%'><span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>说明：</span>
				<span lang=EN-US
				style='font-size:12.0pt;line-height:150%'>1</span>
				<span style='font-size:12.0pt;
				line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				mso-hansi-font-family:"Times New Roman"'>．由推荐者本人填写；</span><span lang=EN-US
				style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='margin-left:59.9pt;mso-para-margin-left:3.42gd;
				text-indent:-24.0pt;mso-char-indent-count:-2.0;line-height:150%'><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'>2</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．推荐者必须具有高级专业技术职称，并是与申报作品相同或相关领域的专家学者或专业技术人员（教研组集体推荐亦可）；</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<p class=MsoNormal style='margin-left:59.9pt;mso-para-margin-left:3.42gd;
				text-indent:-24.0pt;mso-char-indent-count:-2.0;line-height:150%'><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'>3</span><span
				style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				"Times New Roman";mso-hansi-font-family:"Times New Roman"'>．推荐者填写此部分，即视为同意推荐；</span><span
				lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				
				<div align=center>
				
				<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
				 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
				 mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;
				 mso-border-insidev:.5pt solid windowtext;width:900px;'>
				 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
				  height:25.15pt'>
				  <td width=50 rowspan=4 valign=top style='width:30.0pt;border:solid windowtext 1.0pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
				  0cm;margin-left:5.65pt;margin-bottom:.0001pt;mso-para-margin-top:0cm;
				  mso-para-margin-right:5.65pt;mso-para-margin-bottom:0cm;mso-para-margin-left:
				  .54gd;mso-para-margin-bottom:.0001pt;text-indent:12.0pt;mso-char-indent-count:
				  1.0'><span style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>推荐者情况</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=138 style='width:82.65pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>姓名</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=129 style='width:77.35pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_name); ?></o:p></span></p>
				  </td>
				  <td width=70 style='width:42.1pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>性别</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=72 style='width:42.9pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_gender); ?></o:p></span></p>
				  </td>
				  <td width=67 style='width:40.0pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>年龄</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=50 style='width:30.0pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_age); ?></o:p></span></p>
				  </td>
				  <td width=61 style='width:36.6pt;border:solid windowtext 1.0pt;border-left:
				  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>职称</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=122 valign=top style='width:73.4pt;border:solid windowtext 1.0pt;
				  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
				  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:25.15pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:27.0pt'>
				  <td width=138 style='width:82.65pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.0pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>工作单位</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=571 colspan=7 style='width:342.35pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.0pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_job); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:2;page-break-inside:avoid;height:27.05pt'>
				  <td width=138 style='width:82.65pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.05pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>通讯地址</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=337 colspan=4 style='width:202.35pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.05pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_add); ?></o:p></span></p>
				  </td>
				  <td width=111 colspan=2 style='width:66.6pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.05pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>邮政编码</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=122 valign=top style='width:73.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.05pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($referee_zipcode); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:3;page-break-inside:avoid;height:26.25pt'>
				  <td width=138 style='width:82.65pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.25pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>单位电话</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=337 colspan=4 style='width:202.35pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.25pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
				  style='font-size:12.0pt'><o:p><?php echo ($referee_workphone); ?></o:p></span></p>
				  </td>
				  <td width=111 colspan=2 style='width:66.6pt;border-top:none;border-left:none;
				  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.25pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>住宅电话</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=122 valign=top style='width:73.4pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.25pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p><?php echo ($referee_homephone); ?></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:4;height:89.2pt'>
				  <td width=188 colspan=2 style='width:112.65pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:89.2pt'>
				  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>推荐者所在</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>单位签章</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=571 colspan=7 valign=top style='width:342.35pt;border-top:none;
				  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:89.2pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  <p class=MsoNormal align=center style='margin-right:24.0pt;text-align:center;
				  line-height:150%'><span lang=EN-US style='font-size:12.0pt;line-height:150%'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  </span></span><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>（签章）</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  <p class=MsoNormal align=right style='margin-right:6.0pt;text-align:right;
				  line-height:150%'><span style='font-size:12.0pt;line-height:150%;font-family:
				  宋体;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>年</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>月</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><span
				  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
				  style='font-size:12.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
				  "Times New Roman";mso-hansi-font-family:"Times New Roman"'>日</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:5;height:92.4pt'>
				  <td width=188 colspan=2 style='width:112.65pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:92.4pt'>
				  <p class=MsoNormal style='text-align:center;line-height:150%'><span style='font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>请对申报者申报情况的真实性做出阐述</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=571 colspan=7 valign=top style='width:342.35pt;border-top:none;
				  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:92.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:6;height:109.1pt'>
				  <td width=188 colspan=2 style='width:112.65pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:109.1pt'>
				  <p class=MsoNormal style='line-height:150%'><span style='text-align:center;font-size:12.0pt;
				  line-height:150%;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>请对作品的意义、技术水平、适用范围及推广前景做出您的评价</span><span
				  lang=EN-US style='font-size:12.0pt;line-height:150%'><o:p></o:p></span></p>
				  </td>
				  <td width=571 colspan=7 valign=top style='width:342.35pt;border-top:none;
				  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:109.1pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:7;mso-yfti-lastrow:yes;height:77.4pt'>
				  <td width=188 colspan=2 style='width:112.65pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0cm 5.4pt 0cm 5.4pt;height:77.4pt'>
				  <p class=MsoNormal align=center style='text-align:center'><span
				  style='font-size:12.0pt;font-family:宋体;mso-ascii-font-family:"Times New Roman";
				  mso-hansi-font-family:"Times New Roman"'>其它说明</span><span lang=EN-US
				  style='font-size:12.0pt'><o:p></o:p></span></p>
				  </td>
				  <td width=571 colspan=7 valign=top style='width:342.35pt;border-top:none;
				  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:77.4pt'>
				  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
				  </td>
				 </tr>
				</table>
						  	
		  	</div>
		</div>
	</div>
</div>


</body>
</html>