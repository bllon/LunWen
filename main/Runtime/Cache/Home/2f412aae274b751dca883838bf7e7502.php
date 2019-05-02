<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>本科论文库官网</title>
<link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
<link rel="stylesheet" href="/LunWen/main/Public/home_css/font-awesome.min.css">
<link rel="stylesheet" href="/LunWen/main/Public/home_css/bootstrap.min.css">
<link rel="stylesheet" href="/LunWen/main/Public/home_css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/LunWen/main/Public/switcher/switcher.css" />
<link rel="stylesheet" href="/LunWen/main/Public/home_css/main.css">
<link rel="stylesheet" href="/LunWen/main/Public/home_css/colors/blue.css">
<script src="/LunWen/main/Public/home_js/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" style="overflow: visible;">

<header>
	<!--Nav Menu Starts-->
	<nav class="navbar default nav-mob">
		<div class="container mob-logo">
			<div class="navbar-header col-sm-2 tablet-logo">
				<button type="button" class="navbar-toggle mob-menu" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#slider" class="brand-logo">
					<!--<img src="/LunWen/main/Public/images/logo.png" alt="karbar logo">-->
					<h3 class="logo-word" style="color:#631919;">本科论文库</h3>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav pull-right">
					<li class="actives">
						<a href="#slider">首页</a>
					</li>
					<li>
						<a href="#karbar-how-it-works-section">关于小程序</a>
					</li>
					<li>
						<a href="#karbar-service-section">小程序服务</a>
					</li>
					<li>
						<a href="#karbar-price-section">入驻论文库</a>
					</li>
					<li>
						<a  href="#karbar-footer-section">联系我们</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- end header -->


<!-- =========================
		home slider section
 ============================== -->
<section id="slider" class="pb">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="/LunWen/main/Public/images/slider/slide1.jpg" alt="轮播图1" class="img-responsive">
	      <div class="overlay"></div>
	      <div class="carousel-caption">
	        <div class="container">
				<div class="box">
					<h1 class="logo-word">论文库</h1>
					<span>数据存储，方便管理</span>
				</div>
			</div>
	      </div>
	    </div>
	    <div class="item">
	      <img src="/LunWen/main/Public/images/slider/slide3.jpg" alt="轮播图2"  class="img-responsive">
	      <div class="overlay"></div>
	      <div class="carousel-caption">
	        <div class="container">
				<div class="box">
					<h1 class="logo-word">全国高校</h1>
					<span>小程序管理独立化</span>
				</div>
			</div>
	      </div>
	    </div>
	    
	    <!-- Controls -->
	    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	  </div>
	
	  
	  
	</div>
</section>
<!-- end slider -->

 <!-- =========================
		How it works section
 ============================== -->   
<section id="karbar-how-it-works-section" class="how-it-works section-bg-color">
	<div class="container">
		<div class="row">
			<!-- Section main title -->
			<div class="col-xs-12 section-title-padding">
				<div class="sec-title-container text-center">
					<div class="title-line"></div>
					<h2 class="uppercase font-weight-7 less-mar-1 server-title">关于小程序</h2>
					<div class="clearfix"></div>
					<p class="by-sub-title">一个可供全国高校使用的论文资源服务的小程序</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-11 center-block">
				<!--step 1-->
				<div class="row">
					<div class="col-md-6 col-md-push-6 text-center"> <img src="/LunWen/main/Public/images/step1.png" alt="step-1"> </div>
					<div class="col-md-6 col-md-pull-6 reveal-left-fade">
						<div class="step-number"><span>1</span></div>
						<h4>阅览</h4>
						<p>通过注册登录即可阅览自己学校的毕业论文</p>
					</div>
				</div>
				<!--step 1 end-->
				<!--step 2-->
				<div class="row">
					<div class="col-md-6 text-center"> <img src="/LunWen/main/Public/images/step-2.svg" alt="step-2"> </div>
					<div class="col-md-6 reveal-right-fade">
						<div class="step-number"><span>2</span></div>
						<h4>借阅</h4>
						<p>借阅经过管理员审核，即可联系管理员获取论文实物，更好地参考论文内容</p>
					</div>
				</div>
				<!--step 2 end-->
				<!--step 3-->
				<div class="row">
					<div class="col-md-6 col-md-push-6 text-center"> <img src="/LunWen/main/Public/images/step-3.svg" alt="step-3"> </div>
					<div class="col-md-6 col-md-pull-6 reveal-left-fade">
						<div class="step-number"><span>3</span></div>
						<h4>分类</h4>
						<p>论文资源分类化，方便用户更快锁定自己想看的论文内容</p>
					</div>
				</div>
				<!--step 3 end-->
				<!--step 4-->
				<div class="row">
					<div class="col-md-6 text-center"> <img src="/LunWen/main/Public/images/step-4.svg" alt="step-4"> </div>
					<div class="col-md-6 reveal-right-fade">
						<div class="step-number"><span>4</span></div>
						<h4>客服</h4>
						<p>用户对小程序的功能以及借阅流程有疑惑，都可以向客服提出，客服会及时为你解答</p>
					</div>
				</div>
				<!--step 4 end-->
			</div>
		</div>
	</div>
