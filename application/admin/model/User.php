<?php


namespace app\admin\model;


use think\facade\Session;
use think\Model;

class User extends Model
{
    public function islogin($data){
        $username = $data['username'];
        $password = $data['password'];
        //查询
        $data = User::where([
            'id'=>1,
            'username'=>$username
        ])->find();
        if ($data){
            //用户名存在检查密码
            $data = User::where('password',$password)->find();
            if ($data){
                //用户名和密码正确 设置session
                Session::set('id',$data['id']);
                return '0';
            }else{
                //密码不正确
                return '2';
            }
        }else{
            //用户名不存在
            return '1';
        }
    }
}