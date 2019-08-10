<?php
namespace app\index\controller;

use app\admin\model\Artcate;
use app\admin\model\User;
use think\Controller;
use think\facade\Request;
use think\facade\Session;

class Index extends Controller
{
    public function index(){
        //前段首页
        $id = Session::get('id');
        if (is_null($id)){
           return $this->error('请进行登录','index/login');
        }

        return $this->view->fetch();
    }

    //前端登录
    public function login(){
        if (Request::isPost()){
            $data = Request::param();
            //查看用户和密码
            $loginModel = new User();
            $data =  $loginModel->islogin($data);
            if ($data == '0'){
                //登陆成功
                return $this->success('登陆成功','index/index');
            }
        }
        return $this->view->fetch();
    }

    //退出登录
    public function logout(){
        Session::delete('id');
        return redirect('index/login');
    }

    //进行发表
    public function edit(){
        $AtrCateModel = new Artcate();
        $data = $AtrCateModel->findall();
        $this->assign('list',$data);
        return $this->view->fetch();
    }


}
