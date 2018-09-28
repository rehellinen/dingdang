<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/9/30
 * Time: 0:34
 */

namespace app\api\controller\v2;

use app\common\exception\SuccessException;
use app\common\model\Card;
use app\common\model\Image as ImageModel;
use app\common\service\Token;
use think\Controller;
use think\Request;

class Image extends Controller
{
    /**
     * 名片上传
     * @throws SuccessException
     */
    public function cardUpload()
    {
        $image = Request::instance()->file('image');
        $info = $image->move(ROOT_PATH . 'public' . DS . 'upload');
        $path = '/upload/' . $info->getSaveName();

        $uid = Token::getUserID();
        $imageID = (new ImageModel)->insertGetId(['image_url' => $path]);
        $res = (new Card())->save([
            'image_id' => $imageID,
            'user_id' => $uid
        ]);

        if($res){
            throw new SuccessException([
                'message' => '更改图片成功',
                'data' => ['image_id' => $imageID]
            ]);
        }
    }
}