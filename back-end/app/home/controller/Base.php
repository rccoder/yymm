<?php
namespace app\home\controller;

//Home模块控制器基类
class Base extends \app\common\controller\Base{
    public function _initialize(){
        parent::_initialize();
        //导航
        $nav=db('navigation')->where('show',1)->order('sort desc,id asc')->select();
        $this->assign('nav',$nav);
        //header top图片
        $topHeader=db('ads')->where(['status'=>1,'tid'=>8])->select();
        $this->assign('topHeader',$topHeader[0]);      
    }
}