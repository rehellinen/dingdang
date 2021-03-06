<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 14:40
 */

namespace app\admin\controller;

use think\Loader;

class Lecture extends BaseController
{
    public function index()
    {
        $lecture = Loader::model('Lecture')->getNotDelete();
        $lectureArray = Loader::model('Lecture')->getNotDelete()->toArray();

        return $this->fetch('', [
            'lecture' => $lectureArray['data'],
            'lectureObj' => $lecture
        ]);
    }

    public function add()
    {
        $place = model('Place')->getNotDelete();
        $place = $place->toArray();
        $place = $place['data'];
        $this->assign('place', $place);
        return parent::add();
    }

    public function edit()
    {
        $place = model('Place')->getNotDelete();
        $place = $place->toArray();
        $place = $place['data'];
        $this->assign('place', $place);
        return parent::edit();
    }
}