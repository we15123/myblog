<?php


namespace app\admin\controller;
use app\admin\model\User;
use think\Controller;
use think\facade\Request;

class Login extends Controller
{
    //登陆
    public function index(){
        if (Request::isPost()){
            //接受数据
            $data = Request::param();
            $loginModel = new User();
            $data =  $loginModel->islogin($data);
            if ($data == '0'){
                //登陆成功
                return $this->success('登陆成功','{:url("index/index")}');
            }
        }
        return $this->view->fetch();
    }
}