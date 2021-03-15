<?php
namespace app\index\model;
use think\Model;

class Category extends Model
{
    public function goods()
    {
        return $this->hasMany('goods');
    }
    public function categories($id='')
    {
        if ($id) {
            $categories = Category::field('id,name,image')->where('type', 'goods')->where('id', $id)->order("weigh desc")->select();
        }else{
            $categories= Category::field('id,name,image')->where('type', 'goods')->order("weigh desc")->select();
        }
        foreach ($categories as $x => $category) {
            foreach ($category->goods as $y => $goods) {
                if (empty($goods['image'])) {
                    $goods['image']=$category['image'];
                }
            }
        } 
        return $categories;
    }
}
