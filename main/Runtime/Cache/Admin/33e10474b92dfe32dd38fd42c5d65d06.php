<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>本科论文库后台</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
  <script src="/LunWen/main/Public/js/jquery-3.3.1.min.js"></script>
  <script src="/LunWen/main/Public/js/vue.js"></script>
  <style>
  	.progress{
  		width:100%;
  		height:30px;
  	}
  </style>
</head>
<body>
			<div class="progress">
			  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
			    <span class="sr-only">20% Complete</span>
			  </div>
			</div>
			<div class="files"></div>
      <div class="showimg"></div>
	
  <div class="container-scroller" id="app">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo U('./index');?>">
        	<!--<img src="/LunWen/main/Public/images/logo.svg" alt="logo"/>-->
        	本科论文库
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo U('./index');?>">
        	<!--<img src="/LunWen/main/Public/images/logo-mini.svg" alt="logo"/>-->
        	&nbsp;&nbsp;本科论文库
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="<?php echo U('./search');?>">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="搜索论文">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="/LunWen/main/Public/images/faces/face20.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo (cookie('username')); ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown"> 
              <a class="dropdown-item" href="<?php echo U('./logout');?>">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                	注销
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" href="<?php echo U('./sendMessage');?>">
              <i class="mdi mdi-email-outline"></i>
              <!--<span class="count-symbol bg-danger"></span>-->
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="<?php echo U('./logout');?>">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo U('./index');?>">
              <span class="menu-title">首页</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#shangchuan-pages" aria-expanded="false" aria-controls="shangchuan-pages">
              <span class="menu-title">上传论文</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="shangchuan-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./upload_message');?>"> 上传论文基本信息 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./upload_img');?>"> 上传论文图片内容 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./upload_word');?>"> 上传论文相关文档</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./upload_lunwenBook');?>"> 上传论文缩编封面 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./upload_bookImg');?>"> 上传论文缩编内容</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#lunwen-pages" aria-expanded="false" aria-controls="lunwen-pages">
              <span class="menu-title">论文管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="lunwen-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./lunwen_list');?>"> 论文列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./rank');?>"> 分类设置 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./search');?>"> 搜索论文 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#borrow-pages" aria-expanded="false" aria-controls="borrow-pages">
              <span class="menu-title">借阅管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="borrow-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./borrow_list');?>"> 借阅列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./return_list');?>"> 归还列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./history');?>"> 历史记录 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="false" aria-controls="user-pages">
              <span class="menu-title">用户管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="user-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./Consumer_list');?>"> 用户列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./consumer_souso');?>"> 搜索用户 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">用户</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./login');?>"> 登录 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./register');?>"> 注册 </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
     <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
      		上传论文
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo U('./upload_img');?>">上传论文</a></li>
                <li class="breadcrumb-item active" aria-current="page">上传论文图片内容</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">新增论文图片内容</h4>
                  <p class="card-description">
                		请上传合法论文
                  </p>
                  <form id="myupload" class="forms-sample" action="<?php echo U('./upload_img');?>" method="post" enctype="multipart/form-data">
                  	
                    
                    <div class="form-group">
                      <label for="lunwen_id">上传至</label>
                      <input type="text" class="form-control bg-secondary" value="<?php echo ($lunwen["lunwen_title"]); ?>" name="lunwen_id" id="lunwen_id" disabled="disabled">
                    </div>   
	                  
                    <div class="form-group" id="imgFile">
	                    <label for="image">上传论文图片('按顺序添加')</label>
	                    <p class="bg-dark text-light" style="font-size:18px;padding:10px 5px;">
	                    	已上传&nbsp;&nbsp;<span id="imgcount" style="font-size:24px;">0</span>&nbsp;&nbsp;张图片(包括封面)<br>
	                    	(建议一次上传10张,最多不可超过15张)
	                    </p>
	                    <div id="picInput" v-for="n in uploadNum">
	                    	<label for="">第&nbsp;{{n}}&nbsp;页</label>
					        <input type="file" name="myfile[]" class="text-dark btn btn-block btn-sm btn-primary" style="margin-bottom:20px;">  
					    </div>
                    </div>
                    <!--<div class="form-group">
                      <label for="exampleTextarea1">感想</label>
                      <textarea class="form-control bg-secondary" id="exampleTextarea1" rows="4"></textarea>
                    </div>-->
                    <button type="submit" class="btn btn-success mr-2" data-toggle="modal" data-target="#myModal" id="submit">提交</button>
                    <button type="reset" class="btn btn-danger">重置</button>
                  </form>
                </div>
              </div>
            </div>
            
            
            

           
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="../Home" target="_blank">本科论文库</a>. 所有后台人员. </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">分享论文，便捷大家
              <i class="mdi mdi-heart text-danger"></i> - <?php echo ($school); ?> </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  
  <div class="modal fade" style="top:30%" id="myModal" tabindex="-1" role="dialog" aria-labelledby="" aria-describedby="" data-backdrop="static" data-keyboard="false">  
    <div class="modal-dialog modal-sm" role="document" aria-hidden="true">  
        <div class="modal-content modal_del"> 
        		<div class="modal-header" style="padding:5px 10px 0 0;display:none;">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
            <div class="modal-body">	
            	<div class="col-12">
            		<h4 class="pro_text text-dark">上传进度</h4>
            		<div class="progress">
								  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
								    <span class="sr-only">0% Complete</span>
								  </div>
								</div>
	            </div>  

            </div>
	    </div>  
    </div>  
</div>

  
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.base.js"></script>
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/LunWen/main/Public/js/off-canvas.js"></script>
  <script src="/LunWen/main/Public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/LunWen/main/Public/js/file-upload.js"></script>
  <!-- End custom js for this page-->
  <script src="/LunWen/main/Public/js/upload_img.js"></script>
  <script src="/LunWen/main/Public/js/jquery_form.js"></script>
</body>
<script type="text/javascript">
	
$(function () {
	$('#submit').click(function(){
			var lunwenId=$('#lunwen_id').val();
			var files=$("input[name='myfile[]']").val();
			console.log(lunwenId);
			console.log(files);
			
			if(lunwenId==''||files==''){
				return;
			}
			$("#myupload").ajaxForm({
	     dataType:'json',
	     beforeSend:function(){ 
	         $(".progress").show();
	     },
	     uploadProgress:function(event,position,total,percentComplete){
	         var percentVal = percentComplete + '%';
	         $(".progress-bar").width(percentComplete + '%');
	         $(".progress-bar").html(percentVal);
	         $(".sr-only").html(percentComplete + '%');
	     },
	     success:function(data){
	        $(".progress").hide(); 
	        $(".pro_text").html(data.info);
	        $('.modal-header').show();
	     },
	     error:function(data){
	     		$(".pro_text").html(data.info);
	     		$('.modal-header').show();
	     }  
	   });
	   $(".progress").hide();
	});
   
   
});
  
</script>
</html>