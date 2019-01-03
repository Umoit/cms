@extends('admin.global')

@section('content')
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>采集管理</legend>
</fieldset>

<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn layui-btn-danger radius btn-delect" id="btn-delete-all">批量删除</a>
        <a href="{{route('collector.create')}}" class="layui-btn btn-add btn-default" id="btn-add">添加</a>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
    <span class="fr">
        <span class="layui-form-label">搜索条件：</span>
        <div class="layui-input-inline">
            <input type="text" autocomplete="off" placeholder="请输入搜索条件" class="layui-input">
        </div>
        <button class="layui-btn mgl-20">查询</button>
    </span>
</div>

<!-- 表格 -->
<div id="dateTable" lay-filter="dateTable"></div>
@endsection

@section('after-body')
<!-- 表格操作按钮集 -->
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
</script>
<script>
layui.use(['table','jquery'], function(){
  var table = layui.table,
   $ = layui.jquery;

  
  //第一个实例
  table.render({
    elem: '#dateTable'
   
    ,url: 'json/collector/' //数据接口
    ,page: true //开启分页
    ,limit:15
    ,limits:[25,50,100]
    ,cols: [[ //表头
      {field: 'id', title: 'ID',  sort: true, fixed: 'left',width:60}
      ,{field: 'title', title: '标题' }
      ,{field: 'type', title: '类型', sort: true,width:80}
      ,{field: 'rate', title: '热度', sort: true,width:80} 
      ,{field: 'upvotes', title: '赞', sort: true,width:80}
      ,{field: 'downvotes', title: '踩', sort: true,width:80}
      ,{field: 'comments_number', title: '评论数',  sort: true,width:80}
      ,{field: 'approved_at', title: '发布时间',  sort: true}
      ,{title:'操作',toolbar: '#barOption'}
    
    ]]
  });

  //监听工具条
  table.on('tool(dateTable)', function(obj){
    var data = obj.data;
    if(obj.event === 'detail'){

      layer.msg('ID：'+ data.id + ' 的查看操作');
        layer.open({
          type: 2,
          title: "查看话题",
          shadeClose: true,
          shade: false,
          maxmin: true, //开启最大化最小化按钮
          area: ['893px', '600px'],
          content: './topic/'+data.id
        });

    } else if(obj.event === 'del'){
      layer.confirm('真的删除行么', { title: "删除确认" }, function(index){

         $.ajax({//异步请求返回给后台
            url:'./topic/'+data.id+'/delete',
            type:'get',
            data:{},
            dataType:'json',
            success:function(data){
              layer.msg(data.data, {icon: 1});
            }
          });
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      layer.alert('编辑行：<br>'+ JSON.stringify(data))
    }
  });


    // 刷新
    $('#btn-refresh').on('click', function () {
        tableIns.reload();
    });

  // layer.open({
  //       type: 2,
  //       title: '很多时候，我们想最大化看，比如像这个页面。',
  //       shadeClose: true,
  //       shade: false,
  //       maxmin: true, //开启最大化最小化按钮
  //       area: ['893px', '600px'],
  //       content: '//baidu.com/'
  //     });
  
});
</script>

@endsection