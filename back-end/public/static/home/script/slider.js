$(function() {
    var timer01 = null;
    var num = 0;

    var myFn = function() {
        console.log(num);
        num++;
        if (num > $('.bannerImg li').length) {
            num = 0;
        }
        $('.biaojiBtn li').eq(num).addClass('currentBan').siblings().removeClass('currentBan');
        $('.bannerImg li').eq(num).stop().fadeIn().siblings().hide();
    }

    timer01 = setInterval(myFn, 4000);

    $('.bannerImg li').eq(0).show();
    $('.biaojiBtn li').click(function(e) {
        $(this).addClass('currentBan').siblings().removeClass('currentBan');
        $('.bannerImg li').eq($(this).index()).stop().fadeIn().siblings().hide();
        num = $(this).index();
    });

    $('.contentImg').hover(function(e) {
        clearInterval(timer01);
    }, function() {
        timer01 = setInterval(myFn, 5000);
    });
})
