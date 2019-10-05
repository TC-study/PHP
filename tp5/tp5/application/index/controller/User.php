<?php

namespace app\index\controller;

//注意引用类时，一定要注意大小写，类名大小写敏感
//控制器基类
use think\Controller;
use think\Session;

class User extends Controller
{
    /**
     * 这是用户注册页面
     * @return [type] [description]
     */
    public function register()
    {
        $msg = '这里是用户注册';

        // 将变量赋值给模板
        $this->assign('msg', $msg);

        // 调用模板(在tp5中必须要有return,否则无结果显示)
        return $this->fetch();
    }

    /**
     * tp5中php的链接：
     * url('index/user/doRegister')
     * 在html模板中调用php的方法
     * 注意定界符是{}
     * {:url('index/user/doRegister')}
     * @return [type] [description]
     */
    public function doRegister()
    {
        // 接收表单提交数据
        $data = $_POST;
        // print_r($data);
        //
        if ($data['password'] != $data['repassword']) {
            $this->error('两次密码输入不一致,请重新输入');
        }
        //
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = [
            'username'  => $username,
            'password'  => md5($password),
            'nick_name' => 'user_' . mt_rand(10000, 99999),
            // 'user_photo' => '',
            // 'updated_at' => time(),
            // 'created_at' => time(),
        ];

        // 数据库添加操作
        // 1.助手函数方法
        // 注意:使用助手函数可以不用引用类
        // $res = db('user')->insert($user);
        $res = model('user')->save($user);
        // 2.通过类名获取对象
        // $db = Db::table('coding_user');
        // $db  = Db::name('user');
        // $res = $db->insert($user);
        // 3.通过原生sql
        // 注意: "$arr['user_name']"这个写法是错误的
        //1. 数组转字符串
        //
        // $keys   = '';
        // $values = '';
        // foreach ($user as $key => $value) {
        //     $keys .= $key . ',';
        //     $values .= "'$value'" . ',';
        // }
        // 2.去除字符串特殊字符
        // 前面的ltrim（$keys, ','）
        // 中间的（这个是普通字符）
        // $str = "fdsfdsf";
        // $str = str_replace('s', '', $str);
        // 尾部的
        // $keys   = rtrim($keys, ',');
        // $values = rtrim($values, ',');
        // echo $values;
        // $sql = "INSERT INTO coding_user($keys)Values($values)";
        // // echo $sql;
        // $res = Db::execute($sql);

        if ($res) {
            //success('报错信息',[跳转地址])
            //error('报错信息',[跳转地址])
            //redirect(跳转地址)
            //有3秒倒计时，默认跳转到history.back()
            $this->success('注册成功');
        } else {
            $this->error('注册失败');
        }
    }

    public function index()
    {
        // 1.查询数据
        Session::get('id');
        Session::get('username');
        // 注意：就算field 没有查询指定的字段，order也能用指定的字段
        $list = db('user')
            ->field('id,username,password,nick_name,user_photo,created_at,updated_at')
            ->order('created_at DESC')
            ->select();
        // $user = db('user')->order('created_at DESC')->select();

        $this->assign('list', $list);

        return $this->fetch();

    }

    public function login()
    {
        // 1.查询数据
        // 表单提交无需查询
        // 2.展示数据
        return $this->fetch();

    }

    public function doLogin()
    {
        // 1.查询数据
        $data     = $_POST;
        $username = $data['username'];
        $password = $data['password'];

        // $user = [
        //     'username' => $username,
        //     'password' => $password,
        // ];
        // $list     = db('user')->field('id,username,password')->where($user)->select();
        // $this->assign('nameList', $nameList);
        $user = db('user')->field('id,username')->where('username', $username)->where('password', $password)->find();

        if ($user) {
            // 登录成功
            //给session赋值
            // Session::set('user', $user);
            // 助手函数方式给session赋值
            session('user', $user);

            $this->success('登录成功', url('index/index/index'));
        } else {
            // 登录失败
            $this->error('登录失败', url('index/user/login'));
        }
    }
    public function logout()
    {
        // 获取当前的session值
        // print_r(Session::get());
        // Session::delete('user');
        // 助手函数方式删除session值
        session('user', null);

        $this->redirect(url('index/user/login'));
    }
}
