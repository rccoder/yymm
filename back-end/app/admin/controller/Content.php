<?php

namespace app\admin\controller;

use app\admin\model\Content as C;
class Content extends Base {

    public function index() {
    	return $this->fetch();
    }
    //添加文章
    public function add(){
    	if(IS_POST){

    	}else{
    		if(input('?get.id')){
    			$info=C::get(input('get.id'));
    			$this->assign('info',$info);
    		}
    		return $this->fetch();
    	}
    }
    
}