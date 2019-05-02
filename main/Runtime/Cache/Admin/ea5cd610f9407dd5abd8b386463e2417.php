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
   <script src="/LunWen/main/Public/js/jquery-3.3.1.min.js"></script>
  <!-- endinject -->
  <link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo U('/');?>">
        	<!--<img src="/LunWen/main/Public/images/logo.svg" alt="logo"/>-->
        	本科论文库
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo U('/');?>">
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
          <!--<li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>-->
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./consumer_list');?>"> 用户列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./consumer_souso');?>"> 搜索用户 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">用户</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-medical-bag menu-icon"></i>
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
          <!--dashboard.js-->
          <div class="page-header">
            <h3 class="page-title">
      		用户搜索
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo U('./consumer_souso');?>">用户管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">用户搜索</li>
              </ol>
            </nav>
          </div>  
      	  <form action="<?php echo U('./consumer_souso');?>" method="post">
      	  	<div class="form-group">
	            <div class="input-group">
	              <input type="text" name="keyWords" class="form-control" placeholder="输入学号" aria-label="Recipient's username" aria-describedby="basic-addon2">
	              <div class="input-group-append">
	                <button class="btn btn-sm btn-gradient-danger text-secondary bold" type="submit"> 搜 索 </button>
	              </div>
	            </div>
          	</div>
      	  </form>
      	  <?php if($tishi): ?><p class="text text-info text-center bg-secondary" style="padding:20px 0;letter-spacing:1px;font-size:18px;"><?php echo ($tishi); ?></p><?php endif; ?>
      	  <?php if($consumerlist): ?><p class="text text-dark bg-secondary" style="padding:20px 10px;letter-spacing:1px;">
      	  		根据&nbsp;<span class="text-info" style="font-size:18px;"><?php echo ($keywords); ?></span>
      	  		搜索到的用户有&nbsp;&nbsp;<span class="text-info"><?php echo ($listnum); ?>条</span>
      	  	</p><?php endif; ?>
      	  <div class="row">
      	  	<?php if(is_array($consumerlist)): foreach($consumerlist as $key=>$consumer): ?><div class="col-12 grid-margin stretch-card">
	              <div class="card">
	                <div class="card-body">
	                  <h4 class="card-title"><?php echo ($consumer["consumer_id"]); ?></h4>
	                  <p><span class="text-primary">学号:&nbsp;&nbsp;</span><?php echo ($consumer["consumer_unionid"]); ?></p>
	                  <p><span class="text-primary">借阅数量:&nbsp;&nbsp;</span><?php echo ($consumer["borrownum"]); ?>本</p>
	                  <p><span class="text-primary">注册时间:&nbsp;&nbsp;</span><script>
	                  	function getLocalTime(nS) {  
											 return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');  
											}

	                  	document.write(getLocalTime(<?php echo ($consumer["reg_time"]); ?>))</script></p>
	                  <!--<div>
	                  	<img src="<?php echo ($consumer["avatar"]); ?>"/>
	                  </div>
	                  <h3><?php echo ($consumer["consumer_name"]); ?></h3>
	                	<p><span class="text-primary">性别:&nbsp;&nbsp;</span><?php echo ($consumer["gender"]); ?></p>
	                	<p><span class="text-primary">国家:&nbsp;&nbsp;</span><?php echo ($consumer["country"]); ?></p>
	                	<p><span class="text-primary">省份:&nbsp;&nbsp;</span><?php echo ($consumer["province"]); ?></p>
	                	<p><span class="text-primary">城市:&nbsp;&nbsp;</span><?php echo ($consumer["city"]); ?></p>
	                	<p><span class="text-primary">语言:&nbsp;&nbsp;</span><?php echo ($consumer["language"]); ?></p>
	                	<p><span class="text-primary">用户标识:&nbsp;&nbsp;</span><?php echo ($consumer["unionid"]); ?></p>-->
	                </div>
	              </div>
	            </div><?php endforeach; endif; ?>
      	  </div>
          
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="" target="_blank">本科论文库</a>. 所有后台人员. </span>
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
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.base.js"></script>
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/LunWen/main/Public/js/off-canvas.js"></script>
  <script src="/LunWen/main/Public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/LunWen/main/Public/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
<script>

	$('.list-inline-item').each(function(i){
		$('.list-inline-item').eq(i).children('p').html('第'+(i+1)+'页');
	});
</script>

</html>