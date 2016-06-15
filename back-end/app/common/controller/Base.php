<?php

namespace app\common\controller;

use think\Controller;
use think\Hook;
use think\exception\HttpResponseException;
use think\Response;
use think\response\Redirect;
use think\View as ViewTemplate;

//全局控制器基类
class Base extends Controller {

    public function _initialize() {
        //注册行为
        Hook::listen(MODULE_NAME . '_' . CONTROLLER_NAME . '_' . ACTION_NAME, $_GET);
        //网站配置
        if(!cache('web')){
            $web=  db('system')->column('web');
            cache('web', json_decode($web[0],1));
        }
        $this->assign('web', cache('web'));
        //导航
        if(!cache('navigation')){
            $navigation=db('navigation')->select();
            cache('navigation',$navigation);
        }
        // 文章 
        if(!cache('post') && $info.cate == 1) {
            $rs = db('content')->order('sort desc,id desc')->field('id', 'title', 'cate')->select();
            foreach($rs as $r) {
                $post[$r['cate']][] = $r;
            }
            cache('post', $post);
        }
        $this->assign('navigation', cache('navigation'));
    }

    //重写error方法
    public function error($msg = '', $url = null, $data = '', $wait = 3) {
        $code = 0;
        if (is_numeric($msg)) {
            $code = $msg;
            $msg = '';
        }
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'url' => is_null($url) ? 'javascript:history.back(-1);' : $url,
            'wait' => $wait,
        ];
        $type = IS_AJAX ? config('default_ajax_return') : config('default_return_type');
        if (!IS_AJAX) {
            $result = ViewTemplate::instance(config('template'), config('view_replace_str'))
                    ->fetch(config('dispatch_error_tmpl'), $result);
        }
        $response = Response::create($result, 'json');
        throw new HttpResponseException($response);
    }

    //重写success方法
    public function success($msg = '', $url = null, $data = '', $wait = 3) {
        $code = 1;
        if (is_numeric($msg)) {
            $code = $msg;
            $msg = '';
        }
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'url' => is_null($url) && isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $url,
            'wait' => $wait,
        ];

        $type = IS_AJAX ? config('default_ajax_return') : config('default_return_type');
        if (!IS_AJAX) {
            $result = ViewTemplate::instance(config('template'), config('view_replace_str'))
                    ->fetch(config('dispatch_success_tmpl'), $result);
        }
        return Response::create($result, 'json');
    }

}
