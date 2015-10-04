<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/webprj/ecnu_mind/Public/css/abilityPopout.css" rel="stylesheet">
	<script src="/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/jquery.raty.js"></script>
	<script src="/webprj/ecnu_mind/Public/js/home/InitAbilityChooser.js"></script>
    <script src="/webprj/ecnu_mind/Public/js/home/abilityNew.js"></script>
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
          <div class="ability_head">
	          <p>选择能力</p>
	          <div class="newAbilityDiv">
				  <div class="newAbilityHintDiv">
				  	  <p class="newAbilityHint">点击此处添加自定义能力→</p>
				  </div>
				  <div class="newAbilityIconDiv">
			          <img class="newAbilityIcon" src="/webprj/ecnu_mind/Public/img/newAbility.png">
		          </div>
	          </div>
          </div>
          <form>
            <div id="L3" class="ability_box">
            </div>
          </form>
          
           <!-- 此DIV为个人能力弹出窗口 -->
          <div class="theme-popover"> 
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

          <!-- 此div为自定义能力窗口 -->
          <div class="new-popover">
		  	<div class="addAbilityPopLine1">
		  		<p class="popoutAblityName">添加自定义能力</p>
		  		<img src="/webprj/ecnu_mind/Public/img/popout/popoutLine1Right.png" alt="error">
		  		<div class="popoutLine1Right"> 
		  			<div class="popoutLine1Text">
			  			<div class="close popoutLine1Save">保存</div> |
			  			<div class="close popoutLine1Cancel">取消</div>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="addAbilityPopLine2">
				<div class='addAbilityPopSelectDiv'>
					<div class='addAbilityPopSelectDiv1'>
						领域：<select id="cmbProvince"></select>
					</div>
					<div class='addAbilityPopSelectDiv2'>
						方向：<select id="cmbCity"></select>
					</div>
					  <select id="cmbArea" style="display:none"></select>
				</div>
		  	</div>
		  	<div class="addAbilityPopLine3">
		  		<div class="addAbilityName">
			  		<label class="addAbilityNameFont">
			  		能力：<input type="text" placeholder="请输入你要添加的能力"/>
			  		</label>
		  		</div>
		  	</div>
		  	<div class="addAbilityPopLine4">
		  		<div class="abilityDetailHead">
		  			<div class="abilityDetailHeadImg">
			  			<img src="/webprj/ecnu_mind/Public/img/popout/abilityDetailHead.png" alt="error">
		  			</div>
		  			<div class="abilityDetailHeadText">
			  			<h1>能力详细说明</h1>
		  			</div>
		  		</div>
		  		<div class="abilityDetailContainer" style="z-index:99">
			  		<form>
			  			 <textarea class="abilityDetail" id="abilityDetail" placeholder="在此添加经历或认证，进一步说明此项能力"></textarea>
			  		</form>
		  		</div>
		  	</div>
		  </div>
  		<script type="text/javascript"> ability(); </script>
  		<script type="text/javascript">
			addressInit('cmbProvince', 'cmbCity', 'cmbArea', '陕西', '宝鸡市', '金台区');
		</script>
	</body>
</html>