<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap-table.css" />
  <script src="/webprj/ecnu_mind/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap-table.js"></script>
</head>

<body style="background-color: #fff">
  <div style="margin:10px 15px 15px;">
    <table data-toggle="table" data-url="/webprj/ecnu_mind/Public/JSON/Comp.json" data-height="620" data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1">
      <thead>
        <tr>
          <th data-field="state" data-checkbox="true"></th>
          <th data-field="no" data-sortable="true">ID</th>
          <th data-field="name">竞赛名称</th>
          <th data-field="link">报名链接</th>
          <th data-field="status">报名状态</th>
        </tr>
      </thead>
    </table>
  </div>
</body>

</html>