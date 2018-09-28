<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/1/26
 * Time: 12:06
 * Token 的基类
 */

namespace app\common\service;


use app\common\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;
use enum\StatusEnum;
use enum\ScopeEnum;
use app\common\exception\WeChatException;

class Token
{
    /*
     * 初始化成员变量
     */
    public function __construct($code)
    {
        $this->code = $code;
        $this->appId = config('weixin.app_id');
        $this->appSecret = config('weixin.app_secret');
        $this->loginUrl = sprintf(config('weixin.url'), $this->appId, $this->appSecret, $this->code);
    }

    /**
     * 主方法
     * @return string Token令牌
     * @throws Exception 微信服务器没有响应
     * @throws WeChatException
     */
    public function get()
    {
        // 爬取微信服务器返回的结果
        $wxResult = $this->getResultFromWx();
        // 根据openID获取用户ID
        $userID = $this->getIDByOpenID($wxResult, 'User', StatusEnum::NORMAL);
        // 生成缓存的键与值
        $cachedKey = self::generateToken();
        $cachedValue = $this->prepareCachedValue($wxResult, $userID);
        // 进行缓存
        $token = $this->saveToCache($cachedKey, $cachedValue);
        return $token;
    }

    /**
     * 准备缓存的数据结构
     * @param array $wxResult 微信返回的结果
     * @param $userID
     * @return array 要储存的信息
     */
    private function prepareCachedValue($wxResult, $userID)
    {
        $cachedValue = $wxResult;
        $cachedValue['userID'] = $userID;
        $cachedValue['scope'] = ScopeEnum::USER;

        return $cachedValue;
    }

    /**
     * 爬取微信服务器返回的结果
     * @return array
     * @throws Exception
     * @throws WeChatException
     */
    public function getResultFromWx()
    {
        $jsonResult = curl_http($this->loginUrl);
        $res = json_decode($jsonResult, true);
        if(empty($res)){
            throw new Exception('获取open_id / session_key失败');
        }
        if(array_key_exists('errcode', $res)){
            // 处理错误的结果
            throw new WeChatException([
                'message' => $res['errmsg'],
                'status' => $res['errcode']
            ]);
        }else{
            return $res;
        }
    }

    /**
     * 根据openID获取用户( 买家、商店、卖家 )的ID
     * @param array $wxResult 微信服务器返回的结果
     * @param string $modelName 模型名称
     * @param int $status 用户状态
     * @return int 用户的ID
     */
    protected function getIDByOpenID($wxResult, $modelName, $status)
    {
        $openID = $wxResult['openid'];

        $res = model($modelName)->where([
            'open_id' => $openID,
            'status' => ['neq', StatusEnum::DELETED]
        ])->find();
        if(!$res){
            $id = model($modelName)->insertGetId([
                'open_id' => $openID,
                'status' => $status
            ]);
        }else{
            $id = $res->id;
        }
        return $id;
    }

    /**
     * 将Token令牌及其携带的信息存入缓存
     * @param $cachedValue
     * @return string
     * @throws TokenException
     */
    protected function saveToCache($cachedKey, $cachedValue)
    {
        $cachedValue = json_encode($cachedValue);
        $expire_in = config('admin.token_expire_in');

        $cache = cache($cachedKey, $cachedValue, $expire_in);
        if(!$cache){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'status' => 10001
            ]);
        }
        return $cachedKey;
    }

    /**
     * 生成随机字符串作为令牌
     * @return string 随机字符串
     */
    public static function generateToken()
    {
        // 32位字符串
        $randChars = getRandChars(32);
        // 时间戳
        $timeStamp = $_SERVER['REQUEST_TIME_FLOAT'];
        // 前缀
        $prefix = config('admin.md5_prefix');

        $token = md5($prefix.$randChars.$timeStamp);
        return $token;
    }

    /**
     * 验证令牌是否过期
     * @param string $token Token令牌
     * @return bool
     */
    public static function verifyToken($token)
    {
        $isExisted = Cache::get($token);
        if($isExisted){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 根据Token令牌获取对应的信息
     * @param string $key 存储的信息的键
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars)){
                $vars = json_decode($vars, true);
            }
            if(array_key_exists($key, $vars)){
                $var = $vars[$key];
                return $var;
            }else{
                return false;
            }
        }
    }

    /**
     * 获取买家ID
     * @return int 买家ID
     */
    public static function getBuyerID()
    {
        $userID = self::getCurrentTokenVar('userID');
        return $userID;
    }

    /**
     * 验证用户是否在对自己的讲座进行操作
     * @param int $checkedBuyerID 订单查询到的买家ID
     * @return bool
     * @throws TokenException
     */
    public static function isValidOperate($checkedBuyerID)
    {
        $currentBuyerID = self::getBuyerID();
        if($currentBuyerID == $checkedBuyerID){
            return true;
        }else{
            throw new TokenException([
                'message' => '订单与用户不匹配',
                'errorCode' => 80002
            ]);
        }
    }
}