<?php

namespace app\admin\model;

use think\Model;

class Gupload extends Model
{

    

    

    // 表名
    protected $name = 'gupload';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];



   protected static function init()
   {
       Gupload::event('after_insert', function ($gupload) {
            $root=ROOT_PATH."public".$gupload->sfile;
            $file = file($root);
            foreach ($file as $line => $content) {
               $data=[
                    'goods_id'=> $gupload->goods_id,
                    'pre_data'=> substr($content, 0,50),
                    'goods_data'=> $content,
                    'createtime'=> time(),
                ];
                db('store')->data($data)->insert();
            }
            $good['id']=$gupload->goods_id;
            $count=count($file);
            db('goods')->where($good)->setInc("goods_num",$count);
      });
   }
    

    







    public function goods()
    {
        return $this->belongsTo('Goods', 'goods_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
