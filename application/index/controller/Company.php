<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Company as CompanyModel;
use think\Db;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Company extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new CompanyModel;
    }
    public function index()
    {
        dump($this->data->Show_Company());
    }
}