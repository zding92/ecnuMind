<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/webprj/ecnu_mind/Public/css/abilityPopout.css" rel="stylesheet">
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
          </div>
          <div class="ability_head"><p>选择方向</p></div> 
          <div id="L2" class="ability_box">
            <div class="tags_1 hvr-radial-out active" id="L2_all">全部</div>
          </div>
          <div class="ability_head"><p>选择能力</p></div> 
          <form>
            <div id="L3" class="ability_box">
            </div>
           </form> 
           
          <div class="theme-popover"> <!-- 此DIV为弹出窗口 -->
		  	<div class="popoutLine1">
		  		<p class="popoutAblityName">高速PCB设计</p>
		  		<img src="/webprj/ecnu_mind/Public/img/popout/popoutLine1Right.png" alt="error">
		  		<div class="popoutLine1Right"> 
		  			<div class="popoutLine1Text">
			  			<div class="close popoutLine1Save">保存</div> |
			  			<div class="close popoutLine1Cancel">取消</div>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="popoutLine2">
		  		<div class="popoutLine2Line1">
		  			<b>668人</b>会这项能力
		  		</div>
		  		<div class="popoutLine2Line2">
		  			能力相关技术：<b>通信工程、电子工程、数字电路</b>
		  		</div>
		  	</div>
		  	<div class="popoutLine3">
		  		<div class="popoutLine3Green">
		  			<div class="popoutLine3GreenText line3GreenUnselected">√</div>
		  		</div>
		  		<div class="popoutLine3Red">
		  			<div class="popoutLine3RedText line3Selected line3RedSelected"><b>目前未掌握</b>（若已掌握该能力，请点击绿色按钮）</div>
		  		</div>
		  		
		  	</div>
		  	<div class="popoutLine4">
		  		<div class="abilityDetailHead">
		  			<img src="/webprj/ecnu_mind/Public/img/popout/abilityDetailHead.png" alt="error">
		  			<h1>能力详细说明</h1>
		  		</div>
		  		<div class="abilityDetailContainer" style="z-index:99">
			  		<div class="abilityDetailCover">
			  			<img src="/webprj/ecnu_mind/Public/img/popout/abilityDetailCover.png" alt="error">	
			  			<h1>点击以编辑此能力的详细说明</h1>	  			
			  		</div>
			  		<form>
			  			 <textarea class="abilityDetail" id="abilityDetail" placeholder="在此添加经历或认证，进一步说明此项能力"></textarea>
			  		</form>
		  		</div>

		  	</div>
		  </div>
          <div class="theme-popover-mask"></div>  <!-- 此DIV为弹出窗口之下的遮罩 -->
          
		  <!-- <script src="/webprj/ecnu_mind/Public/js/home/abilitySave.js"></script>
          <script src="/webprj/ecnu_mind/Public/js/home/abilityStar.js"></script> -->
          <script src="/webprj/ecnu_mind/Public/js/home/ability.js"></script>
          <script type="text/javascript">
          	InitAbilityChooser();
          </script>
	</body>
</html>