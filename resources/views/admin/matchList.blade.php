@extends('admin.global')

@section('content')

<div class="bg-light lter b-b wrapper-md">
    
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3">赛事管理</h1>
        </div>
           <div class="col-sm-6 text-right hidden-xs">
          <a class="btn btn-success" href="{{route('match.create')}}">添加赛事</a>
          <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">批量添加赛事</button>
        <button type="button" class="btn  btn-info  "><a target="_blank" href="">导出赛事</a></button>

      </div>
      </div>
    



</div>
<div class="wrapper-md">
  
  <div class="panel panel-default">
    <div class="panel-heading">赛事列表</div>
    <div class="row wrapper">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>   
        

      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="搜索">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">查询</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>赛事名称</th>
            <th>主办方</th>
         
            <th>游戏类型</th>
            <th>时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          
          
           @foreach ($matches as $match)

                      <tr>
                      <td>{{$match->id}}</td>
                      <td>{{$match->title}}</td>
                      <td>{{$match->host}}</td>
                      <td>{{$match->game_id}}</td>
                      <td>{{$match->duration}}</td>
                      <td>
                        @if($match->status==0)未开始
                        @elseif($match->status==1)进行中
                        @elseif($match->status==2)结速
                        @endif
                       </td>
                      <td>
                        <a target="_blank" href="{{route('match.show',$match->id)}}">
                          <button type="button" class="btn btn-success btn-xs">查看</button>
                        </a>
                        <a href="{{route('match.edit',$match->id)}}">
                        <button type="button" class="btn btn-info btn-xs">编辑</button>
                        </a>

                        <a onclick="showDeleteModal(this)"  data="{{route('match.delete',$match->id)}}"><button type="button" class="btn btn-danger btn-xs">删除</button></a>
                      </td>
                    </tr>
                    @endforeach
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                  
        </div>
        <div class="col-sm-3 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing {{$matches->firstItem()}}-{{$matches->lastItem()}} of {{$matches->total()}} items</small>
        </div>
        <div class="col-sm-5 text-right text-center-xs">                
           {{ $matches->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>



<!-- delete Modal -->
    <div class="modal fade" id="delcfmOverhaul">
      <div class="modal-dialog">
          <div class="modal-content message_align">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title">提示</h4>
              </div>
              <div class="modal-body">
                  <!-- 隐藏需要删除的id -->
                  <input type="hidden" id="deleteHaulId" />
                  <p>您确认要删除该条信息吗？</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default"
                      data-dismiss="modal">取消</button>
                  <a type="button" class="btn btn-primary" id="deleteHaulBtn" href="">确认</a>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>






<!--exl Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">批量导入文章</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="bulkCreatematch" class="form-horizontal" method="post" action="">
          

        
        <div class="form-group">
                  <label name="img" class="col-sm-2 control-label">Excel文件</label>
                  <div class="col-sm-10">
                    <input type="file"  class="file" id="img_url" name="import_file"  accept="/*" multiple>
  
                  </div>
               
                </div>

           
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary submit" >提交</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('after-body')


  <script>

  // 打开询问是否删除的模态框并设置需要删除的大修的ID
    function showDeleteModal(obj) {
        var $tds = $(obj).parent().parent().children();// 获取到所有列
        var delete_id = $($tds[0]).children("input").val();// 获取隐藏的ID
        var ss = $(obj).attr('data');
 
        $("#deleteHaulBtn").attr('href',ss); 
        $("#delcfmOverhaul").modal({
            backdrop : 'static',
            keyboard : false
        });
    }

    
    $('.modal-footer .submit').click(function(){
      $("#bulkCreatematch").submit();
    })



  </script>
@endsection 