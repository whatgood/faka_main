<?php

namespace app\admin\model;

use think\Model;


class Order extends Model
{

    

    

    // 表名
    protected $name = 'order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'statelist_text'
    ];
    

    
    public function getStatelistList()
    {
        return ['未付款' => __('未付款'), '已付款' => __('已付款')];
    }


    public function getStatelistTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['statelist']) ? $data['statelist'] : '');
        $list = $this->getStatelistList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function goods()
    {
        return $this->belongsTo('Goods', 'goods_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
