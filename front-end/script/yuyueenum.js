(function() {
  $("#span_nativeplace #nativeplace_top").on("click", function(e) {
    
    var str = '<option value="0">请选择..</option>'
    var dataArray = data[$(this).val()];
    for(var i = 0; i < dataArray.length; i++) {
      str += '<option value="'+ dataArray[i];
      str += '">';
      str += dataArray[i];
      str += '</option>';
    }
    $("#span_nativeplace_son #nativeplace_son").html(str);
  });
})();