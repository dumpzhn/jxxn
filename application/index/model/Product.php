<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Product extends Model
{
    //保温箱信息
    public function KeepBox()
    {
        $info = Db::name('product')->where('type','保温箱')->select();
        $content = Db::name('product_content')->where('type','保温箱')->select();
        //将内容的格式转换一下
        foreach ($content as $key => &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        //目前右侧信息那里还没确定  后期更改
        return json_encode(array('code' => '200','data' => array('bwx' => $info,'content' => $content)));
    }
    //冰板信息
    public function Ice_plate()
    {
        $info = Db::name('product')->where('type','冰板')->select();
        $content = Db::name('product_content')->where('type','冰板')->select();
        //将内容的格式转换一下
        foreach ($content as $key => &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        //目前右侧信息那里还没确定  后期更改
        return json_encode(array('code' => '200','data' => array('bb' => $info,'content' => $content)));
    }
    //云平台
    public function pingTai()
    {
        $info = Db::name('product')->where('type','云平台')->select();
        $content = Db::name('product_content')->where('type','云平台')->select();
        //将内容的格式转换一下
        foreach ($content as $key => &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        //目前右侧信息那里还没确定  后期更改
        return json_encode(array('code' => '200','data' => array('ypt' => $info,'content' => $content)));
    }
    //温度计
    public function wdj()
    {
        $info = Db::name('product')->where('type','温度计')->select();
        $content = Db::name('product_content')->where('type','温度计')->select();
        //将内容的格式转换一下
        foreach ($content as $key => &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        //目前右侧信息那里还没确定  后期更改
        return json_encode(array('code' => '200','data' => array('wdj' => $info,'content' => $content)));
    }
}