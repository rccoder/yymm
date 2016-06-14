<?php

namespace app\admin\controller;

use app\admin\model\Campus as C;
class Campus extends Base {
    public function index(){
    	$m=new C();
    	$map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
        $map['order']='id desc';
        $list=$m->getList($map);
        $this->assign('content',$list);
    	return $this->fetch();        
    }
    public function add(){
        if(IS_POST){
            $m=new C();
            if(input('post.id')){
                $rs=$m->save($_POST,['id'=>input('post.id')]);
            }else{
                $rs=$m->insert($_POST);
            }
            $rs?$this->json(200,'保存成功',['closeCurrent'=>1,'tabid'=>'campus-index']):$this->json(300);
        }else{
            //城市列表
            $province=db('province')->where('pid=0')->field('name')->select();
            $this->assign('province',$province);
            if(input('?get.id')){
    		$info=C::get(input('get.id'));
    		$this->assign('info',$info);
            }            
            return $this->fetch();
        }
    }
    //删除文章
    public function delete(){
        $info=C::get(input('get.id'));
        $rs=$info->delete();
        $rs?$this->json():$this->json(300);
    }    
}