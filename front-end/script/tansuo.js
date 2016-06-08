$(function() {
    $(".tansuo li").hover(function(e) {
      $(".intro").eq($(this).index()).fadeIn().css('display', 'block');
    })
    $(".tansuo li").mouseleave(function(e) {
      $(".intro").eq($(this).index()).fadeOut().css('display', 'none');
    })
})
