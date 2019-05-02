<?php
namespace Admins\Controller;
use Think\Controller;
class UserController extends Controller {
	
	public function login(){
		if(IS_POST){
			$username=I('post.username');
			$password=I('post.password');
			$code=I('post.yzm');
			if($username==''){
				$this->error('请输入用户名','',2);
			}
			if($password==''){
				$this->error('请输入密码','',2);
			}
			if($code==''){
				$this->error('请输入验证码','',2);
			}
			$verify = new \Think\Verify();
			if(!$verify->check($code)){
				$this->error('验证码错误','',2);
			}
			$adminModel=D('administrators');
			$admin=$adminModel->where("admin_username='".$username."'")->find();
			if(md5($password.$admin['salt'])!=$admin['admin_password']){
				$this->error('密码错误','',2);
			}
			cookie('akey',createRandStr('',15));
			$adminModel->session_id=cookie('akey');
			if($adminModel->where("admin_username='".$username."'")->save()){
				cookie('user',$username);
				
				$this->success('登录成功','./Admins/Index/index.html',2);
			}
			
			
		}
			$this->display();
	}
	
	public function register(){
		$username='root';
		$password='5542';
		$phone='18579250335';
		$adminModel=D('administrators');
		$adminModel->admin_username=$username;
		$s=yan();
		$adminModel->admin_password=md5($password.$s);
		$adminModel->admin_phone=$phone;
		$adminModel->salt=$s;
		if($adminModel->add()){
			print_r('注册成功');
		}else{
			print_r('注册失败');
		}
		
	}
	
	public function yzm(){
		ob_clean();
		$Verify=new \Think\Verify();
		$Verify->imageW=150;
		$Verify->imageH=50;
		$Verify->fontSize=22;
		$Verify->length=4;
		$Verify->useCurve=false;
		$Verify->useNoise=fasle;
		$Verify->useImgBg = true;
		$Verify->bg=array(255,255,255);
		$Verify->entry();
	}
	
	public function checkUser(){
		$adminModel=D('administrators');
		$admin=$adminModel->find();
		if(is_null(cookie('user')) || is_null(cookie('akey'))){
			$this->error('请登录账号','/LunWen/main/index.php/Admins/login',2);
		}
		if((cookie('user')+'520')!=($admin['admin_username']+'520')){
			$this->error('系统异常','/LunWen/main/index.php/Admins/login',2);
		}
		if(cookie('akey')!=$admin['session_id']){
			$this->error('该账号在已其他设备上登录','/LunWen/main/index.php/Admins/login',2);
		}
	}    
}