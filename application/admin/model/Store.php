<?php

namespace app\admin\model;

use think\Model;


class Store extends Model
{

    

    

    // 表名
    protected $name = 'store';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];



    public function goods()
    {
        return $this->belongsTo('Goods', 'goods_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    protected static function init()
    {
        Store::event('after_delete', function ($store) {
             $data['id']=$store->goods_id;
             db('goods')->where($data)->setDec("goods_num",1);
        });
        Store::event('after_insert', function ($store) {
             $data['id']=$store->goods_id;
             db('goods')->where($data)->setInc("goods_num",1);
        });


    }
}
