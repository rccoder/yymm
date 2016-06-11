<?php

namespace app\admin\controller;

class Member extends Base {

    public function index() {
    	if(IS_POST){
    		$pass=input('post.pass');
    		$pass1=input('post.password');
    		$pass2=input('post.password2');
    		if(!$pass||!$pass1||!$pass2)$this->json('300',lang('input_no'));
    		if($pass1!=$pass2)$this->json('300',lang('password_confirm_error'));
    		$map['id']=session('admin_id');
    		$map['password']=md5($pass.'sp');
    		$info=db('admin')->where($map)->find();
    		if(!$info)$this->json('300',lang('password_error'));
    		$rs=db('admin')->where('id',session('admin_id'))->setField('password',md5($pass1.'sp'));
    		$rs?$this->json():$this->json(300);
    	}else{
    		return $this->fetch();
    	}    
    }
    
}
