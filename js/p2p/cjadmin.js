/**
 * @author Small
 */
$(document).ready(function (){
    $("#table").datagrid({
    nowrap : true,
    striped : true,
    border : true,
    collapsible : false, //是否可折叠的
    fit : false, //自动大小
    loadMsg : '载入中...',
    pagination: true,   //分页控件
    rownumbers: true,   //行号
    showFooter: false,  //显示底部
    pageSize: 10,       //每页显示的记录条数，默认为10
    pageList: [5, 10, 15, 20, 25, 30 ], //可以设置每页记录条数的列表
    url:location.href,
    sortName: 'time',  //排序列名
    sortOrder: 'desc',  //排序规则
    toolbar : [{
            text : "添加抽奖",
            iconCls : "icon-add",
            handler : function() {
                alert('todo');
            }},'-',{
            text : "下载名单",
            iconCls : "icon-ok",
            handler : function() {
                down();
            }},{
            text : "删除抽奖",
            iconCls : "icon-remove",
            handler : function() {
                del();
            }}],
    columns : [[{
        field: 'title',
        title: '标题',
        align: 'center',
        sortable: true,
        formatter : function(value, row, index) {
            var tag='';
            if (value.length>10){
                tag=' title="'+value+'"';
                value=value.substr(0,10);
            }
            return '<span'+tag+'>'+value+'</span>';
        }},{
        field : 'total',
        title : '总份数',
        sortable: true,
        align : 'center'
        },{
        field : 'need',
        title : '仍需份数',
        sortable: true,
        align : 'center'
        },{
        field : 'price',
        title : '每份金额',
        sortable: true,
        align : 'center'
        },{
        field : 'time',
        title : '发布时间',
        sortable: true,
        align : 'center'
        },{
        field : 'end',
        title : '结束日期',
        sortable: true,
        align : 'center'
        },{
        field : 'status',
        title : '状态',
        sortable: true,
        align : 'center',
        formatter : function(value, row, index) {
            switch(parseInt(value)){
                case 1:return '筹集中';
                case 2:return '筹集成功';
                case 3:return '筹集失败';
                case 4:return '抽奖完成';
                default:return '未知';
            }
        }},{
        field: 'cid',
        title: '详细信息',
        align: 'center',
        formatter : function(value, row, index) {
            return '<a target="_blank" href="/zhong/main/cjdetail/'+value+'">查看详细</a>';
        }}
    ]]});
    var page = $("#table").datagrid('getPager');
    page.pagination({
        beforePageText: '第', //页数文本框前显示的汉字
        afterPageText: '页 共 <b>{pages}</b> 页',
        displayMsg: '当前显示 <b>{from}-{to}</b> 条记录 共 <b>{total}</b> 条记录'
    });
});

function down(){
    var id=getId();
    if (id!=false)
        window.open('/zhong/admin/buyer/'+id,'_blank');
}
function del(){
    var id=getId();
    if (id!=false)
        $.messager.confirm('提示：','删除后不可恢复，确认删除？',function(r){
            if (r) $.get('/zhong/admin/delcj/'+id,'',function(d){
                    if (d=='ok') {
                        $.messager.alert('消息：','删除成功！','info');
                        $('#table').datagrid('reload');
                    } else $.messager.alert('警告：',d,'warning');
                });
        });
}
function getId () {
    var row=$("#table").datagrid('getSelected');
    if (row==null){
        $.messager.alert('提示','请选择一条记录！','warning');
        return false;
    }else return row.id;
}