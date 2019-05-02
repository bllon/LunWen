
function send(){
	var reg = /^1[3|4|5|7|8][0-9]{9}$/;
	var phoneNum =$('#phone').val();
	var flag = reg.test(phoneNum);
	if(phoneNum==''||flag==false){
		alert('请输入正确手机号');
		return;
	}
	
	
	$('#sendYzm').html(60+'s 后重试');
	$('#sendYzm').attr('disabled','disabled');
	
	var clock=setInterval(function(){
		var second=parseInt($('#sendYzm').html())-1;
		$('#sendYzm').html(second+'s 后重试');
	},1000);
	
	setTimeout(function(){
		clearInterval(clock);
		$('#sendYzm').html('获取验证码');
		$('#sendYzm').attr('disabled',false);
	},60000);
	
	$.get("../Admin/User/getcode",
    {
        phone:$('#phone').val()
    },
        function(data,status){
//      console.log("数据: \n" + data + "\n状态: " + status);
        console.log("发送验证码成功");

    });
}