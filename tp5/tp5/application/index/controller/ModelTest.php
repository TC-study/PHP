<?php

namespace app\index\controller;

use app\index\model\User;

/**
 * 模型演示操作
 * 注意：当配置文件中
 * // 是否自动转换URL中的控制器和操作名
'url_convert' => false,
需要设置，不然会导致自动加载url，影响大小写和控制器和操作方法的不存在问题
 */
class ModelTest
{
    public function index()
    {
        // 获取模型对象
        // $user = new User;
        // print_r($user);

        // 通过助手函数获取模型对象
        // 注意通过助手函数可以不需要引入类
        $m = model('User');
        print_r($m);
    }

    /**
     * 模型的添加操作
     */
    public function add()
    {
        $user = [
            'username'   => 'model_' . mt_rand(10000, 99999),
            'password'   => md5('abc123'),
            'nick_name'  => 'model',
            'user_photo' => '',
            'updated_at' => time(),
            'created_at' => time(),
        ];
        //一、单条
        // 1.静态方法添加，返回对象
        $res = User::create($user);
        // // print_r($res);
        // echo $res->id;//新增id
        //
        // 2.save方法，返回影响行数
        // save() 参数
        // 两种写法：有参和无参
        // $res = model('user')->save($user);
        // $res = model('user')->data($user)->save();
        // echo $res;
        // 二、多条
        // 3.saveAll 添加多条记录
        // 参数二维数组，返回数组（数组元素是模型对象）
        $arr = [$user, ['username' => 'model_' . mt_rand(10000, 99999),
            'password'                 => md5('abc123'),
            'nick_name'                => 'model',
            'user_photo'               => '',
            'updated_at'               => time(),
            'created_at'               => time()],
        ];
        $res = model('user')->saveAll($arr);
        $id  = $res[0]->id; //返回id
        print_r($id);
    }

    /**
     * 验证数据模型的删除
     * @return object
     */
    public function delete()
    {
        // 单条记录
        // 1.静态方法删除数据
        // get方法
        // 返回值是影响行数
        // $res = User::get(46)->delete();

        // 2.助手函数方法删除数据
        // 返回值是影响行数
        // $res = model('user')->where('id', 'eq', 47)->delete();
        // echo $res;

        // User::destroy静态方法
        // 参数是混合值
        // 参数是数字    就是id=数字
        // 删除一条记录
        // 参数字符串 "数字1,数字2"
        //   删除两条记录
        // 参数是数组  [数字1,数字2]
        // 参数是数组条件 ['属性'=>'值']
        //
        // 返回值是影响行数
        $res = User::destroy("44,45");
        echo $res;

    }

    /**
     * 模型更新  更新数组
     * @return [type] [description]
     */
    public function update()
    {
        // 更新单条记录
        // 1.静态方法
        // 返回一个模型对象
        $data = [
            'id'         => 1,
            'nick_name'  => '小新',
            'updated_at' => time(),

        ];
        $data1 = [
            'nick_name'  => '好看的小新',
            'updated_at' => time(),

        ];
        // $res = User::update($data);//(数组必须包含id)

        // $res = User::where("id=1")->update($data);
        //(数组中可以包含id,也可以不包含id),返回值是受影响的行数

        // save(mixed $data = null,$where = null)更新一条记录
        // 参数
        // 1.空(要获取id)
        // $u             = User::get(1);
        // $u->nick_name  = '漂亮的小新';
        // $u->updated_at = time();
        // $res           = $u->save();
        // // 2.关联数组(要获取id)
        // $u   = User::get(1);
        // $res = $u->save($data);
        // 3.$where 不为空
        // $res = model('user')->save($data1, ['id' => 1]);

        // print_r($res);
        // 更新多条记录
        // saveAll()
        // 二维数组，包含主键id
        // 返回：是数组（一维是数组，二维是模型对象）
        // 1.助手函数方法更新
        $res = model('user')->saveAll([
            ['id' => 1, 'nick_name' => '小新'],
            ['id' => 43, 'nick_name' => '大佬'],
        ]);
        print_r($res);

    }

    /**
     * 模型的查询操作
     * @return [type] [description]
     */
    public function selete()
    {
        // 1.静态方法get()
        // 功能：查询一条记录
        // 参数：数字  相当于id=数字
        // 返回值: 当前模型对象(是通过模型(model)继承的)
        $res = User::get(1);
        // $res = $res->toArray();//对象转数组
        // $res = $res->toJson(); //对象转json数据
        echo $res->nick_name; //访问字段值
        // 原理：当访问时会调用一个魔术方法__get()
        // __get()
        // 触发时机
        // 1.属性不存在
        // 2.属性受保护或私有
        // print_r($res);
        // 2.静态方法all()
        //功能：查询多条记录

        //参数
        //空  查询所有记录
        $res = User::all();
        //字符串 多条记录(相当于id为1,2,3的记录)
        $res = User::all('1,2,3');
        //tp5中会自动把字符串explode分割成数组
        //
        //数组 多条记录(相当于id为1,2,3的记录)
        $res = User::all([1, 2, 3]);
        //返回值：数组（数组元素是模型对象）
        //
        //分页查询
        //1.查询数据
        //$list = $模型对象->paginage([数字])
        //数字默认在配置文件中的list_rows中配置
        // $list = model('user')->save()->paginage([]);
        // 赋值数据
        // $this->assign('list', $list);
        //2.展示分页
        // {{$list->render()}}
        // {{$list:render()}}
    }

}
