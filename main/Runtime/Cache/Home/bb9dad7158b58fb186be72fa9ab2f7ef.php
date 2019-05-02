<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>本科论文库超级管理登录</title>
		<link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="/LunWen/main/Public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/LunWen/main/Public/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/LunWen/main/Public/assets/css/form-elements.css">
        <link rel="stylesheet" href="/LunWen/main/Public/assets/css/style.css">
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
                    	<div class="col-sm-6 book">

                    	</div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3 class="logo-word">本科论文库</h3>
                            		<p>2018-12-17</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">用户名</label>
			                        	<input type="text" name="username" placeholder="用户名" class="form-first-name form-control" id="username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">密码</label>
			                        	<input type="text" name="password" placeholder="密码" class="form-last-name form-control" id="password">
			                        </div>
			                        <div class="row">
			                        	<div class="col-sm-4 form-group">
				                        	<label class="sr-only" for="yzm">验证码</label>
				                        	<input type="text" name="yzm" placeholder="验证码" class="form-email form-control" id="yzm">
				                        </div>
				                        <div class="col-sm-4">
				                        	<img src="<?php echo U('Home/User/yzm');?>" class="img-responsive" id="yzmImg"/>
				                        </div>
			                        </div>
			                        
			                        <button type="submit" class="btn">登 录</button>
			                    </form>
		                    </div>
                        </div>
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
		$('#yzmImg').click(function(){
			console.log('1');
			$.get('../User/yzm',{async:false},function(data,success){
				$('#yzmImg').src="./LunWen/main/index.php/Home/User/yzm.html";
			})
		})
	</script>
</html>