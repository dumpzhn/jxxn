<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Message as MessageModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Message extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new MessageModel;
    }
    public function index()
    {
        $id = input('post.id');
        if(!$id){
            echo json_encode(array('code' => '400','data' => array('message' => "请传入信息列表ID")));die;
        }
        echo $this->data->get_message($id);
    }
}