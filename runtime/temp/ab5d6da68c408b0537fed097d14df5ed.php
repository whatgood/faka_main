<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"F:\web\main.com\public/../application/index\view\index\shouhou.html";i:1612038508;s:55:"F:\web\main.com\application\index\view\layout\head.html";i:1611974398;s:57:"F:\web\main.com\application\index\view\layout\header.html";i:1615736035;}*/ ?>
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
        <div class="good-trade" style="padding:20px 20px 80px 20px">
            <ol class="am-breadcrumb">
                <li>
                    <a href="/">首页</a>
                </li>
                <li>
                    <a href="/index/index/articlelist">文章列表</a>
                </li>
                <li class="am-active">售后说明</li>
            </ol>
            <div style="text-align:center;font-size:20px">售后说明</div>
            <div style="text-align:center;color:#999999">2019-05-15 02:34:45</div>
            <hr>
            <?php echo $site['service']; ?>
        </div>
        <div class="tongji">
        </div>
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
</body>

</html>