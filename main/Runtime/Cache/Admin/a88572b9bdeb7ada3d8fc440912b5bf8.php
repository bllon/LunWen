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
  <script>
//	 window.onunload = function (){
//       $.ajax({
//			    url: 'Admin/User/logout',
//			    async: false
//			});
//    };
//
//	window.onbeforeunload = function (e) {
//		
//     $.ajax({
//			    url: 'Admin/User/logout',
//			    async: false
//			});
//		};
  </script>
</head>
<body>
  <div class="container-scroller">
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
          <form class="d-flex align-items-center h-100" action="<?php echo U('./search');?>" method="post">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" name="keyWords" placeholder="搜索论文">
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
            <a class="nav-link count-indicator" id="messageDropdown" href="<?php echo U('./sendMessage');?>">
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
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
              	<li class="nav-item"> <a class="nav-link" href="<?php echo U('./sendMessage');?>"> 后台留言 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./login');?>"> 登录 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo U('./register');?>"> 注册 </a></li>
              </ul>
            </div>
          </li>
          <?php if($type == 1): ?><li class="nav-item">
	            <a class="nav-link" href="<?php echo U('./apply_list');?>">
	              <span class="menu-title">管理员管理</span>
              	<i class="mdi mdi-contacts menu-icon"></i>
	            </a>
	          </li><?php endif; ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <span class="d-flex align-items-center purchase-popup">
                <p>作为 本科论文库 微信小程序的后台管理，管理论文的上传与展示。</p>
                <a href="<?php echo U('./useinfo');?>" target="_blank" class="btn ml-auto download-button">使用文档</a> 
<!--                <i class="mdi mdi-close popup-dismiss"></i>-->
              </span>
            </div>
          </div>
          <!--dashboard.js-->
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
             	 数据统计
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>实时监控数据
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="/LunWen/main/Public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">今日访问
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo ($popnum); ?></h2>
                  <!--<h6 class="card-text">对比昨日增长60%</h6>-->
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="/LunWen/main/Public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">用户数
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo ($consumernum); ?></h2>
                  <!--<h6 class="card-text">对比初始增长10%</h6>-->
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="/LunWen/main/Public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">论文数
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php echo ($lunwen_num); ?></h2>
                  <!--<h6 class="card-text">上榜5次</h6>-->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">一周访问统计</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>                                     
                  </div>
                  <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">论文点击月排行</h4>
                  <canvas id="traffic-chart"></canvas>
                  <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>                                                      
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">后台管理员</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                      			昵称
                          </th>
                          <th>
                      			类型
                          </th>
                          <th>
        										状态
                          </th>
                          <th>
                       			最后一次上线
                          </th>
                          <!--<th>
                            Tracking ID
                          </th>-->
                        </tr>
                      </thead>
                      <tbody>
                      	<?php if(is_array($users)): foreach($users as $key=>$user): ?><tr>
	                          <td>
	                            <img src="/LunWen/main/Public/images/faces/face1.jpg" class="mr-2" alt="image">
	                            <?php echo ($user["username"]); ?>
	                          </td>
	                          <td>
	                          	<?php if($user["type"] == 1): ?>主管理员
	                      			<?php else: ?>
	                      				副管理员<?php endif; ?>
	                          </td>
	                          <td>
	                          	<?php if($user["user_statu"] == 1): ?><label class="badge badge-success">在线</label>
	                          	<?php else: ?>
	                          		<label class="badge badge-warning">离线</label><?php endif; ?>
	                            
	                          </td>
	                          <td>
	                            <?php echo ($user["start_time"]); ?>
	                          </td>
	                        </tr><?php endforeach; endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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