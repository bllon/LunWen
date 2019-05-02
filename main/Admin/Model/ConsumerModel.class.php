<?php
	namespace Admin\Model;
	use Think\Model;
	class ConsumerModel extends Model{
		public $_validate=array(
			array('consumer_unionid','','用户已存在','1','unique',3),
			array('password','6,12','密码太短','1','length',3),
//			array('rePassword','password','两次密码不一致','1','confirm',3),
			array('phone','/^1[34578]\d{9}$/','手机格式不正确')
		);
	}
?>