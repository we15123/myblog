<?php


namespace app\index\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [

        'name|用户名' => [
            'require' => 'require',
            'length' => '5,20',
            'unique'=>'unique',
            'chsAlpha' => 'chsAlpha' //仅允许字母数字和汉字
        ],

        'password|密码' => [
            'require' => 'require',
            'length' => '5,20',
            'alphaNum' => 'alphaNum',//仅允许字母数字
            'confirm'=>'confirm' //自动校验密码二次是否一致 会自动验证和password_confirm进行字段比较是否一致，反之亦然。
        ],
    ];
}