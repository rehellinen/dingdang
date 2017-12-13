<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/26
 * Time: 23:05
 */

namespace app\api\controller;


use think\Controller;

class Test extends Controller
{
    public function index()
    {
        $str = "北京	0 	2831 	2831 	2376 	1835 	1764 	1499 	1529 	1544 	1176 	1235 	944 	1282 	2079 	908 	1258 	1164 	1258 	1211 	1455 	1211 	1282 	1294 	1782 	1870 	1544 	1529 	1164 	917 	935 	917 	612 	300 	606 	46140";

        $str1 = explode(' ', $str);
        foreach ($str1 as $key => $value) {
            $str1[$key] = intval($value);
        }
        var_dump($str1);
    }
}