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
  		  
  		'home' =>'Home/Index/index', 		
	),
);