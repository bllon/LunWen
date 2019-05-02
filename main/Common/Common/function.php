<?php


	//md5加密
	function jm($a){
		return md5($a);
	}
	
	
	//判断用户登录
	function che(){
		return jm(cookie('username').cookie('userid').C('COO_KIE'))===cookie('key');
	}
	
	//获取分页
	function getPage($num,$curr,$cnt){
		/**
		*生成分页代码
		*param int num 文章总数
		*param int curr 当前显示的页码数
		*param int cnt 每页文章数
		*/
		$max=ceil($num/$cnt);
		$left=max(1,$curr-2);
		$right=min($curr+2,$max);
		$left=max(1,$right-4);
		
		$page=array();
		for($i=$left;$i<=$right;$i++){
			$_GET['page']=$i;
			$page[$i]=http_build_query($_GET);
		}
		
		return $page;
	}
	
	//创建盐
	function yan(){
		$str='asdagafkjlahl*^*&()&ldaga&(*(&(*^*(()';
		$yan=substr(str_shuffle($str),0,8);//打乱字符串，并截取
		return $yan;
	}
	
	//创建标识符
	function createRandStr($str='user',$n){
		for($i=0;$i<$n;$i++){
			$str.=mt_rand(0, 9);
		}
		return $str;
	}
	
	
	/**
	 * 请求接口返回内容
	 * @param  string $url [请求的URL地址]
	 * @param  string $params [请求的参数]
	 * @param  int $ipost [是否采用POST形式]
	 * @return  string
	 */
	function juhecurl($url,$params=false,$ispost=0){
	    $httpInfo = array();
	    $ch = curl_init();
	    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
	    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
	    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
	    if( $ispost )
	    {
	        curl_setopt( $ch , CURLOPT_POST , true );
	        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
	        curl_setopt( $ch , CURLOPT_URL , $url );
	    }
	    else
	    {
	        if($params){
	            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
	        }else{
	            curl_setopt( $ch , CURLOPT_URL , $url);
	        }
	    }
	    $response = curl_exec( $ch );
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
	    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
	    curl_close( $ch );
	    return $response;
	}
?>