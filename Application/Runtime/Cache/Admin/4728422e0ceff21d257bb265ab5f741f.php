<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="Stylesheet" type="text/css" href="/Eclipse_For_PHP/ecnu_mind/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/Eclipse_For_PHP/ecnu_mind/Public/css/bootstrap/bootstrap-table.css" />
  <link rel="Stylesheet" type="text/css" href="/Eclipse_For_PHP/ecnu_mind/Public/css/bootstrap/bootstrap-table-filter.css" />
  
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/bootstrap.min.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/bootstrap-table-filter.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/ext/bs-table.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/bootstrap-table.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/ext/plugin-bs-table.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jslib/bootstrap/ext/bootstrap-table-zh-CN.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jsLib/bootstrap/ext/tableExport.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jsLib/bootstrap/ext/html2canvas.js"></script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/jsLib/bootstrap/ext/exportPlugin.js"></script>
  <script>
	var admin = "<?php echo ($admin_access); ?>";
  </script>
  
</head>

<body style="background-color: #fff">
  <div id="custom-toolbar"  style="width:auto;">
  	<div class="btn-group" style="float:left;margin-right:15px;">
	   <button type="button" class="btn btn-default dropdown-toggle" 
	      data-toggle="dropdown">
	      对勾选项目进行审批<span class="caret"></span>
	   </button>
	   <ul class="dropdown-menu" role="menu">
	      <li><a href="#">通过</a></li>
	      <li><a href="#">未通过</a></li>
	   </ul>
	</div>	<!-- btn-group 的/div -->
	
	<div style="float:left">
	   <form class="bs-example bs-example-form" role="form">
	      <div class="row" style='width:500px'>
	         <div class="col-lg-6">
	            <div class="input-group">
	               <input type="text" class="form-control">
	               <span class="input-group-btn">
	                  <button class="btn btn-default" type="button">
	                                 对勾选项目更新获奖信息
	                  </button>
	               </span>
	            </div><!-- /input-group -->
	         </div><!-- /.col-lg-6 -->
	      </div><!-- /.row -->
	   </form>
	</div>
  </div>
  <div style="margin:10px 15px 15px;">
    <div id="filter-bar"> </div>
    <table id="comp-table" 
           data-url="/Eclipse_For_PHP/ecnu_mind/index.php/Admin/CurrentComp/showAllCurrentItem"
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
        </tr>
      </thead>
    </table>
  </div>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/js/Admin/CurrentItem.js"></script>
</body>

</html>