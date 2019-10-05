<?php

namespace app\index\controller;

use think\Controller;

class Article extends Controller
{
    public function index()
    {
        // 1.查数据
        // 用助手函数可以直接获取模型类对象，不需要引用
        // 注意：必须是对象才能用链式写法
        $list = model('article')->field('*')->order('created_at DESC')->paginate();
        // 不能用all()静态方法，因为$list是一个数组，数组元素才是模型对象
        // $list = AT::all()->order('created_at DESC')->paginate();

        // 注意：一般数据库的操作放在m层(也就是model下的模型类)进行操作（声明方法，进行封装）
        // 控制器只需要调用模型类的方法即可
        // 查看最热文章
        $hotest = model('article')->getHotest();

        // 查看最新文章
        $newest = model('article')->getNewest();

        // 2.绑定参数
        $this->assign('list', $list);
        $this->assign('hotest', $hotest);
        $this->assign('newest', $newest);

        // 3.调用模板
        return $this->fetch();

    }

    /**
     * 注意：
     * 1.当通过url方法传递参数时，可以直接在控制器中定义方法，而方法中定义相应的参数，就可以直接获取到相应的参数，不需要获取
     * 2.获取参数时$_GET是获取不到的
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detial($id)
    {
        // **有参数首先要获取参数**
        // 当方法没有定义参数时，可以用request 获取请求信息
        // 第一种方法：类名静态方法获取(需要引用类think\Request)
        // $request = Request::instance();
        // $id      = $request->param('id');
        // 第二种方法：使用助手函数
        // $request = request();
        // $id      = request()->param('id');

        // 1.查数据

        // 第一种方法
        // 返回值是对象
        // $list = model('article')->field('subject,content,browse_times,created_at')->where(['id' => $id])->select();
        // print_r($list);
        // 第二种方法
        // 放回值是数组
        // $list = model('article')->find($id);
        // 第三种方法
        $list = model('article')->get($id);
        // print_r($list);
        // 第四种方法：
        // 在m层定义方法，然后在控制器中调用
        // 查看最热文章
        $hotest = model('article')->getHotest();

        // 查看最新文章
        $newest = model('article')->getNewest();

        // 2.绑定参数
        $this->assign('list', $list);
        $this->assign('hotest', $hotest);
        $this->assign('newest', $newest);

        // 3.调用模板
        return $this->fetch();
    }

    // 添加文章
    public function add()
    {
        // 1.查数据

        // 查看最热文章
        $hotest = model('article')->getHotest();

        // 查看最新文章
        $newest = model('article')->getNewest();

        // 2.绑定参数
        $this->assign('hotest', $hotest);
        $this->assign('newest', $newest);

        // 3.调用模板
        return $this->fetch();
    }

    public function doAdd()
    {
        $data = $_POST;
        // print_r($data);
        $res = model('article')->save($data);

        if ($res) {
            return $this->success('发表成功', url('index/article/index'));
        } else {
            return $this->error('发表失败');
        }
    }
}
