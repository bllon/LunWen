<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>轻松论文超级管理</title>
		<link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/amazeui.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/core.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/menu.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/index.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/admin.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/page/typography.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/page/form.css" />
		<link rel="stylesheet" href="/LunWen/main/Public/assets2/css/component.css" />
	</head>
	<body>
		<!-- Begin page -->
		<header class="am-topbar am-topbar-fixed-top">		
			<div class="am-topbar-left am-hide-sm-only">
                <a href="./index" class="logo"><span class="logo-word">本科论文库</span><i class="zmdi zmdi-layers"></i></a>
            </div>
	
			<div class="contain">
				<ul class="am-nav am-navbar-nav am-navbar-left">

					<li><h4 class="page-title">首页</h4></li>
				</ul>
				
				<ul class="am-nav am-navbar-nav am-navbar-right">
					<li class="inform"><i class="am-icon-bell-o" aria-hidden="true"></i></li>
					<li class="hidden-xs am-hide-sm-only">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><img src="/LunWen/main/Public/assets2/img/search.png"></a>
                        </form>
                    </li>
				</ul>
			</div>
		</header>
		<!-- end page -->
		
		
		<div class="admin">
			<!--<div class="am-g">-->
		<!-- ========== Left Sidebar Start ========== -->
		<!--<div class="left side-menu am-hide-sm-only am-u-md-1 am-padding-0">
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 548px;">
				<div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 548px;">-->
                  <!-- sidebar start -->
				  <div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
				    <div class="am-offcanvas-bar admin-offcanvas-bar">
				    	<!-- User -->
						<div class="user-box am-hide-sm-only">
	                        <div class="user-img">
	                            <img src="/LunWen/main/Public/assets2/img/profile-pic.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
	                            <div class="user-status offline"><i class="am-icon-dot-circle-o" aria-hidden="true"></i></div>
	                        </div>
	                        <h5><a href="./index"><?php echo (cookie('user')); ?></a> </h5>
	                        <ul class="list-inline">
	                            <li>
	                                <a href="#">
	                                    <i class="fa fa-cog" aria-hidden="true"></i>
	                                </a>
	                            </li>
	
	                            <li>
	                                <a href="#" class="text-custom">
	                                    <i class="fa fa-cog" aria-hidden="true"></i>
	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                    <!-- End User -->
	            
						 <ul class="am-list admin-sidebar-list">
						    <li><a href="<?php echo U('Admins/Index/index');?>"><span class="am-icon-home text-danger"></span> 首页</a></li>
						    <li><a href="<?php echo U('Admins/Apply/apply_list');?>"><span class="am-icon-home"></span> 入驻管理</a></li>
						    <li class="admin-parent">
						      <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-th-list"></span> 资源管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
						      <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav1">
						        <li><a href="<?php echo U('Admins/Data/lunwen_list');?>" class="am-cf"> 论文资源</span></a></li>
						        <li><a href="<?php echo U('Admins/Data/book_list');?>">论文汇编</a></li>
						        <li><a href="<?php echo U('Admins/Data/word_list');?>">论文格式</a></li>
						      </ul>
						    </li>
						    <li class="admin-parent">
						      <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><i class="am-icon-dot-circle-o" aria-hidden="true"></i> 用户管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
						      <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav2">
						        <li><a href="<?php echo U('Admins/Data/school_list');?>" class="am-cf"> 学校管理</span></a></li>
						        <li><a href="<?php echo U('Admins/Data/user_list');?>" class="am-cf"> 管理员管理</span></a></li>
						      </ul>
						    </li>
						    <li><a href="<?php echo U('Admins/Data/message_list');?>"><span class="am-icon-file"></span> 客户留言</a></li>
						  </ul>
				</div>
				  </div>
				  <!-- sidebar end -->
    
				<!--</div>
			</div>
		</div>-->
		<!-- ========== Left Sidebar end ========== -->
		
		
		
	<!--	<div class="am-g">-->
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="am-g">
					<!-- Row start -->
						<div class="am-u-md-3">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">入驻学校</h4>
								<div class="widget-chart-1 am-cf">
                                    <div id="widget-chart-box-4" style="height: 50px;width: 50px;float: left;border-radius:50%;margin-top:20px;background:#2f44adab;">
                                    </div>

                                    <div class="widget-detail-1" style="float: right;">
                                        <h2 class="p-t-10 m-b-0"> <?php echo ($schoolnum); ?> </h2>
                                        <p class="text-muted">所</p>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- col end -->
						<div class="am-u-md-3">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">论文总量</h4>
								<div class="widget-chart-1 am-cf">
                                    <div id="widget-chart-box-4" style="height: 50px;width: 50px;float: left;border-radius:50%;margin-top:20px;background:#2fad50ab;">
                                    </div>

                                    <div class="widget-detail-1" style="float: right;">
                                        <h2 class="p-t-10 m-b-0"> <?php echo ($lunwen_num); ?> </h2>
                                        <p class="text-muted">篇</p>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- col end -->
						<div class="am-u-md-3">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">管理员总数</h4>
								<div class="widget-chart-1 am-cf">
                                    <div id="widget-chart-box-4" style="height: 50px;width: 50px;float: left;border-radius:50%;margin-top:20px;background:#c62eb3ab;">
                                    </div>

                                    <div class="widget-detail-1" style="float: right;">
                                        <h2 class="p-t-10 m-b-0"> <?php echo ($usernum); ?> </h2>
                                        <p class="text-muted">名</p>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- col end -->
						<div class="am-u-md-3">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">用户总数</h4>
								<div class="widget-chart-1 am-cf">
                                    <div id="widget-chart-box-4" style="height: 50px;width: 50px;float: left;border-radius:50%;margin-top:20px;background:#ef7811db;">
                                    </div>

                                    <div class="widget-detail-1" style="float: right;">
                                        <h2 class="p-t-10 m-b-0"> <?php echo ($consumernum); ?> </h2>
                                        <p class="text-muted">人</p>
                                    </div>
                                </div>
							</div>
						</div>
					<!-- Row end -->
				</div>
					
					
					<!-- Row start -->
					<div class="am-g">
						<!-- col start -->
						<div class="am-u-md-4">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">今日访问</h4>
								<div class="inbox-widget nicescroll" style="height: 315px; overflow: hidden; outline: none;" tabindex="5000">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="/LunWen/main/Public/assets2/img/avatar-1.jpg" class="img-circle" alt=""></div>
                                            <p class="inbox-item-author">官方网站</p>
                                            <p class="inbox-item-text">点击查看详情</p>
                                            <p class="inbox-item-date"><?php echo ($visit_num); ?> 次</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="/LunWen/main/Public/assets2/img/avatar-2.jpg" class="img-circle" alt=""></div>
                                            <p class="inbox-item-author">小程序</p>
                                            <p class="inbox-item-text">点击查看详情</p>
                                            <p class="inbox-item-date"><?php echo ($popnum); ?> 次</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="/LunWen/main/Public/assets2/img/avatar-10.jpg" class="img-circle" alt=""></div>
                                            <p class="inbox-item-author">后台管理网站</p>
                                            <p class="inbox-item-text">点击查看详情</p>
                                            <p class="inbox-item-date"><?php echo ($adminvist_num); ?> 次</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="/LunWen/main/Public/assets2/img/avatar-10.jpg" class="img-circle" alt=""></div>
                                            <p class="inbox-item-author">小程序注册</p>
                                            <p class="inbox-item-text">点击查看详情</p>
                                            <p class="inbox-item-date"><?php echo ($consumer_num); ?> 次</p>
                                        </div>
                                    </a>
                                </div>
							</div>
						</div>
						<!-- col end -->
						
						<!-- col start -->
						<div class="am-u-md-8">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30">最新项目</h4>
								<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
                                        <table class="am-table   am-text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>项目名称</th>
                                                <th>开始时间</th>
                                                <th>结束时间</th>
                                                <th>状态</th>
                                                <th>责任人</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>本科论文库小程序页面设计</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-danger">已发布</span></td>
                                                    <td>刘剑</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>小程序管理后台</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-success">已发布</span></td>
                                                    <td>徐贝</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>论文资源上传</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-pink">未开展</span></td>
                                                    <td>徐贝</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>小程序超级管理后台</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-purple">进行中</span>
                                                    </td>
                                                    <td>徐贝</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>服务器资源部署</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-warning">即将开始</span></td>
                                                    <td>徐贝</td>
                                                </tr>

                                                <tr>
                                                    <td>6</td>
                                                    <td>项目资料完善</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-primary">即将开始</span></td>
                                                    <td>刘剑</td>
                                                </tr>

                                                <tr>
                                                    <td>7</td>
                                                    <td>小程序发布</td>
                                                    <td>10/11/2018</td>
                                                    <td>22/11/2018</td>
                                                    <td><span class="label label-primary">即将开始</span></td>
                                                    <td>刘剑</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
							</div>
						</div>
						<!-- col end -->
					</div>
					<!-- Row end --><a href="./index" target="_blank" title="本科论文库">本科论文库</a> -  技术支持  <a href="./index" title="景德镇陶瓷大学科技艺术学院" target="_blank">景德镇陶瓷大学科技艺术学院</a>
					
				
			
				
			</div>
		</div>
		<!-- end right Content here -->
		<!--</div>-->
		</div>
		</div>
		
		<!-- navbar -->
		<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>
		
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/jquery-2.1.0.js" ></script>
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/amazeui.min.js"></script>
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/app.js" ></script>
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/blockUI.js" ></script>
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/charts/echarts.min.js" ></script>
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/charts/indexChart.js" ></script>
	</body>
	
</html>