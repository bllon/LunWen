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
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo U('Admin/Index/index');?>">
        	<!--<img src="/LunWen/main/Public/images/logo.svg" alt="logo"/>-->
        	本科论文库
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo U('Admin/Index/index');?>">
        	<!--<img src="/LunWen/main/Public/images/logo-mini.svg" alt="logo"/>-->
        	&nbsp;&nbsp;本科论文库
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="<?php echo U('Admin/Lunwen/search');?>">
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
              <a class="dropdown-item" href="<?php echo U('Admin/User/logout');?>">
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
            <a class="nav-link count-indicator" href="<?php echo U('Admin/User/sendMessage');?>">
              <i class="mdi mdi-email-outline"></i>
              <!--<span class="count-symbol bg-danger"></span>-->
            </a>
          </li>
          
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="<?php echo U('Admin/User/logout');?>">
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
            <a class="nav-link" href="<?php echo U('Admin/Index/index');?>">
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/upload_message');?>"> 上传论文基本信息 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/upload_img');?>"> 上传论文图片内容 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/upload_word');?>"> 上传论文相关文档</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/upload_lunwenBook');?>"> 上传论文缩编封面 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/upload_bookImg');?>"> 上传论文缩编内容</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/lunwen_list');?>"> 论文列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/rank');?>"> 分类设置 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/search');?>"> 搜索论文 </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/borrow_list');?>"> 借阅列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/return_list');?>"> 归还列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Lunwen/history');?>"> 历史记录 </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Consumer/consumer_list');?>"> 用户列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/Consumer/consumer_souso');?>"> 搜索用户 </a></li>
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/User/login');?>"> 登录 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('Admin/User/register');?>"> 注册 </a></li>
              </ul>
            </div>
          </li> 
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12">
            	<div class="row">
            		<h4 class="text-dark">后台功能介绍</h4>
            		<div>
            			<br/>
            			<br/>
            			<h5 class="text-primary">顶部导航介绍</h5>
            			<p>1.搜索框，根据论文id，标题，以及关键字搜索论文</p>
            			<p>2.全屏显示</p>
            			<p>3.后台留言</p>
            			<p>4.用户退出系统</p>
            			
            			<h5 class="text-primary">左侧导航介绍</h5>
            			<p>1.<span class="text-danger">首页</span>，跳转到首页</p>
            			<p>
            				2.<span class="text-danger">上传论文</span><br>
            				(1)上传论文基本信息，对论文的作者，标题，封面进行上传<br>
            				(2)上传论文图片内容，对论文的内容进行上传<br>
            				(3)上传论文相关文档，例如论文的开题，格式等等<br>
            			</p>
            			<p>
            				3.<span class="text-danger">论文管理</span><br>
            				(1)论文列表，展示所有论文的基本信息<br>
            				(2)分类设置，对论文的类型进行一级，二级分类<br>
            				(3)搜索论文，同顶部搜索论文<br>
            			</p>
            			<p>
            				4.<span class="text-danger">借阅管理</span><br>
            				(1)借阅列表，展示所有等待借阅的信息<br>
            				(2)归还列表，展示所有等待归还的信息<br>
            				(3)历史记录，展示所有借阅和归还的记录<br>
            			</p>
            			<p>
            				5.<span class="text-danger">用户管理</span><br>
            				(1)用户列表，展示所有注册用户的信息<br>
            				(2)用户搜索，对用户进行搜索<br>
            			</p>
            		</div>
            	</div>
            </div>
          
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="<?php echo U('../Home');?>" target="_blank">本科论文库</a>. 所有后台人员. </span>
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

</html>