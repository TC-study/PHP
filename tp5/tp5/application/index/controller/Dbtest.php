<?php

namespace app\index\controller;

use think\Db;

/**
 * 数据库测试控制器
 */
class Dbtest
{
    /**
     * 访问路径
     * index.php/index/dbtest/index
     */
    public function index()
    {
        // echo "这里是数据库操作类";

        // 获取数据库对象
        // $db = Db::table('coding_user');

        $db = Db::name('user');
        print_r($db);
    }

    /**
     * 验证数据库添加操作
     *
     * 访问路径: index/dbtest/add
     */
    public function add()
    {
        # 获取数据库对象
        $db = Db::table('coding_user');

        $user = [
            'username'   => 'user_' . mt_rand(10000, 99999),
            'password'   => md5('abc123'),
            'nick_name'  => 'user_' . mt_rand(10000, 99999),
            'user_photo' => '',
            'updated_at' => time(),
            'created_at' => time(),
        ];

        // 返回受影响的行数(0或1)
        // $res = $db->insert($user);

        // 返回新增主键id
        // $res = $db->insertGetId($user);

        $users = [
            [
                'username'   => 'user_' . mt_rand(10000, 99999),
                'password'   => md5('abc123'),
                'nick_name'  => 'user_' . mt_rand(10000, 99999),
                'user_photo' => '',
                'updated_at' => time(),
                'created_at' => time(),
            ],
            [
                'username'   => 'user_' . mt_rand(10000, 99999),
                'password'   => md5('abc123'),
                'nick_name'  => 'user_' . mt_rand(10000, 99999),
                'user_photo' => '',
                'updated_at' => time(),
                'created_at' => time(),
            ],
        ];
        $res = $db->insertAll($users);
        echo $res;
    }

    /**
     * 验证数据删除操作
     * 访问路径: index/dbtest/delete
     */
    public function delete()
    {
        # 1. 获取数据库对象
        $db = Db::name('user');

        // 2. 执行删除
        // $res = $db->delete(13);

        // 删除两条记录
        $res = $db->delete([10, 11]);

        echo $res;
    }

    /**
     * 验证数据库的更新操作
     * 访问路径: index/dbtest/update
     */
    public function update()
    {
        # 1. 获取数据库对象
        $db = Db::name('user');

        // 2. 执行更新
        // $res = $db->where('id=5')
        //     ->update([
        //         'nick_name' => "淘气的张三",
        //     ]);

        // 通过助手函数db获取数据库对象
        // $res = db('user')
        //     ->where('id=6')
        //     ->update(['nick_name' => '淘气的李四']);

        // 更新单个字段(setField)
        // $res = db('user')
        //     ->where('username', 'xiaoxin')
        //     ->setField('nick_name', '淘气的小新');

        // 递增
        $res = db('article')
            ->where('id=15')
            ->setInc('browse_times');

        echo $res;
    }

    /**
     * 验证数据库的查询操作
     * 访问路径: index/dbtest/select
     */
    public function select()
    {
        // 查询所有的用户
        // $res = db('user')
        //     ->field('id,username,created_at')
        //     ->where('username', 'neq', '')
        //     ->order('created_at DESC')
        //     ->limit(3)
        //     ->select();

        // 查询单个用户
        $res = db('user')->find(1);

        print_r($res);
    }
}
