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
  <script>
  	var getDataURL = '/webprj/ecnu_mind/index.php/Home/Comp/getCompItem';
  </script>
  
</head>

<body style="background-color: #fff">
  <div id="custom-toolbar"  style="width:750px;">
  	<button type="button" class="btn btn-primary" id='btn_addComp' style="float:right">发起新的比赛</button>
  </div>
  <div style="margin:10px 15px 15px;">
    <div id="filter-bar"> </div>
    <table id="comp-table" 
           data-url="/webprj/ecnu_mind/index.php/Admin/CompControl/getCompInfo"
           data-toolbar="#custom-toolbar" 
           data-show-toggle="true" 
           data-search="true"           
           data-show-filter="true"
           data-striped="true"
           data-sort-name="apply_state" 
           data-sort-order="desc">
      <thead>
        <tr>
          <th data-field="comp_importance" data-width="100" data-align="left" data-sortable="true" data-sorter="starSorter">竞赛评级</th>
          <th data-field="comp_name" data-width="400" data-align="left">竞赛名称</th>
          <th data-field="comp_field" data-width="100" data-align="left">竞赛类型</th>
          <th data-field="comp_template" data-width="100" data-align="left">报名预览</th>
          <th data-field="apply_date" data-width="200" data-align="left">报名起止日期</th>
          <th data-field="apply_state" data-width="100" data-align="left">报名状态</th>
          <th data-field="apply_editor" data-width="100" data-align="center">修改竞赛</th>
        </tr>
      </thead>
    </table>
  </div>
  <script src="/webprj/ecnu_mind/Public/js/Comp/Comp.js"></script>
</body>

</html>