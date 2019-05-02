<?php
namespace Admins\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->checkUser();
		
		$schoolModel=D('school');
		$school=$schoolModel->select();
		$schoolnum=count($school);
		$this->assign('schoolnum',$schoolnum);
		
		$lunwenModel=D('lunwen');
		$lunwen_num=count($lunwenModel->select());
		$bookModel=D('lunwenbook');
		$lunwen_num+=count($bookModel->select());		
		$this->assign('lunwen_num',$lunwen_num);
		
		$userModel=D('user');
		$usernum=count($userModel->select());
		$this->assign('usernum',$usernum);
		
		$consumerModel=D('consumer');
		$consumernum=count($consumerModel->select());
		$this->assign('consumernum',$consumernum);
		
		$visitModel=D('visit');
		$visit=$visitModel->where("visit_time='".date('Y-m-d',time())."'")->select();
		$visit_num=count($visit);
		$this->assign('visit_num',$visit_num);
		
		
		$adminvistModel=D('adminvist');
		$adminvist=$adminvistModel->where("adminvist_time='".date('Y-m-d',time())."'")->select();
		$adminvist_num=count($adminvist);
		$this->assign('adminvist_num',$adminvist_num);
		
		
		$consumerModel=D('consumer');
		$formtime=strtotime(date('Y-m-d',time()).' 00:00:00');
		$totime=strtotime(date('Y-m-d',time()).' 24:00:00');
		$consumer=$consumerModel->where("reg_time>=".$formtime." and reg_time<=".$totime)->select();
		$consumer_num=count($consumer);
		$this->assign('consumer_num',$consumer_num);
		
		//小程序总访问
		$poplunwenModel=D('poplunwen');
		$poplunwen=$poplunwenModel->where("todaytime='".date('Y-m-d',time())."'")->select();
		$popnum=0;
		foreach($poplunwen as $v){
			$popnum+=$v['tapnum'];
		}
		$this->assign('popnum',$popnum);
		
		$this->display();
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