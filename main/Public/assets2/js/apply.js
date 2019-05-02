$('.table-check input').click(function(){
	console.log($(this).prop('checked'));
	console.log($('td.chooseBtn').length);
		if($(this).prop('checked')==true){
			for(var i=0;i<$('td.chooseBtn').length;i++){
				$('td.chooseBtn').eq(i).find('input').prop('checked',true);
			}
//			$('td.chooseBtn').each(function(i){
//				$(this).find('input').attr('checked',true);
//			})
		}else{
			for(var i=0;i<$('td.chooseBtn').length;i++){
				$('td.chooseBtn').eq(i).find('input').prop('checked',false);
			}
//			$('td.chooseBtn').each(function(i){
//				$(this).find('input').attr('checked',false);
//			})
		}
})
	
	
	function ajaxApply(){
		alert('暂不开放该功能');
		return false;
		var list=[];
		$('td.chooseBtn').each(function(i){
//			console.log($(this).find('input').prop('checked'));
			if($(this).find('input').prop('checked')==true){
				list.push($(this).find('input').val());
//				console.log($(this).find('input').val());
			}
		})
		$.ajax({
			   url : './apply_finish',
               data:{'Data':list},
               cache : false,
               async : false,
               type : "POST",
               dataType : 'json/xml/html',
               success : function (result){
					console.log(result.responseText);
					if(result.responseText=='success'){
						alert('审核成功');
					}
					if(result.responseText=='error'){
						alert('审核失败');
					}
               },
               error :function(err){
               		console.log(err.responseText);
               		if(err.responseText=='error'){
               			alert('请求异常');
               		}
               }
          });
	}
	

	function ajaxDel(){
		alert('暂不开放该功能');
		
	}
	
	
	$('#search').click(function(e){
		var statu=false;
		if($('input#keyword').val()!=''){
			statu=true;
		}
		if(statu){
			
		}else{
			e.preventDefault;
			return false;
		}
	})
	
	$('.applyBtn').click(function(e){
		var statu=confirm('确定审核?');
		if(statu){
			
		}else{
			e.preventDefault;
			return false;
		}
	})
	
	$('.delBtn').click(function(e){
		var statu=confirm('确定删除?');
		if(statu){
			
		}else{
			e.preventDefault;
			return false;
		}
	})
	
	function startSchool(id,n){
		$.get('./school_start?id='+id,function(data,success){
			if(data=='success'){
				$('.statu').eq(n).addClass('text-success').html("已启动");
				location.href="./school_list";
			}else if(data=='error'){
				$('.statu').eq(n).addClass('text-danger').html("启动失败");
				location.href="./school_list";
			}else{
				$('.statu').eq(n).addClass('text-danger').html("系统异常");
				location.href="./school_list";
			}
		})
	}
	
	function closeSchool(id,n){
		$.get('./school_close?id='+id,function(data,success){
			if(data=='success'){
				$('.statu').eq(n).addClass('text-success').html("已关闭");
				location.href="./school_list";
			}else if(data=='error'){
				$('.statu').eq(n).addClass('text-danger').html("关闭失败");
				location.href="./school_list";
			}else{
				$('.statu').eq(n).addClass('text-danger').html("系统异常");
				location.href="./school_list";
			}
		})
	}
	
	
	$('.schoolclose').click(function(e){
		var school_id=$(this).attr('value');
		var n;
		$('.statu').each(function(i){
			if($('.statu').eq(i).attr('value')==school_id){
				n=i;
			}
		})
		
		var statu=confirm('确定关闭系统?');
		if(statu){
			$('.statu').eq(n).addClass('').html("<i class='fa-li fa fa-spinner fa-spin' style='margin-left:30px;'></i>");
			setTimeout(function(){
				closeSchool(school_id,n);
			},2500);
			return false;
		}else{
			e.preventDefault;
			return false;
		}
	})
	
	
	$('.schoolstart').click(function(e){
		console.log('2');
		var school_id=$(this).attr('value');
		var n;
		$('.statu').each(function(i){
			if($('.statu').eq(i).attr('value')==school_id){
				n=i;
			}
		})
		var statu=confirm('确定开启系统?');
		if(statu){
			$('.statu').eq(n).addClass('').html("<i class='fa-li fa fa-spinner fa-spin' style='margin-left:30px;'></i>");
			setTimeout(function(){
				startSchool(school_id,n);
			},2500);
			return false;
		}else{
			e.preventDefault;
			return false;
		}
	})
	
	
