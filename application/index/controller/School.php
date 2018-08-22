<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\School as SchoolModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class School extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new SchoolModel;
    }
    public function index()
    {
        echo $this->data->ShowSchool();
    }
}