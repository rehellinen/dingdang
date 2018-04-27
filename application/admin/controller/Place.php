<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 14:57
 */

namespace app\admin\controller;

use think\Loader;

class Place extends BaseController
{
    public function index()
    {
        $place = Loader::model('Place')->getNotDelete();
        $page = $place->render();
        $place = $place->toArray();
        $place = $place['data'];

        return $this->fetch('', [
            'place' => $place,
            'page' => $page
        ]);
    }
}