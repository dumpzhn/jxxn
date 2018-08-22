<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Index as IndexModel;
use think\Db;
header("Access-Control-Allow-Origin: *");//解决跨域问题

class Index extends Controller
{
    protected $data;

    //初始化
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new IndexModel;
    }

    public function index ()
    {
       echo $this->data->Home_Select();
    }
    public function map()
    {
        return $this->fetch();
    }
}
