<?php $__env->startSection('content'); ?>

<div class="bg-light lter b-b wrapper-md">
    
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3">任务管理</h1>
        </div>
           <div class="col-sm-6 text-right hidden-xs"></div>
      </div>
    



</div>
<div class="wrapper-md">
  
  <div class="panel panel-default">
    <div class="panel-heading">任务列表</div>
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
            <th>标题</th>
            <th>目标站</th>
          
            <th>是否发布</th>
            <th>发布时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          
          
                    <?php $__currentLoopData = $spiderJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                      <td class="dbid"><?php echo e($data->id); ?></td>
                      <td><?php echo e($data->title); ?></td>
                      <td><?php echo e($data->target->name); ?></td>
                      <td>
                      <?php if($data->is_post=='1'): ?>
                      <button type="button" class="btn btn-success btn-xs">已发布</button>
                      <?php else: ?>
                      <button type="button" class="btn btn-warning btn-xs">未发布</button>
                      
                      <?php endif; ?>
                      </td>
                      <td><?php echo e($data->created_at); ?></td>
                      <td>
                        <a target="_blank" href=""><button type="button" class="btn btn-success btn-xs">查看</button></a>
                        <a href="<?php echo e(route('jobToArticle',$data->id)); ?>"><button type="button" class="btn btn-info btn-xs">发布文章</button></a>
                        <a onclick="showDeleteModal(this)"  data="<?php echo e(route('spiderJob.delete',$data->id)); ?>"><button type="button" class="btn btn-danger btn-xs">删除</button></a>


                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
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
          <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo e($spiderJobs->firstItem()); ?>-<?php echo e($spiderJobs->lastItem()); ?> of <?php echo e($spiderJobs->total()); ?> items</small>
        </div>
        <div class="col-sm-5 text-right text-center-xs">                
           <?php echo e($spiderJobs->links()); ?>

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




<!-- exl Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">批量导入文章</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="bulkCreateArticle" class="form-horizontal" method="post" action="<?php echo e(route('article.import')); ?>">
          

        
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-body'); ?>


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
      $("#bulkCreateArticle").submit();
    })



  </script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>