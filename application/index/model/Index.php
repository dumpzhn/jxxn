<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Index extends Model
{
    public function Home_Select()
    {
        $banner = Db::name('home')->where('style','banner')->select();
        $xc = Db::name('home')->where('style','xc')->select();
        $product = Db::name('product')->where('is_home','是')->select();
        $link = Db::name('home')->where('style','link')->select();
        $new_message = Db::name('message')->where('type','最新动态')->order('time desc')->limit(5)->select();
        $hy_message = Db::name('message')->where('type','行业资讯')->order('time desc')->limit(5)->select();
        $xwzx = Db::name('home')->where('style','xwzx')->select();
        //装换一下最新动态  行业资讯标题的长度
        foreach ($new_message as $key => &$value) {
            if (mb_strlen($value['title'],'utf8') > 18) {
                $value['title'] = mb_substr($value['title'],0,18,'utf8') . '...';
            }
        }
        foreach ($hy_message as $key => &$value) {
            if (mb_strlen($value['title'],'utf8') > 18) {
                $value['title'] = mb_substr($value['title'],0,18,'utf8') . '...';
            }
        }
        return $info =  json_encode(array('code' => '200','data' => array('banner' => $banner,'xc' => $xc,'product' => $product,'link' => $link,'new_message' => $new_message,'hy_message' => $hy_message,'xwzx' => $xwzx)));
    }
}