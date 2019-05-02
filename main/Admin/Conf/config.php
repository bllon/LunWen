<?php
return array(
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'lunwen',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',
	'COO_KIE'				=>	'aadfafxvza',//加密拼接字符串
    'TMPL_ACTION_ERROR'     =>  'Tp/tishi',	 //错误提示模板
    'TMPL_ACTION_SUCCESS'   =>  'Tp/tishi',	 //成功提示模板
    
    //路由配置
    'URL_ROUTER_ON'         =>  true,
  	'URL_ROUTE_RULES'=>array( 
  		  
  		'Home' =>'Home/Index/index',
  		'upload_message' =>'Admin/Lunwen/upload_message',
  		'upload_img' =>'Admin/Lunwen/upload_img',
  		'upload_word' =>'Admin/Lunwen/upload_word',
  		'upload_lunwenBook' =>'Admin/Lunwen/upload_lunwenBook',
  		'upload_bookImg' =>'Admin/Lunwen/upload_bookImg',
		'Admin' =>'Admin/Index/index',
		'Admins' =>'Admins/Index/index', 
		'lunwen_list' =>'Admin/Lunwen/lunwen_list',
		'rank' =>'Admin/Lunwen/rank',
		'search' =>'Admin/Lunwen/search',
		'borrow_list' =>'Admin/Lunwen/borrow_list',
		'return_list' =>'Admin/Lunwen/return_list',
		'history' =>'Admin/Lunwen/history',
		'consumer_list'=>'Admin/Consumer/consumer_list',
		'consumer_souso'=>'Admin/Consumer/consumer_souso',
		'login' =>'Admin/User/login',
		'register' =>'Admin/User/register',
		'forgotPassword' =>'Admin/User/forgotPassword',
		'logout'=>'Admin/User/logout',
		'sendMessage'=>'Admin/User/sendMessage',
		'Admin/Lunwen/lunwen_list/page'=>'Admin/Lunwen/lunwen_list/to/prev/page',
		'useinfo'=>'Admin/User/useinfo',
		'apply_list'=>'Admin/User/apply_list',
		'finish_borrow'=>'Admin/Lunwen/finish_borrow',
		'delLunwen'=>'Admin/Lunwen/delLunwen',
		'delRank'=>'Admin/Lunwen/delRank',
		'delSele'=>'Admin/Lunwen/delSele',
		'addRank'=>'Admin/Lunwen/addRank',
		'addSele'=>'Admin/Lunwen/addSele',
		'returns'=>'Admin/Lunwen/returns',
		'vet'=>'Admin/User/vet',
		'del'=>'Admin/User/del',
		'giveTerms'=>'Admin/Lunwen/giveTerms',
		'recoverTerms'=>'Admin/Lunwen/recoverTerms',
		'consumer_del'=>'Admin/Consumer/consumer_del',
	),
);