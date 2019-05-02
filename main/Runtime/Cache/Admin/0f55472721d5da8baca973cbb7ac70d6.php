<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/LunWen/main/Public/dropzone/basic.css"/>
		<link rel="stylesheet" type="text/css" href="/LunWen/main/Public/dropzone/dropzone.css"/>
		<link rel="stylesheet" href="/LunWen/main/Public/css/style.css">
		<link rel="stylesheet" type="text/css" href="/LunWen/main/Public/css/bootstrap-3.3.7-dist/css/bootstrap.css"/>
		<style>
			body,html{
				width:100%;
				height:100%;
				overflow:hidden;
			}
			.box{
				position:absolute;
				width:100%;
				height:100%;
				top:0;
				/*background:red;*/
			}
			.wrap{
				position:relative;
				top:calc(50% - 150px);
			}
			.tit{
				background:#3C3C3C;
				opacity:0.9;
			}
			.link_btn{
				margin-top:100px;
				margin-bottom:50px;
				width:60%;
				letter-spacing:1px;
			}
			.apply-page{
				position:absolute;
				width:100%;
				height:100%;
				background:#3C3C3C;
			}
			.form{
				margin-top:20px;
			}
		</style>
	</head>
	<body>
		<canvas id="c"></canvas>
		<div class="box">
			<div class="container wrap">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8 tit">
						<h2 class="text-center text-light">本科论文库系统申请</h2>
						<button class="btn btn-block center-block btn-dribbble link_btn">前往申请</button>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
		<div class="apply-page">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<form action="<?php echo U('Admin/Apply/apply');?>" method="post" class="form">
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">注册学校</label>
										<input type="text" name="school" id="" value="" class="form-control" placeholder="输入注册学校"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">注册人姓名</label>
										<input type="text" name="user" id="" value="" class="form-control" placeholder="输入注册人姓名"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">身份证号</label>
										<input type="text" name="usercard" id="" value="" class="form-control" placeholder="输入身份证号"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">邮箱</label>
										<input type="text" name="email" id="" value="" class="form-control" placeholder="输入邮箱"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">联系手机</label>
										<input type="text" name="phone" id="" value="" class="form-control" placeholder="输入手机号码"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">用户名</label>
										<input type="text" name="username" id="" value="" class="form-control" placeholder="输入用户名"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">密码</label>
										<input type="text" name="password" id="" value="" class="form-control" placeholder="输入密码"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-light" for="">确认密码</label>
										<input type="text" name="repassword" id="" value="" class="form-control" placeholder="输入密码"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="text-light" for="">验证码</label>
										<input type="text" name="yzm" id="" value="" class="form-control" placeholder="输入验证码"/>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-google">注册申请</button>
						</form>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</body>
	<script src="/LunWen/main/Public/js/jquery.js"></script>
	<script src="/LunWen/main/Public/dropzone/dropzone.js"></script>
	<script src="/LunWen/main/Public/dropzone/dropzone-amd-module.js"></script>
	<script src="/LunWen/main/Public/js/dat.gui.js"></script>
	<script src="/LunWen/main/Public/js/apply.js"></script>
	<script>
		$('.link_btn').click(function(){
			var h=parseInt($('body').css('height'));
			$('body').css({
				'marginTop':-h+'px',
				'transition':'0.7s'
				});
		})
	</script>
</html>