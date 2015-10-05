<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap-table.css" />
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/bootstrap/bootstrap-table-filter.css" />
  <link rel="stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/dateRangerPicker/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" media="all" href="/webprj/ecnu_mind/Public/jsLib/dateRangerPicker/daterangepicker-bs3.css"/>
  <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.css"/>
  
  <script src="/webprj/ecnu_mind/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap.min.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap-table-filter.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/bs-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/bootstrap-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/plugin-bs-table.js"></script>
  <script src="/webprj/ecnu_mind/Public/jslib/bootstrap/ext/bootstrap-table-zh-CN.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/dateRangerPicker/moment.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/dateRangerPicker/daterangepicker.js"></script>
  <script src="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.js"></script>

  <script>
  	var getDataURL = '/webprj/ecnu_mind/index.php/Home/Comp/getCompItem';
  </script>
  <script>
  	var addCompURL = '/webprj/ecnu_mind/index.php/Admin/CompControl/addComp'
  </script>

  <!-- 
   -->
</head>

<body style="background-color: #fff">

  <div id="custom-toolbar"  style="width:750px;">
  	<button type="button" class="btn btn-primary" id='btn_addComp' style="float:right"
  			data-toggle="modal" data-target="#addCompModal">发起新的比赛</button>
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
          <th data-field="apply_date" data-width="230" data-align="left">报名起止日期</th>
          <th data-field="apply_state" data-width="70" data-align="left">报名状态</th>
          <th data-field="apply_editor" data-width="100" data-align="center">修改竞赛</th>
        </tr>
      </thead>
    </table>
  </div>
	 <!-- 模态框（prizeModal） -->
	<div class="modal fade" id="addCompModal" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" 
	               aria-hidden="true">×
	            </button>
	            <h4 class="modal-title" id="myModalLabel">
	              	添加新的比赛
	            </h4>
	         </div>
	         <div class="modal-body">
           	   <form class="bs-example bs-example-form" role="form" id="addCompForm">
			      <div class="input-group">
			         <span class="input-group-addon">比赛名称</span>
			         <input type="text" class="form-control comp_name" name="comp_name" placeholder="填写比赛名称">
			      </div>
			      <br>
			      <div class="input-group">
			         <span class="input-group-addon">主办方</span>
			         <input type="text" class="form-control comp_sponsor" name="comp_sponsor" placeholder="填写比赛主办方">
			      </div>
			      <br>
			      <div class="row">
				      <div class='col-xs-6'>
					      <label for="comp_field">选择比赛类型</label>
					      <select class="form-control" id="comp_field" name="comp_field">
					         <option>创业赛</option>
					         <option>科技赛</option>
					         <option>专业赛</option>
					      </select>	
					  </div>
					  <div class='col-xs-6'>
					      <label for="comp_importance">选择比赛等级</label>
					      <select class="form-control" name="comp_importance" id="comp_importance">
					         <option>★★★★★</option>
					         <option>★★★★☆</option>
					         <option>★★★☆</option>
					         <option>★★★</option>
					         <option>★★☆</option>
					         <option>★★</option>
					         <option>★☆</option>
					         <option>★</option>
					         <option>☆</option>   
					      </select>	
					  </div>
				   </div>
				   <br>
				   <div class="row">
				      <div class='col-xs-9'>
						<div class="input-group">
				         <span class="input-group-addon">竞赛起止时间</span>
				         <input type="text" class="form-control" id="compDate" name="compDate"value="2015-10-01-2015-10-10">
				        </div>
					  </div>
				   </div>
				   <br>
				   <div class="row">
				      <div class='col-xs-9'>
						<div class="input-group">
				         <span class="input-group-addon">竞赛报名起止时间</span>
				         <input type="text" class="form-control" id="compApplyDate" name="compApplyDate"value="2015-10-01-2015-10-10">
				        </div>
					  </div>
				   </div>
				   <br>
				   <label for="comp_template">选择比赛模板</label>
				      <select class="form-control" name="comp_template" id="comp_template">
				         <option>无</option>
				         <option>挑战杯</option>
				         <option>大夏科赛</option>
				         <option>大夏创赛</option>
				      </select>
				   <br>
				   <div class="input-group">
			         <span class="input-group-addon">竞赛外网报名链接</span>
			         <input type="text" class="form-control" name="comp_official_website" placeholder="竞赛外网报名链接">
			      </div>
			   </form>
	         </div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" 
	               data-dismiss="modal">关闭
	            </button>
	            <button type="button" class="btn btn-primary" id='addCompConfirm'>
	               	添加比赛
	            </button>
	         </div>
	      </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
	   	<div class='messagePopOut' style='display:none;z-index:99;'>
         	<div class='messagePopText'>
         		
         	</div>
         	<div class='messagePopButton' id="btn_success">
         		OK
         	</div>        	
    	</div>	
	</div><!-- /.modal -->

	<script type="text/javascript">
       $(document).ready(function() {
          $('#compDate,#compApplyDate').daterangepicker(
			{format: 'YYYY-MM-DD'}, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });
       });
   </script>
  <script src="/webprj/ecnu_mind/Public/js/Admin/CompControl.js"></script>

</body>

</html>