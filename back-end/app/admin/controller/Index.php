<?php

namespace app\admin\controller;

class Index extends Base {

    public function index() {
    	if(IS_POST){

    	}else{
    		return $this->fetch();
    	}
    }
    
}
