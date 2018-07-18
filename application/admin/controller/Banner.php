<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/12/1
 * Time: 18:16
 */

namespace app\admin\controller;


class Banner extends BaseController
{
    public function index()
    {
        $banner = model('Banner')->where('status=1')->paginate(
            15, false, ['path' => 'index']
        );
//        print_r($banner);exit;
        return $this->fetch('', [
            'banner' =>$banner
        ]);
    }
}