<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 15:07
 */

namespace app\admin\controller;

use think\Loader;

class Enroll extends BaseController
{
    public function index()
    {
        $enroll = Loader::model('Enroll')->getNotDelete()->toArray();

        return $this->fetch('', [
            'enroll' => $enroll['data']
        ]);
    }
}