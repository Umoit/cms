@extends('admin.global')

@section('before-body')
    <link href="{{asset('admin/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/file-upload/themes/explorer-fa/theme.min.css') }}" rel="stylesheet" type="text/css" />
  
@endsection

@section('content')


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">文章管理</h1>
</div>
<div class="wrapper-md">




<div id="topicTabContent" class="tab-content">
   	<div class="panel panel-default">
        
        <div class="panel-heading ">文章标签</div>
        <div class="panel-body">
          <form class="form-horizontal"  action="{{route('tag.update',$tag->id)}}" method="post" role="form">

            <div class="form-group">
                <label class="col-sm-3 control-label">名称</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$tag->name}}" class="form-control" placeholder="目录名称">
                    <p class="help-block">这将是它在站点上显示的名字。</p>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary ">更新</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="{{Request::is('*create')?'POST': 'PUT' }}">


        </form>
        </div>
      

    </div>
     

   
</div>


@endsection

@section('after-body')
<script src="{{asset('admin/file-upload/js/fileinput.js') }}" ></script>
  <script src="{{asset('admin/file-upload/js/locales/zh.js') }}" ></script>
  <script src="{{asset('admin/file-upload/themes/explorer-fa/theme.js') }}" ></script>


@endsection

