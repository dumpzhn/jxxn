<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Article extends Model
{
    public function Article_Message($page,$type)
    {
        $sum = Db::name('message')->where('type',$type)->count('id');
        $pagecount = ceil($sum/4);
        $info = Db::name('message')->where('type',$type)->field('id,title,time,picture,brief_introduction')->order('id desc')->limit($page,'4')->select();
        //限制一下简介的字数  在40以内 以后显示省略号
        foreach ($info as $key => &$value) {
            if (mb_strlen($value['brief_introduction']) > 40) {
                $value['brief_introduction'] = mb_substr($value['brief_introduction'],0,40,'utf8') . '...';
            }
        }
        return json_encode(array('code' => '200','data' => array('message' => $info,'sum' => $sum,'pagecount' => $pagecount)));
    }
}