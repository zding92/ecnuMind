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
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/jquery.base64.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/html2canvas.js"></script>
  
</head>

<body style="background-color: #fff">
  <div id="custom-toolbar">
  	<button class="btn btn-default dropdown-toggle"  type="button" onClick ="$('#comp-table').tableExport({type:'excel', escape:'false'});">
  		<i class="glyphicon glyphicon-export icon-share"></i> 
  	</button>
  </div>
  <div style="margin:10px 15px 15px;">
  	<!-- <a href="#" onClick ="$('#comp-table').tableExport({type:'excel', escape:'false'});" id="buttonExportData" class="ui-btn ui-btn-inline ui-mini ui-shadow ui-corner-all">Export XLS</a> -->
    <div id="filter-bar"> </div>
    <table id="comp-table" 
           
           data-toolbar="#filter-bar" 
           data-show-toggle="true" 
           data-search="true"           
           data-show-filter="true"
           data-striped="true"
           data-sort-name="apply_state" 
           data-sort-order="desc"
           data-pagination="true"
           data-toolbar="#custom-toolbar">
      <thead>
        <tr>
          <th data-field="comp_importance" data-width="100" data-align="left" data-sortable="true" data-sorter="starSorter" >竞赛名称</th>
          <th data-field="comp_name" data-width="400" data-align="left">项目名称</th>
          <th data-field="comp_field" data-width="100" data-align="left" data-sortable="true">完成时间</th>
          <th data-field="comp_template" data-width="100" data-align="left">第一作者</th>
          <th data-field="apply_date" data-width="200" data-align="center">申报院系</th>
          <th data-field="apply_date" data-width="200" data-align="center">获奖情况</th>
          <th data-field="apply_date" data-width="50" data-align="center">详细查看</th>
          
        </tr>
      </thead>
    </table>
  </div>
  
  <script src="/webprj/ecnu_mind/Public/js/Comp/Comp.js"></script>
</body>

</html>