<?php

namespace app\index\controller;

use think\Db;

class DbDemo
{
    public function index()
    {
        //访问路径：index.php?index/DbDemo/index
        // echo '我是index模块下的DbDemo控制器下的index()方法';
        //
        // 获取数据库对象
        // 1.通过Db+方法名获取对象
        // $db = Db::table('coding_user');
        // print_r($db);
        // $db = Db::name('user');
        // 2.通过助手函数db('表名')
        // 注意： 表名不需要加前缀
        $db = db('user');
        var_dump($db);

        // return $db; //在tp5中会报错，影响结果

    }

    public function insert()
    // 注意方法名：
    // 否则：方法不存在:app\index\controller\DbDemo->insert()
    {
        // 插入数据
        //
        // 1.通过类名+方法获取对象
        // $db = Db::name('user');

        $user = [
            'username'   => 'user_' . mt_rand(10000, 99999),
            'password'   => md5('abc123'),
            'nick_name'  => 'user_' . mt_rand(10000, 99999),
            'user_photo' => '',
            'updated_at' => time(),
            'created_at' => time(),
        ];

        // 单条插入（一维数组）
        // 返回影响的行数（0或1）
        // $res = $db->insert($user);

        // // 返回新增主键id(存在的)
        // 注意：insertGetId存在于单条查询，参数是一维数组
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

        // 多条插入（多维数组）
        // 返回影响的行数（多条语句的影响的数量）
        // 注意：在多条插入中不能插入单条数据
        //
        // $res = $db->insertAll($user);
        // echo $res;
        //
        // 2.助手函数方式插入数据
        // 1.单条插入
        // 返回影响的行数（0或1）
        // $res = db('user')->insert($user);
        // 2.多条插入
        //  返回影响的行数（多条语句的影响的数量）
        // 注意：在多条插入中不能插入单条数据
        // $res = db('user')->insertAll($users);
        //  返回新增主键id(存在的)
        // 注意：insertGetId存在于单条查询，参数是一维数组
        // $res = db('user')->insertGetId($users);

        echo $res;
    }

    // 删除数组
    public function delete()
    {
        // 1.获取数据对象
        // $db = Db::name('user');

        // 2.执行删除
        // 单条删除
        //返回值是0或1
        // $res = $db->delete(15);

        // $res = $db->where('id=14')->delete();
        //返回值是0或1
        // 多条删除
        // 返回值是影响的行数数量
        // 注意：在多条删除中也可以只删除单条数据
        // $res = $db->delete([18, 20, 21]);

        // $res = $db->where('id', 'in', [11])->delete();

        // 助手函数方式删除数据
        // 1.单条删除
        // 返回值是0或1
        // $res = db('user')->delete(24);
        // $res = db('user')->where('id=23')->delete();
        // 2.多条删除
        // 返回值是影响的行数数量
        //注意：在多条删除中也可以只删除单条数据
        // $res = db('user')->delete([25]);
        // $res = db('user')->delete([22,26]);
        // $res = db('user')->where('id', 'in', [22, 26])->delete();
        var_dump($res);
    }

