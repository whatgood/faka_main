define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'gupload/index' + location.search,
                    add_url: 'gupload/add',
                    edit_url: 'gupload/edit',
                    del_url: 'gupload/del',
                    multi_url: 'gupload/multi',
                    table: 'gupload',
                }
            });

            var table = $("#table");

            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "请输入商品名称";};
            // 初始化表格
            table.bootstrapTable({
                // commonSearch: false,
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
                        {field: 'id', title: __('Id')},
                        {field: 'goods.name', title: __('Goods.name')},
                        {field: 'sfile', title: __('Sfile')},
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