<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/4/22
 * Time: 11:32
 */
namespace map;


use app\common\exception\LectureException;

class Map
{
    /**
     * 根据地址获取经纬度
     * @param string $address 地址
     * @throws LectureException 讲座地点不够详细
     */
    public static function getLatLngByAddress($address)
    {
        $apiUrl = sprintf(config('map.geocoder'), $address, config('map.ak'));
        $url = config('map.baidu_map_url').$apiUrl;

        $res = json_decode(curl_http($url, 0), true);

        if(!array_key_exists('location', $res['result'])){
            throw new LectureException([
                'message' => '讲座地点不够详细，无法获取经纬度'
            ]);
        }
        return $res['result']['location'];
    }

    public static function getAddress($lat, $lng)
    {

    }
}