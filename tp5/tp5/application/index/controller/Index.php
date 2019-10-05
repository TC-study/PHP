<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        // return "<h1>你好:" . $user['username'] . "</h1>";
        return $this->fetch();
    }

    /**
     * 验证模板引擎的效果
     *
     * @return [type] [description]
     */
    public function tpl()
    {
        $hi   = "Hello World";
        $user = db('user')->find(1);

        $obj = json_decode(json_encode($user));
        // print_r($obj);

        $this->assign('hi', $hi);
        $this->assign('user', $user);
        $this->assign('obj', $obj);

        // 调用模板
        //模板路径：index模块下的view模板下的index控制器下的tpl.html文件
        //index/view/index/tpl.html
        //
        return $this->fetch();
    }
}
