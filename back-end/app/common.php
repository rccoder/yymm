<?php
use think\Route;
use \think\Hook;
//关闭错误警告
error_reporting(E_ERROR | E_PARSE );
//home模块路由注册
Route::rule([
    'campus/[:p]'=>['Home/Content/getCampus']
]);
//admin模块路由注册

//HOOK

Hook::add('view_filter',  function (&$content){
    //$content=stripslashes($content);
    //print_r($content);
});
