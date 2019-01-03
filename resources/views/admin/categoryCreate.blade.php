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
        
        <div class="panel-heading ">文章分类</div>
        <div class="panel-body">
          <form class="form-horizontal"  action="{{route('category.update',$category->id)}}" method="post" role="form">

            <div class="form-group">
                <label class="col-sm-3 control-label">名称</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="目录名称">
                    <p class="help-block">这将是它在站点上显示的名字。</p>
                </div>
            </div>
            <div class="form-group">
                  <label name="img" class="col-sm-3 control-label">缩略图</label>
                    <div class="col-sm-9 col-md-5">
                    
                     <div ><img id="image_preview" style="padding-bottom:10px;" width="100%" src="{{url('/').$category->img}} "></div> 
                    

                      <input type="file"  class="file" id="img_url" name="image_data"  accept="image/*" multiple>
                      <input type="hidden"  id="image" name="img"  value="{{$category->img}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">别名</label>
                <div class="col-sm-9">
                <input type="text" name="url_name" value="{{$category->url_name}}" class="form-control" placeholder="目录url名称">
                <p class="help-block">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">父节点</label>
                <div class="col-sm-9">
                    <select  name="parent_id" class="form-control"  >

                        <option value="0">顶级</option>
                        @foreach($categories as $data)
                        @if($data->parent_id == 0)
                        <option @if($category->parent_id==$data->id) selected @endif value="{{$data->id}}">{{$data->name}}</option>
                            @foreach($data->subcats as $subcat)
                            <option value="{{$subcat->id}}">&nbsp;&nbsp;-{{$subcat->name}}</option>
                            @endforeach
                        @endif
                        @endforeach
                    </select>
                    
                <p class="help-block">分类目录和标签不同，它可以有层级关系。您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</p>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">描述</label>
                <div class="col-sm-9">
                <textarea style="width:100%;" rows="4" name="description">{{$category->description}}</textarea> 
                <p class="help-block">简单描述</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary ">提交</button>
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

<script>
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

