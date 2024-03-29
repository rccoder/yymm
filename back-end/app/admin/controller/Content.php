<?php

namespace app\admin\controller;

use app\admin\model\Content as C;
use app\admin\model\Explore as E;
use app\admin\model\Order as O;
class Content extends Base {

    public function index() {
    	$m=new C();
    	$map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
        $map['order']='sort desc,id desc';
        $map['where']=['cate'=>input('get.cate')];
        $list=$m->getList($map);
        $this->assign('content',$list); 
        $this->assign('cate', input('get.cate'));
    	return $this->fetch();
    }
    //添加文章
    public function add(){
    	$m=new C();
    	if(IS_POST){
            if(input('post.id')){
                $rs=$m->save($_POST,['id'=>input('post.id')]);
            }else{
                $_POST['addtime']=time();
                $rs=$m->insert($_POST);
            }
            $rs?$this->json(200,'保存成功',['closeCurrent'=>1,'tabid'=>'content-index']):$this->json(300);    		
    	}else{
            
    		if(input('?get.id')){
    			$info=C::get(input('get.id'));
    			$this->assign('info',$info);
    		} else if(input('?get.cate')) {
                $info['cate'] = input('get.cate');
                $this->assign('info',$info);
            }
            //print_r(input('?get.cate'));
            //print_r($info);
    		return $this->fetch();
    	}
    }
    //删除文章
    public function delete(){
        $info=C::get(input('get.id'));
        $rs=$info->delete();
        $rs?$this->json():$this->json(300);
    }
    //探索世界
    public function explore(){
        $m=new E();
        $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
        $map['order']='sort desc,id desc';
        $list=$m->getList($map);
        $this->assign('content',$list);     
        return $this->fetch();        
    }
    //添加探索世界内容
    public function addexplore(){
        $m=new E();
        if(IS_POST){
            if(input('post.id')){
                $rs=$m->save($_POST,['id'=>input('post.id')]);
            }else{
                $_POST['addtime']=time();
                $rs=$m->save($_POST);
            }
            $rs?$this->json(200,'保存成功',['closeCurrent'=>1,'tabid'=>'content-explore']):$this->json(300);          
        }else{
            if(input('?get.id')){
                $info=E::get(input('get.id'));
                $this->assign('info',$info);
            }
            return $this->fetch();
        }        
    }
    //删除探索世界
    public function deleteexplore(){
        $info=E::get(input('get.id'));
        $rs=$info->delete();
        $rs?$this->json():$this->json(300);
    } 
    //报名管理
    public function order(){
    	$m=new O();
        if(input('?get.city')) {
            $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
            $map['order']='id desc';
            $map['where']=['city'=>input('get.city')];
            $list=$m->getList($map);
            $this->assign('content',$list);
        } else if(input('?get.campus')) {
            $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
            $map['order']='id desc';
            $map['where']=['area'=>input('get.campus')];
            $list=$m->getList($map);
            $this->assign('content',$list);
        } else {
            $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
            $map['order']='id desc';
            $list=$m->getList($map);
            $this->assign('content',$list);

        }

        $province=db('province')->where('pid=0')->field('name')->select();
        $this->assign('province',$province);

        $campus=db('campus')->field('campus')->select();
        $this->assign('campus', $campus);
    	 
    	return $this->fetch();
    }

    public function addorder(){
        $m=new O();
        if(IS_POST){
            if(input('post.id')){
                $rs=$m->save($_POST,['id'=>input('post.id')]);
            }else{
                $_POST['addtime']=time();
                $rs=$m->save($_POST);
            }
            $rs?$this->json(200,'保存成功',['closeCurrent'=>1,'tabid'=>'content-explore']):$this->json(300);          
        }else{
            if(input('?get.id')){
                $info=O::get(input('get.id'));
                $this->assign('info',$info);
            }
            $province=db('province')->where('pid=0')->field('name')->select();
            $this->assign('province',$province);
            $campus=db('campus')->field('campus')->select();
            $this->assign('campus', $campus);
            return $this->fetch();
        }        
    }

    public function deleteorder(){
        $info=O::get(input('get.id'));
        $rs=$info->delete();
        $rs?$this->json():$this->json(300);
    }  
}