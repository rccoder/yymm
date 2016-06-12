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
    
    if(location.indexOf("show_1") > -1 || location.indexOf("cate/1") > -1) {
      var str = "#" + "cate-1";
      $(str).addClass('blu')
      flag = 1;
    }
    if(location.indexOf("show_2") > -1 || location.indexOf("cate/2") > -1) {
      var str = "#" + "cate-2";
      $(str).addClass('blu')
      flag = 1;
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