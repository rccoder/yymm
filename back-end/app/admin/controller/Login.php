<?php
namespace app\admin\controller;

use think\Db;
use think\Hook;

class Login extends Base {
    //登录
    public function index() {
        if (IS_GET)
            return $this->fetch();
        if (session('captcha') != md5(input('captcha'))) {
            return $this->error(lang('captcha_error'));
        }
        if (!input('username') || !input('password')) {
            return $this->error(lang('input_no'));
        }
        $info = db('admin')->where('username', input('username'))->find();
        if ($info) {
            if ($info['password'] != md5(input('password') . 'sp')) {
                Hook::listen('login_error', $info);
                return $this->error(lang('password_error'));
            } else {
                session('admin_id',$info['id']);
                session('admin_name',$info['username']);
                Hook::listen('login_success');
                return $this->success(lang('login_success'), url('/admin/index'));
            }
        } else {
            Hook::listen('login_error');
            return $this->error(lang('login_error'));
        }
    }
    //退出
    public function out() {
        session('admin_id',null);
        session('admin_name',null);
        return $this->redirect(url('Login/index'));
    }
    //验证码
    public function captcha() {
        $captcha = new \sp\Captcha();
        $captcha->generate();
    }

}
