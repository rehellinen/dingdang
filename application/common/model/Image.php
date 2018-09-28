<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/9/28
 * Time: 12:32
 */

namespace app\common\model;


class Image extends BaseModel
{
    public function getImageUrlAttr($value)
    {
        $value = str_replace('\\',"/",$value);
        $value = config('img_url').$value;
        return $value;
    }
}