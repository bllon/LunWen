<?php
namespace Admins\Controller;
use Think\Controller;
class ApplyController extends Controller {
	
	public function apply_list(){
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./apply_list',2);
			}
			$applyModel=D('apply');
			$apply=$applyModel->where("apply_school like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('applylist',$apply);
			$this->assign('applynum',count($apply));
		}else{
			$applyModel=D('apply');
			$cnt=5;//每页条数
			$num=count($applyModel->select());
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
			
			
			
			$apply=$applyModel->order('apply_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('applylist',$apply);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('applynum',count($apply));
		}		
		
		$this->display();
	}

	public function apply_finish(){
		$this->checkUser();
		if(IS_POST){
			$statu=1;
			if(isset($_POST['Data'])){
				for($i=0;$i++;$i<count($_POST['Data'])){
					$apply_id=$_POST['Data'][$i];
					$applyModel=D('apply');
					$apply=$applyModel->where("apply_id='".$apply_id."'")->find();
					$applyModel->apply_statu=1;
					
					$schoolModel=D('school');
					$schoolModel->school_name=$apply['apply_school'];
					$schoolModel->school_admin=$apply['apply_user'];
					$schoolModel->idcard=$apply['apply_idcard'];
					$schoolModel->phone=$apply['apply_phone'];
					$schoolModel->email=$apply['email'];
					$schoolModel->school_key=md5($apply['apply_school'].$apply['apply_user']);
					$schoolModel->build_time=date('Y-m-d H:i:s',time());
					
					$userModel=D('User');
					$s=yan();
					$userModel->school_name=$apply['apply_school'];
					$userModel->username=$apply['apply_username'];
					$userModel->password=md5($apply['apply_password'].$s);
					$userModel->phone=$apply['apply_phone'];
					$userModel->salt=$s;
					$userModel->host=$_SERVER['REMOTE_ADDR'];
					$userModel->type=1;
					
					if($userModel->add()&&$schoolModel->add()&&$applyModel->where("apply_id='".$apply_id."'")->save()){
						
					}else{
						$statu=0;
					}
				}
				if($statu=1){
					print_r('success');
					exit;
				}else{
					print_r('error');
					exit;
				}
			}else{
				print_r('error');
				exit;
			}
			
		}
		
		$apply_id=I('apply_id');
		$applyModel=D('apply');
		$apply=$applyModel->where("apply_id='".$apply_id."'")->find();
		$applyModel->apply_statu=1;
		
		$schoolModel=D('school');
		$schoolModel->school_name=$apply['apply_school'];
		$schoolModel->school_admin=$apply['apply_user'];
		$schoolModel->idcard=$apply['apply_idcard'];
		$schoolModel->phone=$apply['apply_phone'];
		$schoolModel->email=$apply['email'];
		$schoolModel->school_key=md5($apply['apply_school'].$apply['apply_user']);
		$schoolModel->build_time=date('Y-m-d H:i:s',time());
		
		$userModel=D('User');
		$s=yan();
		$userModel->school_name=$apply['apply_school'];
		$userModel->username=$apply['apply_username'];
		$userModel->password=md5($apply['apply_password'].$s);
		$userModel->phone=$apply['apply_phone'];
		$userModel->salt=$s;
		$userModel->host=$_SERVER['REMOTE_ADDR'];
		$userModel->type=1;
		
		if($userModel->add()&&$schoolModel->add()&&$applyModel->where("apply_id='".$apply_id."'")->save()){
			$this->success('审核成功','',2);
		}else{
			$this->error('审核失败','',2);
		}
	}
	public function apply_del(){
		$this->checkUser();
		$apply_id=I('id');
		if($apply_id){
			$applyModel=D('apply');
			$apply=$applyModel->where("apply_id='".$apply_id."'")->find();
			
			$schoolModel=D('school');
			if($applyModel->where("apply_id='".$apply_id."'")->delete()){
				$schoolModel->where("school_name='".$apply['apply_school']."'")->delete();
				$this->success('删除成功','',2);
			}else{
				$this->error('删除失败','',2);
			}
		}
		
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