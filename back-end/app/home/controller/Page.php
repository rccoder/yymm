<?php
namespace app\home\controller;

class Page extends Base{
    function index(){
        $tid=[
            'linian'=>7,
            'explore'=>4,
            'zhaoshang'=>5,
            'about'=>6
        ];
        if(input('display')=='about'){
            $ads=db('ads')->where(['tid'=>$tid[input('display')],'status'=>1])->select();
        }else{
            $ads=db('ads')->where(['tid'=>$tid[input('display')],'status'=>1])->find();
        }
        $this->assign('ads',$ads);         
        return $this->fetch(input('display'));
    }
}