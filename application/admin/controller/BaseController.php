<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 11:27
 */

namespace app\admin\controller;


use app\common\validate\Api;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;

class BaseController extends Controller
{
    public function _initialize()
    {
        //判断是否登录
        $module = Request::instance()->module();
        $res = Session::has('loginSeller', $module);
        if(!$res){
            $this->redirect($module."/Login/index");
        }

        //导航栏激活状态的完成
        $controller = Request::instance()->controller();
        $this->assign('controller', $controller);
    }

    public function setStatus()
    {
        (new Api())->goCheck('status');

        $controller = Request::instance()->controller();
        $post = Request::instance()->post();

        $res = Loader::model($controller)->updateStatus($post['id'], $post['status']);
        if($res){
            return show(1,'更新成功');
        }else{
            return show(0,'更新失败');
        }
    }

    public function add()
    {
        $post = Request::instance()->post();
        if(!$post){
            return $this->fetch();
        }else{
            $controller = Request::instance()->controller();
            $res = Loader::model($controller)->save($post);
            if($res){
                return show(1,'添加成功');
            }else{
                return show(0,'添加失败');
            }
        }
    }

    public function edit()
    {
        $post = Request::instance()->post();
        if($post){
            $controller = Request::instance()->controller();
            $res = Loader::model($controller)->updateById($post['id'], $post);
            if($res){
                return show(1,'编辑成功');
            }else{
                return show(0,'编辑失败');
            }
        }else{
            $get = Request::instance()->get();
            $controller = Request::instance()->controller();
            $id = $get['id'];
            $res = Loader::model($controller)->getById($id);
            if($res){
                return $this->fetch('', [
                    'res' => $res
                ]);
            }else{
                return show(0,'获取具体信息失败');
            }
        }
    }
}