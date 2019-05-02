
var statu=false;


$('#school').blur(function(){
	$('.school_check').html('');
	var patt = /^[\u4e00-\u9fa5]{0,}$/;
	if(!patt.test($('#school').val())){
		statu=false;
		$('.school_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.school_check').html($('.school_check').html()+'&nbsp;&nbsp;&nbsp;学校名称不合法');
	}else{
		statu=true;
		$('.school_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#school').val()==''){
		statu=false;
		$('.school_check').html('');
		$('.school_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})

$('#user').blur(function(){
	$('.user_check').html('');
	var patt = /^[\u4e00-\u9fa5]{0,}$/;
	if(!patt.test($('#user').val())){
		statu=false;
		$('.user_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.user_check').html($('.user_check').html()+'&nbsp;&nbsp;&nbsp;姓名不合法');
	}else{
		statu=true;
		$('.user_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#user').val()==''){
		statu=false;
		$('.user_check').html('');
		$('.user_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})
	
$('#usercard').blur(function(){
	$('.usercard_check').html('');
	var patt = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
	if(!patt.test($('#usercard').val())){
		statu=false;
		$('.usercard_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.usercard_check').html($('.usercard_check').html()+'&nbsp;&nbsp;&nbsp;身份证号不合法');
	}else{
		statu=true;
		$('.usercard_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#usercard').val()==''){
		statu=false;
		$('.usercard_check').html('');
		$('.usercard_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})

$('#applyemail').blur(function(){
	$('.email_check').html('');
	var patt = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if(!patt.test($('#applyemail').val())){
		statu=false;
		$('.email_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.email_check').html($('.email_check').html()+'&nbsp;&nbsp;&nbsp;邮箱不合法');
	}else{
		statu=true;
		$('.email_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#applyemail').val()==''){
		statu=false;
		$('.email_check').html('');
		$('.email_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})

$('#applyphone').blur(function(){
	$('.phone_check').html('');
	var patt = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
	if(!patt.test($('#applyphone').val())){
		statu=false;
		$('.phone_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.phone_check').html($('.phone_check').html()+'&nbsp;&nbsp;&nbsp;手机不合法');
	}else{
		statu=true;
		$('.phone_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#applyphone').val()==''){
		statu=false;
		$('.phone_check').html('');
		$('.phone_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})


$('#username').blur(function(){
	$('.username_check').html('');
	var patt = /^[\u4E00-\u9FA5A-Za-z0-9]{4,15}$/;
	if(!patt.test($('#username').val())){
		statu=false;
		$('.username_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.username_check').html($('.username_check').html()+'&nbsp;&nbsp;&nbsp;用户名不合法&nbsp;(中文、英文、数字但不包括特殊符号,要求在4-15位字符)');
	}else{
		statu=true;
		$('.username_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#username').val()==''){
		statu=false;
		$('.username_check').html('');
		$('.username_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})

$('#password').blur(function(){
	$('.password_check').html('');
	var patt = /^[a-zA-Z]\w{5,17}$/;
	if(!patt.test($('#password').val())){
		statu=false;
		$('.password_check').removeClass('glyphicon glyphicon-ok text-success').addClass('text-danger');
		$('.password_check').html($('.password_check').html()+'&nbsp;&nbsp;&nbsp;密码不合法(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)');
	}else{
		statu=true;
		$('.password_check').removeClass('text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#password').val()==''){
		statu=false;
		$('.password_check').html('');
		$('.password_check').removeClass('glyphicon glyphicon-ok text-success');
	}
})

$('#repassword').blur(function(){
	$('.repassword_check').html('');
	var patt = /^[a-zA-Z]\w{5,17}$/;
	if($('#repassword').val()!=$('#password').val()){
		statu=false;
		$('.repassword_check').removeClass('glyphicon glyphicon-remove glyphicon-ok text-success').addClass('glyphicon glyphicon-remove text-danger');
	}else{
		statu=true;
		$('.repassword_check').removeClass('glyphicon glyphicon-remove glyphicon-ok text-danger').addClass('glyphicon glyphicon-ok text-success');
	}
	if($('#repassword').val()==''){
		statu=false;
		$('.repassword_check').html('');
		$('.repassword_check').removeClass('glyphicon glyphicon-remove glyphicon-ok text-success');
	}
})

$('#yzm').blur(function(){
	$('.yzm_check').html('');
	if($('#yzm').val()==''){
		statu=false;
		$('.yzm_check').removeClass('glyphicon glyphicon-remove glyphicon-ok text-success').addClass('glyphicon text-danger');
		$('.yzm_check').html($('.yzm_check').html()+'&nbsp;&nbsp;&nbsp;填写验证码');
	}else{
		statu=true;
		$('.yzm_check').removeClass('glyphicon glyphicon-remove text-danger').addClass('glyphicon glyphicon-ok text-success');
		if($('#yzm').val().length!=4){
			statu=false;
			$('.yzm_check').removeClass('glyphicon glyphicon-ok text-success').addClass('glyphicon glyphicon-remove text-danger');
		}
	}
	
})


$('#applyform').submit(function(){
	$('.yzm_check').html('');
	if($('#school').val()=='' || $('#user').val()=='' || $('#usercard').val()=='' || $('#applyemail').val()==''){
		$('.submit_check').addClass('text-danger').html('请认真填写表单');
		return false;
	}
	if($('#applyphone').val()=='' || $('#username').val()=='' || $('#password').val()=='' || $('#repassword').val()==''){
		$('.submit_check').addClass('text-danger').html('请认真填写表单');
		return false;
	}
	if($('#yzm').val()==''){
		$('.yzm_check').addClass('text-danger');
		$('.yzm_check').html($('.yzm_check').html()+'&nbsp;&nbsp;&nbsp;填写验证码');
		$('.submit_check').addClass('text-danger').html('请认真填写表单');
		return false;
	}
	if(!statu){
		$('.submit_check').addClass('text-danger').html('请合法填写表单');
		return false;
	}else{
		return true;
	}
		
})
