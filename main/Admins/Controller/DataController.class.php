<?php
namespace Admins\Controller;
use Think\Controller;
class DataController extends Controller {
	
	public function lunwen_list(){
		
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./lunwen_list',2);
			}
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("school_name like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('lunwenlist',$lunwen);
			$this->assign('lunwennum',count($lunwen));
		}else{
			$lunwenModel=D('lunwen');
			$cnt=10;//每页条数
			$num=count($lunwenModel->select());
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
			
			
			
			$lunwen=$lunwenModel->order('lunwen_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('lunwenlist',$lunwen);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('lunwennum',count($lunwen));
		}
		$this->display();
	}
	
	public function book_list(){
		
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./book_list',2);
			}
			$bookModel=D('lunwenbook');
			$book=$bookModel->where("school_name like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('booklist',$book);
			$this->assign('booknum',count($book));
		}else{
			$bookModel=D('lunwenbook');
			$cnt=10;//每页条数
			$num=count($bookModel->select());
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
			
			
			
			$book=$bookModel->order('book_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('booklist',$book);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('booknum',count($book));
		}
		$this->display();
	}


	public function word_list(){
		
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./word_list',2);
			}
			$wordModel=D('lunwen_word');
			$word=$wordModel->where("school_name like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('wordlist',$word);
			$this->assign('wordnum',count($word));
		}else{
			$wordModel=D('lunwen_word');
			$cnt=10;//每页条数
			$num=count($wordModel->select());
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
			
			
			
			$word=$wordModel->order('word_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('wordlist',$word);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('wordnum',count($word));
		}
		$this->display();
	}
	
	
	public function school_list(){
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./school_list',2);
			}
			$schoolModel=D('school');
			$school=$schoolModel->where("school_name like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('schoollist',$school);
			$this->assign('schoolnum',count($school));
		}else{
			$schoolModel=D('school');
			$cnt=10;//每页条数
			$num=count($schoolModel->select());
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
			
			
			
			$school=$schoolModel->order('school_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('schoollist',$school);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('schoolnum',count($school));
		}		
		
		$this->display();
	}
	
	public function user_list(){
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./user_list',2);
			}
			$applyModel=D('apply');
			$apply=$applyModel->where("apply_school like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('applylist',$apply);
			$this->assign('applynum',count($apply));
		}else{
			$userModel=D('user');
			$cnt=10;//每页条数
			$num=count($userModel->select());
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
			
			
			
			$user=$userModel->order('user_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('userlist',$user);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('usernum',count($user));
		}		
		
		$this->display();
	}

	public function message_list(){
		$this->checkUser();
		if(IS_POST){
			$keyword=trim(I('post.keyword'));
			if($keyword==''){
				$this->error('请输入关键词','./message_list',2);
			}
			$sendModel=D('send');
			$send=$sendModel->where("send_user like '%".$keyword."%'")->select();
			$this->assign('keyword',$keyword);
			$this->assign('sendlist',$send);
			$this->assign('sendnum',count($send));
		}else{
			$sendModel=D('send');
			$cnt=10;//每页条数
			$num=count($sendModel->select());
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
			
			
			
			$send=$sendModel->order('send_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
	
			$this->assign('sendlist',$send);
			$this->assign('num',$num);
			$this->assign('current',$_GET['page']);
			$this->assign('nav',getPage($num,$_GET['page'],$cnt));
			$this->assign('sendnum',count($send));
		}		
		
		$this->display();
	}
	
	public function lunwen_del(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$lunwenModel=D('lunwen');			
			if($lunwenModel->where("lunwen_id='".$id."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	
	public function book_del(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$bookModel=D('lunwenbook');			
			if($bookModel->where("book_id='".$id."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	
	public function word_del(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$wordModel=D('lunwen_word');			
			if($wordModel->where("word_id='".$id."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	public function user_del(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$userModel=D('user');			
			if($userModel->where("user_id='".$id."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	
	public function message_del(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$sendModel=D('send');			
			if($sendModel->where("send_id='".$id."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	
	public function school_close(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$schoolModel=D('school');
			$schoolModel->statu=0;			
			if($schoolModel->where("school_id='".$id."'")->save()){
				print_r('success');
			}else{
				print_r('error');
			}
		}
	}
	
	public function school_start(){
		$this->checkUser();
		$id=I('id');
		if($id){
			$schoolModel=D('school');	
			$schoolModel->statu=1;		
			if($schoolModel->where("school_id='".$id."'")->save()){
				print_r('success');
			}else{
				print_r('error');
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