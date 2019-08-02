<?php $__env->startSection('before-body'); ?>
    
   <link href="<?php echo e(asset('admin/css/fileinput.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('admin/file-upload/themes/explorer-fa/theme.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3 ">采集管理</h1>
    </div>


    <div class="wrapper-md">
   

    <div class="row">
      <div class="col-xs-12 col-md-4">

        <div class="panel panel-default">
        <div class="panel-heading ">添加采集目标</div>
        <div class="panel-body">
          <form class="form-horizontal"  action="<?php echo e(route('spiderTarget.store')); ?>" method="post" role="form">

            <div class="form-group">
                <label class="col-sm-3 control-label">名称</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="名称">
                </div>
            </div>
            

            <div class="form-group">
                <label class="col-sm-3 control-label">网址</label>
                <div class="col-sm-9">
                <input type="text" name="url" class="form-control" placeholder="网址">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">规则</label>
                <div class="col-sm-9">
                <textarea style="width:100%;" rows="4" name="rule"></textarea> 
                </div>

            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">子规则</label>
                <div class="col-sm-9">
                <textarea style="width:100%;" rows="4" name="child_rule"></textarea> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">事例</label>
                <div class="col-sm-9">
                {
                  "title": [".article-item>.article-item-detail >.item-title","text"], 
                "url": [".article-item>.article-item-detail >.item-title","href"],
                "img": [".article-item>.imgBox>img","src"]
                }
                <br>
                { "content": [".article-content","text","img p"] }


                </div>
            </div>
            
            
            


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary ">提交</button>
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
    <div class="panel-heading">采集目标列表</div>
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
            <th>网址</th>
            <th>操作</th>
    
          </tr>
        </thead>
        <tbody>
          
          
           <?php $__currentLoopData = $spiderTargets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
              <td><?php echo e($data->id); ?></td>
              <td><?php echo e($data->name); ?></td>
              <td><?php echo e($data->url); ?></td>
            
              <td>
              <a href="<?php echo e(route('createSpiderJob',$data->id)); ?>"><button type="button" class="btn btn-success btn-xs">生成任务</button></a>
                <a href="<?php echo e(route('spiderTarget.edit',$data->id)); ?>"><button type="button" class="btn btn-info btn-xs">编辑</button></a>
                
                 <a onclick="showDeleteModal(this)"  data="<?php echo e(route('spiderTarget.delete',$data->id)); ?>"><button type="button" class="btn btn-danger btn-xs">删除</button></a>
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
          <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo e($spiderTargets->firstItem()); ?>-<?php echo e($spiderTargets->lastItem()); ?> of <?php echo e($spiderTargets->total()); ?> items</small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
           <?php echo e($spiderTargets->links()); ?>

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





</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>