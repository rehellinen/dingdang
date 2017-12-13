<?php
namespace app\beta\controller;
use think\Controller;
use think\Request;

/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/12/1
 * Time: 20:49
 */
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function submit()
    {
        $post = Request::instance()->post();
        $code = $post['code'];
        $telephone = $post['telephone'];

        // 获取数据库中所有的邀请码
        $codes = model('Beta')->select()->toArray();

        // 比较用户输入的邀请码和数据库中的邀请码
        foreach ($codes as $values)
        {
            if($code == $values['code']) {
                $count = $values['count'];
                if($count >= 10) {
                    return show(0, '口令或抽奖码名额已被用完');
                }

                // 生成邀请码并存入数据库
                $newCode = $this->generateCode($code, $telephone);

                $res = model('Beta')->where('code='.$code)->update([
                    'count' => ++$count
                ]);
                return show(1,'成功', [$newCode]);
            }
        }

        return show(0, '口令或抽奖码错误');
    }

    public function generateCode($parentCode, $telephone)
    {
        // 生成随机数字
        $rand = '';
        if(strlen($parentCode) == 3){
            $rand = $this->randNum(4);
        }elseif (strlen($parentCode) == 4) {
            $rand = $this->randNum(5);
        }


        // 比对
        $codes = model('Beta')->select()->toArray();
        $status = true;

        foreach ($codes as $values)
        {
            if($rand == $values['code']) {
                $status = false;
                break;
            }
        }

        if(!$status) {
            $rand = $this->randNum();
        }

        // 插入数据库
        $res = model('Beta')->insert([
            'code' => $rand,
            'parent_code' => $parentCode,
            'telephone' => $telephone
        ]);

        return $rand;
    }

    public function randNum($length = 4)
    {
        $str = null;
        $strPol = "123456789";
        $max = strlen($strPol) - 1;

        for($i = 0; $i < $length; $i++)
        {
            $str.= $strPol[rand(0, $max)];
        }

        return $str;
    }
}








