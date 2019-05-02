<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	//首页
    public function index(){
		$this->checkUser();

		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
    	$lunwenModel=D('lunwen');
		$lunwen_num=count($lunwenModel->where("school_name='".$schoolname."'")->select());
		$bookModel=D('lunwenbook');
		$lunwen_num+=count($bookModel->where("school_name='".$schoolname."'")->select());
		
		$userModel=D('user');
		$user=$userModel->where("school_name='".$schoolname."'")->select();

		$consumerModel=D('consumer');
		$consumernum=count($consumerModel->where("school_name='".$schoolname."'")->select());
		
		//总访问
		$poplunwenModel=D('poplunwen');
		$poplunwen=$poplunwenModel->where("school_name='".$schoolname."' and todaytime='".date('Y-m-d',time())."'")->select();
		$popnum=0;
		foreach($poplunwen as $v){
			$popnum+=$v['tapnum'];
		}
		
		$seleModel=D('sele');
		$sele=$seleModel->where("school_name='".$schoolname."'")->select();
		$pop=[];
		for($i=0;$i<count($sele);$i++){
			$s=$sele[$i]['sele_name'];
			$pop[$s]=0;
			for($j=0;$j<count($poplunwen);$j++){
				if($poplunwen[$j]['sele_type']==$sele[$i]['sele_name']){
					$pop[$s]+=1;
				}
			}
		}
		
		$adminvistModel=D('adminvist');
		$adminvist=$adminvistModel->where("adminvist_ip='".$_SERVER['REMOTE_ADDR']."' and adminvist_time='".date('Y-m-d',time())."'")->select();
		if(empty($adminvist)){
			$adminvistModel->adminvist_ip=$_SERVER['REMOTE_ADDR'];
			$adminvistModel->adminvist_time=date('Y-m-d',time());
			$adminvistModel->add();
		}
				
		$userinfo=$userModel->where("school_name='".$schoolname."' and username='".cookie('username')."'")->find();
		$this->assign('type',$userinfo['type']);
		$this->assign('lunwen_num',$lunwen_num);
		$this->assign('users',$user);
		$this->assign('consumernum',$consumernum);
		$this->assign('popnum',$popnum);
		
    	$this->display();
    }
	
	//测试代码
	public function sendFile(){
		var_dump($_FILES);
		var_dump($_POST);
		var_dump($this->getWeek(strtotime('2018-12-10')));
		
		$this->display();
	}
	
	//检测用户登录
	public function checkUser(){
				
		if(cookie('username')==''||cookie('userid')==''||cookie('key')==''){
			$this->error('请登录账户!','/LunWen/main/index.php/Admin/login',2);
		}
    	$sta=che();
		if(!$sta){
			$this->error('请登录账户!','/LunWen/main/index.php/Admin/login',2);
		}
		$userModel=D('user');
		$user=$userModel->where("username='".cookie('username')."'")->select();
		if(empty($user)){
			$this->error('用户异常!','/LunWen/main/index.php/Admin/login',2);
		}
		if(is_null(cookie('SYID'))||cookie('SYID')==''){
			$this->error('系统信息异常','/LunWen/main/index.php/Admin/login',2);
		}
		if($user[0]['sessionid']!=cookie('sessionid')){
			$this->error('该账户在其他设备上登录了','/LunWen/main/index.php/Admin/login',2);
		}
		$schoolModel=D('school');
		$school=$schoolModel->where("school_key='".cookie('SYID')."'")->find();
		if(empty($school)){
			$this->error('此学校未注册!','/LunWen/main/index.php/Admin/login',2);
		}		
	}
}