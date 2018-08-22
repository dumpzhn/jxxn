<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Recruit as RecruitModel;
header("Access-Control-Allow-Origin: *");
class Recruit extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new RecruitModel;
    }
    public function index()
    {
        $id = input('post.id');
        echo $this->data->show($id);
    }
}