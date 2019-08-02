<?php $__env->startSection('before-body'); ?>
    
   <link href="<?php echo e(asset('admin/css/fileinput.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('admin/file-upload/themes/explorer-fa/theme.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3 ">分类管理</h1>
    </div>


    <div class="wrapper-md">
   

    <div class="row">
      <div class="col-xs-12 col-md-4">

        <div class="panel panel-default">
        <div class="panel-heading ">添加产品分类</div>
        <div class="panel-body">
          <form class="form-horizontal"  action="<?php echo e(route('category.store')); ?>" method="post" role="form">

            <div class="form-group">
                <label class="col-sm-3 control-label">名称</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="目录名称">
                    <p class="help-block">这将是它在站点上显示的名字。</p>
                </div>
            </div>
            
            <div class="form-group">
                  <label name="img" class="col-sm-3 control-label">缩略图</label>
                    <div class="col-sm-9 col-md-9">
                    
                     <div ><img id="image_preview" style="padding-bottom:10px;" width="100%" src=" <?php if(isset($article->img)): ?> <?php echo e(url('/').$article->img); ?> <?php endif; ?>"></div> 
                    

                      <input type="file"  class="file" id="img_url" name="image_data"  accept="image/*" multiple>
                      <input type="hidden"  id="image" name="img"  value="
                      <?php if(isset($article->img)): ?> 
                      <?php echo e($article->img); ?>

                    <?php endif; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">别名</label>
                <div class="col-sm-9">
                <input type="text" name="url_name" class="form-control" placeholder="目录url名称">
                <p class="help-block">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
                </div>
            </div>

           <div class="form-group">
                <label class="col-sm-3 control-label">父节点</label>
                <div class="col-sm-9">
                    <select  name="parent_id" class="form-control"  >
                        <option value="0">顶级</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->parent_id == 0): ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php $__currentLoopData = $category->subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subcat->id); ?>">&nbsp;&nbsp;-<?php echo e($subcat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
                <p class="help-block">分类目录和标签不同，它可以有层级关系。您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</p>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">描述</label>
                <div class="col-sm-9">
                <textarea style="width:100%;" rows="4" name="description"></textarea> 
                <p class="help-block">简单描述</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary ">添加新分类</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        </form>
        </div>
      </div>


        
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="panel panel-default">
    <div class="panel-heading">分类列表</div>
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
            <th>url名字</th>
            <th>贴子数</th>
            <th>操作</th>
    
          </tr>
        </thead>
        <tbody>
          
          
           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
              <td><?php echo e($category->id); ?></td>
              <td><?php echo e($category->name); ?></td>
              <td><?php echo e($category->url_name); ?></td>
              <td><?php echo e($category->topics_count); ?></td>
            
              <td>
                <a target="_blank" href="<?php echo e(route('category.show',$category->id)); ?>"><button type="button" class="btn btn-success btn-xs">查看</button></a>
                <a href="<?php echo e(route('category.edit',$category->id)); ?>"><button type="button" class="btn btn-info btn-xs">编辑</button></a>
                
                 <a onclick="showDeleteModal(this)"  data="<?php echo e(route('category.delete',$category->id)); ?>"><button type="button" class="btn btn-danger btn-xs">删除</button></a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <!-- <div class="col-sm-4 hidden-xs"></div> -->
        <div class="col-sm-6 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo e($categories->firstItem()); ?>-<?php echo e($categories->lastItem()); ?> of <?php echo e($categories->total()); ?> items</small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
           <?php echo e($categories->links()); ?>

        </div>
      </div>
    </footer>
  </div>
    </div>
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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-body'); ?>
<script src="<?php echo e(asset('admin/file-upload/js/fileinput.js')); ?>" ></script>
  <script src="<?php echo e(asset('admin/file-upload/js/locales/zh.js')); ?>" ></script>
  <script src="<?php echo e(asset('admin/file-upload/themes/explorer-fa/theme.js')); ?>" ></script>

<script type="text/javascript">


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