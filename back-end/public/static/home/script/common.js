$(function(){
   // 导航栏高亮
   var navlight = function() {
    var location = window.location.pathname;
    var list = ["linian", "explore", "xiaoqu", "zhaoshang", "about"];
    var flag = 0;
    for(var i = 0, l = list.length; i < l; i++) {
      if(location.indexOf(list[i]) > -1) {
        var str = "#" + list[i];
        $(str).addClass("blu");
        flag = 1;
        break;
      }
    }
    
    if(flag == 0) {
      console.log(111)
      $("#index").addClass("blu");
    }
   }
   navlight();

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