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
  
</head>

<body style="background-color: #fff">
  <div style="margin:10px 15px 15px;">
    <div id="filter-bar"> </div>
    <table id="comp-table" 
           data-toolbar="#filter-bar" 
           data-show-toggle="true" 
           data-search="true"           
           data-show-filter="true"
           data-striped="true"
           data-sort-name="apply_state" 
           data-sort-order="desc">
      <thead>
        <tr>
          <th data-field="comp_name" data-width="200" data-align="left" data-sortable="true">竞赛名称</th>
          <th data-field="comp_item_name" data-width="450" data-align="left">题目</th>
          <th data-field="apply_date" data-width="100" data-align="left" data-sortable="true">报名时间</th>
          <th data-field="comp_state" data-width="100" data-align="left" data-sortable="true">当前状态</th>
          <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">操作</th>
        </tr>
      </thead>
    </table>
  </div>
  <script type="text/javascript">var dataUrl = '/Eclipse_For_PHP/ecnu_mind/index.php/Custom/Comp/getCompItem';</script>
  <script src="/Eclipse_For_PHP/ecnu_mind/Public/js/Comp/myComp.js"></script>
</body>

</html>