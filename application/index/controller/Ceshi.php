<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Cookie;
use think\Lang;
header("Access-Control-Allow-Origin: *");
class Ceshi extends Controller
{
    public function index()
    {
        $info = Db::name('company')->select();
        $this->assign('data',$info[0]);
        return $this->fetch();
    }
    public function lang() {
        switch ($_GET['lang']) {
            case 'cn':
                cookie('think_var', 'zh-cn');
                break;
            case 'en':
                cookie('think_var', 'en-us');
                break;
            //其它语言
        }
    }
}
