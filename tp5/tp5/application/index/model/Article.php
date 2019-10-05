<?php

namespace app\index\model;

use think\Model;

/**
 * 数据库操作一般是在m层使用
 */
class Article extends Model
{
    // 时间字段自动完成(要使用模型的增删改查语句才有效果)
    // 1.时间字段放在模型中
    // 2.在执行数据查询操作时，会自动完成对时间戳的转换
    // 3.在执行数据查询操作中，查询字段没有时间字段时，会自动添加字段并转换为当前的时间
    protected $autoWriteTimestamp = true;
    protected $updateTime         = "updated_at";
    protected $createTime         = "created_at";

    // 普通字段
    protected $insert = [
        'admin_id' => 1,
    ];

    // 获取最热文章
    public function getHotest($num = 5)
    {
        return $this->field('id,subject,browse_times')->order('browse_times DESC')->limit($num)->select();

    }

    // 获取最新文章
    public function getNewest($num = 5)
    {
        return $this->field('id,subject')->order('browse_times DESC')->limit($num)->select();
    }

}
