<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Solution extends Model
{
    public function show()
    {
        $info = Db::name('solution')->select();
        foreach ($info as $key => &$value) {
            $value['xbcl'] = htmlspecialchars_decode($value['xbcl']);
            $value['wlw'] = htmlspecialchars_decode($value['wlw']);
            $value['ypt'] = htmlspecialchars_decode($value['ypt']);
        }
        $honor = Db::name('honor')->select();
        $xbcn = Db::name('applocation')->where('type','相变储能材料')->select();
        $xbcl = Db::name('applocation')->where('type','相变材料应用')->select();
        return json_encode(array('code' => '200','data' => array('info' => $info,'xbcn' => $xbcn,'xbcl' => $xbcl,'honor' => $honor)));
    }
}