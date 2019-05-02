<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>本科论文库后台登录</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/LunWen/main/Public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/LunWen/main/Public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto bg-secondary">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <!--<img src="/LunWen/main/Public/images/logo.svg">-->
                	<h3 class="text-gray">本科论文库</h3>
              </div>
              <h4 class="text-info">欢迎来到登录界面!</h4>
              <h6 class="font-weight-light text-danger">开始登录吧</h6>
              <form class="pt-3" action="<?php echo U('./login');?>" method="post">
              	<div class="form-group badge-outline-danger">
                  <input type="text" class="form-control form-control-lg" name="school" id="username" placeholder="学校">
                </div>
                <div class="form-group badge-outline-danger">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="用户名">
                </div>
                <div class="form-group badge-outline-danger">
                  <input type="password" class="form-control form-control-lg" name="pass" id="username" placeholder="密码">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn bold">登 录</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <!--<div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>-->
                  <a href="<?php echo U('./forgotPassword');?>" class="auth-link text-danger">忘记密码?</a>
                </div>
                <div class="text-black text-center mt-4 font-weight-light">
                  	没有账户? <a href="<?php echo U('./register');?>" class="text-primary">创建账户</a>
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
  <!-- endinject -->
</body>

</html>