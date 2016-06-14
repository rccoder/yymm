$(function() {
  $("#span_nativeplace #city").on("change", function(e) {
    var str = '<option value="没有填写">请选择..</option>'
    $.get('campus/'+$(this).val(),function(rs){
        if(rs){
            var dataArray = rs;
            for(var i = 0; i < dataArray.length; i++) {
              str += '<option value="'+ dataArray[i];
              str += '">';
              str += dataArray[i];
              str += '</option>';
            }            
        }
        $("#span_nativeplace_son #area").html(str);
    },'json');
  });
});