<?php
namespace app\index\controller;
use app\common\controller\Frontend;
use app\index\model\Order;
use fast\AlipayNotify;
use fast\AlipayService;
use fast\AlipayQuery;
use think\Config;
class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function search()
    {
        if (input("email")) {
            $where['email']=input("email");
            $order=db("order")->where($where)->order("createtime desc")->paginate(5);
            $this->assign("num",count($order));
            $this->assign("list",$order);
            return $this->view->fetch("search");
        }else if(input("order")){
            $this->redirect("/back",["out_trade_no"=>input("order")]);
            
        }
    }
    public function content($out_trade_no){
      $content=db("order")->where("goods_order",$out_trade_no)->value('order_content');
      $content=preg_replace('/\s/','<br>',$content);
      echo $content; 
    }
    public function ip()
    {
      dump(get_ip());
    }
    public function shouhou()
    {
        return $this->view->fetch();
    }
    public function article()
    {
        $article=db('article')->where("id",input("id"))->find();
        $this->assign('list',$article);
        return $this->view->fetch();
    }
    public function articlelist()
    {
        $category=db("category")->where("type","article")->select();
        $this->assign("category",$category);
        $category_id=input("category");
        if ($category_id) {
            $list=db('article')->where("category_id",$category_id)->order("createtime desc")->paginate(9);
        }else{
            $list=db('article')->order("createtime desc")->paginate(9);
        }
        $this->assign("list",$list);
        return $this->view->fetch();
    }
    public function index($category_id='')
    {
        if ($category_id) {
          $list=db('category')->where('type','goods')->where('id',$category_id)->order("weigh desc")->select();
        }else{
          $list=db('category')->where('type','goods')->order("weigh desc")->select();
        }
        $this->assign('list',$list);
        return $this->view->fetch();
    }
    public function trade($id)
    {   
        if ($id) {
            $goods=db('goods')->find($id);
            if ($goods['category_id']) {
                $goods['goods_image']=db("category")->where('id',$goods['category_id'])->value('image');
                $this->assign('list',$goods);
                $this->assign("buy_content",db("tip")->where(["name"=>"购买提示"])->value('content'));
                return $this->view->fetch();
            }else{
             $this->success("商品不存在",'/');
            }
        }else{
            $this->success("请先购买商品",'/');
        }
    }
    public function buy($goods_id,$price,$count)
    {
        if ($goods_id) {
            $list=db('goods')->find($goods_id);
            $list['goods_count']=(int)$count;
            $list['goods_price']=(double)$price;
            $this->assign('list',$list);
            return $this->view->fetch();
        }else{
            $this->success("请先购买商品",'/');
        }
    }
    public function check($goods_id,$category_id,$name,$goods_price,$goods_num,$email,$type)
    {
        $goods=db('goods')->find($goods_id);
        if (!isset($email)) {
             $this->success("请填写您的邮箱便于查询订单",'/');
        }
        // if ($name!=$goods['name']) {
        //      $this->success("商品名称不正确",'/');
        // }
        if ((float)$goods_price!=(float)$goods['goods_price']) {
             $this->success("商品价格不正确",'/');
        }
        if ((int)$goods_num>(int)$goods['goods_num']) {
             $this->success("商品数量不能大于库存数量",'/');
        }
    }
    public function alipay($order_id,$name,$sum)
    {
        header('Content-type:text/html; Charset=utf-8');
        $appid = config('site.alipay_appid'); //平台密钥
        $notifyUrl =  request()->domain().'/notify'; //付款成功后的异步回调地址
        $outTradeNo =$order_id; //你自己的商品订单号，不能重复
        $orderName = $name; //订单标题
        $payAmount = $sum; //付款金额，单位:元
        $signType = 'RSA2'; //签名算法类型，支持RSA2和RSA，推荐使用RSA2
        $rsaPrivateKey = config('site.alipay_app_private_key');
        $aliPay = new AlipayService();
        $aliPay->setAppid($appid);
        $aliPay->setNotifyUrl($notifyUrl);
        $aliPay->setRsaPrivateKey($rsaPrivateKey);
        $aliPay->setTotalFee($payAmount);
        $aliPay->setOutTradeNo($outTradeNo);
        $aliPay->setOrderName($orderName);
        $result = $aliPay->doPay();
        $result = $result['alipay_trade_precreate_response'];
        $result['price']=$payAmount;
        return $result;
    }
    public function pay($goods_id,$category_id,$name,$goods_price,$goods_num,$email,$type)
    {     
     
        $this->check($goods_id,$category_id,$name,$goods_price,$goods_num,$email,$type);
        $order  = new Order;
        $back=$order->insert($goods_id,$category_id,$name,$goods_price,$goods_num,$email,$type);
        if (!session('out_trade_no')) {
            $this->success('无效的订单','/');
        }
        $alipay_back=$this->alipay($back['order_id'],$back['name'],$back['sum']);
        $this->assign('result',$alipay_back);
        return $this->view->fetch();
    }
    public function faka($out_trade_no)
    {
        $order=db("order")->where('goods_order',$out_trade_no)->find(); //订单
        $kami=db("store")->where('goods_id',$order['goods_id'])->limit($order['goods_num'])->select();//卡密集合
        $ids=[];//卡密ID集合
        $order_content=[];
        foreach ($kami as $key => $value) {
            array_push($ids, $value['id']);
            array_push($order_content,$value["goods_data"]);
        }
        db("store")->delete($ids);//删除对应的库存
        db("goods")->where("id",$order['goods_id'])->setInc("goods_sold",count($ids));//销量加1
        db("goods")->where("id",$order['goods_id'])->setDec("goods_num",count($ids));//加1
        db("order")->where('goods_order',$out_trade_no)->update(["order_content"=>implode("",$order_content)]);//改变订单内容
        db("order")->where('goods_order',$out_trade_no)->update(["statelist"=>"已付款"]);//改变订单状态
    }
    public function notify()
    {
        header('Content-type:text/html; Charset=utf-8');
        $alipayPublicKey=config('site.alipay_public_key');
        $aliPay = new AlipayNotify($alipayPublicKey);
        $result = $aliPay->rsaCheck($_POST,$_POST['sign_type']);
        if($result===true && $_POST['trade_status'] == 'TRADE_SUCCESS'){
            $this->faka(input('out_trade_no'));
            echo 'success';
            exit();
        }
        echo 'error';
        exit();
    }

    public function state($out_trade_no){
        return db('order')->where('goods_order',$out_trade_no)->value('statelist');
    }
    public function jump($out_trade_no){
        $this->success('支付成功',url('/back',['out_trade_no'=>$out_trade_no]));
    }

    public function back($out_trade_no){
        $order=db("order")->where("goods_order",$out_trade_no)->find();
        if(!$order){
        	$this->error("订单不存在");
        }
        if ($order['statelist']==='已付款') {
            $order['order_content']=explode("\n", $order['order_content']);
            $this->assign("list",$order);
            return $this->view->fetch();
        }else{
            $res=$this->query($out_trade_no);
            if ($res==='交易支付成功') {
                $this->faka($out_trade_no);
                $order['order_content']=explode("\n", $order['order_content']);
                $this->assign("list",$order);
                return $this->view->fetch();
            }else{
                $order['order_content']=explode("\n", $order['order_content']);
                $this->assign("list",$order);
                return $this->view->fetch();
            }
        }
    }
    public function down(){
        $out_trade_no=input('out_trade_no');
        $content=db("order")->where("goods_order",$out_trade_no)->value('order_content');
        $path=ROOT_PATH."public/order/".$out_trade_no.".txt";
        if (!file_exists($path)) {
          $file=fopen($path,"w+");
          fwrite($file,$content);
          fclose($file);
        }
        $down=@file($path);
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-Disposition:attachment;filename=".$out_trade_no.".txt");
        header("Expires: 0");
        header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
        header("Pragma:public");
        echo implode("",$down);
    }
    public function query($order)
    {
        header('Content-type:text/html; Charset=utf-8');
        /*** 请填写以下配置信息 ***/
        $appid = config('site.alipay_appid');  //https://open.alipay.com 账户中心->密钥管理->开放平台密钥，填写对应应用的APPID
        $outTradeNo =  $order;     //要查询的商户订单号。注：商户订单号与支付宝交易号不能同时为空
        $tradeNo ='';     //要查询的支付宝交易号。注：商户订单号与支付宝交易号不能同时为空
        $signType = 'RSA2';       //签名算法类型，使用RSA2
        //商户私钥，填写对应签名算法类型的私钥，如何生成密钥参考：https://docs.open.alipay.com/291/105971和https://docs.open.alipay.com/200/105310
        $rsaPrivateKey=config('site.alipay_app_private_key');
        /*** 配置结束 ***/
        $aliPay = new AlipayQuery();
        $aliPay->setAppid($appid);
        $aliPay->setRsaPrivateKey($rsaPrivateKey);
        $aliPay->setOutTradeNo($outTradeNo);
        $aliPay->setTradeNo($tradeNo);
        $result = $aliPay->doQuery();
        if($result['alipay_trade_query_response']['code']!='10000'){
            return $result['alipay_trade_query_response']['msg'].'：'.$result['alipay_trade_query_response']['sub_code'].' '.$result['alipay_trade_query_response']['sub_msg'];
        }else{
            switch($result['alipay_trade_query_response']['trade_status']){
                case 'WAIT_BUYER_PAY':
                    return '交易创建，等待买家付款';
                    break;
                case 'TRADE_CLOSED':
                    return '未付款交易超时关闭，或支付完成后全额退款';
                    break;
                case 'TRADE_SUCCESS':
                    return '交易支付成功';
                    break;
                case 'TRADE_FINISHED':
                    return '交易结束，不可退款';
                    break;
                default:
                    return '未知状态';
                    break;
            }
        }

    }

    public function t(){
        function scerweima($url=''){
          import('phpqrcode.phpqrcode',VENDOR_PATH,'.php');
          $value = $url;         //二维码内容
          $errorCorrectionLevel = 'L';  //容错级别
          $matrixPointSize = 5;      //生成图片大小
          //生成二维码图片
          $name=date("YmdHis",time()).'.png';
          $filename = ROOT_PATH."public/".$name;
          \QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
          // $QR = $filename;        //已经生成的原始二维码图片文件
          // $QR = imagecreatefromstring(file_get_contents($QR));
          //输出图片
          // imagepng($QR, 'qrcode.png');
          // imagedestroy($QR);
          return '<img src="/'.$name.'" alt="使用微信扫描支付">';
        }
        $a=scerweima("https://www.jb51.net/article/136418.htm");
        print_r($a);
     
    }
}
