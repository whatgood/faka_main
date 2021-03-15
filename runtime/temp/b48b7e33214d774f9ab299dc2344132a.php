<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"F:\web\main.com\public/../application/accsmarket\view\index\index.html";i:1613702218;s:60:"F:\web\main.com\application\accsmarket\view\layout\head.html";i:1613702186;s:62:"F:\web\main.com\application\accsmarket\view\layout\header.html";i:1613702124;s:62:"F:\web\main.com\application\accsmarket\view\layout\footer.html";i:1613701648;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?php echo $site['title']; ?></title>
    <meta name="description" content="Buy Facebook accounts, Instagram accounts, Twitter accs and more! Bulk and aged social media accounts. High quality!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#2f464d">
    <meta name="theme-color" content="#ffffff">
    <meta name="yandex-verification" content="81c1ed26e0c30fe5" />
    <link href="/template/accsmarket/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/template/accsmarket/css/responsive.min.css">
    <link rel="stylesheet" href="/template/accsmarket/css/style.min.css">
    <link rel="stylesheet" href="/template/accsmarket/css/media.min.css">
    <script src="/template/accsmarket/js/en.min.js"></script>
    <script src="/template/accsmarket/js/jquery-3.1.0.min.js"></script>
    <script src="/template/accsmarket/js/jquery-ui.min.js"></script>
    <script src="/template/accsmarket/js/common.min.js"></script>
</head>
<body>
    <div class="main-wrapper">
        <header>
    <div class="hdr-top">
        <div class="container">
            <div class="flex">
                <p>
                    <?php echo $site['sitename']; ?> </p>
                <p class="xs-vis">
                    accounts store </p>
                <div id="navigation_right">
                    <div id="navigation_menu">
                        <!-- <a class="ic-updates" href="https://t.me/accsmarket" rel="nofollow">@accsmarket</a> -->
                    </div>
                    <div class="">
                        <!-- <a href="javascript:void(0);" class="registration-open">+ Sign Up</a> -->
                        <a href="javascript:void(0);" class="login-open">
                            <!-- <img src="" alt="user" > -->
                        </a>
                    </div>
                    <div id="language">
                        <!-- <span class="en">Eng</span> -->
                        <!-- <a href="/ru" class="ru">Рус</a> -->
                    </div>
                </div>
                <div id="head_mob_navigation">
                    <a href="#" class="open-menu"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr-middle">
        <div class="container">
            <div id="language_mobile">
                <span class="en">Eng</span>
                <a href="/ru" class="ru">Рус</a>
            </div>
            <div class="flex">
                <ul class="flexbox" id="head_menu">
                    <li>
                        <div id="nav_support">
                            <a href="">社交账号购买</a>
                        </div>
                    </li>
                    <li>
                        <a href="/" class="active">主页</a>
                    </li>
                    <li>
                        <a href="/articlelist">教程相关</a>
                    </li>
                    <li>
                        <a href="/en/faq">技术新闻</a>
                    </li>
                    <li>
                        <a class="ic-provider" href="/en/partnerfaq">联系方式</a>
                    </li>
                    <li id="important">
                        <a href="#" class="important_link">
                            售后说明 </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
        <!-- 头部信息 -->
        <section class="soc-category" id="content">
            <div class="container">
                <div class="flex">
                    <?php if(is_array($categorys) || $categorys instanceof \think\Collection || $categorys instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <div class="soc-bl">
                        <div id="soc_title_10" class="soc-title" data-help="Softreg are accounts that are automatically registered by a special program">
                            <h2 class="soc-name" data-id="10"><a href="/en/catalog/facebook/avtoregi"><?php echo $v['nickname']; ?></a></h2>
                            <p class="soc-qty">商品库存</p>
                            <p class="soc-cost-label"></p>
                            <p class="soc-cost">商品价格</p>
                            <p class="soc-control"></p>
                        </div>
                        <?php $_result=goods_list($v['id']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="socs">
                            <div class="soc-body">
                                <div class="soc-img">
                                    <img src="<?php echo !empty($vo['image'])?$vo['image']:$v['image']; ?>" alt=""> </div>
                                <div class="soc-text">
                                    <p>
                                        <a href="<?php echo url('/',['id'=>$vo['id']]); ?>" alt=''><?php echo $vo['name']; ?></a>
                                    </p>
                                </div>
                                <div class="soc-qty"><?php echo $vo['goods_num']; ?> 个.</div>
                                <div class="soc-cost-label">每个商品价格</div>
                                <div class="soc-cost"><?php echo $vo['goods_price']; ?>元</div>
                                <div class="soc-cell">
                                    <button type="button" class="basket-button" onclick="trade(<?php echo $vo['id']; ?>)">
                                        <img src="/template/accsmarket/picture/ic-basket.png" alt=""><span>购买</span>
                                    </button>
                                    <script type="text/javascript">
                                        function trade(id){
                                          location.href='/trade/id/'+id
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </section>
                <footer>
           <!--  <div class="ftr-top">
                <div class="container">
                    <div class="flex">
                        <div class="col-33">
                            <a href="/" class="ftr-logo">
                                <img src="/template/accsmarket/picture/logo.png" alt="">
                                <span>market.com</span>
                            </a>
                        </div>
                        <div class="col-33">
                            <li>
                                <a href="/" class="footer_menu' active' ">
                                    Shop </a>
                            </li>
                            <li>
                                <a href="/en/info" class="footer_menu">
                                    Useful information </a>
                            </li>
                            <li>
                                <a href="/en/rules" class="footer_menu">
                                    Rules </a>
                            </li>
                        </div>
                        <div class="col-33 ftr-last-col">
                            <ul>
                                <li class="gold-sp"><a id="footer_provider" href="/en/partnerfaq">Partners</a></li>
                                <li class="green-sp"><a class="ic-updates" href="https://t.me/accsmarket" rel="nofollow">@accsmarket</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
          <!--   <div class="ftr-center">
                <div class="container">
                    <div class="flex">
                        <div class="tex-res">
                            <img src="/template/accsmarket/picture/about.png" alt="">
                            <p>Support:</p>
                        </div>
                        <div class="create-ticket" id="support_ticket">
                            <a href="/en/tickets/new">New ticket / Ask a question </a>
                        </div>
                        <div id="sitemap">
                            <div>
                                <a href="/en/sitemap">Sitemap</a>
                                <a href="/en/privacy_policy_eu_citizens">Inforamtion for ЕU citizens</a>
                            </div>
                            <div>
                                <a href="/en/public-offer">Public offer</a>
                                <a href="/en/privacy-policy">Privacy policy</a>
                            </div>
                        </div>
                        <div class="soc_icon_block">
                            <a href="https://t.me/accsmarket" target="_blanc">
                                <img src="/template/accsmarket/picture/telegram.svg" alt="Telegram">
                            </a>
                            <a href="mailto:support@accsmarket.com" target="_blanc">
                                <img src="/template/accsmarket/picture/email-at.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div id="copyright" style="margin-top: 200px">
                <div class="container">
                    <div class="flex">
                        <div class="wrap">
                            <div class="l"> <?php echo $site['copyright']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>