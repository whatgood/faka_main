<?php
namespace app\accsmarket\model;
use think\Model;
class Order extends Model
{

	public function insert($goods_id,$category_id,$name,$goods_price,$goods_num,$email,$type)
	{
		/*写入订单信息*/
		$this->data([
	        "goods_id"=>$goods_id,
	        "goods_name"=>$name,
	        "goods_type"=>db('category')->where('id',$category_id)->value('name'),
	        "goods_price"=>$goods_price,
	        "goods_num"=>$goods_num,
	        "goods_sum"=>(double)$goods_price*(int)$goods_num,
	        "goods_order"=>date('YmdHis',time()),
	        "pay_type"=>$type,
	        "email"=>$email,
	        "createtime"=>date("Y-m-d H:i:s",time()),
		]);
		$this->save();
        session('out_trade_no', $this->goods_order);
		return [
			'order_id'=>$this->goods_order,
			'name'=>$this->goods_name,
			'sum'=>$this->goods_sum,
		];
	}
    // 开启自动写入时间戳字段

}
