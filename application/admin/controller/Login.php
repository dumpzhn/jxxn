<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Login extends Controller
{
    public function index()
   {
       $name = input('post.name');
       $password = input('post.password');
       if($name && $password){
           $info = Db::name('user')->where('name',$name)->where('password',$password)->find();
           if($info){
               echo json_encode(array('code' => '200','data' => array('message' => '密码正确')));
           } else {
               echo json_encode(array('code' => '400','data' => array('message' => '用户名密码不匹配')));
           }
       } else {
           echo json_encode(array('code' => '400','data' => array('message' => '用户名密码都要填写')));
       }
    }
}