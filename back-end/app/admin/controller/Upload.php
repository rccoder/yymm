<?php

namespace app\admin\controller;

use think\Input;
class Upload extends Base{
    public function index(){
        $upload_path=  config('upload_path').input('get.dir','data').'/';
        $file=  Input::file('file');
        $info = $file->move(ROOT_PATH.'public/'.$upload_path);
        if($info){
            $this->json(200,lang('upload_success'),['src'=>$upload_path.date('Y-m-d').'/'.$info->getFilename()]);
        }else{
            $this->json(300,lang('upload_error'));
        }
    }
}