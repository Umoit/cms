@extends('admin.global')

@section('before-body')
    <link href="{{asset('admin/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/file-upload/themes/explorer-fa/theme.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('summernote/summernote.css') }}" rel="stylesheet">

@endsection

@section('content')


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">赛事管理</h1>







</div>
<div class="wrapper-md">




<div id="topicTabContent" >
   
   	<div class="panel panel-default">
   		<div class="panel-heading font-bold" >赛事内容</div>
   		<div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{Request::is('*create')?route('match.store'):route('match.update',$match->id)}}" role="form" data-toggle="validator">

            <div class="form-group">
	          <label class="col-sm-2 control-label" >赛事名称</label>
	          <div class="col-sm-10">
	            <input type="text" name="title" value="{{isset($match->title)?$match->title:''}}" class="form-control">
	          </div>
	        </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>


            <div class="form-group">
            <label class="col-sm-2 control-label" >主办方</label>
            <div class="col-sm-10">
              <input type="text" name="host" value="{{isset($match->host)?$match->host:''}}" class="form-control">
            </div>
          </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>


            <div class="form-group">
            <label class="col-sm-2 control-label" >比赛时间</label>
            <div class="col-sm-10">
              <input type="text" name="duration" value="{{isset($match->duration)?$match->duration:''}}" class="form-control">
            </div>
          </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>

	        <div class="form-group">
                  <label name="img" class="col-sm-2 control-label">缩略图</label>
                  	<div class="col-sm-10 col-md-4">
                    
                     <div ><img id="image_preview" style="padding-bottom:10px;" width="100%" src=" @if (isset($match->img)) {{url('/').$match->img}} @endif"></div> 
                    

                    	<input type="file"  class="file" id="img_url" name="image_data"  accept="image/*" multiple>
                   		<input type="hidden"  id="image" name="img"  value="
                      @if (isset($match->img)) 
                      {{$match->img}}
                    @endif">
          			</div>
          	</div>



            <div class="line line-dashed b-b line-lg pull-in"></div>

            	<div class="form-group">
                  <label class="col-sm-2 control-label">游戏分类</label>
                  <div class="col-sm-10">
                      @foreach($games as $game)
                      <div class="radio col-sm-3">
                        <label class="i-checks">

                          @if(isset($match))
                          <input type="radio"  name="game_id" value="{{$game->id}}" @if($game->id == $match->game_id) checked @endif name="game_id">
                          {{$match->game_id}}
                          @else
                          <input type="radio"  name="game_id" value="{{$game->id}}">
                          @endif

                          <i></i>
                            {{$game->name}}
                        </label>

                      </div>
                      @endforeach

                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">状态</label>
                  <div class="col-sm-10">
                      <label class="radio-inline">
                        <input type="radio" name="status"  value="0">未开赛
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="status"  value="1">进行中
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="status"  value="2">已结束
                      </label>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">内容</label>
                  <div class="col-sm-10">
                  <textarea id="summernote" name="content" value="" class="form-control" rows="3" placeholder="页面描述 ...">{{isset($match->content)?$match->content:''}}</textarea>


                  </div>
                </div>

            	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
             	 <input type="hidden" name="_method" value="{{Request::is('*create')?'POST': 'PUT' }}">
            	 <input type="hidden" name="admin_id" value="0">



	            <div class="col-sm-10 col-sm-offset-2">
	                <button type="submit" class="btn btn-primary">提交</button>
	                <a href="{{ URL::previous() }}" class="btn btn-danger ">返回</a>
	            </div>

              
          </form>
        </div>

   	</div>
     

   



</div>


@endsection

@section('after-body')
<script src="{{asset('admin/file-upload/js/fileinput.js') }}" ></script>
  <script src="{{asset('admin/file-upload/js/locales/zh.js') }}" ></script>
  <script src="{{asset('summernote/summernote.min.js') }}"></script>
  <script src="{{asset('summernote/lang/summernote-zh-CN.min.js') }}"></script>

<script>
   $(function () {
   	 $('#topicTab a:first').tab('show');
   });

   $(document).ready(function() {
      $('#summernote').summernote({
         tabsize: 2,
        minHeight: 300,
        lang:'zh-CN',

         callbacks: {
              onImageUpload: function(files) {
                  //上传图片到服务器，使用了formData对象，至于兼容性...据说对低版本IE不太友好
                  var formData = new FormData();
                  formData.append('image_data',files[0]);
                  $.ajax({
                      url : "{{route('image.upload')}}",
                      type : 'POST',
                      data : formData,
                      processData : false,
                      contentType : false,
                      success : function(data) {
                          //console.log(data.code);

                          if (data.code === 0) {
                            $('#summernote').summernote('editor.insertImage',"{{url('/')}}"+data.path,'img');
                          } else {

                              $.notify({
                                title: '<strong>注意!</strong>',
                                message: "图片上传出错"
                              },{
                                type: 'warning',
                                offset: {
                                      x: 30,
                                      y: 20
                                    }
                              });
                          }
                          
                      },

                      error:function(){
                         $.notify({
                            title: '<strong>注意!</strong>',
                            message: "图片上传出错"
                          },{
                            type: 'warning',
                            offset: {
                                  x: 30,
                                  y: 20
                                }
                          });
                      }
                  });
              }
          }

      });
      
    });









$("#img_url").fileinput({
            /**
             * theme icon 主题 需要引入相应的主题包
             * language 语言设置 需要引入相应的语言包
             * uploadUrl 上传路径  可不写在下面与表单一起手动上传
             * showCaption 是否展示 input 文字的说明 -- 标题
             * showUpload 是否显示上传按钮
             * showRemove 是否可以删除
             * dropZoneEnabled 是否开启拖拽上传功能
             * maxFileCount 最多的文件数量
             * maxFileSize 最大的尺寸
             * allowedFileExtensions 允许的文件扩展后缀名
             * autoReplace 是否自动替换当前图片，设置为true时，再次选择文件， 会将当前的文件替换掉
             */
            theme: 'fa',
            language: 'zh',
            uploadUrl: "{{route('image.upload')}}",
            showUpload: false,
            showRemove: true,
            dropZoneEnabled: false,
            maxFileCount: 1,
            allowedFileExtensions: ['jpg', 'png'],
            autoReplace: true,
            showPreview:false
          })
          // 实现图片被选中后自动提交
          .on('filebatchselected', function(event, files) {
            // 选中事件
            $(event.target).fileinput('upload')
          })
          // 异步上传错误结果处理
          .on('fileerror', function(event, data, msg) {
            // 清除当前的预览图 ，并隐藏 【移除】 按钮
            $(event.target)
              .fileinput('clear')
              .fileinput('unlock')
            $(event.target)
              .parent()
              .siblings('.fileinput-remove')
              .hide()
            // 打开失败的信息弹窗
          })
          // 异步上传成功结果处理
          .on('fileuploaded', function(event, data) {
            // 判断 code 是否为  0    0 代表成功
            
            if (data.response.code === 0) {

              $('#image').val( data.response.path );
              $('#image_preview').attr('src',data.response.path);

            } else {
              // 失败回调
              // 清除当前的预览图 ，并隐藏 【移除】 按钮
              $(event.target)
                .fileinput('clear')
                .fileinput('unlock')
              $(event.target)
                .parent()
                .siblings('.fileinput-remove')
                .hide()
              // 打开失败的信息弹窗
              //me.openAlertModel('请求失败，请稍后重试')
            }
          })




</script>

@endsection

