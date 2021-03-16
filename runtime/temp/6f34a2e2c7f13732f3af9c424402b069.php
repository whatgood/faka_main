<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"F:\web\main.com\public/../application/index\view\index\index.html";i:1615805496;s:55:"F:\web\main.com\application\index\view\layout\head.html";i:1611974398;s:57:"F:\web\main.com\application\index\view\layout\header.html";i:1615736035;s:57:"F:\web\main.com\application\index\view\layout\footer.html";i:1612071342;}*/ ?>
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
<div class="am-container-fluid">
    <div class="am-g">
        <div class="am-u-lg-12">
            <div class="am-u-lg-9">
                <div class="am-panel am-show-landscape" style="margin:5px 0 5px 0;border-radius: 0px">
                    <table class="am-table am-table-bordered am-table-radius am-table-hover " style="background-color:#fff;font-size:15px;border:#ccc solid 1px">
                        <thead>
                            <tr class="thhead">
                                <th style="text-align: left;"><b>商品标题</b></th>
                                <th style="text-align: center;width: 10%"><b>单价</b></th>
                                <th style="text-align: center;width: 10%"><b>销量</b></th>
                                <th style="text-align: center;width: 10%"><b>库存</b></th>
                                <th style="text-align:center"><b>操作</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <th colspan="4" class="liebiaocatname" style="text-align:center;font-size: 16px;background-color: #fff"><b><?php echo $category['name']; ?>--购买请看<a href="/shouhou" style="color: red">售后说明</a>！</b></th>
                            </tr>
                                <?php if(is_array($category->goods) || $category->goods instanceof \think\Collection || $category->goods instanceof \think\Paginator): $i = 0; $__LIST__ = $category->goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
                                <tr style="text-align: left">
                                    <td><img src="<?php echo $goods['image']; ?>" width="35px" height="35px" style="margin-right: 10px"><b><?php echo $goods['name']; ?></b>&nbsp;<span class="am-badge am-round">自动发货</span></td>
                                    <td style="text-align: center"><span style="font-size:13px;color:red;">¥<?php echo $goods['goods_price']; ?></span></td>
                                    <td style="text-align: center"><span ><?php echo $goods['goods_sold']; ?>件</span></td>
                                    <td style="text-align: center">
                                        <?php echo $goods['goods_num']==0?'<span style="color: #ccc">缺货</span>':$goods['goods_num']."件"; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <a href="/trade/<?php echo $goods['id']; ?>" class="am-btn am-btn-danger am-btn-sm">
                                            <span class="am-icon-shopping-cart"></span> 购买</a>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <th colspan="4" class="liebiaocatname" style="text-align:center;font-size: 16px;"><b>不同意售后说明的请勿购买</b></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="am-u-lg-3  am-show-landscape">
                <div class="am-panel-bd liebiaocatname">
                    <?php echo $site['announcement']; ?>
                </div>
            </div>
        </div>
        <!-- 手机样式------------------------------------------------------------------------------------------------ -->
        <div class="am-show-portrait">
            <ul class="am-avg-sm-4 am-avg-md-4 am-avg-lg-4 am-thumbnails" style="text-align:center;margin-top: 10px;">
                <li><a href="javascript:searchbtn();"><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-xingzhuanggongnengtubiao-"></use>
                        </svg><br>订单查询</a></li>
                <li><a href="tencent://message/?uin=472751848&Site=&Menu=yes" target="_blank"><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-icon_kefu"></use>
                        </svg><br>在线QQ</a></li>
                <li><a href="/index/index/ArticleList"><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-bangzhuyufankui"></use>
                        </svg><br>教程文章</a></li>
                <li><a href="/shouhou"><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-jihuachulizhong"></use>
                        </svg><br>售后说明</a></li>
            </ul>
        </div>
        <div class="am-panel am-show-portrait" style="margin:5px 0 5px 0;border-radius: 0px">
            <div class="am-panel-bd liebiaocatname">
                <?php echo $site['announcement']; ?>
            </div>
        </div>
        <div class="am-show-portrait">
            <div class="am-container">
                <div class="am-g">
                    <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="padding:1px">
                        <div class="wapcatname" style="padding: 1px;text-align: center;"><?php echo $category['name']; ?>--购买请看<a href="/shouhou">售后说明</a>！</div>
                    </div>
                    <?php if(is_array($category->goods) || $category->goods instanceof \think\Collection || $category->goods instanceof \think\Paginator): $i = 0; $__LIST__ = $category->goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="border-bottom: #ccc 1px dashed">
                        <div style="background-color: #fff;height: 65px">
                            <div style="padding:0px">
                                <a href="<?php echo url('/trade',['id'=>$goods['id']]); ?>" style="color: #3c3c3c;">
                                    <img class="am-radius" alt="<?php echo $goods['image']; ?>" src="<?php echo $goods['image']; ?>" width="60" height="60" style="float: left" />
                                    <div class="index-goodname-xq" style="height:38px;color:#333;">
                                        <p title="<?php echo $goods['name']; ?>" style="margin-left:5px;font-size: 10px"><?php echo $goods['name']; ?></p>
                                    </div>
                                    <div class="am-text-truncate" style="margin-left: 15px;">
                                        <div style="">
                                            <span class="am-badge am-badge-primary" style="margin-left: 5px">库存(<?php echo $goods['goods_num']==0?'<span style="color: #ccc">缺货</span>':$goods['goods_num']."件"; ?>)</span>
                                            <span class="am-badge am-badge-danger">销量(<?php echo $goods['goods_sold']; ?>)</span>
                                            <span style="color: #ff0000">
                                                <b>¥<?php echo $goods['goods_price']; ?></b>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <br>
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
</html>