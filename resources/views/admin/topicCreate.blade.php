@extends('admin.global')

@section('before-body')
    <link href="{{asset('admin/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/file-upload/themes/explorer-fa/theme.min.css') }}" rel="stylesheet" type="text/css" />
  
@endsection

@section('content')


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">话题管理</h1>
</div>
<div class="wrapper-md">



<ul id="topicTab" class="nav nav-tabs">
   <li><a href="#word" data-toggle="tab">图文</a>	</li>
   <li><a href="#url" data-toggle="tab">网址</a></li>
</ul>
<div id="topicTabContent" class="tab-content">
   <div class="tab-pane " id="word">
   	<div class="panel panel-default">

   		<div class="panel-heading font-bold" >文字内容</div>
   		<div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{Request::is('*create')?route('topic.store'):route('topic.update',$topic->id)}}" role="form" data-toggle="validator">

            <div class="form-group">
	          <label class="col-sm-2 control-label" >标题</label>
	          <div class="col-sm-10">
	            <input type="text" name="title" value="{{isset($topic->title)?$topic->title:''}}" class="form-control">
	          </div>
	        </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>

	        <div class="form-group">
                  <label name="img" class="col-sm-2 control-label">缩略图</label>
                  	<div class="col-sm-10">
                    	<input type="file"  class="file" id="img_url" name="img"  accept="image/*" multiple>
                   		<input type="hidden"  id="image" name="image_path" >
          			</div>
          	</div>

            <div class="line line-dashed b-b line-lg pull-in"></div>

            	<div class="form-group">
                  <label class="col-sm-2 control-label">分类</label>
                  <div class="col-sm-10">
                      @foreach($categories as $category)
                      <div class="radio col-sm-3">
                        <label class="i-checks">

                          @if(isset($topic))
                          <input type="radio"  name="category_id" value="{{$category->id}}" @if($category->id == $topic->category_id) checked @endif name="category_id">
                          @else
                          <input type="radio"  name="category_id" value="{{$category->id}}">
                          @endif

                          <i></i>
                            {{$category->name}}
                        </label>

                      </div>
                      @endforeach

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">内容</label>
                  <div class="col-sm-10">
                  <textarea name="content" value="" class="form-control" rows="3" placeholder="页面描述 ...">{{isset($topic->content)?$topic->content:''}}</textarea>
                  </div>
                </div>

            	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
             	 <input type="hidden" name="_method" value="{{Request::is('*create')?'POST': 'PUT' }}">
              	<input type="hidden" name="id" value="{{isset($topic->id)?$topic->id:''}}">
              	<input type="hidden" name="type" value="0">
              	<input type="hidden" name="user_id" value="0">



	            <div class="col-sm-10 col-sm-offset-2">
	                <button type="submit" class="btn btn-primary">提交</button>
	                <a href="{{ URL::previous() }}" class="btn btn-danger ">返回</a>
	            </div>

              
          </form>
        </div>

   	</div>
     

   </div>
   <div class="tab-pane " id="url">
      <p>jMeter is an Open Source testing software. It is 100% pure 
      Java application for load and performance testing.</p>
   </div>
</div>


@endsection

@section('after-body')
<script src="{{asset('admin/file-upload/js/fileinput.js') }}" ></script>
  <script src="{{asset('admin/file-upload/js/locales/zh.js') }}" ></script>
  <script src="{{asset('admin/file-upload/themes/explorer-fa/theme.js') }}" ></script>

<script>
   $(function () {
   	 $('#topicTab a:first').tab('show');
   });
</script>

@endsection

