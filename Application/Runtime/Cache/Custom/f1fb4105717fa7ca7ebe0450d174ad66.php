<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Personal Main Page</title>
<script type="text/javascript" src="/webprj/ecnu_mind/Public/js/home/hoverTag.js"> </script>
<script type="text/javascript" src="/webprj/ecnu_mind/Public/js/home/home.js"> </script>
</head>
<body>

	<div class="box1">
		<div class="title_box">
			<div style="display:inline-block;width:15px;height:15px;">
				<img style="width:15px;height:15px;margin-left: -10px;" src="/webprj/ecnu_mind/Public/img/icon/myinfo.png">
			</div>我的信息
		</div>
		<div class="photo"></div>
		<div class="welcome"></div>
		<div class="line_vertical"></div>
		<p style="display: inline-block;position: relative;left: 120px;font-size: 14px;top: -59px;border-bottom: 2px solid #ddd;width: 90px;text-align: center;">个人简介</p>
		<p class="person_intro"></p>
	</div>

	<div class="box2">
		<div class="title_box">
			<div style="display:inline-block;width:15px;height:15px;">
				<img style="width:15px;height:15px;margin-left: -10px;" src="/webprj/ecnu_mind/Public/img/icon/myinfo.png">
			</div>能力概览
		</div>
		<div class="Chart">
			<div class="Chart_info">
				<p style="font-size: 10px;color: #0080ff;text-align:center">tips:鼠标悬浮在图上以显示详细能力信息~</p>
				<canvas id="chart-area" width="300" height="300" style="width: 240px; height: 240px;"></canvas>
			</div>
			<div class="tips">
				<div class="box" style="background:#F7464A"></div>
				<div class="word" style="color:#F7464A">信息技术</div>
				<div class="box" style="background:#46BFBD"></div>
				<div class="word" style="color:#46BFBD">设计</div>
				<div class="box" style="background:#FDB45C"></div>
				<div class="word" style="color:#FDB45C">生物医药</div>
				<div class="box" style="background:#949FB1"></div>
				<div class="word" style="color:#949FB1">艺术</div>
			</div>
			<div class="detail">
				<div id="default">
					请单击左侧饼图以查看能力详情
				</div>
				<div class="tabs" id="it"></div>
				<div class="tabs" id="design"></div>
				<div class="tabs" id="bm"></div>
				<div class="tabs" id="art"></div>
			</div>
		</div>
	</div>

	<div class="box3">
		<div class="title_box" id="title_box" style="margin-bottom:20px">
			<div style="display:inline-block;width:15px;height:15px;">
				<img style="width:15px;height:15px;margin-left: -10px;" src="/webprj/ecnu_mind/Public/img/icon/message.png">
			</div>站内通知
		</div>
	</div>

	<script type="text/javascript">
	  getDataFromServer()
	</script>
	
</body>
</html>