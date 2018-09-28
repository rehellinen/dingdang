<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/12/1
 * Time: 18:18
 */

namespace app\common\model;


use think\Model;

class Banner extends BaseModel
{
    public function imageId ()
    {
        return $this->belongsTo('Image', 'image_id', 'id');
    }

    public function getBanner()
    {
        return $this->where('status=1')
            ->with('imageId')
            ->order('listorder desc, id desc')
            ->limit(config('setting.banner_max_count'))
            ->select();
    }
}