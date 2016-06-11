<?php

namespace app\admin\controller;

use app\admin\model\Ads as A;
class Ads extends Base {
    public function index() {
        $m=new A();
        if(IS_POST){
            $act=[
                1=> ['status' => 1],  //开启显示
                2=> ['status' => 0],  //关闭显示
            ];
            $rs=$m->save($act[input('get.act')],['id' => input('get.id')]);
            $rs?$this->json():$this->json(300);          
        }else{
            $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):20;//每页显示条数
            $map['order']='sort desc,id desc';
            $list=$m->getList($map);
            $this->assign('content',$list);
            return $this->fetch();
        }
    }
    public function add(){
        $m=new A();
        if(IS_POST){
            if(input('post.id')){
                $rs=$m->save($_POST,['id'=>input('post.id')]);
            }else{
                $rs=$m->save($_POST);
            }
            $rs?$this->json(200,'保存成功',['closeCurrent'=>1,'tabid'=>'system-navigation']):$this->json(300);
        }else{
            if(input('?get.id')){
                $info=A::get(input('get.id'));
                $this->assign('info',$info);
            }            
            return $this->fetch();
        }    	
    }
    //删除
    public function delete(){
        $info=A::get(input('get.id'));
        $rs=$info->delete();
        $rs?$this->json():$this->json(300);
    }    
}