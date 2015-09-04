<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Search People</title>
<link href="/webprj/ecnu_mind/Public/css/searchPeople.css" rel="stylesheet">
<script src="/webprj/ecnu_mind/Public/js/home/searchPeople.js"></script>
<script>
  $(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  var ability_json;
</script>
</head>
<body>
	<form class="searchPeopleForm">
	<!-- <div class="ui-widget searchPeoplePart1">
  		<input id="tags" class="typeSearch" type="text" placeholder="输入目标伙伴的能力关键词">
  		<input type="button" value="添加搜索条件" class="addConstraint">
	</div> -->
	<div class="searchPeoplePart2">
		<div class="s-title">
			<p><b>寻找伙伴  </b> 添加搜索条件</p>
			<input id="tags" class="typeSearch" type="text" placeholder="检索目标能力或方向">
		</div>
		<div class="searchPeoplePart2RowHead"><b>选择领域:</b></div>
		<div class="searchPeoplePart2Row" id="searchPeoplePart2Row1">
			<div class="searchPeopleTags" id="L1">
				<div class="searchPeopleTag" id="L1_all">全部</div>
	            <div class="searchPeopleTag" id="L1_1">信息技术</div>
	            <div class="searchPeopleTag" id="L1_2">生物医药</div>
	            <div class="searchPeopleTag" id="L1_3">设计</div>
	            <div class="searchPeopleTag" id="L1_4">艺术</div>
			</div>
		</div>
		<div class="searchPeoplePart2RowHead"><b>选择方向:</b></div>
		<div class="searchPeoplePart2Row" id="searchPeoplePart2Row2">
			<div class="searchPeopleTags" id="L2">
				<div class="searchPeopleTag" id="L2_all">全部</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">Web前台</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">Web后台</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">数据库</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">桌面平台</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">移动平台</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">DSP技术</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">嵌入式</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">PCB设计</div>
	            <div class="searchPeopleTag L1_1" data-cat="L1_1">电路设计</div>
	            <div class="searchPeopleTag L1_2" data-cat="L1_2">生态系统</div>
	            <div class="searchPeopleTag L1_2" data-cat="L1_2">DNA研究</div>
	            <div class="searchPeopleTag L1_2" data-cat="L1_2">生物习性</div>
	            <div class="searchPeopleTag L1_2" data-cat="L1_2">细胞学</div>
	            <div class="searchPeopleTag L1_2" data-cat="L1_2">人类健康</div>
	            <div class="searchPeopleTag L1_3" data-cat="L1_3">平面设计</div>
	            <div class="searchPeopleTag L1_3" data-cat="L1_3">动画设计</div>
	            <div class="searchPeopleTag L1_3" data-cat="L1_3">立体设计</div>
	            <div class="searchPeopleTag L1_3" data-cat="L1_3">服装设计</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">表演</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">演奏</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">演唱</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">舞蹈</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">绘画</div>
	            <div class="searchPeopleTag L1_4" data-cat="L1_4">书法</div>
			</div>
		</div>
		<div class="searchPeoplePart2RowHead"><b>选择能力:</b></div>
		<div class="searchPeoplePart2Row" id="searchPeoplePart2Row3">
			<div class="searchPeopleTags" id="L3">
			     <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_1"><label class="searchPeopleTag">前台脚本语言</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_1"><label class="searchPeopleTag">前台界面编辑</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_1"><label class="searchPeopleTag">UI设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_2"><label class="searchPeopleTag">后台脚本语言</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_2"><label class="searchPeopleTag">网站维护</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_2"><label class="searchPeopleTag">服务器搭建</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_3"><label class="searchPeopleTag">MySQL</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_3"><label class="searchPeopleTag">Oracle</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_4"><label class="searchPeopleTag">Delphi</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_4"><label class="searchPeopleTag">VisualStudio</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_4"><label class="searchPeopleTag">QtCreator</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_5"><label class="searchPeopleTag">IOS开发</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_5"><label class="searchPeopleTag">Andriod开发</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_5"><label class="searchPeopleTag">WindowsPhone开发</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_6"><label class="searchPeopleTag">语音处理算法</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_6"><label class="searchPeopleTag">图像处理算法</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_6"><label class="searchPeopleTag">视频处理算法</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_6"><label class="searchPeopleTag">DSP基础算法</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_7"><label class="searchPeopleTag">ARM嵌入式系统设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_7"><label class="searchPeopleTag">51单片机</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_7"><label class="searchPeopleTag">STM32单片机</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_7"><label class="searchPeopleTag">MSP430</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_8"><label class="searchPeopleTag">高速PCB设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_8"><label class="searchPeopleTag">PCB设计基础</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_9"><label class="searchPeopleTag">模拟电路设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_1_9"><label class="searchPeopleTag">数字逻辑电路设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_1"><label class="searchPeopleTag">生态系统</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_2"><label class="searchPeopleTag">人类DNA</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_2"><label class="searchPeopleTag">动植物DNA</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_3"><label class="searchPeopleTag">生物习性</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_4"><label class="searchPeopleTag">细胞学</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_5"><label class="searchPeopleTag">饮食健康</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_2_6"><label class="searchPeopleTag">营养学</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_1"><label class="searchPeopleTag">PhotoShop</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_3"><label class="searchPeopleTag">3D建模</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_2"><label class="searchPeopleTag">视频剪辑</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_2"><label class="searchPeopleTag">Flash</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_3"><label class="searchPeopleTag">3D-Max</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_3_3"><label class="searchPeopleTag">时装设计</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_4"><label class="searchPeopleTag">拉丁舞</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_4"><label class="searchPeopleTag">机械舞</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_3"><label class="searchPeopleTag">美声</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_3"><label class="searchPeopleTag">合唱</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_2"><label class="searchPeopleTag">小提琴</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_2"><label class="searchPeopleTag">大提琴</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_4"><label class="searchPeopleTag">小品</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_4"><label class="searchPeopleTag">现场主持</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_6"><label class="searchPeopleTag">书法</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_5"><label class="searchPeopleTag">素描</label>
	             <input type="checkbox" class="searchPeopleTag" data-cat="L1_4_5"><label class="searchPeopleTag">油彩</label>     
			</div>
		</div>
		<div class="searchPeoplePart2RowHead"><b>其他条件:</b></div>
		<div class="searchPeoplePart2Row" id="searchPeoplePart2Row4">
		</div>
		<div class="s-title">
			<p class="tagPosition"><b>当前已选的筛选条件：</b></p>
			<div class="selectedTags">

			 <!-- <div class="selectedTag" title="点击删除该条件">Delphi  ×</div> -->
			</div>
		</div>

	</div>
	</form>
	

</body>
</html>