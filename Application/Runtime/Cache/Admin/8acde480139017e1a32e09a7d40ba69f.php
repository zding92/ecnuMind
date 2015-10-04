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
  <script src="/webprj/ecnu_mind/Public/jsLib/bootstrap/ext/exportPlugin.js"></script>
  
</head>

<body style="background-color: #fff">
  <div style="margin:10px 15px 15px;">
	<div id="filter-bar"> </div>
    <table id="comp-table" 
           data-url="/webprj/ecnu_mind/index.php/Admin/UserControl/showAllUser"
           data-toolbar="#filter-bar" 
           data-show-toggle="true" 
           data-search="true"           
           data-show-filter="true"
           data-striped="true"
           data-sort-name="apply_state" 
           data-sort-order="desc"
           data-pagination="true"
           data-toolbar="#custom-toolbar"
           data-show-export="true">
      <thead>
        <tr>
          <th data-field="name" data-width="100" data-align="left" data-sortable="true" data-sorter="starSorter" >姓名</th>
          <th data-field="student_id" data-width="200" data-align="left">学号</th>
          <th data-field="academy" data-width="200" data-align="left">学院</th>
          <th data-field="major" data-width="200" data-align="left">专业</th>
          <th data-field="phone" data-width="200" data-align="left">手机</th>
          <th data-field="email" data-width="200" data-align="left">邮箱</th>
          <th data-field="detail" data-width="50" data-align="left">详细查看</th>
          <th data-field="user_id" data-width="50" data-align="left">user_id</th>
          
        </tr>
      </thead>
    </table>
  </div>
  
  <script src="/webprj/ecnu_mind/Public/js/Admin/UserControl.js"></script>
</body>

</html>