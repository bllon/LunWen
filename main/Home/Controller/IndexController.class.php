<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$visitModel=D('visit');
		$visit=$visitModel->where("visit_ip='".$_SERVER['REMOTE_ADDR']."' and visit_time='".date('Y-m-d',time())."'")->select();
		if(empty($visit)){
			$visitModel->visit_ip=$_SERVER['REMOTE_ADDR'];
			$visitModel->visit_time=date('Y-m-d',time());
			$visitModel->add();
		}
		$this->display();
	}
	
    public function apply(){
    	if(IS_POST){
    		$school_name=I('post.school');
			$user=I('post.user');
			$usercard=I('post.usercard');
			$email=I('post.email');
			$phone=I('post.phone');
			$username=I('post.username');
			$password=I('post.password');
			$repassword=I('post.repassword');
			$yzm=I('post.yzm');
			
			$verify = new \Think\Verify();
			if(!$verify->check($yzm)){
				$this->error('验证码错误','',2);
			}
			
			$applyModel=D('apply');
			$apply=$applyModel->where("apply_school='".$school_name."'")->select();
			if(!empty($apply)){
				$this->error('该学校已注册服务','',2);
			}
			
			$userModel=D('user');
			$userinfo=$userModel->where("username='".$username."'")->select();
			if(!empty($userinfo)){
				$this->error('用户名已存在','',2);
			}
			
			$data=array(
				'apply_school'=>$school_name,
				'apply_user'=>$user,
				'apply_idcard'=>$usercard,
				'apply_phone'=>$phone,
				'email'=>$email,
				'apply_username'=>$username,
				'apply_password'=>$password,
				'apply_time'=>date('Y-m-d H:i:s',time()),
				'apply_statu'=>0
			);
			
			$applyModel=D('apply');
			if($applyModel->add($data)){
				$this->success('成功提交申请','',2);
			}
    	}
    }


	public function send(){
		if(IS_POST){
			$name=trim(I('post.name'));
			$email=trim(I('post.email'));
			$phone=trim(I('post.phone'));
			$message=trim(I('post.message'));
			if($name==''){
				print_r('请输入昵称');
				exit;
			}
			if($email==''){
				print_r('请输入邮箱');
				exit;
			}
			if($phone==''){
				print_r('请输入手机号');
				exit;
			}
			if($message==''){
				print_r('请输入内容');
				exit;
			}
			
			$sendModel=D('send');
			$sendModel->send_user=$name;
			$sendModel->send_email=$email;
			$sendModel->send_phone=$phone;
			$sendModel->send_message=$message;
			$sendModel->send_time=date('Y-m-d H:i:s',time());
			if($sendModel->add()){
				print_r('发送成功');
			}else{
				print_r('发送失败');
			}
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
}