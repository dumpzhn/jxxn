<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Solution as SolutionModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Solution extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new SolutionModel;
    }
    public function index()
    {
        echo $this->data->show();
    }
}
