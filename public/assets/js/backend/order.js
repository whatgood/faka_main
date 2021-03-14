define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/index' + location.search,
                    add_url: 'order/add',
                    edit_url: 'order/edit',
                    del_url: 'order/del',
                    multi_url: 'order/multi',
                    table: 'order',
                }
            });

            var table = $("#table");

            // 初始化表格
            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "请输入订单编号";};
            table.bootstrapTable({
                showColumns: false,
                showExport: false,
                showToggle: false,
                pageSize: '19',
                pageList: [10, 25, 50, 'All'],
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id'), operate: false},
                        {field: 'goods_order', title: __('Goods_order')},
                        // {field: 'goods_id', title: __('Goods_id')},
                        // {field: 'goods_type', title: __('Goods_type')},
                        {field: 'goods_name', title: __('Goods_name')},
                        {field: 'goods_price', title: __('Goods_price'), operate:'BETWEEN'},
                        {field: 'goods_num', title: __('Goods_num')},
                        {field: 'goods_sum', title: __('Goods_sum'), operate:'BETWEEN'},
                  
                        // {field: 'pay_type', title: __('Pay_type')},
                  
            
                        {field: 'email', title: __('Email')},
                        {field: 'ip', title: __('Ip')},
                        {field: 'location', title: __('Location')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'statelist', title: __('Statelist'), searchList: {"未付款":__('未付款'),"已付款":__('已付款')}, formatter: Table.api.formatter.normal},
                        {
                            field: 'buttons',
                            width: "120px",
                            title: __('商品内容'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'email',
                                    text: __('商品内容'),
                                    title: __('Goods_order'),
                                    classname: 'btn btn-xs btn-primary btn-dialog',
                                    icon: 'fa fa-list',
                                    url: '/content/out_trade_no/{goods_order}',
                                    // callback: function (data) {
                                    //     Layer.alert("接收到回传数据：" + JSON.stringify(data), {title: "回传数据"});
                                    // },
                                    visible: function (row) {
                                        //返回true时按钮显示,返回false隐藏
                                        return true;
                                    }
                                },
                            ],
                            formatter: Table.api.formatter.buttons
                        },
                       
                        // {field: 'goods.name', title: __('Goods.name')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});