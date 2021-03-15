<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"F:\web\main.com\public/../application/index\view\index\buy.html";i:1612671502;s:55:"F:\web\main.com\application\index\view\layout\head.html";i:1611974398;s:57:"F:\web\main.com\application\index\view\layout\header.html";i:1615736035;s:57:"F:\web\main.com\application\index\view\layout\footer.html";i:1612071342;}*/ ?>
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
    <div class="am-container-fluid" style="padding:2px">
        <form action="/pay" method="post" onsubmit="return checkform()" style="background-color:#fff;padding:4px">
            <div class="am-panel am-panel-default">
                <div class="am-panel-hd">确认订单信息</div>
                <div class="am-panel-bd">
                    <ul class="am-list am-list-static">
                        <input type="hidden" name="goods_id" value="<?php echo $list['id']; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $list['category_id']; ?>">
                        <li class="am-text-truncate">商品名称：<?php echo $list['name']; ?></li><input type="hidden" value="<?php echo $list['name']; ?>" name="name">
                        <li>商品单价：<?php echo $list['goods_price']; ?>元/件</li>
                        <input type="hidden" name="goods_price" value="<?php echo $list['goods_price']; ?>">
                        <li>购买数量：<?php echo $list['goods_count']; ?>件</li><input type="hidden" value="<?php echo $list['goods_count']; ?>" name="goods_num">
                        <input type="hidden" name="goods_num" value="<?php echo $list['goods_count']; ?>">
                        <!-- <li>优惠券码：<a style="color:#6c6c6c;display:inline;" href="#" id="youhuiquan" onclick="youhuiquan()">点此输入优惠券码</a></li> <input type="hidden" id="input-yhq" value="" name="input-yhq"> -->
                        <li>联系方式：<input style="padding: 0.5em;font-size: 1rem;line-height: 1.2;color: #333;" type="text" name="email" id="email" minlength="5" placeholder="请填写邮箱" required /></li>
                    </ul>
                    <span style="color:red">温馨提示：请填写邮箱,用这个邮箱可以查询到你的订单</span>
                </div>
            </div>
            <div class="am-form-group">
                <div style="margin-left: 6px">
                    <h3>选择支付方式</h3>
                </div>
                <div class="am-container-fluid">
                    <div class="am-g">
                        <div class="text-area-star">
                            <div class="am-u-sm-12 am-u-md-2 am-u-lg-2 am-u-end" style="padding:5px">
                                <label style="padding:5px"><svg class="icon" aria-hidden="true" style="width:100%;height:100%;">
                                        <use xlink:href="#icon-zhifubaozhifu"></use>
                                    </svg><input type="radio" name="type" value="alipay" /><span></span></label>
                            </div>
                            <div class="am-u-sm-12 am-u-md-2 am-u-lg-2 am-u-end" style="padding:5px;">
                                <div style="border:1px solid #ccc;height:50px;line-height: 50px;color:#ccc">微信支付维护</div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-2 am-u-lg-2 am-u-end" style="padding:5px;">
                                <div style="border:1px solid #ccc;height:50px;line-height: 50px;color:#ccc">QQ钱包维护</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div style=" text-align: right;">
                <button type="submit" class="am-btn am-btn-danger am-btn-xl" style="width: 100%">立即付款</button>
            </div>
        </form>
        <div style="margin-bottom: 360px"></div>
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
    function youhuiquan() {
        layer.prompt({ title: '请输入优惠券代码', formType: 3 }, function(youhuiquan, index) {
            $.ajax({
                type: "POST",
                url: "/index/getDiscounInfo.html",
                data: 'quanma=' + youhuiquan,
                success: function(data) {
                    if (data) {
                        $("#input-yhq").val(youhuiquan);
                        if (data.type == '金额券') {
                            $("#youhuiquan").html('满' + data.condition + '元优惠' + data.discount + '元');
                        } else {
                            lidu = data.discount * 10;
                            $("#youhuiquan").html('满' + data.condition + '元打' + lidu + '折优惠')
                        }
                    } else {
                        layer.msg('优惠券不存在或已被使用');
                    }
                }
            });
            //此处获取优惠券信息
            layer.close(index);
        });
    }

    function checkform() {
        var email = $("#email").val();
        console.log(email)
        var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
        if (!reg.test(email)) {
            layer.alert('邮件格式不正确', { icon: 2 });
            return false
        }
        if (!email) {
            layer.alert('请输入联系方式', { icon: 2 });
            return false;
        } else if (email.indexOf(" ") != -1) {
            layer.alert('邮件中不得含空格', { icon: 2 });
            return false;
        }
        if (email.length < 5) {
            layer.alert('联系方式长度至少5个字符', { icon: 2 });
            return false;
        }
        if (escape(email).indexOf("%u") >= 0) {
            layer.alert('联系方式不得含有中文', { icon: 2 });
            return false;
        }
        var count = $("#count").val();
        var kucun = $("#kucun").val();
        count = parseInt(count);
        kucun = parseInt(kucun);
        if (count > kucun) {
            layer.alert('购买数量大于库存量', { icon: 2 });
            return false;
        }
        if (!$("label").hasClass("red")) {
            layer.alert('请选择支付方式!', { icon: 2 });
            return false;
        }
    }
    $('.text-area-star label').click(function() {
        var labelLength = $('.text-area-star label').length;
        for (var i = 0; i < labelLength; i++) {
            if (this == $('.text-area-star label').get(i)) {
                $('.text-area-star label').eq(i).addClass('red');
            } else {
                $('.text-area-star label').eq(i).removeClass('red');
            }
        }
    });
    </script>
</body>

</html>