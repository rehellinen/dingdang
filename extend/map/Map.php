<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/4/22
 * Time: 11:32
 */
namespace map;


class Map
{
    /**
     * 根据地址获取经纬度
     * @param string $address 地址
     */
    public static function getLatLngByAddress($address)
    {
        $apiUrl = sprintf(config('map.geocoder'), $address, config('map.ak'));
        $url = config('map.baidu_map_url').$apiUrl;

        $res = curl_http($url, 0);
        return $res['location'];
    }

    public static function getAddress($lat, $lng)
    {

    }
}