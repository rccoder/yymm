$(function() {
    typeof (BJUI) == "undefined" || BJUI.init({
        JSPATH: static + '/admin/', //[可选]框架路径
        PLUGINPATH: static + '/admin/plugins/', //[可选]插件路径
        statusCode: {
            ok: 200,
            error: 300,
            timeout: 301
        }, //[可选]
        ajaxTimeout: 50000, //[可选]全局Ajax请求超时时间(毫秒)
        pageInfo: {
            total: 'total',
            pageCurrent: 'current_page',
            pageSize: 'pageSize',
            orderField: 'orderField',
            orderDirection: 'orderSort'
        }, //[可选]分页参数
        alertMsg: {
            displayPosition: 'topcenter',
            displayMode: 'slide',
            alertTimeout: 3000
        }, //[可选]信息提示的显示位置，显隐方式，及[info/correct]方式时自动关闭延时(毫秒)
        keys: {
            statusCode: 'statusCode',
            message: 'message'
        }, //[可选]
        ui: {
            windowWidth: 0, //框架显示宽度，0=100%宽，> 600为则居中显示
            showSlidebar: true, //[可选]左侧导航栏锁定/隐藏
            clientPaging: true, //[可选]是否在客户端响应分页及排序参数
            overwriteHomeTab: false //[可选]当打开一个未定义id的navtab时，是否可以覆盖主navtab(我的主页)
        },
        debug: false, // [可选]调试模式 [true|false，默认false]
        theme: 'sky' // 若有Cookie['bjui_theme'],优先选择Cookie['bjui_theme']。皮肤[五种皮肤:default, orange, purple, blue, red, green]
    });
    //菜单点击效果
    typeof (BJUI) == "undefined"||$('#bjui-accordionmenu')
            .collapse()
            .on('hidden.bs.collapse', function(e) {
                $(this).find('> .panel > .panel-heading').each(function() {
                    var $heading = $(this), $a = $heading.find('> h4 > a')

                    if ($a.hasClass('collapsed'))
                        $heading.removeClass('active')
                })
            })
            .on('shown.bs.collapse', function(e) {
                $(this).find('> .panel > .panel-heading').each(function() {
                    var $heading = $(this), $a = $heading.find('> h4 > a')

                    if (!$a.hasClass('collapsed'))
                        $heading.addClass('active')
                })
            })

    $(document).on('click', 'ul.menu-items li > a', function(e) {
        var $a = $(this), $li = $a.parent(), options = $a.data('options').toObj(), $children = $li.find('> .menu-items-children')
        var onClose = function() {
            $li.removeClass('active')
        }
        var onSwitch = function() {
            $('#bjui-accordionmenu').find('ul.menu-items li').removeClass('switch')
            $li.addClass('switch')
        }

        $li.addClass('active')
        if (options) {
            options.url = $a.attr('href')
            options.onClose = onClose
            options.onSwitch = onSwitch
            if (!options.title)
                options.title = $a.text()

            if (!options.target)
                $a.navtab(options)
            else
                $a.dialog(options)
        }
        if ($children.length) {
            $li.toggleClass('open')
        }

        e.preventDefault()
    })
    //登录
    $("#login").click(function() {
        $form = $(this).closest('form');
        var data = {
            username: $form.find('#j_username').val(),
            password: $form.find('#j_password').val(),
            captcha: $form.find('#j_captcha').val()
        };
        if (!data.username || !data.password || !data.captcha) {
            return false;
        }
        $.post($form.attr('action'), data, function(rs) {
            if (rs.code == 0) {
                alert(rs.msg);
            } else {
                window.location.href = rs.url;
            }
        }, 'json');
    });
})
