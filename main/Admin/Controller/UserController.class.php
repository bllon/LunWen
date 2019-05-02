<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	//登录
    public function login(){
    	
		$this->clearUser();
		if(IS_POST){
			$school=trim(I('post.school'));
			if($school==''){
				$this->error('请填写学校名称','',2);
			}
			$schoolModel=D('school');
			$schoolinfo=$schoolModel->where("school_name='".$school."'")->select();
			if(empty($schoolinfo)){
				$this->error('该学校暂未开通服务','',2);
			}
			cookie('SYID',md5($school.$schoolinfo[0]['school_admin']));
    		$username=I('post.username');
			$password=I('post.pass');
			$userModel=D('user');
			$user=$userModel->select();
			foreach($user as $v){
				if(strtotime($v['start_time'])>=strtotime($v['off_time'])&&(!is_null($v['off_time']))){
					$userModel->user_statu=0;
					$userModel->where("username='".$v['username']."'")->save();
				}
			}
			
			$userinfo=$userModel->where(array('username'=>$username,'school_name'=>$school))->find();
			if(!$userinfo){
				$this->error('用户名错误','',2);
			}
			
			
			if($userinfo['password']!==md5($password.$userinfo['salt'])){
				$this->error('密码错误','',2);
			}else{
				
				cookie('userid',$userinfo['password']);
				cookie('username',$userinfo['username']);
				$coo_kie=jm($userinfo['username'].$userinfo['password'].C('COO_KIE'));
				cookie('key',$coo_kie);
				
				$userModel->user_statu=1;
				$userModel->start_time=date('Y-m-d H:i:s',time());
				$userModel->host=$_SERVER['REMOTE_ADDR'];
				cookie('sessionid',createRandStr('',15));
				$userModel->sessionid=cookie('sessionid');
				$userModel->where("username='".$username."'")->save();
				
				$this->success('登陆成功','./index.html',2);
			}
			
    	}
    	$this->display();
    }
	
	//注册
	public function register(){
		$this->clearUser();
		if(IS_POST){
			$school=trim(I('post.school'));
			if($school==''){
				$this->error('请填写学校名称','',2);
			}
			$schoolModel=D('school');
			$schoolinfo=$schoolModel->where("school_name='".$school."'")->select();
			if(empty($schoolinfo)){
				$this->error('该学校暂未开通服务','',2);
			}
			
			$userModel=D('User');
			if(!$userModel->create()){
				$this->error($userModel->getError(),'',2);
			}
			
			$registerModel=D('register');
			
			$registerModel->school_name=$school;
			$registerModel->register_username=I('post.username');
			$registerModel->register_password=I('post.password');
			$registerModel->register_phone=I('post.phone');
			$registerModel->register_time=date('Y-m-d H:i:s',time());
			if($registerModel->add()){
				$this->success('注册成功，等待审核..','',2);
			}	
		}
		
		$this->display();
    }
	
	//审核管理员
	public function vet(){
		$id=I('id');
		$registerModel=D('register');
		$register=$registerModel->where("register_id='".$id."'")->find();
		$registerModel->statu=1;
				
		$userModel=D('User');
		$s=yan();
		$userModel->school_name=$register['school_name'];
		$userModel->username=$register['register_username'];
		$userModel->password=md5($register['register_password'].$s);
		$userModel->phone=$register['register_phone'];
		$userModel->salt=$s;
		$userModel->host='';
		
		if($userModel->add()&&$registerModel->where("register_id='".$id."'")->save()){
			$this->success('审核成功','',2);
		}
	}
	
	//删除管理员
	public function del(){
		$this->checkUser();

		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		
		$id=I('id');
		$registerModel=D('register');
		$register=$registerModel->where("register_id='".$id."'")->find();
		
		$userModel=D('User');
		$userModel->where("username='".$register['register_username']."' and school_name='".$schoolname."'")->delete();
		if($registerModel->where("register_id='".$id."'")->delete()){
			$this->success('删除成功','',2);
		}else{
			$this->error('删除失败','',2);
		}
	}
	
	//忘记密码
	public function forgotPassword(){
		if(IS_POST){
			$userModel=D('User');
			$mem=memcache_connect('localhost',11211);
			$code=memcache_get($mem,'code');
			$school=$_POST['school'];
			$username=$_POST['username'];
			$phone=$_POST['phone'];
			$yzm=$_POST['yzm'];
			$password=$_POST['password'];
			$repwd=$_POST['repwd'];
			
			$user=$userModel->where("username='".$username."'")->select();
			
			if($school==''){
				$this->error('请填写学校名称','',2);
			}
			$schoolModel=D('school');
			$schoolinfo=$schoolModel->where("school_name='".$school."'")->select();
			if(empty($schoolinfo)){
				$this->error('该学校暂未开通服务','',2);
			}
			
			if(empty($user)){
				$this->error('用户不存在!','',2);
			}
			
			if($phone!=$user[0]['phone']){
				$this->error('手机号码错误!','',2);
			}
			if($code!=$yzm){
				exit;
				$this->error('验证码错误!','',2);
			}
			if($password!=$repwd){
				$this->error('两次密码不一致!','',2);
			}
			
			
			$userModel->password=$password;
			$s=yan();
			$userModel->password=md5($userModel->password.$s);
			$userModel->salt=$s;
			if($userModel->where("username='".$username."'")->save()){
				$this->success('修改成功!','',2);
			}else{
				$this->error('系统异常!','',2);
			}
			
		}
		
		$this->display();
    }
	
	//短信验证码
	public function getcode(){
		/*
		    ***聚合数据（JUHE.CN）短信API服务接口PHP请求示例源码
		    ***DATE:2015-05-25
		*/

		  
		$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
		
		//设置验证码缓存
		$code="";
		for($i=0;$i<6;$i++){
			$code.=mt_rand(0,9);
		}
		
		$mem=memcache_connect('127.0.0.1',11211);
		memcache_set($mem, 'code', $code, false,120);
		
		$smsConf = array(
		    'key'   => '38ffe4149f327c3fc08402036ca87c59', //您申请的APPKEY
		    'mobile'    => $_GET['phone'], //接受短信的用户手机号码
		    'tpl_id'    => '114904', //您申请的短信模板ID，根据实际情况修改
		    'tpl_value' =>'#code#='.$code //您设置的模板变量，根据实际情况修改
		);
		 
		$content = juhecurl($sendUrl,$smsConf,1); //请求发送短信
		 
		if($content){
		    $result = json_decode($content,true);
		    $error_code = $result['error_code'];
		    if($error_code == 0){
		        //状态为0，说明短信发送成功
		        echo "短信发送成功,短信ID：".$result['result']['sid'];
		    }else{
		        //状态非0，说明失败
		        $msg = $result['reason'];
		        echo "短信发送失败(".$error_code.")：".$msg;
		    }
		}else{
		    //返回内容异常，以下可根据业务逻辑自行修改
		    echo "请求发送短信失败";
		}
		 
		
	}
	
	//测试memcache
	public function mem(){
		$mem=memcache_connect('127.0.0.1',11211);
		var_dump($mem);
	}
	
	//使用说明
	public function useinfo(){
		
		$this->display();
	}
	
	
	//验证码
	public function yzm(){
		ob_clean();
		$Verify=new \Think\Verify();
		$Verify->imageW=150;
		$Verify->imageH=50;
		$Verify->fontSize=20;
		$Verify->length=4;
		$Verify->entry();
	}
	
	//修改密码
	public function update(){
		if(IS_POST){
			$username=cookie('username');
			$curPassword=I('post.curPassword');
			$newPassword=I('post.newPassword');
			$phone=I('post.phone');
			$code=I('post.yzm');
			$verify = new \Think\Verify();
			if(!$verify->check($code)){
				$this->error('验证码错误','./update',2);
			}
			
			$userModel=D('user');
			$user=$userModel->where("username='".$username."'")->select();
			if($user[0]['password']!=md5($curPassword.$user[0]['salt'])){
				$this->error('密码错误','./update',2);
			}
			if($phone!=$user[0]['phone']){
				$this->error('手机号错误','./update',2);
			}
			$userModel->password=md5($newPassword.$user[0]['salt']);
			$userModel->where("username='".$username."'")->save();
			$this->success('修改成功','./update',2);
		}
		$this->display();
	}
	
	//退出登录
	public function logout(){
		$userModel=D('user');
		$userModel->user_statu=0;
		$userModel->offtime=date('Y-m-d H:i:s',time());
		$userModel->sessionid='';
		$userModel->where("username='".cookie('username')."'")->save();
		
		cookie('SYID',null);
		cookie('username',null);
		cookie('userid',null);
		cookie('key',null);
		cookie('sessionid',null);
		$this->success('退出成功!','./login','2');
			
	}
	
	//后台留言
	public function sendMessage(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		if(IS_POST){

			$username=cookie('username');
			$message=trim(I('post.message'));
			$userModel=D('user');
			$user=$userModel->where("username='".$username."' and school_name='".$schoolname."'")->select();
			if(empty($user)){
				$this->error('用户异常','',2);
			}
			if($message==''){
				$this->error('请填写内容','',1);
			}
			$messageModel=D('message');
			$messageModel->school_name=$schoolname;
			$messageModel->user_name=$username;
			$messageModel->message_content=$message;
			$messageModel->addtime=date('Y-m-d H:i:s',time());
			if($messageModel->add()){
				$this->success('留言成功','',1);
			}else{
				$this->error('留言失败','',1);
			}
		}
		$messageModel=D('message');
		$message=$messageModel->where("school_name='".$schoolname."'")->select();
		$this->assign('message',$message);
		$this->display();
	}

	//管理员申请列表
	public function apply_list(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$school=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$registerModel=D('register');
		$cnt=5;//每页条数
		$num=count($registerModel->where("school_name='".$school."'")->select());
		$n=ceil($num/$cnt);//页数
		if(!$_GET['page']){
			$_GET['page']=1;
		}
		if($_GET['to']=='prev'){
			$_GET['page']=$_GET['page']-1;
			$_GET['page']=($_GET['page']<=0?1:$_GET['page']);
		}
		if($_GET['to']=='next'){
			$_GET['page']=$_GET['page']+1;
			$_GET['page']=($_GET['page']>$n?$n:$_GET['page']);
		}
		
		
		
		$register=$registerModel->where("school_name='".$school."'")->order('register_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();	
		$this->assign('registerlist',$register);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
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
	
	//清除用户登录信息
	public function clearUser(){
		$userModel=D('user');
		$userModel->user_statu=0;
		$userModel->sessionid='';
		$userModel->where("username='".cookie('username')."'")->save();
		
		cookie('SYID',null);
		cookie('username',null);
		cookie('userid',null);
		cookie('key',null);
		cookie('sessionid',null);
	}
}