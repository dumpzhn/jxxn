<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Appmessage extends Model
{
    public function show_app($id,$type)
    {
        //展示应用的信息
        $info = Db::name('applocation')->where('id',$id)->select();
        //这边需要转义一下字符   只能用传引用的方法改变他的值
        foreach($info as $key=>&$val){
            $val['content']=htmlspecialchars_decode($val["content"]);
        }
        //右边信息的展示
        $right = Db::name('applocation')->where('type',$type)->limit('3')->order('id asc')->select();
        //限制一下右侧简介字数
        foreach ($right as $key => &$value) {
            var_dump(mb_strlen($value['brief_introduction'],'utf8'));
            if (mb_strlen($value['brief_introduction'],'utf8') > 20) {
                $value['brief_introduction'] = mb_substr($value['brief_introduction'],0,20,'utf8') . '...';
            }
        }
        return json_encode(array('code' => '200','data' => array('message' => $info,'right' => $right)));
    }
}