</section>
<!--How it works end-->


 <!-- =========================
		service section
 ============================== -->  
<section id="karbar-service-section">
	<div class="container">
		<div class="row">
			<!-- Section main title -->
			<div class="col-xs-12 section-title-padding">
				<div class="sec-title-container text-center">
					<div class="title-line"></div>
					<h2 class="uppercase font-weight-7 less-mar-1 server-title">小程序服务</h2>
					<div class="clearfix"></div>
					<p class="by-sub-title">论文资源数据存储管理</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<!--end title-->
			<div class="item">
				<div class="col-md-6">
					<div class="service-left-side active reveal-right-delay">
						<div class="circle"> <i class="fa fa-tablet"></i> </div>
						<div class="text-box">
							<h5 class="title">用户访问监测</h5>
							<p>访问量，阅览量进行实时监测和统计</p>
						</div>
					</div>
				</div>
				<!--end item-->
				<div class="col-md-6">
					<div class="service-right-side active reveal-right-delay">
						<div class="circle"> <i class="fa fa-desktop"></i> </div>
						<div class="text-box">
							<h5 class="title">论文资源上传</h5>
							<p>上传论文资源，更方便</p>
						</div>
					</div>
				</div>
				<!--end item-->
				<div class="clearfix"></div>
				<div class="col-divider-margin-3"></div>
				<div class="col-md-6">
					<div class="service-left-side active reveal-right-delay">
						<div class="circle"> <i class="fa fa-wordpress"></i> </div>
						<div class="text-box">
							<h5 class="title">独立管理</h5>
							<p>高效管理员独立管理，无需其他权限</p>
						</div>
					</div>
				</div>
				<!--end item-->
				<div class="col-md-6">
					<div class="service-right-side active reveal-right-delay">
						<div class="circle"> <i class="fa fa-picture-o"></i> </div>
						<div class="text-box">
							<h5 class="title">优质展示</h5>
							<p>优质内容自由上传与展示</p>
						</div>
					</div>
				</div>
				<!--end item-->
			</div>
		</div>
	</div>
</section>
<div class="tlinks"></div>
<!-- end services -->   

 <!-- =========================
		price section
 ============================== --> 
<section id="karbar-price-section">
	<div class="container">
		<div class="row">
			<!-- Section main title -->
			<div class="col-xs-12 section-title-padding">
				<div class="sec-title-container text-center">
					<div class="title-line"></div>
					<h2 class="uppercase font-weight-7 less-mar-1 server-title">入驻论文库</h2>
					<div class="clearfix"></div>
					<p class="by-sub-title">为你的学校开通论文库，进行有效的管理与服务</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- end title -->
			<div class="pricing-table">
				<div class="col-md-5">
					<form action="<?php echo U('Home/Index/apply');?>" method="post" class="form" id="applyform">
							
					<div class="form-group">
						<label class="text-light" for="">注册学校</label>&nbsp;<span class="school_check" style="font-size:12px;"></span>
						<input type="text" name="school" id="school" value="" class="form-control" placeholder="输入注册学校"/>
					</div>
			
			
					<div class="form-group">
						<label class="text-light" for="">注册人姓名</label>&nbsp;<span class="user_check" style="font-size:12px;"></span>
						<input type="text" name="user" id="user" value="" class="form-control" placeholder="输入注册人姓名"/>
					</div>
			
			
					<div class="form-group">
						<label class="text-light" for="">身份证号</label>&nbsp;<span class="usercard_check" style="font-size:12px;"></span>
						<input type="text" name="usercard" id="usercard" value="" class="form-control" placeholder="输入身份证号"/>
					</div>
			
			
					<div class="form-group">
						<label class="text-light" for="">邮箱</label>&nbsp;<span class="email_check" style="font-size:12px;"></span>
						<input type="text" name="email" id="applyemail" value="" class="form-control" placeholder="输入邮箱"/>
					</div>
					<div class="form-group">
						<label class="text-light" for="">联系手机</label>&nbsp;<span class="phone_check" style="font-size:12px;"></span>
						<input type="text" name="phone" id="applyphone" value="" class="form-control" placeholder="输入手机号码"/>
					</div>
		
					<div class="form-group">
						<label class="text-light" for="">用户名</label>&nbsp;<span class="username_check" style="font-size:12px;"></span>
						<input type="text" name="username" id="username" value="" class="form-control" placeholder="输入用户名"/>
					</div>
		
					<div class="form-group">
						<label class="text-light" for="">密码</label>&nbsp;<span class="password_check" style="font-size:12px;"></span>
						<input type="password" name="password" id="password" value="" class="form-control" placeholder="输入密码"/>
					</div>
			
					<div class="form-group">
						<label class="text-light" for="">确认密码</label>&nbsp;<span class="repassword_check" style="font-size:12px;"></span>
						<input type="password" name="repassword" id="repassword" value="" class="form-control" placeholder="输入密码"/>
					</div>
		
					<div class="form-group">
						<label class="text-light" for="">验证码</label>&nbsp;<span class="yzm_check" style="font-size:12px;"></span>
						<div class="row">
							<div class="col-md-4">							
								<input type="text" name="yzm" id="yzm" value="" class="form-control" maxlength="4" placeholder="输入验证码"/>
							</div>
							<div class="col-md-4">
								<img src="<?php echo U('Home/Index/yzm');?>" class="img-responsive" id="yzmImg" title="看不清，换一张" onclick="this.src="<?php echo U('Home/Index/yzm');?>";"/>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-google">注册申请</button><br><span class="submit_check" style="font-size:12px;"></span>
				</form>
			</div>
			<div class="col-md-7">
				<img src="/LunWen/main/Public/images/slider/slide2.jpg" class="img-responsive" />
			</div>
		</div>
	</div>
