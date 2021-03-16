<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"F:\web\main.com\public/../application/index\view\index\trade.html";i:1615814432;s:55:"F:\web\main.com\application\index\view\layout\head.html";i:1611974398;s:57:"F:\web\main.com\application\index\view\layout\header.html";i:1615736035;s:57:"F:\web\main.com\application\index\view\layout\footer.html";i:1612071342;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $site['title']; ?></title>
    <meta name="keywords" content="<?php echo $site['keywords']; ?>">
    <meta name="description" content=" <?php echo $site['description']; ?>" />
    <link href="<?php echo $site['favicon']; ?>" rel="shortcut icon">
    <link rel="stylesheet" href="/static/css/amazeui.css">
    <link rel="stylesheet" href="/static/css/main.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/layui.js"></script>
    <script src="/static/js/amazeui.min.js"></script>
    <script type="text/javascript" src="/static/js/font_486278_cz1h5tt67nt.js"></script>
    <style type="text/css">
    ::-webkit-scrollbar-track-piece {
        background-color: #f8f8f8;
    }

    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #00A2CA;
        background-clip: padding-box;
        min-height: 20px;
    }

    ::-webkit-scrollbar-thumb:hove {
        background-color: #black;
    }
    </style>
</head>
<body>
   <header class="am-topbar am-topbar-inverse am-topbar-fixed-top " id="header">
    <div class="am-container-fluid" id="header2" style="margin-left: 5px">
        <h1 class="am-topbar-brand  am-show-sm-only" style="margin:0 0px 0 0;">
            <a href="/" style="background-size: 130px 40px;"><span class="am-icon-home am-icon-sm"></span></a>
        </h1>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse-2'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
        <div class="am-collapse am-topbar-collapse " id="doc-topbar-collapse-2">
            <ul class="am-nav am-nav-pills am-topbar-nav  am-show-landscape">
                <li> <a href="/home"><span class="am-icon-home am-icon-sm"></span>首页</a></li>
                <li><a href="/shouhou"><i class="am-icon-wikipedia-w am-icon-fw"></i> 售后说明</a></li>
                <li><a href="/articlelist"><span class="am-icon-file-text"></span> 教程文章</a></li>
                <li><a href="/articlelist/category/31.html"><span class="am-icon-database"></span> 服务器推荐</a></li>
                <li><a href="tencent://message/?uin=472751848&Site=&Menu=yes" target="_blank"><span class="am-icon-weixin"></span> 在线QQ</a>
                </li>
                <li><a href="javascript: void(0)" onclick="searchbtn()"><span class="am-icon-search"></span>订单查询</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle  am-icon-navicon am-icon-sm" data-am-dropdown-toggle href="javascript:;">
                        所有分类<span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content am-topbar-inverse">
                        <?php $_result=all_category();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                        <li><a href="/home/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            </ul>
            <ul class="am-nav am-nav-pills am-topbar-nav  am-show-portrait">
                <?php $_result=all_category();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                    <li><a href="/home/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</header>



</div>
<script>
layui.use(['form', 'layer'], function() {
    var form = layui.form;
    layer = layui.layer;
    form.render();
});


