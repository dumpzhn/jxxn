<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use app\index\model\Article as ArticleModel;
header("Access-Control-Allow-Origin: *");//解决跨域问题
class Article extends Controller
{
    protected $data;
    public function _initialize()
    {
        parent::_initialize();
        $this->data = new ArticleModel;
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
        echo $this->data->Article_Message($page,$type);
    }
}