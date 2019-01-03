@extends('admin.global')

@section('content')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">话题管理</h1>
</div>
<div class="wrapper-md">
  
  <div class="panel panel-default">
    <div class="panel-heading">话题列表</div>
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
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
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
            <th>标题</th>
            <th>类型</th>
            <th>热度</th>
            <th>赞</th>
            <th>踩</th>
            <th>评论数</th>
            <th>通过时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          
          
           @foreach ($topics as $topic)

                      <tr>
                      <td>{{$topic->id}}</td>
                      <td>{{$topic->title}}</td>
                      <td>{{$topic->type}}</td>
                      <td>{{$topic->rate}}</td>
                      <td>{{$topic->upvotes}}</td>
                      <td>{{$topic->downvotes}}</td>
                      <td>{{$topic->comments_number}}</td>
                      <td>{{$topic->approved_at}}</td>
                      <td>
                        <button type="button" class="btn btn-success btn-xs"><a target="_blank" href="{{route('topic.show',$topic->id)}}">查看</a></button>
                        <button type="button" class="btn btn-info btn-xs"><a href="{{route('topic.edit',$topic->id)}}">编辑</a></button>
                        <button type="button" class="btn btn-danger btn-xs"><a href="{{route('topic.delete',$topic->id)}}">删除</a></button>
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
          <small class="text-muted inline m-t-sm m-b-sm">showing {{$topics->firstItem()}}-{{$topics->lastItem()}} of {{$topics->total()}} items</small>
        </div>
        <div class="col-sm-5 text-right text-center-xs">                
           {{ $topics->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection