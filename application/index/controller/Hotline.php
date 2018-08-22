<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Hotline as HotlineModel;
class Hotline extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new HotlineModel;
    }
    public function index()
    {
        echo $this->data->show();
    }
}