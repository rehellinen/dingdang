<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 16:23
 */

namespace app\common\model;


use think\Model;

class Card extends Model
{
    public function imageId ()
    {
        return $this->belongsTo('Image', 'image_id', 'id');
    }
}