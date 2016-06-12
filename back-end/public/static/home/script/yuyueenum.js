$(function() {
  $("#span_nativeplace #city").on("click", function(e) {
    console.log(222)
    var str = '<option value="0">请选择..</option>'
    var dataArray = data[$(this).val()];
    for(var i = 0; i < dataArray.length; i++) {
      str += '<option value="'+ dataArray[i];
      str += '">';
      str += dataArray[i];
      str += '</option>';
    }
    console.log(str)
    $("#span_nativeplace_son #area").html(str);
  });
});