</section>
<!-- end price -->

 <!-- =========================
		Gmap, ContactForm section
 ============================== -->   
<!--  -->
<section id="karbar-footer-section">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div id="gmap"></div>
			<div class="contact-form clearfix">
				<form method="post" action="<?php echo U('Home/Index/send');?>" class="" id="ajax-contact">
					<div class="col-sm-6">
						<div class="input-text">
							<input type="text" name="name" id="name" class="input-name form-control" placeholder="昵称" >
						</div>
						<div class="input-email">
							<input type="email" name="email" id="email" class="input-email form-control" placeholder="邮箱" >
						</div>
						<div class="input-phone">
							<input type="text" name="phone" id="phone" class="input-phone form-control" placeholder="手机">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="textarea-message">
							<textarea name="message" id="message" placeholder="内容" rows="3" ></textarea>
						</div>
						<button type="submit" id="submit" name="submit" class="submit-btn">发送<i class="icon-paper-plane"></i></button>
					</div>
					<!--Result notification -->
						<div id="error-message"></div>
						<div id="form-messages"></div>
				</form>
			</div>
			<div class="contact-info">
				<ul class="clearfix">
					<li><i class="fa fa-phone" aria-hidden="true"></i>
						<p>18579250335</p>
					</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i>
						<p>1192475069@qq.com</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bottom">
		<div class="row">
			<div class="col-sm-12">
				<div class="copyright">
					<p class="copyright">Copyright &copy; 2018.<a href="<?php echo U('../Home');?>" title="本科论文库">本科论文库</a> - 景德镇陶瓷大学科技艺术学院</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end Gmap ContactForm -->

<script src="/LunWen/main/Public/home_js/jquery-1.8.3.min.js"></script>
<!-- plugin js -->
<script src="/LunWen/main/Public/home_js/plugins.js"></script>
<!-- super slider -->
<script type="text/javascript" src="/LunWen/main/Public/home_js/jquery.superslides.min.js"></script>
<!-- contact js -->
<script src="/LunWen/main/Public/home_js/jquery-contact.js"></script>
<!-- retina js -->
<script src="/LunWen/main/Public/home_js/retina.min.js"></script>
<!-- mailchimp -->
<script src="/LunWen/main/Public/home_js/jquery.ajaxchimp.min.js"></script>
<!-- scroll animatin JS -->
<script src="/LunWen/main/Public/home_js/scrollreveal.min.js"></script>
<script src="/LunWen/main/Public/home_js/main.js"></script>
<script src="/LunWen/main/Public/home_js/apply.js"></script>
<!---<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB963i1T-nnKpiJjHmBfZq1zX9nEsgklhQ&callback=initMap" async defer></script>--->
<!-- color js -->
<script src="/LunWen/main/Public/switcher/switcher.js"></script>
<script>
		$('ul.nav li').css('border-bottom','none');
		
		$('#yzmImg').click(function(){
			this.src="<?php echo U('Home/Index/yzm');?>";
		})
</script>

</body>
</html>