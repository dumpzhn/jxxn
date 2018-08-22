<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Appmessage as AppmessageModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Appmessage extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new AppmessageModel;
    }
    public function index()
    {
        $type = input('post.type');
        $id = input('post.id');
        if (!$type || !$id) {
            echo json_encode(array('code' => '400','data' => array('message' => 'type与id缺一不可')));die;
        }
        echo $this->data->show_app($id,$type);
    }
}