    // 改
    // 编程方法:面向对象编程(oop) 和面向过程编程（用function编程）
    public function update()
    {
        // 1.获取对象
        // 注意：没有表前缀
        // 否则：able 'news.coding_coding_user' doesn't exist
        // $db = Db::name('user');

        // 2.执行更新
        // 单条更新
        // setField 方法返回影响数据的条数，没修改任何数据字段返回 0
        // 返回值 0或1
        // $res = $db->where('id=9')->update(['nick_name' => '123']);
        // $res = $db->where('id=9')->setField(['nick_name' => 124455]);

        // 助手函数：oop与面向过程编程的结合体
        // 步骤：用助手函数获取对象，然后结合where和update
        // 返回值 0 或1
        //
        // $res = db('user')->where('id=9')->update(['nick_name' => 1234]);
        // $res = db('user')->where('id=9')->setField(['nick_name' => 124455]);
        // 多条更新
        // 返回值是影响的行数数量
        // setField 方法返回影响数据的条数，没修改任何数据字段返回 0
        // 返回值是影响的行数数量
        //
        // $res = $db->where('id', 'in', [9, 27])->update(['nick_name' => 1234]);
        // $res = $db->where('id', 'in', [9, 27])->setField(['nick_name' => 1213]);
        //
        // // 助手函数：oop与面向过程编程的结合体
        // 步骤：用助手函数获取对象，然后结合where和update
        // 返回值是影响的行数数量
        // setField 方法返回影响数据的条数，没修改任何数据字段返回 0
        // 注意：
        // 1.只是更新个别字段的值，可以使用setField方法。
        // 2.setField方法支持同时更新多个字段，只需要传入数组即可
        // $res = db('user')->where('id', 'in', [9, 27])->update(['nick_name' => 1234]);
        // $res = db('user')->where('id', 9)->setField(['nick_name' => 333, 'username' => '123']);
        //
        // setInc(string $name, int $step=1,[int $time] )
        // 对单个字段进行递增操作
        // $name 字段名
        // $step 递增的步幅 默认是1
        // setInc/setDec支持延时更新，如果需要延时更新则传入第三个参数
        // 整数代表秒数   多长时间后更新
        // 返回受影响的行数
        // $res = db('article')->where('id', 15)->setInc('browse_times');

        // setDec(string $name, int $step=1,[int $time] )
        // 对单个字段进行递减操作
        //  // $name 字段名
        // $step 递减的步幅 默认是1
        // setInc/setDec支持延时更新，如果需要延时更新则传入第三个参数
        // 整数代表秒数   多长时间后更新
        // 返回受影响的行数
        // $res = db('article')->where('id', 15)->setDec('browse_times');

        echo $res;

    }
    // 查询操作
    public function select()
    {
        // 查询所有的用户
        // $res = db('user')->select();

        // 查询单个字段或多个字段
        // field(mixed $data)查询指定字段
        // 参数形式：
        // 1.字符串 "id,username"
        // 2.数组 ['id','username']
        // 3.错误形式 "id","username"
        // 返回 数据库对象
        // $res = db('user')->field('id')->select();
        // $res = db('user')->field('id,username')->select();
        // 过滤空字符串
        // $res = db('user')->field('id,username')->where('username', 'neq', '')->select();

        // order(mixed $data)
        // 功能：wghol   where group by  having order by limit
        // 指定对结果集进行排序
        // 参数：
        // 注意:order中参数字符串中空格只有一个，不然会变成默认的ASC
        // 1.字符串  created_at DESC
        // 2.数组    ['created_at'=>'DESC']
        // 返回数据库对象
        // $res = db('user')->field('id,username,created_at')->where('username', 'neq', '')->order('created_at DESC')->select();

        // limit(数字)
        // 功能：指定返回前（数字个）记录数
        // 返回数据库对象
        // $res = db('user')->field('id,username,created_at')->where('username', 'neq', '')->order('created_at DESC')->limit(3)->select();

        // 查询一条记录
        // find(mixed $data)
        // 功能：查询一条记录
        // 参数：数字(默认是id=数字 且sql语句中默认有Limit限制一条记录)
        // 返回：一维关联数组
        //
        // $res = db('user')->find(1);
        //
        // print_r($res);

        // where(mixed field,$op=null,$condition=null)
        // field是字段，$op是操作符，$condition是条件
        // 参数
        // 一个：
        // 1.字符串
        // where('id=数字') 条件表达式
        // where('id',数字) 字段名
        // 2.数组
        // where(['id'=>'数字'])
        // where(['username'=>'字符串'])
        // 两个：
        // 1.默认的操作符是=
        // where('id',数字)
        // where('username',值)
        // 三个：
        // where('字段名','操作符','值');
        // where('id','eq',数字);
        // 操作符：
        // eq 等于
        // neq 不等于
        // gt 大于
        // lt 小于
        // egt 大于等于
        // elt 小于等于
        // like 模糊查询
        // in  范围查询
        // between 边界查询
        // ......
        // 返回值是数据库对象
        // 功能是：
        // 1.执行删改查操作（无增操作），因为增不需要where
        // 2.多个where()之前连接是"与(and)"的关系(&&)
        // whereOr(mixed field,$op=null,$condition=null)
        // 多个where之间是"或(or)"关系
        //
        //
        // 执行原生SQL
        //
        // Db::query('查询操作');
        // Db::execute('增删改');
        // $res = Db::query("SELECT * FROM coding_user");
        // $res = Db::execute("UPDATE coding_user SET username=666 WHERE id=9");
        print_r($res);
    }
}
