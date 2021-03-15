<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Request;
return [
    'home/[:id]'=>'index/index',
    "trade/[:id]"=>"index/trade",
    "buy"=>"index/buy",
    "check"=>"index/check",
    "pay"=>"index/pay",
    "notify"=>"index/notify",
    "state"=>"index/state",
    "back"=>"index/back",
    "down"=>"index/down",
    "query"=>"index/query",
    'search_pre'=>'index/searchPre',
    "search"=>"index/search",
    "shouhou"=>"index/shouhou",
    "content"=>"index/content",
    "articlelist"=>"index/articlelist",
];
