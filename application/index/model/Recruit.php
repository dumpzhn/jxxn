<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Recruit extends Model
{
    public function show($id)
    {
        $info = Db::name('recruit')->where('id',$id)->select();
        return json_encode(array('code' => '200','data' => array('info' => $info)));
    }
}