<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Company extends Model
{
    public function Show_Company()
    {
        $info = Db::name('company')->select();
        foreach ($info as $key => &$value) {
            $value['introduction'] = htmlspecialchars_decode($value['introduction']);
            $value['style'] = htmlspecialchars_decode($value['style']);
            $value['talent_idea'] = htmlspecialchars_decode($value['talent_idea']);
        }
        $recruit = Db::name('recruit')->field('id,job')->where('state','1')->select();
        $carousel = Db::name('carousel')->where('type','company')->select();
        return $data = array('code' => '200','data' => array('company' => $info,'recruit' => $recruit,'carousel' => $carousel));
    }
}