<?php
namespace app\home\controller;

class Index extends Base{
    //首页
    public function index(){
        //轮播图
        $ads=db('ads')->where(['status'=>1,'tid'=>1])->select();
        $this->assign('ads',$ads);
        //文章
        $rs=db('content')->order('sort desc,id desc')->field('id,title,cate')->select();
        foreach($rs as $v){
            $content[$v['cate']][]=$v;
        }
        $this->assign('content',$content);
    	return $this->fetch();
    }
}
