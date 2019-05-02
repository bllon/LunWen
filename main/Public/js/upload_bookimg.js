var app=new Vue({
	el:'#app',
	data:{
		start:[],
		uploadNum:10,
		maxUploadNum:15
	},
	methods:{
		getcount:function(){
//			$('#book_id').blur(function(){
				$.get('../Admin/Data/getBookImgCount',function(status,success){
					$('#imgcount').html(status);
				})
//				console.log(app.start);
//			});
			
		}
	}
})
app.getcount();

	
	
