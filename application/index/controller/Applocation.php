<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Applocation as ApplocationModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Applocation extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new ApplocationModel;
    }
    public function index()
    {
        $page = input('post.page');
        $type = input('post.type');
        //分页数据传值给model抓取
        if (empty($page)) {
            $page = 0;
        } else {
            $page = ($page-1)*4;
        }
        echo $this->data->Show_Applocation($page,$type);
    }
}
