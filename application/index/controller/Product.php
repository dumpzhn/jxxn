<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Product as ProductModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Product extends Controller
{
    private $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new ProductModel;
    }
    //展示保温箱信息
    public function bwx()
    {
        echo $this->data->KeepBox();
    }
    //展示温度计信息
    public function wdj()
    {
        echo $this->data->wdj();
    }
    //展示冰板信息
    public function bb()
    {
        echo $this->data->Ice_plate();
    }
    //展示云平台信息
    public function ypt()
    {
        echo $this->data->pingTai();
    }
}