function searchbtn() {
    $('#my-prompt').modal({
        relatedTarget: this,
        onConfirm: function(e) {
            var number = /^\d{10,16}$/;
            var email = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
            var is_number = number.test(e.data);
            var is_email = email.test(e.data);
            if (is_number) {
                window.location.href = '/search/order/' + e.data;
            } else if (is_email) {
                window.location.href = '/search/email/' + e.data;
            } else {
                alert("格式不正确")
                return false
            }
        },
    });
}
</script>
    <div class="am-container-fluid" style="padding:10px">
        <div style="margin-top: 30px;"></div>
        <div class="good-trade">
            <form action="/buy" method="POST">
                <div class="am-container-fluid" style="">
                    <div class="am-g ">
                        <div class="am-u-sm-12 am-u-md-5 am-u-lg-2 trade-goodimg am-u-end" style="padding: 0px;text-align: center">
                            <img src="<?php echo $goods['image']; ?>" alt="">
                        </div>
                        <div class="am-u-sm-12 am-u-md-7 am-u-lg-3  am-u-end" style="">
                            <!-- 网格开始 -->
                            <input type="hidden" value="<?php echo $goods['id']; ?>" name="goods_id">
                            <h2 style="margin-top: 0px;color: #333;font-family: 微软雅黑;" class="am-text-truncate"><?php echo $goods['name']; ?></h2>
                            <p class="trade-goodinfo" style="background-color:#f5f3ef;margin-top: 20px">
                                <span style="color:#6c6c6c">促销：</span>
                                <span class="trade-price" id="goods_price"><input type="hidden" name="price" value="<?php echo $goods['goods_price']; ?>">¥<?php echo $goods['goods_price']; ?></span>
                                <span style="float:right">
                                    <span style="color: #6C6C6C;">累积销量：</span>
                                    <span style="color:#6c6c6c;font-size:18px;"><?php echo $goods['goods_sold']; ?></span>
                                </span><br>
                                <span style="color:#6C6C6C" id="kucun0">库存：<?php echo $goods['goods_num']; ?>件</span>
                                <!--  <a id="lookpf" style="margin-left:5px;font-size:10px" href="javascript:;" onclick="lookpf()">查看批发价</a> -->
                                <br><span style="color:#6c6c6c;">服务：自动发货 无忧售后</span>
                            </p>
                            <span style="color:#6c6c6c;margin-left:10px">数量：
                                <input type="button" value="+" style="margin-right:-6px;" class="trade-input-count-button" onclick="countoper('jia')">
                                <input type="text" class="trade-input-count" value="1" id="count" name="count">
                                <input type="button" value="-" style="margin-left:-6px;" class="trade-input-count-button" onclick="countoper('jian')">
                            </span>
                            <br>
                            <input type="hidden" value="353" id="kucun">
                            <input type="hidden" id="maxsl" value="0">
                            <button type="submit" class="am-btn am-btn-danger am-btn-xl am-square" id="paysubmit" style="margin-top:20px"><span class="am-icon-shopping-cart"></span>立即购买</button>
                            <!-- 网格结束 -->
                        </div>
                    </div>
                </div>
            </form>
            <div class="am-panel am-panel-default" style="border-radius:0px;margin-top: 10px">
                <div class="am-panel-hd">商品描述</div>
                <div class="am-panel-bd">
                    <p background-color:#ffffff;"="" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 15px; line-height: 30px; color: rgb(51, 51, 51); font-family: " segoe="" ui",="" "lucida="" grande" ,="" helvetica,="" arial,="" "microsoft="" yahei" ,="" "droid="" sans" ,="" "source="" han="" " hiragino="" sans="" gb",="" gb="" w3",="" fontawesome,="" sans-serif;="" white-space:="" normal;="" background-color:="" rgb(255,="" 255,="" 255);"=""><span style="color:#E53333;font-size:32px;"><strong><?php echo $goods["goods_content"]; ?></strong></span>
                    </p>
                </div>
            </div>
            <div class="am-panel am-panel-default" style="border-radius:0px;margin-top: 10px">
                <div class="am-panel-hd">购买提示</div>
                <div class="am-panel-bd">
                    <p background-color:#ffffff;"= style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 15px; line-height: 30px; color: rgb(51, 51, 51); font-family: " segoe="" ui",="" "lucida="" grande" ,="" helvetica,="" arial,="" "microsoft="" yahei" ,="" "droid="" sans" ,="" "source="" han="" " hiragino="" sans="" gb",="" gb="" w3",="" fontawesome,="" sans-serif;="" white-space:="" normal;="" background-color:="" rgb(255,="" 255,="" 255);"=""><span style="color:#E53333;font-size:32px;"><strong><?php echo $site['tip']; ?></strong></span>

                    </p>
                </div>
            </div>
        </div>
       <div class="tongji" >
    <br><?php echo $site['copyright']; ?>
</div>
<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            订单查询
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            请输入订单号/联系方式
            <input type="text" class="am-modal-prompt-input">
        </div>
        <div class="am-modal-footer">
            <button type="button" class="am-btn am-modal-btn am-btn-default am-btn-hollow" data-am-modal-cancel>取消</button>
            <button type="button" class="am-btn am-modal-btn am-btn-primary" data-am-modal-confirm>查询</button>
        </div>
    </div>
</div>
    </div>
    <script>
    $(function(){
        if (<?php echo $goods['goods_num']; ?>== 0){
            $("#paysubmit").attr("class", 'am-btn am-btn-danger am-btn-xl am-disabled');
            $("#paysubmit").attr("disabled", true);
            $("#paysubmit").html("库存不足");
       }
   });

    function countoper(oper){
      count = $("#count").val();
      if (oper == 'jia'){
            count = parseInt(count) + 1;
      }else{
            count = parseInt(count) - 1;
      }
      if (parseInt(count) < 1){
            count = 1;
      }
      if (parseInt(count) >=<?php echo $goods['goods_num']; ?>){
            count =<?php echo $goods['goods_num']; ?>;
      }
        $("#count").val(count);
    }
    </script>
</body>

</html>