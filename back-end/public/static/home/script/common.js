$(function(){
   //报名信息
   $("#submit").click(function(){
       var data={
       		name:$("#name").val(),
       		telephone:$("#phone").val(),
       		age:$("#age").val(),
       		city:$("#city").val(),
       		area:$("#area").val()
       };
       if(!data.name||!data.telephone){
       	alert('姓名和电话不能为空');
       	return false;
       }
       $.post($(this).data('url'),data,function(rs){
       		alert(rs.msg);
       },'json')
   })
});