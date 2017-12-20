<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/12/1
 * Time: 18:34
 */

namespace app\api\controller\v1;


use think\Controller;

class Banner extends Controller
{
    public function getBanner()
    {
        $banner = model('Banner')->where('status=1')->order('listorder desc, id desc')->select();

        return show(1, '获取轮播图成功', $banner);
    }
}