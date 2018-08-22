<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Hotline extends Model
{
    public function show()
    {
        $info = Db::name('hotline')->select();
        return json_encode(array('code' => '200','data' => array('hotline' => $info)));
    }
}