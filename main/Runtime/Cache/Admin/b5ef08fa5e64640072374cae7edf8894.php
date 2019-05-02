<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>跳转提示</title>
	<link rel="shortcut icon" href="/LunWen/main/Public/images/favicon.png" />
	<link rel="stylesheet" href="/LunWen/main/Public/css/bootstrap-3.3.7-dist/css/bootstrap.css">
	<style>
		*{
			margin:0;
			padding:0;
		}
		body,html{
			width:100%;
			height:100%;
		}
		.app{
			position:absolute;
			width:100%;
			height:100%;
			background:#292929;
			z-index:999;
		}
		.message{
			position:absolute;
			top:50%;
			left:50%;
			transform:translate(-50%,-80%);
			padding: 48px 48px;
			margin:auto; 
			border: #CCC 3px solid; 
			width:500px; 
			border-radius:10px;
			background:#fff;
		}
		.message h2{
			letter-spacing:2px;
		}
		.message p{
			letter-spacing:1px;
			font-size:18px;
		}
	</style>
</head>
<body>
	<div class="app">
		<div class="message">
			<!--成功-->
			<?php if($message){ ?>
				<h2 class='text-center text-success'><?php echo $message;?></h2>
				<p class='text-dark'>
					页面自动
					<strong class='text-primary'>
						<a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>
					</strong>
					等待时间
					<span id="wait" class="text-primary">
						<?php echo $waitSecond;?>
					</span>
					秒
				</p>
			<?php }else{ ?>
				<h2 class='text-center text-danger'><?php echo $error;?></h2>
				<p class='text-dark'>
					页面自动
					<strong class='text-primary'>
						<a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>
					</strong>
					等待时间
					<span id="wait" class="text-primary">
						<?php echo $waitSecond;?>
					</span>
					秒
					
				</p>
			<?php } ?>
			
			
			<!--跳转url:<?php echo($jumpUrl); ?>-->
		</div>
	</div>
</body>
<script type="text/javascript">
		(function(){
		
		var wait = document.getElementById('wait');
		var href = document.getElementById('href').href;
		
		var interval = setInterval(function(){
		
		    var time = --wait.innerHTML;
		
		    if(time <= 0) {
		
		        location.href = href;
		
		        clearInterval(interval);
		
		    };
		
		}, 1000);
		
		})();
	
</script>
</html>