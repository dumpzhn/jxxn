<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Applocation extends Model
{
    public function Show_Applocation($page,$type)
    {
        $sum = Db::name('applocation')->where('type',$type)->count('id');
        $pagecount = ceil($sum/4);
        $info = Db::name('applocation')->where('type',$type)->field('id,title,picture1,brief_introduction')->order('id asc')->limit($page,'4')->select();
        //限制简介的字数
        foreach ($info as $key => &$value) {
            if (mb_strlen($value['brief_introduction']) > 40) {
                $value['brief_introduction'] = mb_substr($value['brief_introduction'],0,40,'utf8') . '...';
            }
        }
        return json_encode(array('code' => '200','data' => array('applocation' => $info,'sum' => $sum,'pagecount' => $pagecount)));
    }
}