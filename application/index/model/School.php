<?php
namespace app\index\model;
use think\Db;
use think\Model;
class School extends Model
{
    //转换时间格式
    public function changeTime($time)
    {
        return $time = date('Y-m-d',strtotime($time));
    }
    public function ShowSchool()
    {
        $carousel = Db::name('carousel')->where('type','school')->select();
        $hyzx = Db::name('carousel')->where('type','hyzx')->select();
        $new_message = Db::name('message')->where('type','最新资讯')->limit('4')->order('time desc')->select();
        $hot_message = Db::name('message')->where('type','最热资讯')->limit('4')->order('time desc')->select();
        $recommend_message = Db::name('message')->where('type','热门推荐')->limit('10')->order('time desc')->select();
        $notice_message = Db::name('message')->where('type','最新公告')->limit('10')->order('time desc')->select();
        $learning_message = Db::name('message')->where('type','学术周刊')->limit('6')->order('time desc')->select();
        $zuotan_message = Db::name('message')->where('type','座谈交流')->limit('3')->order('time desc')->select();
        //修改热门推荐    最新公告标题的字数限制
        foreach ($recommend_message as $key => &$value) {
            if (mb_strlen($value['title'],'utf8') > 2) {
                $value['title'] = mb_substr($value['title'],0,2,'utf8') . '...';
            }
        }
        foreach ($notice_message as $key => &$value) {
            if (mb_strlen($value['title'],'utf8') > 2) {
                $value['title'] = mb_substr($value['title'],0,2,'utf8') . '...';
            }
        }
        //修改一下学术周刊里面简介的字数限制
        foreach ($learning_message as $key => &$value) {
            if(mb_strlen($value['brief_introduction'],'utf8') > 40){$value['brief_introduction'] = mb_substr($value['brief_introduction'],0,40,'utf8') . '......';}
        }
        //修改一下座谈交流里面简介的字数限制
        foreach ($zuotan_message as $key => &$value) {
            if (mb_strlen($value['brief_introduction']) > 40) {$value['brief_introduction'] =  mb_substr($value['brief_introduction'],0,40,'utf8') . '......';}
        }
        foreach ($new_message as $key => $value) {
            $new_message[$key]['time'] = $this->changeTime($value['time']);
        }
        foreach ($hot_message as $key => $value) {
            $hot_message[$key]['time'] = $this->changeTime($value['time']);
        }
        return json_encode(array('code' => '200', 'data' => array('carousel' => $carousel,'hyzx' => $hyzx,'new_message' => $new_message,'hot_message' => $hot_message,'recommend_message' => $recommend_message,'notice_message' => $notice_message,'learning_message' => $learning_message,'zuotan' => $zuotan_message)));
    }

}

