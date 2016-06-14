$(function() {
    // 导航栏高亮
    var navlight = function() {

        var location = window.location.pathname;

        var list = ["linian", "explore", "xiaoqu", "zhaoshang", "about"];
        var flag = 0;
        for (var i = 0, l = list.length; i < l; i++) {
            if (location.indexOf(list[i]) > -1) {
                var str = "#" + list[i];
                $(str).addClass("blu");
                flag = 1;
                break;
            }
        }

        if (location.indexOf("show_1") > -1 || location.indexOf("cate/1") > -1) {
            var str = "#" + "cate-1";
            $(str).addClass('blu')
            flag = 1;
        }
        if (location.indexOf("show_2") > -1 || location.indexOf("cate/2") > -1) {
            var str = "#" + "cate-2";
            $(str).addClass('blu')
            flag = 1;
        }

        if (flag == 0) {
            console.log(111)
            $("#index").addClass("blu");
        }

    }
    navlight();

    //报名信息
    $("#submit").click(function() {
        var data = {
            name: $("#name").val(),
            telephone: $("#phone").val(),
            age: $("#age").val(),
            city: $("#city").val(),
            area: $("#area").val()
        };
        if (!data.name || !data.telephone) {
            alert('姓名和电话不能为空');
            return false;
        }

        if (isNaN(data.telephone)) {
            alert('电话号码错误');
            return false;
        }
        if (data.age == '没有填写') {
            alert('请填写年龄');
            return false;
        }
        if (data.city == '没有填写') {
            alert('请填写城市');
            return false;
        }
        if (data.area == '没有填写') {
            alert('请填写校区');
            return false;
        }
        $.post($(this).data('url'), data, function(rs) {
            alert(rs.msg);
        }, 'json')
    })

    // 重写分页
    var rePageNav = function() {
        var pageLiA = $(".pagination li a");
        for (var i = 0, l = pageLiA.length; i < l; i++) {
            (function(i) {
                var urlArray = pageLiA.eq(i).attr("href").split("?")
                var path = urlArray[1].split("=");
                var newUrl = path[0] + '/' + path[1];
                newUrl = urlArray[0] + '/' + newUrl;
                pageLiA.eq(i).attr("href", newUrl)
            })(i);

        }
    }

    rePageNav();
});