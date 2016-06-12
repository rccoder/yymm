<?php
namespace app\home\controller;

//Home模块控制器基类
class Base extends \app\common\controller\Base{
    public function _initialize(){
        parent::_initialize();
        //导航
        $nav=db('navigation')->where('show',1)->order('sort desc,id asc')->select();
        $this->assign('nav',$nav);        
    }
}