<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>轻松论文超级管理</title>
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
                <a href="../index" class="logo"><span class="logo-word">本科论文库</span><i class="zmdi zmdi-layers"></i></a>
            </div>
	
			<div class="contain">
				<ul class="am-nav am-navbar-nav am-navbar-left">

					<li><h4 class="page-title">论文文档管理</h4></li>
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
	                        <h5><a href="#"><?php echo (cookie('user')); ?></a> </h5>
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
						    <li><a href="<?php echo U('Admins/Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
						    <li><a href="<?php echo U('Admins/Apply/apply_list');?>"><span class="am-icon-home"></span> 入驻管理</a></li>
						    <li class="admin-parent">
						      <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-th-list text-danger"></span> 资源管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
						      <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav1">
						        <li><a href="<?php echo U('Admins/Data/lunwen_list');?>"> 论文资源</span></a></li>
						        <li><a href="<?php echo U('Admins/Data/book_list');?>">论文汇编</a></li>
						        <li><a href="<?php echo U('Admins/Data/word_list');?>" class="am-cf text-primary">论文格式</a></li>
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
				<div class="card-box">
					<!-- Row start -->
					<div class="am-g">
						<div class="am-u-sm-12 am-u-md-6">
				          <div class="am-btn-toolbar">
				            <div class="am-btn-group am-btn-group-xs">
				              <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="ajaxDel()"><span class="am-icon-trash-o"></span> 删除</button>
				            </div>
				          </div>
				        </div>	
				        
						<div class="am-u-sm-12 am-u-md-3">
							<form action="<?php echo U('Admins/Data/word_list');?>" method="post">
				          		<div class="am-input-group am-input-group-sm">
				          			<input type="text" class="am-form-field" id="keyword" name="keyword">
						          	<span class="am-input-group-btn">
						            	<button id="search" class="am-btn am-btn-default" type="submit">搜索</button>
						          	</span>
				          		</div>
				           </form>
				        </div>
				       
				      </div>
					  <!-- Row end -->
					  
					  <!-- Row start -->
					  	<div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" value="" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">学校</th>
                <th class="table-type">文档类型</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              	<?php if($wordlist): if(is_array($wordlist)): foreach($wordlist as $key=>$word): ?><tr>
		                <td class="chooseBtn"><input type="checkbox" value="<?php echo ($word["word_id"]); ?>"/></td>
		                <td><?php echo ($word["word_id"]); ?></td>
		                <td><a href="#"><?php echo ($word["school_name"]); ?></a></td>
		                <th class="table-type"><?php echo ($word["word_type"]); ?></th>
		                <td>
		                  <div class="am-btn-toolbar">
		                    <div class="am-btn-group am-btn-group-xs">		                      
						      <a href="<?php echo U('Admins/Data/word_del',array('id'=>$word['word_id']));?>" class="delBtn am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
						      	<span class="am-icon-trash-o"></span> 删除
						      </a>
		                    </div>
		                  </div>
		                </td>
		              </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class="am-cf">
              	共 <?php echo ($wordnum); ?> 条记录
              <?php if(!$keyword): ?><div class="am-fr">
                <ul class="am-pagination">
                  <li><a href="<?php echo U('Admins/Data/word_list',array('to'=>'prev','page'=>$current));?>">«</a></li>
                  <?php if(is_array($nav)): foreach($nav as $k=>$page): if($k== $current): ?><li class="am-active"><a href="<?php echo U('Admins/Data/word_list',array('page'=>$k));?>"><?php echo ($k); ?></a></li>
					<?php else: ?>
						<li><a href="<?php echo U('Admins/Data/word_list',array('page'=>$k));?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>
                  <li><a href="<?php echo U('Admins/Data/word_list',array('to'=>'next','page'=>$current));?>">»</a></li>
                </ul>
              </div><?php endif; ?>
            </div>
            
        	<?php else: ?>
				
					</tbody>
          		</table><?php endif; ?>
            
            <hr />
            <p class="text-danger">注：谨慎操作，避免系统数据丢失</p>
          </form>
        </div>

      </div>
					  <!-- Row end -->
					  
					</div>
				
				
				
				
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
		<script type="text/javascript" src="/LunWen/main/Public/assets2/js/apply.js" ></script>
	</body>
	
</html>