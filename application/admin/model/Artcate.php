<?php


namespace app\admin\model;


use think\Model;

class Artcate extends Model
{
    //查询所有
    public function findall(){
        $data = Artcate::all();
        return $data;
    }
}