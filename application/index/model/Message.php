<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Message extends Model
{
    public function get_message($id)
    {
        $message = Db::name('message')->where('id',$id)->select();
        foreach ($message as $key => &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        $hot_message = Db::name('message')->field('id,title')->limit('1')->order('id desc')->where('type','热门推荐')->select();
        //限制一下右侧的标题字数
        foreach ($hot_message as $key => &$value) {
            if (mb_strlen($value['title']) > 13) {
                $value['title'] = mb_substr($value['title'],0,13,'utf8') . '...';
            }
        }
        if($message){
            return json_encode(array('code' => '200','data' => array('message' => $message,'hot_message' => $hot_message)));
        } else {
            return json_encode(array('code' => '400','data' => array('message' => '请传入正确的ID')));
        }
    }
}

