@extends('admin.global')

@section('content')
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>话题管理</legend>
</fieldset>


      <div class="layui-tab layui-tab-brief" lay-filter="user">
        <ul class="layui-tab-title">
          <li class="layui-this">发表新帖(文本)</li>
          <li >发表新帖(链接)</li>
          <li >发表新帖(图片)</li>
        </ul>
        <div class="layui-tab-content"  style="padding: 20px 0;">

            <div class="layui-tab-item layui-show">
            <form class="layui-form layui-form-pane" action="{{route('topic.store')}}" method="post">

              <div class=" layui-form-item">
               
            
                  <label for="title" class="layui-form-label">标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="title" name="name"  lay-verify="required" autocomplete="off" class="layui-input">
                    {{ csrf_field() }}
                    <input type="hidden" name="type" value="0">

                
                </div>
              </div>


                  <div class="layui-form-item">
                  <label class="layui-form-label">链接</label>
                  <div class="layui-input-block">
                    <input type="text" id="title" name="link"  lay-verify="required" autocomplete="off" class="layui-input">
                      
                  </div>
              </div>


                <div class="layui-form-item">
                  <label class="layui-form-label">规则</label>
                  <div class="layui-input-block">
                      <textarea class="layui-textarea "  name="content" ></textarea>
                  </div>
              </div>
                        
             

              <div class="layui-form-item layui-col-md-offset5">
                <button class="layui-btn" lay-filter="topic1" lay-submit >立即发布</button>
              </div>
            </form>
          </div>


          <div class="layui-tab-item ">
                    <form class="layui-form layui-form-pane" action="{{route('topic.store')}}" method="post">
                      <div class="layui-row layui-col-space15 layui-form-item">
                        
                        <div class="layui-col-md12">
                          <label for="title" class="layui-form-label">名称</label>
                          <div class="layui-input-block">
                            <input type="text" id="title" name="title"  lay-verify="required" autocomplete="off" class="layui-input">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="1">

                          </div>
                        </div>
                      </div>


                      <div class="layui-form-item ">

                       <div class="layui-col-md12">
                          <label for="title" class="layui-form-label">链接</label>
                          <div class="layui-input-block">
                            <input type="text" id="link" name="content"  lay-verify="required|url" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        
                      </div>
                      
                      <div class="layui-form-item layui-col-md-offset5">
                        <button class="layui-btn" lay-filter="topic2" lay-submit >立即发布</button>
                      </div>
                    </form>

          </div>




        </div>
      </div>



@endsection

@section('after-body')

<script>
layui.use(['layer','form','layedit'], function(){
  var layer = layui.layer;
  var form = layui.form;
  var layedit = layui.layedit;
  var rel = layedit.build('content_area'); 
  form.verify({
      content: function(value){
        value = layedit.getContent(rel)
        layedit.sync(rel)
        if(value.replace(/[\s|&nbsp;]/g,'')==''){
          return '必填项不能为空';
        }
      }
  })


  // layedit.build('content_area'); 
  form.on('submit(topic2)', function(data){

    console.log(data.field)
    return false;
  });
});



</script> 
@endsection