<?php
	namespace Admin\Controller;
	use Think\Controller;
	class ConsumerController extends Controller {
		
		//用户列表
		public function consumer_list(){
			$this->checkUser();
			$schoolModel=D('school');
			$school=$schoolModel->select();
			foreach($school as $v){
				if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
					$school=$v['school_name'];
				}
			}
			$this->assign('school',$school);
			$consumerModel=D('consumer');
			$cnt=5;//每页条数
			$num=count($consumerModel->where("school_name='".$school."'")->select());
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
			
			
			
			$consumer=$consumerModel->where("school_name='".$school."'")->order('consumer_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
				
			$this->assign('consumerlist',$consumer);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->display();

		}
		
		//用户搜索
		public function consumer_souso(){
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
			$keyWords=trim($_POST['keyWords']);
			if($keyWords!=''){
				$consumerModel=D('consumer');
				
					
					//按用户名搜索
					$consumer=$consumerModel->where("consumer_unionid='".$keyWords."' and school_name='".$schoolname."'")->select();
					if(empty($consumer)){
						$this->assign('tishi','搜索结果为空');
					}else{							
						$this->assign('listnum',count($consumer));
						$this->assign('keywords',$keyWords);
						$this->assign('consumerlist',$consumer);
					}
			
				}
			}
			
			$this->display();
		}
		
		//删除用户
		public function consumer_del(){
			$this->checkUser();
			
			$schoolModel=D('school');
			$school=$schoolModel->select();
			foreach($school as $v){
				if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
					$schoolname=$v['school_name'];
				}
			}
	
			$consumer_id=I('id');
			if($consumer_id){
				$consumerModel=D('consumer');
				$consumer=$consumerModel->where("consumer_id='".$consumer_id."' and school_name='".$schoolname."'")->select();
				
				if($consumerModel->where("consumer_id='".$consumer_id."' and school_name='".$schoolname."'")->delete()){
					$this->success('删除成功','',1);
				}else{
					$this->error('操作异常','',1);
				}
				
			}
		}
		
		
		//借阅
		public function borrowLunwen(){
			if(I('post.school')){
				
				$schoolname=I('post.school');
				$lunwen_id=I('post.lunwen_id');
				$consumer_unionid=I('post.consumer_unionid');
				$phone=I('post.phone');

				if($schoolname!='' && $lunwen_id!='' && $consumer_unionid!='' && $phone!=''){
					
					$consumerModel=D('consumer');
					$consumer=$consumerModel->where("consumer_unionid='".$consumer_unionid."' and school_name='".$schoolname."'")->select();
					if(intval($consumer[0]['borrownum'])>=4){
						print_r('借书已超过上限');
						exit;
					}
					$lunwenModel=D('lunwen');
					$lunwen=$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->select();
					if(!empty($lunwen)){
						if($lunwen[0]['borrow_statu']){
							$borrowModel=D('borrow');
							$borrowModel->school_name=$schoolname;
							$borrowModel->consumer_unionid=$consumer_unionid;
							$borrowModel->lunwenid=$lunwen_id;
							$borrowModel->phone=$phone;
							$borrowModel->borrow_time=time();
							$lunwenModel->borrow_statu=0;
							
							if($borrowModel->add()&&$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->save()){
								print_r('借阅成功!');
							}else{
								print_r('借阅失败!');
							}
						}else{
							print_r('该论文已被借阅');
						}
						
					}else{
						print_r('没有该论文');
					}
					
				}
			}
		}
		
		//检测管理员登录
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
?>