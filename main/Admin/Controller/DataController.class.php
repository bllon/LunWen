<?php
namespace Admin\Controller;
use Think\Controller;
class DataController extends Controller {
	//最新发布论文
    public function newLunwen(){
    	$schoolname=I('school');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$newLunwen=$redis->exists($schoolname.'newLunwen');
		if(!$newLunwen){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("school_name='".$schoolname."'")->order('addtime desc')->limit(0,10)->select();
			$lunwen=json_encode($lunwen);
			$redis->set($schoolname.'newLunwen',$lunwen);
			$redis->expire($schoolname.'newLunwen','86400');
			$data=$redis->get($schoolname.'newLunwen');
		}else{
			$data=$redis->get($schoolname.'newLunwen');
		}	
		print_r($data);
    }
	
	//公开论文
    public function openLunwen(){
    	$schoolname=I('school');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$openLunwen=$redis->exists($schoolname.'openLunwen');
		if(!$openLunwen){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("school_name='".$schoolname."' and lunwen_terms=1")->order('addtime desc')->select();
			$lunwen=json_encode($lunwen);
			$redis->set($schoolname.'openLunwen',$lunwen);
			$redis->expire($schoolname.'openLunwen','86400');
			$data=$redis->get($schoolname.'openLunwen');
		}else{
			$data=$redis->get($schoolname.'openLunwen');
		}		
    	
		print_r($data);
    }
	
	//一级分类下所有论文
    public function oneLunwen(){
    	
    	//获取分类名
    	$schoolname=I('school');
		$rank_name=I('rank_name');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$oneLunwen=$redis->exists($schoolname.$rank_name.'oneLunwen');
		if(!$oneLunwen){
			if($rank_name){
				$lunwenModel=D('lunwen');
				$lunwen=$lunwenModel->where("rank_type='".$rank_name."' and school_name='".$schoolname."'")->select();
				if(empty($lunwen)){
					print_r('error:找不到论文');
					exit;
				}
				$lunwen=json_encode($lunwen);
				$redis->set($schoolname.$rank_name.'oneLunwen',$lunwen);
				$redis->expire($schoolname.$rank_name.'oneLunwen','86400');
				$data=$redis->get($schoolname.$rank_name.'oneLunwen');
				print_r($data);
			}else{
				print_r('error:找不到论文');
				exit;
			}
		}else{
			$data=$redis->get($schoolname.$rank_name.'oneLunwen');
			print_r($data);
		}
		
    }
	
	
	//优秀论文
    public function greatLunwen(){
    	$schoolname=I('school');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$greatLunwen=$redis->exists($schoolname.'greatLunwen');
		if(!$greatLunwen){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("biaoji='精选论文' and school_name='".$schoolname."'")->select();
			$lunwen=json_encode($lunwen);
			$redis->set($schoolname.'greatLunwen',$lunwen);
			$redis->expire($schoolname.'greatLunwen','86400');
			$data=$redis->get($schoolname.'greatLunwen');
			print_r($data);
		}else{
			$data=$redis->get($schoolname.'greatLunwen');
			print_r($data);
		}
    	
    }
	
	//论文缩编
    public function getLunwenBook(){
    	$schoolname=I('school');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$getLunwenBook=$redis->exists($schoolname.'getLunwenBook');
		if(!$getLunwenBook){
			$bookModel=D('lunwenbook');
			$book=$bookModel->where("school_name='".$schoolname."'")->select();
			$book=json_encode($book);
			$redis->set($schoolname.'getLunwenBook',$book);
			$redis->expire($schoolname.'getLunwenBook','86400');
			$data=$redis->get($schoolname.'getLunwenBook');
			print_r($data);
		}else{
			$data=$redis->get($schoolname.'getLunwenBook');
			print_r($data);
		}
    	
    }
	
	//论文文档
	public function getWord(){
		//得到get参数word_type,例如word_type=格式
		$schoolname=I('school');
		$word_type=I('word_type');
		
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		$getWord=$redis->exists($schoolname.$word_type.'getWord');
		if(!$getWord){
			$lunwen_wordModel=D('lunwen_word');
			$lunwen_word=$lunwen_wordModel->where("word_type='".$word_type."' and school_name='".$schoolname."'")->select();
			$lunwen_word=json_encode($lunwen_word[0]);
			$redis->set($schoolname.$word_type.'getWord',$lunwen_word);
			$redis->expire($schoolname.$word_type.'getWord','86400');
			$data=$redis->get($schoolname.$word_type.'getWord');
			print_r($data);
		}else{
			$data=$redis->get($schoolname.$word_type.'getWord');
			print_r($data);
		}
		
	}
			
