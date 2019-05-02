var app=new Vue({
	el:'#app',
	data:{
		rank:[],
		selec:[],
		num:'',
		seles:'',
		school:'',
	},
	methods:{
		getRank:function(){
            //发送get请求
            console.log('请求数据中..');
            var school=$('#school').html();
            $.get("../Admin/Data/getRank?school="+school,function(data,status){
            	var Data=JSON.parse(data);
//          	console.log(Data);
            	for(n in Data.rank){
            		app.rank.push(Data.rank[n].name);
            	}
            	app.selec=Data.sele;
            });
            
        },
		upload:function(event){
			this.num=this.rank[this.num];
			if($('#lunwen_title').val()==''){
				alert('标题不能为空');
				return false;
			}
			if($('#writer').val()==''){
				alert('作者不能为空');
				return false;
			}
			if($('#major').val()==''){
				alert('专业不能为空');
				return false;
			}
			if($('#rank').val()==''){
				alert('分类一不能为空');
				return false;
			}
			if($('#sel').val()==''){
				alert('分类二不能为空');
				return false;
			}
			
			$("#myupload").ajaxForm({
		     dataType:'json',
		     beforeSend:function(){ 
		         $(".progress").show();
		     },
		     uploadProgress:function(event,position,total,percentComplete){
		         var percentVal = percentComplete + '%';
		         $(".progress-bar").width(percentComplete + '%');
		         $(".progress-bar").html(percentVal);
		         $(".sr-only").html(percentComplete + '%');
		     },
		     success:function(data){
		        $(".progress").hide(); 
		        $(".pro_text").html(data.info);
		        $('.modal-header').show();
		     },
		     error:function(data){
		     		$(".pro_text").html(data.info);
		     		$('.modal-header').show();
		     }  
		   });
		   $(".progress").hide();  
		}
	}
})

$('#ranks').change(function(){
	$('#sel').val('');
	var n=$('#ranks').val();
	app.seles=app.selec[n];
})
app.getRank();