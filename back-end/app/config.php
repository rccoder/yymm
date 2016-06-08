<?php

//配置文件
return [
    'url_route_on' => true,
    'default_module' => 'home',         // 默认模块名
    'url_html_suffix' => '',            // URL伪静态后缀
    'view_replace_str' => [             //模版默认替换
        '__STATIC__' => '/static',
        '__ROOT__' => '',
    ],
    'default_ajax_return' => 'html',
    'session' => [                      //session
        'prefix' => 'think',
        'type' => '',
        'auto_start' => true,
    ],
    'upload_path' => 'upload/',         //上传路径
    'lang_switch_on' => true,           // 开启语言包功能
    'lang_list' => ['zh-cn'],           // 支持的语言列表
];
