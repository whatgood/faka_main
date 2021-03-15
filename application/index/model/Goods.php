<?php
namespace app\index\model;

use think\Model;

class Goods extends Model
{
    public function category()
    {
        return $this->belongsTo('category');
    }
    public function goods($id)
    {
        $goods = Goods::find($id);
        if ($goods) {
          if (empty($goods->image)) {
              $goods->image = $goods->category->image;
          }
        }
        return $goods;
    }

}
