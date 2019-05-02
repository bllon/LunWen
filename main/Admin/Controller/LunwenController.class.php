<?php
namespace Admin\Controller;
use Think\Controller;
class LunwenController extends Controller {
	
	//上传论文基本信息
	public function upload_message(){
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

    		if($_FILES['myfile']){
    			
				$config = array(
				    'maxSize' => 61457289,
				    'rootPath' =>  './Upload/',
				    'savePath' => '',

				    'exts'  => array('jpg', 'gif', 'png', 'jpeg'),
				    'autoSub' => true,
				    'subName' => array('date','Y-m-d'),
			   );
			   $upload = new \Think\Upload($config);// 实例化上传类
			   $info = $upload->upload();
			   if(!$info) {
			    	$this->error($upload->getError());
			   }else{
			   		$lunwenModel=D('lunwen');
					$lunwen=$lunwenModel->order('lunwen_id')->select();
					$lunwen=end($lunwen);
					$lunwenModel->lunwen_id=intval($lunwen['lunwen_id'])+1;
					$lunwenModel->lunwen_title=$_POST['lunwen_title'];
					$lunwenModel->writer=$_POST['writer'];
					$lunwenModel->sex=$_POST['sex'];
					$lunwenModel->major=$_POST['major'];
					$lunwenModel->rank_type=$_POST['rank'];
					$lunwenModel->lunwen_rank=$_POST['sel'];
					$lunwenModel->biaoji=$_POST['biaoji'];
					$lunwenModel->addtime=$_POST['addtime'];
				    

					
						//图片路径
						$img_path='./Upload/'.$info[0]['savepath'].$info[0]['savename'];
						//生成缩略图
						$image=new \Think\Image();
						$image->open($img_path);
						
						//利用作者名和添加时间进行加密生成文件夹
						$filepath=md5($_POST['writer'].createRandStr('',5));
						$lunwenModel->filepath=$filepath;
						
						if(!is_readable('./Upload/'.$info[0]['savepath'].$filepath.'/'))
					    {
					        is_file('./Upload/'.$info[0]['savepath'].$filepath.'/') or mkdir('./Upload/'.$info[0]['savepath'].$filepath.'/',0700);
					    }
						
						$img_xiao='./Upload/'.$info[0]['savepath'].$filepath.'/'.$info[0]['savename'];
						
						$ext = strripos($img_xiao,'.');
						$img_xiao = substr($img_xiao,0,$ext);
						$img_xiao=$img_xiao.'.png';
						
						$image->thumb(3000,2000)->save($img_xiao);						
					
						$lunwenModel->lunwen_img=$img_xiao;
						
						$lunwenModel->school_name=$schoolname;				
						
						if($lunwenModel->add()){
							$this->success('上传成功','',1);
							print_r('上传成功');
						}else{
							$this->error('上传失败','',1);
							print_r('上传失败');
						}
			   	}
				
				
			}
    	}
		$this->display();
	}
	
	//上传论文图片
	public function upload_img(){
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
		$lunwen=$lunwenModel->order('lunwen_id')->where("school_name='".$schoolname."'")->select();
		$lunwen=end($lunwen);
		$this->assign('lunwen',$lunwen);
		if(IS_POST){

    		if($_FILES['myfile']){
    			
				$config = array(
				    'maxSize' => 614572899,
				    'rootPath' =>  './Upload/',
				    'savePath' => '',

				    'exts'  => array('jpg' , 'png', 'jpeg'),
				    'autoSub' => true,
				    'subName' => array('date','Y-m-d'),
			   );
			   $upload = new \Think\Upload($config);// 实例化上传类
			   $info = $upload->upload();
			   if(!$info) {
			    	$this->error($upload->getError());
			   }else{
					$lunwen_id=$lunwen['lunwen_id'];
					$lunwen=$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->select();
					
					if(empty($lunwen)){
						$this->error('找不到该论文','',2);
						print_r('找不到论文');
					}
					
					$filepath=$lunwen[0]['filepath'];
					$thumbimg=$lunwen[0]['thumb_img'];
					$thumb_data=[];
					
					if($thumbimg!=null){
						$thumb_data=json_decode($thumbimg);
					}
					
					
				    foreach($info as $k => $file){
				    	
						//图片路径
						$img_path='./Upload/'.$file['savepath'].$file['savename'];
						
						//生成缩略图
						$image=new \Think\Image();
						$image->open($img_path);
						
						if(!is_readable('./Upload/'.$file['savepath'].$filepath.'/thumb/'))
					    {
					        is_file('./Upload/'.$file['savepath'].$filepath.'/thumb/') or mkdir('./Upload/'.$file['savepath'].$filepath.'/thumb/',0700);
					    }
						
						$img_xiao='./Upload/'.$file['savepath'].$filepath.'/thumb/'.$file['savename'];
						//处理文件后缀
						$ext = strripos($img_xiao,'.');
						$img_xiao = substr($img_xiao,0,$ext);
						$img_xiao=$img_xiao.'.png';

						$image->thumb(2560,3410)->save($img_xiao);
						$thumb_data[]=$img_xiao;
					
				    }
					
					$lunwenModel->thumb_img=json_encode($thumb_data);
					
					
					
					if($lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->save()){
						$this->success('上传成功','',1);
						print_r('上传成功');
					}else{
						$this->error('上传失败','',1);
						print_r('上传失败');
					}
			   	}
				
				
			}
    	}
		$this->display();
	}
	
	//上传论文相关文档
    public function upload_word(){
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
    		if($_FILES['myfile']){
    			
				$config = array(
				    'maxSize' => 61457289,
				    'rootPath' =>  './Upload/',
				    'savePath' => 'word',

				    'exts'  => array('jpg' , 'png', 'jpeg'),
				    'autoSub' => true,
				    'subName' =>'',
			   );
			   $upload = new \Think\Upload($config);// 实例化上传类
			   $info = $upload->upload();
			   if(!$info) {
			    	$this->error($upload->getError());
			   }else{
			   		
			   		$lunwen_wordModel=D('lunwen_word');
					$word_type=$_POST['word_type'];
					$lunwen_word=$lunwen_wordModel->where("word_type='".$word_type."' and school_name='".$schoolname."'")->select();
					
					if(!empty($lunwen_word)){
						$this->error('已有该文档','',2);
						print_r('已有该文档');
					}
					$lunwen_wordModel->word_type=$word_type;
					$thumb_data=[];
					
					
					
					
				    foreach($info as $k => $file){
				    	
						//图片路径
						$img_path='./Upload/'.$file['savepath'].$file['savename'];
						
						//生成缩略图
						$image=new \Think\Image();
						$image->open($img_path);
						
						if(!is_readable('./Upload/'.$file['savepath'].'/thumb/'))
					    {
					        is_file('./Upload/'.$file['savepath'].'/thumb/') or mkdir('./Upload/'.$file['savepath'].'/thumb/',0700);
					    }
						
						$img_xiao='./Upload/'.$file['savepath'].'/thumb/'.$file['savename'];
						$ext = strripos($img_xiao,'.');
						$img_xiao = substr($img_xiao,0,$ext);
						$img_xiao=$img_xiao.'.png';
						$image->thumb(2560,3410)->save($img_xiao);
						
						$thumb_data[]=$img_xiao;

				    }
					
					$lunwen_wordModel->word_img=json_encode($thumb_data);
					
					$lunwen_wordModel->school_name=$schoolname;
					
					if($lunwen_wordModel->add()){
						$this->success('上传成功','',1);
						print_r('上传成功');
					}else{
						$this->error('上传失败','',1);
						print_r('上传失败');
					}
			   	}
				
				
			}
    	}
		$this->display();
	}

	//上传论文汇编
	public function upload_lunwenBook(){
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
			if($_POST['addtime']==''){
				$this->error('未选择上传时间','',1);
			}
    		if($_FILES['myfile']){
    			
				$config = array(
				    'maxSize' => 614572899,
				    'rootPath' =>  './Upload/',
				    'savePath' => '',

				    'exts'  => array('jpg', 'gif', 'png', 'jpeg'),
				    'autoSub' => true,
				    'subName' => array('date','Y-m-d'),
			   );
			   $upload = new \Think\Upload($config);// 实例化上传类
			   $info = $upload->upload();
			   if(!$info) {
			    	$this->error($upload->getError());
			   }else{
			   		$bookModel=D('lunwenbook');
					$bookModel->addtime=$_POST['addtime'];
				    

					
						//图片路径
						$img_path='./Upload/'.$info[0]['savepath'].$info[0]['savename'];
						//生成缩略图
						$image=new \Think\Image();
						$image->open($img_path);
						
						//利用作者名和添加时间进行加密生成文件夹
						$filepath=md5($_POST['addtime'].createRandStr('',5));
						$bookModel->filepath=$filepath;
						
						if(!is_readable('./Upload/'.$info[0]['savepath'].$filepath.'/'))
					    {
					        is_file('./Upload/'.$info[0]['savepath'].$filepath.'/') or mkdir('./Upload/'.$info[0]['savepath'].$filepath.'/',0700);
					    }
						
						$img_xiao='./Upload/'.$info[0]['savepath'].$filepath.'/'.$info[0]['savename'];
						$ext = strripos($img_xiao,'.');
						$img_xiao = substr($img_xiao,0,$ext);
						$img_xiao=$img_xiao.'.png';
						$image->thumb(2500,3000)->save($img_xiao);
						

						$bookModel->book_img=$img_xiao;

						$bookModel->school_name=$schoolname;
						
						if($bookModel->add()){
							$this->success('上传成功','',1);
							print_r('上传成功');
						}else{
							$this->error('上传失败','',1);
							print_r('上传失败');
						}
			   	}
				
				
			}
    	}
		$this->display();
	}
	
	//上传论文汇编图片
	public function upload_bookImg(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$bookModel=D('lunwenbook');
		$book=$bookModel->where("school_name='".$schoolname."'")->select();
		$book=end($book);
		$this->assign('book',$book);
		if(IS_POST){

    		if($_FILES['myfile']){
    			
				$config = array(
				    'maxSize' => 614572899,
				    'rootPath' =>  './Upload/',
				    'savePath' => '',

				    'exts'  => array('jpg' , 'png', 'jpeg'),
				    'autoSub' => true,
				    'subName' => array('date','Y-m-d'),
			   );
			   $upload = new \Think\Upload($config);// 实例化上传类
			   $info = $upload->upload();
			   if(!$info) {
			    	$this->error($upload->getError());
			   }else{

					$book_id=$book['book_id'];
					$book=$bookModel->where("book_id='".$book_id."' and school_name='".$schoolname."'")->select();
					
					if(empty($book)){
						$this->error('找不到该论文','',2);
						print_r('找不到论文');
					}
					
					$filepath=$book[0]['filepath'];
					$thumbimg=$book[0]['thumb_img'];
					$thumb_data=[];
					
					if($thumbimg!=null){
						$thumb_data=json_decode($thumbimg);
					}
					
					
				    foreach($info as $k => $file){
				    	
						//图片路径
						$img_path='./Upload/'.$file['savepath'].$file['savename'];
						
						//生成缩略图
						$image=new \Think\Image();
						$image->open($img_path);
						
						if(!is_readable('./Upload/'.$file['savepath'].$filepath.'/thumb/'))
					    {
					        is_file('./Upload/'.$file['savepath'].$filepath.'/thumb/') or mkdir('./Upload/'.$file['savepath'].$filepath.'/thumb/',0700);
					    }
						
						$img_xiao='./Upload/'.$file['savepath'].$filepath.'/thumb/'.$file['savename'];
						$ext = strripos($img_xiao,'.');
						$img_xiao = substr($img_xiao,0,$ext);
						$img_xiao=$img_xiao.'.png';
						$image->thumb(2400,3000)->save($img_xiao);
						
						$thumb_data[]=$img_xiao;

				    }
					
					$bookModel->thumb_img=json_encode($thumb_data);
					if($bookModel->where("book_id='".$book_id."' and school_name='".$schoolname."'")->save()){
						$this->success('上传成功','',1);
						print_r('上传成功');
					}else{
						$this->error('上传失败','',1);
						print_r('上传失败');
					}
			   	}
				
				
			}
    	}
		$this->display();
	}
	
	//修改论文信息
	public function update(){
		$this->checkUser();
		
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		
		$index=$_GET['index'];
		$newValue=$_GET['message'];
		$n=$_GET['n'];
		$newValue=trim($newValue);
		$lunwenModel=D('lunwen');
		switch($n){
			case 2:$lunwenModel->lunwen_title=$newValue;break;
			case 3:$lunwenModel->writer=$newValue;break;
			case 4:$lunwenModel->sex=$newValue;break;
			case 5:$lunwenModel->major=$newValue;break;
			case 6:$lunwenModel->lunwen_rank=$newValue;break;
			case 7:$lunwenModel->rank_type=$newValue;break;
			case 8:$lunwenModel->biaoji=$newValue;break;
		}
		if($lunwenModel->where("lunwen_id='".$index."' and school_name='".$schoolname."'")->save()){
			echo 'ok';
		}else{
			echo 'error';
		}
	}
	
	//删除论文
	public function delLunwen(){
		$this->checkUser();
		
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}

		$lunwen_id=I('lunwen_id');
		if($lunwen_id){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->select();
			
			if($lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
			
		}
	}
	
	//公开论文
	public function giveTerms(){
		$this->checkUser();
		
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}

		$lunwen_id=I('lunwen_id');
		if($lunwen_id){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->select();
			$lunwenModel->lunwen_terms=1;
			if($lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->save()){
				$this->success('操作成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
			
		}
	}
	
	//收回公开权限
	public function recoverTerms(){
		$this->checkUser();
		
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}

		$lunwen_id=I('lunwen_id');
		if($lunwen_id){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->select();
			$lunwenModel->lunwen_terms=0;
			if($lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->save()){
				$this->success('操作成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
			
		}
	}
	
	//论文列表
	public function lunwen_list(){
		
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
		$cnt=5;//每页条数
		$num=count($lunwenModel->where("school_name='".$schoolname."'")->select());
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
		
		
		
		$lunwen=$lunwenModel->where("school_name='".$schoolname."'")->order('lunwen_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();

		$this->assign('lunwenlist',$lunwen);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		$this->display();
	}
	
	//借阅列表
	public function borrow_list(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$borrowModel=D('borrow');
		$cnt=5;//每页条数
		$num=count($borrowModel->where("school_name='".$schoolname."'")->select());
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
		
		
		
		$borrow=$borrowModel->where("school_name='".$schoolname."'")->order('borrow_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
		

		$this->assign('borrowlist',$borrow);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		$this->display();
		
	}
	
	//确定借阅
	public function finish_borrow(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$borrow_id=I('borrow_id');
		
		if($borrow_id){
			$borrowModel=D('borrow');
			$borrow=$borrowModel->where("borrow_id='".$borrow_id."' and school_name='".$schoolname."'")->select();
			$unionid=$borrow[0]['consumer_unionid'];
			$lunwen_id=$borrow[0]['lunwenid'];
			$phone=$borrow[0]['phone'];
			$borrowModel->borrow_statu=0;
			
			$consumerModel=D('consumer');
			$consumer=$consumerModel->where("consumer_unionid='".$unionid."' and school_name='".$schoolname."'")->select();
			$consumerModel->borrownum=intval($consumer[0]['borrownum'])+1;
			if($borrowModel->where("borrow_id='".$borrow_id."' and school_name='".$schoolname."'")->save()&&$consumerModel->where("consumer_unionid='".$unionid."' and school_name='".$schoolname."'")->save()){
				//完成借阅,添加归还
				$historyModel=D('history');
				$historyModel->school_name=$schoolname;
				$historyModel->consumer_unionid=$unionid;
				$historyModel->lunwenid=$lunwen_id;
				$historyModel->phone=$phone;
				$historyModel->action="借阅";
				$historyModel->actiontime=date('Y-m-d H:i:s',time());
				
				if($historyModel->add()){
					$this->success('完成借阅','',2);
				}else{
					$this->error('系统异常','',2);
				}
			}else{
				$this->error('系统异常','',2);
			}
		}	
	}
	
	//归还列表
	public function return_list(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$returnModel=D('returns');
		$cnt=5;//每页条数
		$num=count($returnModel->where("school_name='".$schoolname."'")->select());
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
		
		
		
		$return=$returnModel->where("school_name='".$schoolname."'")->order('return_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
		

		$this->assign('returnlist',$return);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		$this->display();
		
	}
	
	//点击归还按钮
	public function finish_return(){
		$schoolname=I('school');
		$lunwen_id=I('return_id');
		if($lunwen_id){
			$borrowModel=D('borrow');
			$borrow=$borrowModel->where("lunwenid='".$lunwen_id."' and school_name='".$schoolname."'")->select();
			$unionid=$borrow[0]['consumer_unionid'];
			$phone=$borrow[0]['phone'];
			if($borrowModel->where("lunwenid='".$lunwen_id."' and school_name='".$schoolname."'")->delete()){
				//完成归还,写入记录
				$returnModel=D('returns');
				$returnModel->school_name=$schoolname;
				$returnModel->consumer_unionid=$unionid;
				$returnModel->lunwenid=$lunwen_id;
				$returnModel->phone=$phone;

				if($returnModel->add()){
					print_r('完成归还');
				}else{
					print_r('系统异常');
				}
			}else{
				print_r('系统异常');
			}
		}
		
	}
	
	//确认归还
	public function returns(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		//接收归还id
		$return_id=I('return_id');
		$returnModel=D('returns');
		$return=$returnModel->where("return_id='".$return_id."' and school_name='".$schoolname."'")->select();
		$unionid=$return[0]['consumer_unionid'];
		$lunwen_id=$return[0]['lunwenid'];
		$phone=$return[0]['phone'];
		if($returnModel->where("return_id='".$return_id."' and school_name='".$schoolname."'")->delete()){
			$historyModel=D('history');
			$historyModel->school_name=$schoolname;
			$historyModel->consumer_unionid=$unionid;
			$historyModel->lunwenid=$lunwen_id;
			$historyModel->phone=$phone;
			$historyModel->action="归还";
			$historyModel->actiontime=date('Y-m-d H:i:s',time());
			if($historyModel->add()){
				$lunwenModel=D('lunwen');
				$lunwenModel->borrow_statu=1;
				
				$consumerModel=D('consumer');
				$consumer=$consumerModel->where("consumer_unionid='".$unionid."' and school_name='".$schoolname."'")->select();
				$consumerModel->borrownum=intval($consumer[0]['borrownum'])-1;
				if($lunwenModel->where("lunwen_id='".$lunwen_id."' and school_name='".$schoolname."'")->save()&&$consumerModel->where("consumer_unionid='".$unionid."' and school_name='".$schoolname."'")->save()){
					$this->success('完成归还','',2);
				}else{
					$this->error('系统异常','',2);
				}
				$this->success('完成归还','',2);
			}else{
				$this->error('系统异常','',2);
			}
		}
	}

	
	//历史记录
	public function history(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$historyModel=D('history');
		$cnt=5;//每页条数
		$num=count($historyModel->where("school_name='".$schoolname."'")->select());
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
		
		
		
		$history=$historyModel->where("school_name='".$schoolname."'")->order('history_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
		

		$this->assign('historylist',$history);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		$this->display();
	}
	
	//分类列表
	public function rank(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$this->assign('school',$schoolname);
		$rankModel=D('rank');
		$rank=$rankModel->where("school_name='".$schoolname."'")->select();
		
		
		$seleModel=D('sele');
		$sele=$seleModel->where("school_name='".$schoolname."'")->select();
		
		
		$cnt=count($rank);//每页条数
		$num=count($seleModel->where("school_name='".$schoolname."'")->select());
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
		
		
		
		$sele=$seleModel->where("school_name='".$schoolname."'")->order('sele_id')->limit(($_GET['page']-1)*$cnt,$cnt)->select();
		

		$this->assign('sele',$sele);
		$this->assign('num',$num);
		$this->assign('current',$_GET['page']);
		$this->assign('nav',getPage($num,$_GET['page'],$cnt));
		
		
		
		
		$this->assign('rank',$rank);
		$this->display();
	}
	
	//搜索
	public function search(){
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
				$lunwenModel=D('lunwen');
				
				//按关键字搜索
				$lunwen=$lunwenModel->where("lunwen_title like '%".$keyWords."%' and school_name='".$schoolname."'")->select();
				if(empty($lunwen)){
										
					//按论文标题搜索
					$lunwen=$lunwenModel->where("lunwen_title='".$keyWords."' and school_name='".$schoolname."'")->select();
					if(empty($lunwen)){
						$this->assign('tishi','搜索结果为空');
					}else{
						foreach($lunwen as $k=>$v){
							$lunwen[$k]['thumb_img']=json_decode($lunwen[$k]['thumb_img']);
						}
						$this->assign('listnum',count($lunwen));
						$this->assign('keywords',$keyWords);
						$this->assign('lunwenlist',$lunwen);
					}
					
				}else{
					foreach($lunwen as $k=>$v){
						$lunwen[$k]['thumb_img']=json_decode($lunwen[$k]['thumb_img']);
					}
					$this->assign('listnum',count($lunwen));
					$this->assign('keywords',$keyWords);
					$this->assign('lunwenlist',$lunwen);
				}
			}
		}
		$this->display();
	}
	
	//添加一级分类
	public function addRank(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		if(IS_POST){
			$rank_type=I('post.rank_type');
			$rankModel=D('rank');
			$rank=$rankModel->where("rank_name='".$rank_type."' and school_name='".$schoolname."'")->select();
			if(!empty($rank)){
				$this->error('已存在该分类','',1);
			}else{
				$rankModel->school_name=$schoolname;
				$rankModel->rank_name=$rank_type;
				if($rankModel->add()){
					$this->success('添加成功','',1);
				}else{
					$this->error('添加失败','',1);
				}
			}
		
		
		}

	}
	
	//添加二级分类
	public function addSele(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		if(IS_POST){
			$rank_type=I('post.ranker');
			$sele_name=I('post.sele');
			if(trim($rank_type)==''){
				$this->error('请选择一级分类','',1);
			}
			$seleModel=D('sele');
			
			$sele=$seleModel->where("sele_name='".$sele_name."' and school_name='".$schoolname."'")->select();
			if(!empty($sele)){
				$this->error('已存在该分类','',1);
			}else{
				$seleModel->school_name=$schoolname;
				$seleModel->sele_name=$sele_name;
				$seleModel->sele_type=$rank_type;
				if($seleModel->add()){
					$this->success('添加成功','',1);
				}else{
					$this->error('添加失败','',1);
				}
			}
		}
	}
	
	//删除一级分类
	public function delRank(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$id=I('id');
		if($id){
			$rankModel=D('rank');
			if($rankModel->where("rank_id='".$id."' and school_name='".$schoolname."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
	}
	
	//删除二级分类
	public function delSele(){
		$this->checkUser();
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$id=I('id');
		if($id){
			$seleModel=D('sele');
			if($seleModel->where("sele_id='".$id."' and school_name='".$schoolname."'")->delete()){
				$this->success('删除成功','',1);
			}else{
				$this->error('操作异常','',1);
			}
		}
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