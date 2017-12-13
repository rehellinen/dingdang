<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/12
 * Time: 11:26
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;

class Image extends Controller
{
    public function upload()
    {
        $file = Request::instance()->file('file');
        //目录
        $info = $file->move('upload');
        if($info && $info->getPathname()){
            return show(1, '图片上传成功', $info->getPathname());
        }
        return show(0,'图片上传失败');
    }
}