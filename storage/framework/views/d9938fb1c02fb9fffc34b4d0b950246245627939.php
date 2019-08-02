<?php $__env->startSection('before-body'); ?>
    <link href="<?php echo e(asset('admin/css/fileinput.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('admin/file-upload/themes/explorer-fa/theme.min.css')); ?>" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo e(asset('summernote/summernote.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">文章管理</h1>
</div>
<div class="wrapper-md">




<div id="topicTabContent" >
 
   	<div class="panel panel-default">
   		<div class="panel-heading font-bold" >文章内容</div>
   		<div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo e(Request::is('*create')?route('article.store'):route('article.update',$article->id)); ?>" role="form" data-toggle="validator">

            <div class="form-group">
	          <label class="col-sm-2 control-label" >标题</label>
	          <div class="col-sm-10">
	            <input type="text" name="title" value="<?php echo e(isset($article->title)?$article->title:''); ?>" class="form-control">
	          </div>
	        </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>

	        <div class="form-group">
                  <label name="img" class="col-sm-2 control-label">缩略图</label>
                  	<div class="col-sm-10 col-md-3">
                    
                     <div ><img id="image_preview" style="padding-bottom:10px;" width="100%" src=" <?php if(isset($article->img)): ?> <?php echo e(url('/').$article->img); ?> <?php endif; ?>"></div> 
                    

                    	<input type="file"  class="file" id="img_url" name="image_data"  accept="image/*" multiple>
                   		<input type="hidden"  id="image" name="img"  value="
                      <?php if(isset($article->img)): ?> 
                      <?php echo e($article->img); ?>

                    <?php endif; ?>">
          			</div>
          	</div>



            <div class="line line-dashed b-b line-lg pull-in"></div>

            	<div class="form-group">
                  <label class="col-sm-2 control-label">分类</label>
                  <div class="col-sm-10">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="radio ">
                        <label class="i-checks">

                          <?php if(isset($article)): ?>
                          <input type="radio"  name="category_id" value="<?php echo e($category->id); ?>" <?php if($category->id == $article->category_id): ?> checked <?php endif; ?> name="category_id">
                          <?php echo e($article->category_id); ?>

                          <?php else: ?>
                          <input type="radio"  name="category_id" value="<?php echo e($category->id); ?>">
                          <?php endif; ?>

                          <i></i>
                            <?php echo e($category->name); ?>

                        </label>

                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                </div>

                 <div class="line line-dashed b-b line-lg pull-in"></div>
          
                <div class="form-group">
                  <label class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-10">
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <label class="checkbox-inline i-checks">
                                <input type="checkbox" name="tags[]"  
                                <?php if(isset($tags_array)): ?> 
                                  <?php if(in_array($tag->id,$tags_array)): ?> checked <?php endif; ?>
                                <?php endif; ?>
                                   value="<?php echo e($tag->id); ?>"><i></i> <?php echo e($tag->name); ?>

                              </label>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </div>
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">内容</label>
                  <div class="col-sm-10">
                  <textarea id="summernote" name="content" value="" class="form-control" rows="3" placeholder="页面描述 ..."><?php echo e(isset($article->content)?$article->content:''); ?></textarea>


                  </div>
                </div>
               


            	 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             	 <input type="hidden" name="_method" value="<?php echo e(Request::is('*create')?'POST': 'PUT'); ?>">
              	<input type="hidden" name="admin_id" value="0">



	            <div class="col-sm-10 col-sm-offset-2">
	                <button type="submit" class="btn btn-primary">提交</button>
	                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger ">返回</a>
	            </div>

              
          </form>
        </div>

   	</div>
     

  
   
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-body'); ?>
  <script src="<?php echo e(asset('admin/file-upload/js/fileinput.js')); ?>" ></script>
  <script src="<?php echo e(asset('admin/file-upload/js/locales/zh.js')); ?>" ></script>
  <script src="<?php echo e(asset('admin/file-upload/themes/explorer-fa/theme.js')); ?>" ></script>
  <script src="<?php echo e(asset('summernote/summernote.min.js')); ?>"></script>
  <script src="<?php echo e(asset('summernote/lang/summernote-zh-CN.min.js')); ?>"></script>

<script>
   $(function () {
   	 $('#topicTab a:first').tab('show');
   });

   $(document).ready(function() {
      $('#summernote').summernote({
         tabsize: 2,
        minHeight: 300,
        lang: 'zh-CN' ,

         callbacks: {
              onImageUpload: function(files) {
                  //上传图片到服务器，使用了formData对象，至于兼容性...据说对低版本IE不太友好
                  var formData = new FormData();
                  formData.append('image_data',files[0]);
                  $.ajax({
                      url : "<?php echo e(route('image.upload')); ?>",
                      type : 'POST',
                      data : formData,
                      processData : false,
                      contentType : false,
                      success : function(data) {
                          //console.log(data.code);

                          if (data.code === 0) {
                            $('#summernote').summernote('editor.insertImage',"<?php echo e(url('/')); ?>"+data.path,'img');
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
            uploadUrl: "<?php echo e(route('image.upload')); ?>",
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>