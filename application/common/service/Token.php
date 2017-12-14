<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/16
 * Time: 14:07
 */

namespace app\common\service;


use app\common\exception\TokenException;
use app\common\exception\UserException;
use enum\ScopeEnum;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public function get($id)
    {
        if(!$id) {
            throw new UserException();
        }

        // 准备缓存的数据
        $cachedValue = $this->prepareCachedValue($id);
        $token = $this->saveToCache($cachedValue);

        return $token;
    }

    private function prepareCachedValue($id)
    {
        $cachedValue['uid'] = $id;
        $cachedValue['scope'] = ScopeEnum::User;

        return $cachedValue;
    }

    private function saveToCache($cachedValue)
    {
        $key = $this->generateToken();
        $value = json_encode($cachedValue);
        $time = config('setting.token_time');

        $result = cache($key, $value, $time);
        if(!$result) {
            throw new TokenException([
                'status' => 10005,
                'msg' => '服务器缓存写入失败'
            ]);
        }

        return $key;
    }

    public function generateToken()
    {
        // 随机字符串
        $randChars = getRandChars();

        // 时间戳
        $time = $_SERVER['REQUEST_TIME'];

        // 前缀
        $pre = config('setting.md5_pre');

        $md5Str = md5($pre.$randChars.$time);
        return $md5Str;
    }

    public function getVarsByToken($key)
    {
        $token = Request::instance()->header('token');

        // 从缓存获取uid
        $vars = Cache::get($token);

        if(!$vars) {
            throw new TokenException();
        } else {
            if(!is_array($vars)) {
                $vars = json_decode($vars, true);
            }
            if(array_key_exists($key, $vars)) {
                return $vars[$key];
            } else {
                throw new Exception('Token不合法');
            }
        }
    }
}