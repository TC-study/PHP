<?php

namespace app\index\model;

use think\Model;

//前台用户模型
class User extends Model
{
    //字段的自动完成原理：
    //这些属性都是继承于think/model父类的属性，一旦发生更改，就会重写覆盖
    // 时间字段自动完成
    protected $autoWriteTimestamp = true;
    protected $updateTime         = "updated_at";
    protected $createTime         = "created_at";

    // 普通字段的自动完成
    // 添加场景下，需要自动完成的内容
    protected $insert = [
        'user_photo' => 'images/user.png',
    ];
}
