<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/jquery.raty.js"></script>
    <script src="/webprj/ecnu_mind/Public/js/home/InitAbilityChooser.js"></script>
	<script>
		var starOnIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-on.png"
		var starOffIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-off.png"
		var starHalfIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-half.png"
		var selfCommentJSON = '/webprj/ecnu_mind/Public/JSON/selfComment.dat';
	</script>
</head>
<body>
		  <div class="title_box">个人能力编辑</div>
          <div class="ability_head"><p>选择领域</p></div>  
          <div id="L1" class="ability_box">
            <div class="tags hvr-radial-out active" id="L1_all">全部</div>
            <div class="tags hvr-radial-out" id="L1_1">信息技术</div>
            <div class="tags hvr-radial-out" id="L1_2">生物医药</div>
            <div class="tags hvr-radial-out" id="L1_3">设计</div>
            <div class="tags hvr-radial-out" id="L1_4">艺术</div>
            <div id="index" class="filter" style="display:none"></div>
          </div>
          <div class="ability_head"><p>选择方向</p></div> 
          <div id="L2" class="ability_box">
            <div class="tags_1 hvr-radial-out active" id="L2_all">全部</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">Web前台</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">Web后台</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">数据库</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">桌面平台</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">移动平台</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">DSP技术</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">嵌入式</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">PCB设计</div>
            <div class="tags_1 L1_1 hvr-radial-out" data-cat="L1_1">电路设计</div>
            <div class="tags_1 L1_2 hvr-radial-out" data-cat="L1_2">生态系统</div>
            <div class="tags_1 L1_2 hvr-radial-out" data-cat="L1_2">DNA研究</div>
            <div class="tags_1 L1_2 hvr-radial-out" data-cat="L1_2">生物习性</div>
            <div class="tags_1 L1_2 hvr-radial-out" data-cat="L1_2">细胞学</div>
            <div class="tags_1 L1_2 hvr-radial-out" data-cat="L1_2">人类健康</div>
            <div class="tags_1 L1_3 hvr-radial-out" data-cat="L1_3">平面设计</div>
            <div class="tags_1 L1_3 hvr-radial-out" data-cat="L1_3">动画设计</div>
            <div class="tags_1 L1_3 hvr-radial-out" data-cat="L1_3">立体设计</div>
            <div class="tags_1 L1_3 hvr-radial-out" data-cat="L1_3">服装设计</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">表演</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">演奏</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">演唱</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">舞蹈</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">绘画</div>
            <div class="tags_1 L1_4 hvr-radial-out" data-cat="L1_4">书法</div>
            <div id="index2" class="filter" style="display:none"></div>
          </div>
          <div class="ability_head"><p>选择能力</p></div> 
          <form>
            <div id="L3" class="ability_box">
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_1"><label>前台脚本语言</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_1"><label>前台界面编辑</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_1"><label>UI设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_2"><label>后台脚本语言</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_2"><label>网站维护</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_2"><label>服务器搭建</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_3"><label>MySQL</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_3"><label>Oracle</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_4"><label>Delphi</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_4"><label>VisualStudio</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_4"><label>QtCreator</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_5"><label>IOS开发</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_5"><label>Andriod开发</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_5"><label>WindowsPhone开发</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_6"><label>语音处理算法</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_6"><label>图像处理算法</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_6"><label>视频处理算法</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_6"><label>DSP基础算法</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_7"><label>ARM嵌入式系统设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_7"><label>51单片机</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_7"><label>STM32单片机</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_7"><label>MSP430</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_8"><label>高速PCB设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_8"><label>PCB设计基础</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_9"><label>模拟电路设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_1_9"><label>数字逻辑电路设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_1"><label>生态系统</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_2"><label>人类DNA</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_2"><label>动植物DNA</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_3"><label>生物习性</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_4"><label>细胞学</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_5"><label>饮食健康</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_2_6"><label>营养学</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_1"><label>PhotoShop</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_3"><label>3D建模</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_2"><label>视频剪辑</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_2"><label>Flash</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_3"><label>3D-Max</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_3_3"><label>时装设计</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_4"><label>拉丁舞</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_4"><label>机械舞</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_3"><label>美声</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_3"><label>合唱</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_2"><label>小提琴</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_2"><label>大提琴</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_4"><label>小品</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_4"><label>现场主持</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_6"><label>书法</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_5"><label>素描</label>
              <input type="checkbox" class="hvr-radial-out" data-cat="L1_4_5"><label>油彩</label>     
            </div>
            <div class="ability_head"><p>能力说明</p></div> 
            <div id="L4" class="ability_box">
              <!-- <input type="text" placeholder="可在此添加经历或认证，来进一步说明此项能力"> -->
              <div class="headAbilityDetail"></div>
              <textarea class="abilityDetail" id="abilityDetail" onfocus="if(value=='在此添加经历或认证，进一步说明此项能力'){value=''}"    
              			onblur="if (value ==''){value='在此添加经历或认证，进一步说明此项能力'}" disabled=true>在此添加经历或认证，进一步说明此项能力</textarea>
            </div>
            <div class="ability_head"><p>能力获评</p></div> 
            <div id="L5" class="ability_box">
            	<div class="abilityRemarkHead">在此查看能力获评</div>
            	<div class="abilityStar"></div>
            	<div class="abilityRemarkNum">在此查看能力获评次数</div>
            </div>
            <input type="button" value="保存" class="save_button abilitySave">
           </form>  
		  <script src="/webprj/ecnu_mind/Public/js/home/abilitySave.js"></script>
          <script src="/webprj/ecnu_mind/Public/js/home/abilityStar.js"></script>
          <script type="text/javascript">
          	InitAbilityChooser();
          </script>
	</body>
</html>