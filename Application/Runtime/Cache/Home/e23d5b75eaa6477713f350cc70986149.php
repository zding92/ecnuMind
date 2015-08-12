<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>挑战杯报名信息录入系统</title>
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/Tiaozhan.css" />
        <script>
        //返回作者用户的JSON数据地址
  			var tiaozhanJSON = '/webprj/ecnu_mind/Public/JSON/user.dat';
         //挑战杯数据写入数据库PHP相应地址
            var TiaozhanAddDataURL = '/webprj/ecnu_mind/index.php/Home/Tiaozhan/TiaozhanAddData'
  		</script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script> 
        <script src="/webprj/ecnu_mind/Public/js/Tiaozhan/tiaozhan.js"></script>
    </head>
    <body>
		<div class="homeHead">
			    <!-- <div id="logo">
				     <div id="logo_1">ECNU</div>
				     <div id="logo_2">华师</div>
				     <div id="logo_3">人才项目智库</div>
			    </div> -->
			    <div id="logo2">
					<a href="/webprj/ecnu_mind/index.php/Home/Home/home"><img alt="Logo" src="/webprj/ecnu_mind/Public/img/logo.png"></a>
			    </div>
			    
		</div>
        <div class="info_container">
            <h1 class="head">挑战杯报名信息录入系统</h1>         
            <div class="tiaozhan_nav">
                <div id="tiaozhan_nav1" class="tiaozhan_navon" onclick="ShowStep1()" onmouseover="OverColor(this)" onmouseout="Outcolor(this)"><p>第一步：项目基本信息</p></div>
                <div id="tiaozhan_nav2" class="tiaozhan_navoff" onclick="ShowStep2()" onmouseover="OverColor(this)" onmouseout="Outcolor(this)"><p>第二步：项目成员信息</p></div>
                <div id="tiaozhan_nav3" class="tiaozhan_navoff" onclick="ShowStep3()"onmouseover="OverColor(this)" onmouseout="Outcolor(this)"><p>第三步：项目具体信息</p></div>
            </div>
            <div id="step1" style="display: block">
                <div class="info_container_step1">
                    <form class="tiaozhan1_form">
                        <h1>作品全称：</h1>  
                        <input type="text" class="project_name" id="project_name" placeholder="请输入作品全称">
                        <br>
                        <br>
                        <h1>项目类型：</h1>
                        <input type="radio" class="radio_in" id="group_type1" name="group_type" value="A1" onclick="change_ratio_value(this.value)"><h2>个人作品A1</h2>
                        <input type="radio" class="radio_in" id="group_type2" name="group_type" value="A2" onclick="change_ratio_value(this.value)"><h2>集体作品A2</h2>
                        <br><br>
                        <h1>作品类型：</h1>
                        <select id="type_selector" onchange="Gettext()">
                          <option value="NULL" selected = "selected">请选择作品类型</option> 
                          <option value="B1">自然科学类学术论文B1</option>
                          <option value="B2">哲学社会科学类社会调查报告和学术论文B2</option>
                          <option value="B3">科技发明制作B3</option>
                        </select>
                       <!--<div id="dis"></div>--> 
                        <br>
                        <h1>作品类型细分：</h1>
                        <div id="B1">
                            <input type="radio" class="B_ratio" name="B_ratio" value="B1A"><h2>机械与控制</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B1B"><h2>信息技术</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B1C"><h2>数理</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B1D"><h2>生命科学</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B1E"><h2>能源化工</h2>
                        </div>
                        <div id="B2">
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2A"><h2>哲学</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2B"><h2>经济</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2C"><h2>社会</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2D"><h2>法律</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2E"><h2>教育</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B2F"><h2>管理</h2>
                        </div>
                        <div id="B3">
                            <input type="radio" class="B_ratio" name="B_ratio" value="B3A"><h2>机械与控制</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B3B"><h2>信息技术</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B3C"><h2>数理</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B3D"><h2>生命科学</h2>
                            <input type="radio" class="B_ratio" name="B_ratio" value="B3E"><h2>能源化工</h2>
                        </div>
                        <br>
                        <h1>推荐人情况：</h1>
                        
                        <h2>姓名</h2><input type="text" class="teacher_name" id="referee_name">
                        <br><br>
                        <h2>性别</h2>
                            <select class="referee_gender" id="referee_gender">
                                <option value="M">男</option>
                                <option value="F">女</option>
                            </select>
                        <h2>年龄</h2><input type="text" class="teacher_age" id="referee_age">
                        <br><br>
                        <h2>工作单位</h2><input type="text" class="teacher_job" id="referee_job">
                        <br><br>
                        <h2>通讯地址</h2><input type="text" class="teacher_add" id="referee_add">
                        <br><br>
                        <h2>邮政编码</h2><input type="text" class="teacher_zipcode" id="referee_zipcode">
                        <br><br>
                        <h2>单位电话</h2><input type="text" class="teacher_workphone" id="referee_workphone">
                        <h2>住宅电话</h2><input type="text" class="teacher_homephone" id="referee_homephone">
                        <br>
                        <input type="button" value="保存" class="save_button">
                        <input type="button" value="下一步" class="next_button" onclick="ShowStep2()"> 
                        
                    </form>
                </div>
                <br><br>
            </div>
            <div id="step2" style="display: none">
                <form class="tiaozhan2_form">
                    <h2>第一作者：</h2>
                    <br><br>
                    <h1>学号</h1><input type="text" class="author_num" id="author1_num" placeholder="请输入第一作者学号"><h2 id="author1_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                    <br><br>
                    <div id="author1_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author1_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author1_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author1_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author1_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author1_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author1_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author1_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author1_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author1_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author1_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author1_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author1_addr2">常住地通讯地址</h1>

                    </div>
                    
                    <hr/>                    
                    <h2>合作者1：</h2>
                    <br><br>
                    <h1>学号</h1><input type="text" class="author_num" id="author2_num" placeholder="请输入合作者1学号"><h2 id="author2_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                    <br><br>
                    <div id="author2_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author2_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author2_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author2_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author2_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author2_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author2_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author2_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author2_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author2_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author2_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author2_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author2_addr2">常住地通讯地址</h1>

                    </div>
                    <hr/>                    
                    <h2>合作者2：</h2>
                    <br><br>
                    <h1>学号</h1><input type="text" class="author_num" id="author3_num" placeholder="请输入合作者2学号"><h2 id="author3_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                    <br><br>
                    <div id="author3_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author3_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author3_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author3_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author3_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author3_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author3_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author3_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author3_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author3_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author3_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author3_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author3_addr2">常住地通讯地址</h1>

                    </div>
                    <div id="extra_partner">
                        <hr/>                    
                        <h2>合作者3：</h2>
                        <br><br>
                        <h1>学号</h1><input type="text" class="author_num" id="author4_num" placeholder="请输入合作者3学号"><h2 id="author4_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                        <br><br>
                        <div id="author4_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author4_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author4_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author4_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author4_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author4_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author4_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author4_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author4_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author4_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author4_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author4_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author4_addr2">常住地通讯地址</h1>

                    </div>
                        <hr/>                    
                        <h2>合作者4：</h2>
                        <br><br>
                        <h1>学号</h1><input type="text" class="author_num" id="author5_num" placeholder="请输入合作者4学号"><h2 id="author5_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                        <br><br>
                        <div id="author5_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author5_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author5_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author5_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author5_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author5_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author5_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author5_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author5_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author5_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author5_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author5_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author5_addr2">常住地通讯地址</h1>

                    </div>
                        <hr/>                    
                        <h2>合作者5：</h2>
                        <br><br>
                        <h1>学号</h1><input type="text" class="author_num" id="author6_num" placeholder="请输入合作者5学号"><h2 id="author6_num_check" style="color: #ff6a00;font-weight: 500;margin-left: 5px;"></h2>
                        <br><br>
                        <div id="author6_info" style="display: none;">
                            <h1>姓名:</h1><h1 class="author_name" id="author6_name">姓名</h1>
                            <h1>性别:</h1><h1 class="author_gender" id="author6_gender">性别</h1>
                            <h1>学历:</h1><h1 class="author_degree" id="author6_degree">本科</h1>
                            <h1>年级:</h1><h1 class="author_grade" id="author6_grade">学历</h1>
                            <br><br>
                            <h1>系别:</h1><h1 class="author_college" id="author6_college">系别</h1>
                            <h1>专业:</h1><h1 class="author_major" id="author6_major">专业</h1>
                            <h1>学制:</h1><h1 class="author_year" id="author6_year">学制</h1><br><br>
                            <h1>校区:</h1><h1 class="author_campus" id="author6_campus">校区</h1>
                            <br><br>
                            <h1>手机号码:</h1><h1 class="author_mobile" id="author6_mobile">手机号码</h1>
                            <h1>住宅号码:</h1><h1 class="author_phone" id="author6_phone">住宅号码</h1>
                            <br><br>
                            <h1>通讯地址:</h1><h1 class="author_addr1" id="author6_addr1">通讯地址</h1>
                            <br><br>
                            <h1>常住地通讯地址:</h1><h1 class="author_addr2" id="author6_addr2">常住地通讯地址</h1>

                    </div>
                        </div>
                        <hr/>                    
                        <h2>指导教师：</h2>
                        <br>
                        <h1>姓名</h1><input type="text" class="teacher_name" id="teacher_name"> 
                        <h1>性别</h1>
                            <select class="teacher_gender" id="teacher_gender">
                                <option value="M">男</option>
                                <option value="F">女</option>
                            </select>
                        <h1>年龄</h1><input type="text" class="teacher_age" id="teacher_age">
                        <br><br>
                        <h1>工作单位</h1><input type="text" class="teacher_job" id="teacher_job">
                        <br><br>
                        <h1>通讯地址</h1><input type="text" class="teacher_add" id="teacher_add">
                        <br><br>
                        <h1>邮政编码</h1><input type="text" class="teacher_zipcode" id="teacher_zipcode">
                        <br><br>
                        <h1>单位电话</h1><input type="text" class="teacher_workphone" id="teacher_workphone">
                        <h1>住宅电话</h1><input type="text" class="teacher_homephone" id="teacher_homephone">
                        <br><br>
                        <h1>本作品是否为课外学术科技或社会实践活动成果</h1>
                            <select class="practice_type" id="practice_type">
                                <option value="1">是</option>
                                <option value="0">否</option>
                            </select>
                        <br><br>
                        <input type="button" value="上一步" class="pre_button2" onclick="ShowStep1()">
                        <input type="button" value="保存" class="save_button" >
                        <input type="button" value="下一步" class="next_button2" onclick="ShowStep3()">
                        <br><br>
                    
                </form>

            </div>
            <div id="step3" style="display: none">                
               <form id="B1_form">
                    <br><br><br><br>
                    <h1>作品全称：</h1>  
                        <input type="text" class="project_name_B1" id="project_name_B1"placeholder="请输入作品全称"> 
                    <br><br>
                   <!--
                    <h1>作品分类：</h1> 
                            <br><br>
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B1" value="B1A"><h2>机械与控制（包括机械、仪器仪表、自动化控制、工程、交通、建筑等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B1" value="B1B"><h2>信息技术（包括计算机、电信、通讯、电子等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B1" value="B1C"><h2>数理(包括数学、物理、地球与空间科学等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B1" value="B1D"><h2>生命科学（包括生物、农学、药学、医学、健康、卫生、食品等）</h2>
                            <br><br>         
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B1" value="B1E"><h2>能源化工（包括能源、材料、石油、化学、化工、生态、环保等）</h2>
                   <br>-->
                   <hr/> 
                   <br>
                   <h1>作品撰写的目的和基本思路:</h1><br><br><textarea class="B1_form" id="B1_form_2"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品的科学性、先进性及独特之处:</h1><br><br><textarea class="B1_form" id="B1_form_3"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品的实际应用价值和现实意义:</h1><br><br><textarea class="B1_form" id="B1_form_4"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>学术论文文摘:</h1><br><br><textarea class="B1_form" id="B1_form_5"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品在何时、何地、何种机构举行的会议上或报刊上发表及所获奖励:</h1><br><br><textarea class="B1_form" id="B1_form_6"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>鉴定结果:</h1><br><br><textarea class="B1_form" id="B1_form_7"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>请提供对于理解、审查、评价所申报作品具有参考价值的现有技术及技术文献的检索目录:</h1><br><br><textarea class="B1_form" id="B1_form_8"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>申报材料清单（申报论文一篇，相关资料名称及数量）:</h1><br><br><textarea class="B1_form" id="B1_form_9"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>当前国内外同类课题研究水平概述:</h1><br><br><textarea class="B1_form" id="B1_form_10"></textarea>
                   <br><br>
                   <input type="button" value="上一步" class="pre_button2" onclick="ShowStep2()">
                   <input type="button" value="保存" class="save_button">
                   <input type="button" value="提交" class="next_button2">
               </form>
                
               <form id="B2_form">
                    <br><br><br><br>
                    <h1>作品全称：</h1>  
                        <input type="text" class="project_name_B2" id="project_name_B2" placeholder="请输入作品全称"> 
                    <br><br>
                    <!--<h1>作品分类：</h1> 
                            <br><br>
                            <input type="radio" class="B_ratio_B2" name="B_ratio_B2" value="B2A"><h2>哲学</h2>
                            
                            <input type="radio" class="B_ratio_B2" name="B_ratio_B2" value="B2B"><h2>经济</h2>
                            
                            <input type="radio" class="B_ratio_B2" name="B_ratio_B2" value="B2C"><h2>社会</h2>
                           
                            <input type="radio" class="B_ratio_B2" name="B_ratio_B2" value="B2D"><h2>法律</h2>
                                    
                            <input type="radio" class="B_ratio_B2" name="B_ratio_B2" value="B2E"><h2>教育</h2>
                            
                            <input type="radio" class="B_ratio_B1" name="B_ratio_B2" value="B2F"><h2>管理</h2>
                   <br><br>-->
                   <hr/> 
                   <br>
                   <h1>作品撰写的目的和基本思路:</h1><br><br><textarea class="B2_form" id="B2_form_3"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品的科学性、先进性及独特之处:</h1><br><br><textarea class="B2_form" id="B2_form_4"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品的实际应用价值和现实指导意义:</h1><br><br><textarea class="B2_form" id="B2_form_5"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品摘要:</h1><br><br><textarea class="B2_form" id="B2_form_6"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>作品在何时、何地、何种机构举行的会议或报刊上发表登载、所获奖励及评定结果:</h1><br><br><textarea class="B2_form" id="B2_form_7"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>请提供对于理解、审查、评价所申报作品，具有参考价值的现有对比数据及作品中资料来源的检索目录:</h1><br><br><textarea class="B2_form" id="B2_form_8"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>调查方式:</h1><br><br>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check1"><h2>走访</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check2"><h2>问卷</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check3"><h2>现场采访</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check4"><h2>人员介绍</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check5"><h2>个别交谈</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check6"><h2>亲临实践</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check7"><h2>会议</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check8"><h2>图片、照片</h2><br>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check9"><h2>书报刊物</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check10"><h2>统计报表</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check11"><h2>影视资料</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check12"><h2>文件</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check13"><h2>集体组织</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check14"><h2>自发</h2>
                        <input type="checkbox" class="B2_type_check" id="B2_type_check15"><h2>其它</h2>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>主要调查单位及调查数量:</h1><br><h1>按照以下格式：______省(市)_______县（区）_______乡（镇）________村（街）单位_______________邮编_________姓名_____电话_______调查单位_________个_______人次</h1><br><br><textarea class="B2_form" id="B2_form_10"></textarea>
                   <br><br>
                   <hr/> 
                   <br>
                   <h1>当前国内外同类课题研究水平概述:</h1><br><br><textarea class="B2_form" id="B2_form_11"></textarea>
                   <br><br>
                   <input type="button" value="上一步" class="pre_button2" onclick="ShowStep2()">
                   <input type="button" value="保存" class="save_button">
                   <input type="button" value="提交" class="next_button2">                        
               </form>
               <form id="B3_form">
                     <br><br><br><br>              
                     <h1>作品全称：</h1>  
                        <input type="text" class="project_name_B3" id="project_name_B3" placeholder="请输入作品全称"> 
                    <br><br>
                    <!--<h1>作品分类：</h1> 
                            <br><br>
                            <input type="radio" class="B_ratio_B3" name="B_ratio_B3" value="B3A"><h2>机械与控制（包括机械、仪器仪表、自动化控制、工程、交通、建筑等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B3" name="B_ratio_B3" value="B3B"><h2>信息技术（包括计算机、电信、通讯、电子等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B3" name="B_ratio_B3" value="B3C"><h2>数理(包括数学、物理、地球与空间科学等）</h2>
                            <br><br>
                            <input type="radio" class="B_ratio_B3" name="B_ratio_B3" value="B3D"><h2>生命科学（包括生物、农学、药学、医学、健康、卫生、食品等）</h2>
                            <br><br>         
                            <input type="radio" class="B_ratio_B3" name="B_ratio_B3" value="B3E"><h2>能源化工（包括能源、材料、石油、化学、化工、生态、环保等）</h2>
                   <br>-->
                   <hr/>
                   <br>
                   <h1>作品设计、发明的目的和基本思路，创新点，技术关键和主要技术指标:</h1><br><br><textarea class="B3_form" id="B3_form_3"></textarea>
                   <br><br>
                   <hr/>
                   <br>
                   <h1>作品的科学性先进性（必须说明与现有技术相比、该作品是否具有突出的实质性技术特点和显著进步。请提供技术性分析说明和参考文献资料）:</h1><br><br><textarea class="B3_form" id="B3_form_4"></textarea>
                   <br><br>
                   <hr/>
                   <br>
                   <h1>作品在何时、何地、何种机构举行的评审、鉴定、评比、展示等活动中获奖及鉴定结果:</h1><br><br><textarea class="B3_form" id="B3_form_5"></textarea>
                   <br><br>
                   <hr/>
                   <br>
                   <h1>作品所处阶段</h1>
                        <select id="B3_form_6">
                            <option value="lab">实验室阶段</option>
                            <option value="test">中试阶段</option>
                            <option value="pro">生产阶段</option>
                        </select>
                   <br><br><hr/>
                   <br>
                   <h1>技术转让方式</h1><br><br><textarea class="B3_form" id="B3_form_7"></textarea>
                   <br><br>
                   <hr/>
                   <br>
                   <h1>作品可展示的形式:</h1><br><br>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check1"><h2>实物、产品</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check2"><h2>模型</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check3"><h2>图纸</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check4"><h2>磁盘</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check5"><h2>现场演示</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check6"><h2>图片</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check7"><h2>录像</h2>
                        <input type="checkbox" class="B3_type_check" id="B3_type_check8"><h2>样品</h2><br>
                   <br><br>
                   <hr/>
                   <br>
                   <h1>使用说明及该作品的技术特点和优势，提供该作品的适应范围及推广前景的技术性说明及市场分析和经济效益预测:</h1><br><br><textarea class="B3_form" id="B3_form_8"></textarea>
                   <br><br>
                   <hr/>
                   <h1>专利申报情况:</h1>
                   <br>
                   <input type="checkbox" class="B3_type_check" id="B3_type_check9"><h1>提出专利申报；</h1><h1>申报号：</h1><input type="text" class="p_num1" id="ip1"><h1>申报日期：</h1><input type="text" class="p_day1" id="ip1_date"placeholder="格式如：2014-06-05">
                   <br> 
                   <input type="checkbox" class="B3_type_check" id="B3_type_check10"><h1>已获专利权批准；</h1><h1>批准号：</h1><input type="text" class="p_num2" id="ip2"><h1>批准日期：</h1><input type="text" class="p_day2" id="ip2_date"placeholder="格式如：2014-06-05">
                   <br> 
                   <input type="checkbox" class="B3_type_check" id="B3_type_check11"><h1>未提出专利申请；</h1>
                   <br> 
                   <br> 
                   <hr/> 
                   <br>
                   <h1>当前国内外同类课题研究水平概述:</h1><br><br><textarea class="B3_form" id="B3_form_9"></textarea>
                   <br><br>
                   <input type="button" value="上一步" class="pre_button2" onclick="ShowStep2()">
                   <input type="button" value="保存" class="save_button">
                   <input type="button" value="提交" class="next_button2">
                   <br><br>
               </form>
                <div id="NULL_B" style="font-size: 25px; color: #f00; margin-left: 250px; margin-top: 150px;">
                        请在第一步中选择作品类型
               </div>
            </div>
            <br><br>
         </div>
        <script> Gettext()</script>
        <script> </script>
    </body>
</html>