	//论文详情页
	public function lunwenInfo(){
		$schoolname=I('school');
		$id=I('id');
		if($id){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_id='".$id."' and school_name='".$schoolname."'")->select();
			if(empty($lunwen)){
				print_r('error:找不到论文');
				exit;
			}
			
			//增加点击次数
			$popModel=D('poplunwen');
			$time=date('Y-m-d',time());
			$poplunwen=$popModel->where("todaytime='".$time."' and lunwenid='".$id."' and school_name='".$schoolname."'")->select();
			if(empty($poplunwen)){
				$popModel->school_name=$schoolname;
				$popModel->todaytime=$time;
				$popModel->lunwenid=$id;
				$popModel->rank_type=$lunwen[0]['rank_type'];
				$popModel->sele_type=$lunwen[0]['lunwen_rank'];
				$popModel->tapnum=1;
				$popModel->add();
			}else{
				$popModel->tapnum=$poplunwen[0]['tapnum']+1;
				$popModel->where("todaytime='".$time."' and lunwenid='".$id."' and school_name='".$schoolname."'")->save();
			}
			
			$lunwen=json_encode($lunwen[0]);
			print_r($lunwen);
		}else{
			print_r('error:找不到论文');
		}
	}
	
	//论文缩编详情页
	public function bookInfo(){
		$schoolname=I('school');
		$id=I('id');
		if($id){
			$bookModel=D('lunwenbook');
			$book=$bookModel->where("book_id='".$id."' and school_name='".$schoolname."'")->select();
			if(empty($book)){
				print_r('error:找不到论文');
				exit;
			}		
			$book=json_encode($book[0]);
			print_r($book);
		}else{
			print_r('error:找不到论文');
		}
	}
	
	
	//分类
	public function getRank(){
		$schoolname=I('school');
		if($schoolname!=''){
			$rankModel=D('rank');
			$seleModel=D('sele');
			$rank=$rankModel->where("school_name='".$schoolname."'")->select();
			$sele=$seleModel->where("school_name='".$schoolname."'")->select();
			
			
			$ranks=[];
			$seles=[];
			
			foreach($rank as $k=>$v){
				$ranks[$k]['name']=$v['rank_name'];
				foreach($sele as $i=>$j){
					if($v['rank_name']==$j['sele_type']){
						$seles[$k][]=$j['sele_name'];
					}	
				}	
			}
			
			$data=array('rank'=>$ranks,'sele'=>$seles);
			$data=json_encode($data);
			print_r($data);
		}else{
			$this->checkUser();
			$schoolModel=D('school');
			$school=$schoolModel->select();
			foreach($school as $v){
				if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
					$schoolname=$v['school_name'];
				}
			}
			$rankModel=D('rank');
			$seleModel=D('sele');
			$rank=$rankModel->where("school_name='".$schoolname."'")->select();
			$sele=$seleModel->where("school_name='".$schoolname."'")->select();
			
			
			$ranks=[];
			$seles=[];
			
			foreach($rank as $k=>$v){
				$ranks[$k]['name']=$v['rank_name'];
				foreach($sele as $i=>$j){
					if($v['rank_name']==$j['sele_type']){
						$seles[$k][]=$j['sele_name'];
					}	
				}	
			}
			
			$data=array('rank'=>$ranks,'sele'=>$seles);
			$data=json_encode($data);
			print_r($data);
		}
		
	}
	
	
	//具体分类论文表
	public function rankLunwen(){
		//获取分类名
		$schoolname=I('school');
		$sel_name=I('sele_name');
		if($sel_name){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_rank='".$sel_name."' and school_name='".$schoolname."'")->select();
			if(empty($lunwen)){
				print_r('error:找不到论文');
				exit;
			}
			$lunwen=json_encode($lunwen);
			print_r($lunwen);
		}else{
			print_r('error:找不到论文');
		}
	}
	
	//论文搜索
	public function search(){
		//获取用户输入关键字
		$schoolname=I('school');
		$keyWords=I('keyWords');
		if($keyWords&&$keyWords!=""){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_title like '%".$keyWords."%' and school_name='".$schoolname."'")->select();
			if(empty($lunwen)){
				print_r('搜索结果为空');
			}else{
				$lunwen=json_encode($lunwen);
				print_r($lunwen);
			}
		}else{
			print_r('搜索结果为空');
		}
		
	}
	
	//论文点赞
	public function likeClick(){
		$schoolname=I('school');
		$id=I('id');
		$action=I('action');
		if($id){
			$lunwenModel=D('lunwen');
			$lunwen=$lunwenModel->where("lunwen_id='".$id."' and school_name='".$schoolname."'")->select();
			if(empty($lunwen)){
				print_r('error:找不到论文');
				exit;
			}
			$likenumModel=D('likeclick');		
			if($action==0){
				$lunwenModel->likenum=intval($lunwen[0]['likenum'])-1;
				$like=$likenumModel->where("today='".date('Y-m-d',time())."' and school_name='".$schoolname."'")->select();
				$likenumModel->like_num=intval($like[0]['like_num'])-1;
				if($likenumModel->like_num<0){
					$likenumModel->like_num=0;
				}
				$likenumModel->where("today='".date('Y-m-d',time())."' and school_name='".$schoolname."'")->save();
				$msg='取消点赞';
			}else if($action==1){
				$lunwenModel->likenum=intval($lunwen[0]['likenum'])+1;
				$like=$likenumModel->where("today='".date('Y-m-d',time())."' and school_name='".$schoolname."'")->select();
				if(empty($like)){
					$likenumModel->school_name=$schoolname;
					$likenumModel->like_num=1;
					$likenumModel->click_date=time();
					$likenumModel->today=date('Y-m-d',time());
					$likenumModel->add();
				}else{
					$likenumModel->like_num=intval($like[0]['like_num'])+1;
					$likenumModel->where("today='".date('Y-m-d',time())."' and school_name='".$schoolname."'")->save();
				}
				$msg='点赞成功';
			}else{
				print_r('error:操作异常');
				exit;
			}
			if($lunwenModel->likenum<0){
				$lunwenModel->likenum=0;
			}
			if($lunwenModel->where("lunwen_id='".$id."' and school_name='".$schoolname."'")->save()){
				print_r($msg);
			}
		}else{
			print_r('error:找不到论文');
		}
		
	}

	//周访问数据
	public function getWeekData(){
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$monday='';
		$todayWeek='';
		switch($this->getWeek(time())){
			    case '星期天':
			      $monday=time()-(86400*6);
				  $todayWeek=7;
			    break;
			    case '星期一':
			      $monday=time();
				  $todayWeek=1;
			    break;
			    case '星期二':
			      $monday=time()-86400; 
				  $todayWeek=2;
			    break;
			    case '星期三':
			      $monday=time()-(86400*2);
					$todayWeek=3;
			    break;
			    case '星期四':
			      $monday=time()-(86400*3);
					$todayWeek=4;
			    break;
			    case '星期五':
			      $monday=time()-(86400*4);
					$todayWeek=5;
			    break;
			    case '星期六':
			      $monday=time()-(86400*5);
					$todayWeek=6;
			    break;
		  }
		$monday=date('Y-m-d',$monday);
		$monday=strtotime($monday.'00:00');
		$weekData=[];
		for($i=1;$i<=$todayWeek;$i++){
			$weekData[$i]=array();
			
			$fromday=$monday+($i-1)*86400;
			$today=$fromday+86400;
			
			$borrowModel=D('borrow');
			$likenumModel=D('likeclick');
			$like=$likenumModel->where("click_date>=".$fromday." and click_date<".$today." and school_name='".$schoolname."'")->select();
			if(empty($like)){
				$weekData[$i]['click']=0;
			}else{
				$weekData[$i]['click']=$like[0]['like_num'];
			}
			
			$weekData[$i]['borrow']=count($borrowModel->where("borrow_time>=".$fromday." and borrow_time<".$today." and school_name='".$schoolname."'")->select());
			
			$consumerModel=D('consumer');
			$consumer=$consumerModel->where("reg_time>=".$fromday." and reg_time<".$today." and school_name='".$schoolname."'")->select();
			if(empty($consumer)){
				$weekData[$i]['register']=0;
			}else{
				$weekData[$i]['register']=count($consumer);
			}
		}
		
		$data=[];
		$data['borrow']=[];
		$data['click']=[];
		$data['register']=[];
		for($i=1;$i<=7;$i++){
			if($weekData[$i]){
				array_push($data['borrow'],$weekData[$i]['borrow']);
				array_push($data['click'],$weekData[$i]['click']);
				array_push($data['register'],$weekData[$i]['register']);
			}else{
				array_push($data['borrow'],0);
				array_push($data['click'],0);
				array_push($data['register'],0);
			}
		}
		$data=json_encode($data);
		print_r($data);
	}
	
	public function getWeek($unixTime=''){

		 $unixTime=is_numeric($unixTime)?$unixTime:time();
		
		 $weekarray=array('日','一','二','三','四','五','六');
		
		 return '星期'.$weekarray[date('w',$unixTime)];
		
	}
	
	//月排行数据
	public function getMonthData(){
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		
		$today=time();
		$fromday=time()-30*86400;
		
		$poplunwenModel=D('poplunwen');
		$poplunwen=$poplunwenModel->where("todaytime>='".date('Y-m-d',$fromday)."' and todaytime<='".date('Y-m-d',$today)."' and school_name='".$schoolname."'")->select();
		$seleModel=D('sele');
		$sele=$seleModel->where("school_name='".$schoolname."'")->select();
		$data=[];
		foreach($sele as $v){
			$data[$v['sele_name']]=0;
			foreach($poplunwen as $p){
				if($p['sele_type']==$v['sele_name']){
					$data[$v['sele_name']]+=intval($p['tapnum']);
				}
			}
		}
		arsort($data);
		$monthData=[];
		$num=0;
		$n=0;
		foreach($data as $k => $v){
			$num+=$v;
		}
		foreach($data as $k => $v){
			$data[$k]=round(($v/$num)*100);
			$n++;
			if($n<=3){
				$monthData[$k]=$data[$k];
			}else{
				$monthData['其他']+=$data[$k];
			}
		}
		$keys=array_keys($monthData);
		$values=array_values($monthData);
		$data=array('k'=>$keys,'v'=>$values);
		$data=json_encode($data);
		print_r($data);
	}
	
	//获取用户信息
	public function getConsumer(){
		if(I('post.school')){
			$school=I('post.school');
			$consumer_unionid=I('post.consumer_unionid');
			$password=I('post.password');
			$schoolModel=D('school');
			$schoolinfo=$schoolModel->where("school_name='".$school."'")->find();
			if(empty($schoolinfo)){
				print_r('该学校无此服务!');
				exit;
			}
			if($schoolinfo['statu']==0){
				print_r('该学校已停止服务!');
				exit;
			}	
			$consumerModel=D('consumer');
			$consumerinfo=$consumerModel->where("consumer_unionid='".$_POST['consumer_unionid']."'")->find();
			if(!empty($consumerinfo)){
				print_r('此用户已注册');
				exit;
			}	
			$s=yan();
			$consumerModel->school_name=$school;
			$consumerModel->consumer_unionid=$consumer_unionid;
			$consumerModel->password=md5($password.$s);
			$consumerModel->reg_time=time();
			$consumerModel->salt=$s;
			if($consumerModel->add()){
				print_r('注册成功!');
				exit;
			}else{
				print_r('系统异常!');
				exit;
			}
			
		}	
	}
	
	//用户借阅的论文
	public function userBorrowList(){
		$schoolname=I('school');
		$id=I('consumer_unionid');
		if($id!=''){
			$consumerModel=D('consumer');
			$consumer=$consumerModel->where("consumer_unionid='".$id."' and school_name='".$schoolname."'")->select();
			if(empty($consumer)){
				print_r('用户异常');
				exit;
			}
			$list=[];
			$borrowModel=D('borrow');
			$borrow=$borrowModel->where("consumer_unionid='".$id."' and school_name='".$schoolname."'")->select();
			if(!empty($borrow)){
				$lunwenModel=D('lunwen');
				$data=[];
				foreach($borrow as $v){
					$lunwen=$lunwenModel->where("lunwen_id='".$v['lunwenid']."' and school_name='".$schoolname."'")->select();
					$lunwen[0]['borrow_statu']=$v['borrow_statu'];
					$data[]=$lunwen[0];
				}
				$list['borrow']=$data;
			}else{
				$list['borrow']='暂无借书';
			}
			$returnModel=D('returns');
			$return=$returnModel->where("consumer_unionid='".$id."' and school_name='".$schoolname."'")->select();
			if(!empty($return)){
				$lunwenModel=D('lunwen');
				$data=[];
				foreach($return as $v){
					$lunwen=$lunwenModel->where("lunwen_id='".$v['lunwenid']."' and school_name='".$schoolname."'")->select();
					$data[]=$lunwen[0];
				}
				$list['return']=$data;
			}else{
				$list['return']='无待归还论文';
			}
			$list=json_encode($list);
			print_r($list);
		}
	}
	
	//用户登录
	public function consumerLogin(){
		
		if(I('post.school')){
			$school=I('post.school');	
    		$consumer_unionid=I('post.consumer_unionid');
			$password=I('post.password');
			
			$schoolModel=D('school');
			$schoolinfo=$schoolModel->where("school_name='".$school."'")->find();
			if(empty($schoolinfo)){
				print_r('该学校无此服务!');
				exit;
			}
			
			if($schoolinfo['statu']==0){
				print_r('该学校已停止服务!');
				exit;
			}		
			
			$consumerModel=D('consumer');
			$consumerinfo=$consumerModel->where("consumer_unionid='".$consumer_unionid."' and school_name='".$school."'")->find();
			if(empty($consumerinfo)){
				print_r('学号错误');
				exit;
			}
			
			if($consumerinfo['password']!==md5($password.$consumerinfo['salt'])){
				print_r('密码错误');
				exit;
			}else{
				cookie('userid',$consumerinfo['password']);
				cookie('consumer_unionid',$consumerinfo['consumer_unionid']);
				
				$coo_kie=jm($consumerinfo['consumer_unionid'].$consumerinfo['password'].C('COO_KIE'));
				cookie('key',$coo_kie);
				print_r('登录成功');
			}
			
    	}
	}
	
	
	//创建随机字符串
	public function createUnionid(){
		return createRandStr('user',15);
	}
	
	//获取论文图片数量
	public function getImgCount(){
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$lunwenModel=D('lunwen');
		$lunwen=$lunwenModel->order('lunwen_id')->where("school_name='".$schoolname."'")->select();
		$lunwen=end($lunwen);
		$img=json_decode($lunwen['thumb_img']);
		if($lunwen['lunwen_img']==''){
			print_r(count($img));
		}else{
			print_r(count($img)+1);
		}
	}
	
	//获取论文汇编图片数量
	public function getBookImgCount(){
		$schoolModel=D('school');
		$school=$schoolModel->select();
		foreach($school as $v){
			if(md5($v['school_name'].$v['school_admin'])==cookie('SYID')){
				$schoolname=$v['school_name'];
			}
		}
		$bookModel=D('lunwenbook');
		$book=$bookModel->order('book_id')->where("school_name='".$schoolname."'")->select();
		$book=end($book);
		$img=json_decode($book['thumb_img']);
		if($book['book_img']==''){
			print_r(count($img));
		}else{
			print_r(count($img)+1);
		}
	}
	
	//线上测试redis连接
	public function redis(){
		$redis=new \Redis();
		$link=$redis->connect('119.29.96.243',6379);
		$auth=$redis->auth('12345');
		if($link){

			$lunwen=$redis->exists('lunwen');
			var_dump($redis->TTL('lunwen'));
			echo "<br>";
			if(!$lunwen){
				
				$redis->set('lunwen','qwe');
				$redis->expire('lunwen','6');
				echo "设置缓存,6秒后过期";
				var_dump($redis->get('lunwen'));
				echo "<br>";
			}else{
				var_dump($redis->get('lunwen'));
				echo "读取缓存";
				echo "<br>";
				
			}	
		}else{
			
		}
	}
	
	
	//添加锁
	public function lock($lock){
		$redis->set($lock,'lock');
	}
	
	//释放锁
	public function releaseLock($lock){
		$redis->expire($lock,'0');
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