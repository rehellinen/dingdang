<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/11/11
 * Time: 11:27
 */

namespace app\admin\controller;

use app\common\validate\common;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;

class BaseController extends Controller
{
    /*
     *  前置操作
     */
    public function _initialize()
    {
        // 判断是否登录
        $module = Request::instance()->module();
        $res = Session::has('loginUser', $module);
        if(!$res){
            $this->redirect($module."/Login/index");
        }

        // 导航栏激活状态的完成
        $controller = Request::instance()->controller();
        $this->assign('controller', $controller);
    }

    /*
     *  通用修改status方法
     */
    public function setStatus()
    {
        // 数据校验
        $params = Request::instance()->param();
        $validate = new common();
        if(!$validate->scene('status')->check($params)){
            return show(0, $validate->getError());
        }

        // 对数据库进行操作
        $controller = Request::instance()->controller();
        $res = Loader::model($controller)->updateStatus($params['id'], $params['status']);
        if($res){
            return show(1,'更新成功');
        }else{
            return show(0,'更新失败');
        }
    }

    /*
     *  通用添加数据方法
     */
    public function add()
    {
        $params = Request::instance()->param();
        if(!$params){
            return $this->fetch();
        }else{
            // 数据校验
            $controller = Request::instance()->controller();
            $validate = validate($controller);
            if(!$validate->check($params)){
                return show(0, $validate->getError());
            }

            // 操作数据库
            $res = Loader::model($controller)->save($params);
            if($res){
                return show(1,'添加成功');
            }else{
                return show(0,'添加失败');
            }
        }
    }

    /*
     *  通用修改数据方法
     */
    public function edit()
    {
        $post = Request::instance()->post();
        if($post){
            if($post['photo_url']){
                $pattern = '{upload.+}';
                preg_match($pattern, $post['photo_url'], $match);
                $post['photo_url'] = $match[0];
            }
            // 校验数据
            $controller = Request::instance()->controller();
            $validate = validate($controller);
            if(!$validate->check($post)){
                return show(0, $validate->getError());
            }

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
                return $this->fetch();
            }
        }
    }
}