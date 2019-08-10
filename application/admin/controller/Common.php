<?php
/**
 * 进行初始化
 * */

namespace app\admin\controller;


use think\Controller;
use think\facade\Session;

class Common extends Controller
{

    protected function initialize()
    {
        //获取session
       $id =  Session::get('id');
       if (is_null($id)){
           //未登陆进行登陆
           $this->error('请登陆或者检查账号密码正确型！','login/index');
       }
    }

}