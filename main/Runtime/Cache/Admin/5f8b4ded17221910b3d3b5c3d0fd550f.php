<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>本科论文库</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/css/style.css">
  <script src="/LunWen/main/Public/js/jquery-3.3.1.min.js"></script>
  <!-- endinject -->
  <link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <!--<img src="/LunWen/main/Public/images/logo.svg">-->
                	<h3 class="text-gray">本科论文库</h3>
              </div>
              <h4 class="text-info">修改密码</h4>
              <form class="pt-3" action="<?php echo U('./forgotPassword');?>" method="post">
              	<div class="form-group">
                	<label for="school">学校名称</label>
                  <input type="text" class="form-control form-control-lg bg-secondary" name="school" id="school" placeholder="学校">
                </div>
                <div class="form-group">
                	<label for="username">用户名</label>
                  <input type="text" class="form-control form-control-lg bg-secondary" name="username" id="username" placeholder="用户名">
                </div>
                <div class="form-group">
                	<div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-group">
                    <label for="phone">手机</label>
                  	<input type="tel" class="form-control form-control-lg bg-secondary" name="phone" id="phone" placeholder="注册手机号">
                  </div>
                  <button type="button" id="sendYzm" class="btn btn-danger btn-sm text-light" onclick="send()">获取验证码</button>
                </div>
                	<div class="mb-4">
                  		<input type="text" class="form-control form-control-lg bg-secondary" name="yzm" id="yzm" placeholder="验证码">
                	</div>
                  
                </div>
                <div class="form-group">
                	<label for="password">新密码</label>
                  <input type="password" class="form-control form-control-lg bg-secondary" name="password" id="password" placeholder="新密码">
                </div>
                <div class="form-group">
                	<label for="repwd">确认密码</label>
                  <input type="password" class="form-control form-control-lg bg-secondary" name="repwd" id="repwd" placeholder="确认密码">
                </div>
                
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn bold">提 交</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  	已经有账户? <a href="<?php echo U('./login');?>" class="text-primary">登录</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.base.js"></script>
  <script src="/LunWen/main/Public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/LunWen/main/Public/js/off-canvas.js"></script>
  <script src="/LunWen/main/Public/js/misc.js"></script>
  <script src="/LunWen/main/Public/js/forgotPassword.js"></script>
  <!-- endinject -->
</body>

</html>