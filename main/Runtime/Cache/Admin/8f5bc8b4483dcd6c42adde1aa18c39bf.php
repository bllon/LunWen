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
      		分类设置
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo U('./rank');?>">论文管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">分类设置</li>
              </ol>
            </nav>
          </div>  
        
        
        <div class="row">
        	<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">论文分类</h4>
                  <p class="card-description">
                	点击进行修改，编辑
                  </p>
                  <caption>一级分类</caption>
                  <table class="table" id="table_one">
                    <thead>
                      <tr>
                        <th>分类名</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php if($rank): if(is_array($rank)): foreach($rank as $key=>$ran): ?><tr>
	                        <td contenteditable="true"><?php echo ($ran["rank_name"]); ?></td>
	                        <td><a class="btn btn-sm btn-danger text-light" href="<?php echo U('./delRank',array('id'=>$ran['rank_id']));?>">删除</a></td>
	                      </tr><?php endforeach; endif; ?>
                    </tbody>
                  </table>
                  
              		<?php else: ?>
              			<tr>
                        <td colspan="3" class="text-center text-danger">暂无分类</td>
                      </tr>
	                    </tbody>
	                  </table><?php endif; ?>
	                 <button class="btn btn-info btn-sm float-right"  data-toggle="modal" data-target="#myModal_one" style="margin-top:20px;">添加一级分类</button>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">论文分类</h4>
                  <p class="card-description">
                	点击进行修改，编辑
                  </p>
                  <caption>二级分类</caption>
                  <table class="table" id="table_two">
                    <thead>
                      <tr>
                        <th>分类名</th>
                        <th>所属分类</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php if($sele): if(is_array($sele)): foreach($sele as $key=>$sel): ?><tr>
		                        <td contenteditable="true"><?php echo ($sel["sele_name"]); ?></td>
		                        <td><label class="badge badge-primary"><?php echo ($sel["sele_type"]); ?></label></td>
		                        <td><a class="btn btn-sm btn-danger text-light" href="<?php echo U('./delSele',array('id'=>$sel['sele_id']));?>">删除</a></td>
		                    </tr><?php endforeach; endif; ?>
	                    </tbody>
	                  </table>
	                  <nav aria-label="Page navigation" style="margin-top:40px;">
										  <ul class="pagination pull-right">
										    <li>
										      <a class="btn btn-sm btn-dark" href="<?php echo U('./rank',array('to'=>'prev','page'=>$current));?>" aria-label="Previous">
										        <span aria-hidden="true">&laquo;</span>
										      </a>
										    </li>
									    	<?php if(is_array($nav)): foreach($nav as $k=>$page): if($k== $current): ?><li><a  class="btn btn-sm btn-danger" href="<?php echo U('./rank',array('page'=>$k));?>"><?php echo ($k); ?></a></li>
												<?php else: ?>
													<li><a  class="btn btn-sm btn-dark" href="<?php echo U('./rank',array('page'=>$k));?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>
										    <li>
										      <a  class="btn btn-sm btn-dark" href="<?php echo U('./rank',array('to'=>'next','page'=>$current));?>" aria-label="Next">
										        <span aria-hidden="true">&raquo;</span>
										      </a>
										    </li>
										  </ul>
										</nav>
                    <?php else: ?>
                    	<tr>
	                        <td colspan="4" class="text-center text-danger">暂无分类</td>
	                    </tr>
                    	</tbody>
	                 </table><?php endif; ?>
	                 <button class="btn btn-info btn-sm float-right"  data-toggle="modal" data-target="#myModal_two">添加二级分类</button>
                </div>
              </div>
            </div>
            
            
            
            
        </div>
      </div>  
        
        
        
        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  
  <div class="modal fade box" id="myModal_one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		     	<div class="modal-body">
			      	<h3>添加一级分类</h3>    
			        <form action="<?php echo U('./addRank');?>" method="post">
			        	<input type="text" class="input-group input-group-sm input-group-text" name="rank_type" id="rank_type" placeholder="输入分类名"/>
			        	<button type="submit" class="btn btn-success" style="margin-top:20px">确定</button>
			        	<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top:20px">取消</button>
			        </form>
		    	</div>
		    </div>
		</div>
	</div>
	
	
	<div class="modal fade box" id="myModal_two" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		     	<div class="modal-body">
			      	<h3>添加二级分类</h3>    
			        <form action="<?php echo U('./addSele');?>" method="post">
			        	<p class="text-danger">选择一级分类</p>
			        	<select name="ranker" class="form-control">
			        		<?php if(is_array($rank)): foreach($rank as $key=>$ran): ?><option value="<?php echo ($ran["rank_name"]); ?>"><?php echo ($ran["rank_name"]); ?></option><?php endforeach; endif; ?>
			        	</select>
			        	<p class="text-danger" style="margin-top:10px;">输入二级分类</p>
			        	<input type="text" class="input-group input-group-sm input-group-text" name="sele" id="sele" placeholder="输入分类名"/>
			        	<button type="submit" class="btn btn-success" style="margin-top:20px">确定</button>
			        	<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top:20px">取消</button>
			        </form>
		    	</div>
		    </div>
		</div>
	</div>
  
  
  
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