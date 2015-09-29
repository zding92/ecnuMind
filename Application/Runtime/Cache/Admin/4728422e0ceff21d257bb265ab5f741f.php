<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap-table.css" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap-table-filter.css" />
  
  <script src="/webprj/ecnu_mind/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap-table-filter.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/bs-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/plugin-bs-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/bootstrap-table-zh-CN.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/tableExport.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/html2canvas.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/exportPlugin.js"></script>
  <script>
	var admin = "<?php echo ($admin_access); ?>";
  </script>
  
</head>

<body style="background-color: #fff">
  <div id="custom-toolbar"  style="width:650px;">
  	<div class="btn-group" style="float:right;margin-right:5px;">
	   <button type="button" class="btn btn-default dropdown-toggle" 
	      data-toggle="dropdown">
	      对勾选项目进行审批<span class="caret"></span>
	   </button>
	   <ul class="dropdown-menu" role="menu">
	      <li><a href="#" data-toggle="modal" data-target="#judgeModal">通过</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#judgeModal">未通过</a></li>
	   </ul>
	</div>	<!-- btn-group 的/div -->
	
  	<div class="btn-group" style="float:right;margin-right:10px;">
	   <button type="button" class="btn btn-default dropdown-toggle" 
	      data-toggle="dropdown">
	      对勾选项目填写获奖情况<span class="caret"></span>
	   </button>
	   <ul class="dropdown-menu" role="menu">
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">全国一等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">全国二等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">全国三等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">省市一等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">省市二等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">省市三等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">校级一等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">校级二等奖</a></li>
	      <li><a href="#" data-toggle="modal" data-target="#prizeModal">校级三等奖</a></li>
	      
	   </ul>
	</div>	<!-- btn-group 的/div -->
  </div>
  <div style="margin:10px 15px 15px;">
    <div id="filter-bar"> </div>
    <table id="comp-table" 
           data-url="/webprj/ecnu_mind/index.php/Admin/CurrentComp/showAllCurrentItem"
           data-toolbar="#custom-toolbar"
           data-show-toggle="true" 
           data-search="true"           
           data-show-filter="true"
           data-striped="true"
           data-sort-name="apply_state"
           data-click-to-select="true" 
           data-sort-order="desc"
           data-show-export="true"
    	   >           
      <thead>
        <tr>
          <th data-field="state" data-checkbox="true"></th>
          <th data-field="comp_name" data-width="250" data-align="left" data-sortable="true" data-sorter="starSorter" >竞赛名称</th>
          <th data-field="comp_item_name" data-width="350" data-align="left">项目名称</th>
          <th data-field="comp_date" data-width="120" data-align="center" data-sortable="true">申报时间</th>
          <th data-field="comp_author1" data-width="80" data-align="left">第一作者</th>
          <th data-field="apply_department" data-width="200" data-align="center">申报院系</th>
          <th data-field="comp_state" data-width="100" data-align="center">审批情况</th>
          <th data-field="apply_detail" data-width="30" data-align="center">详细查看</th>
          <th data-field="comp_item_id" data-width="30" data-align="center">comp_item_id</th>
          <th data-field="comp_type_id" data-width="30" data-align="center">comp_type_id</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- 模态框（judgeModal） -->
	<div class="modal fade" id="judgeModal" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" 
	               aria-hidden="true">×
	            </button>
	            <h4 class="modal-title" id="myModalLabel">
	              	提示
	            </h4>
	         </div>
	         <div class="modal-body">
	            您确定进行此审批操作么？
	         </div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" 
	               data-dismiss="modal">关闭
	            </button>
	            <button type="button" class="btn btn-primary" id='judgeConfirm'>
	               提交更改
	            </button>
	         </div>
	      </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <!-- 模态框（prizeModal） -->
	<div class="modal fade" id="prizeModal" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" 
	               aria-hidden="true">×
	            </button>
	            <h4 class="modal-title" id="myModalLabel">
	              	提示
	            </h4>
	         </div>
	         <div class="modal-body">
	            您确定进行此获奖提交的操作么？
	         </div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" 
	               data-dismiss="modal">关闭
	            </button>
	            <button type="button" class="btn btn-primary" id='prizeConfirm'>
	               提交更改
	            </button>
	         </div>
	      </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <script src="/webprj/ecnu_mind/Public/js/Admin/CurrentItem.js"></script>
</body>

</html>