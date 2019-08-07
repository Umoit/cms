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
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo e(Request::is('*create')?route('spiderTarget.store'):route('spiderTarget.update',$spiderTarget->id)); ?>" role="form" data-toggle="validator">

            <div class="form-group">
	          <label class="col-sm-2 control-label" >标题</label>
	          <div class="col-sm-10">
	            <input type="text" name="name" value="<?php echo e(isset($spiderTarget->name)?$spiderTarget->name:''); ?>" class="form-control">
	          </div>
	        </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>


             <div class="form-group">
            <label class="col-sm-2 control-label" >网址</label>
            <div class="col-sm-10">
              <input type="text" name="url" value="<?php echo e(isset($spiderTarget->url)?$spiderTarget->url:''); ?>" class="form-control">
            </div>
          </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>


            

                <div class="form-group">
                  <label class="col-sm-2 control-label">规则</label>
                  <div class="col-sm-10">
                  <textarea  name="rule" value="" class="form-control" rows="6" ><?php echo e(isset($spiderTarget->rule)?$spiderTarget->rule:''); ?></textarea>


                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">子规则</label>
                  <div class="col-sm-10">
                  <textarea  name="child_rule" value="" class="form-control" rows="6" ><?php echo e(isset($spiderTarget->child_rule)?$spiderTarget->child_rule:''); ?></textarea>


                  </div>
                </div>
    
            	 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             	 <input type="hidden" name="_method" value="<?php echo e(Request::is('*create')?'POST': 'PUT'); ?>">
              	<input type="hidden" name="admin_id" value="0">



	            <div class="col-sm-10 col-sm-offset-2">
	                <button type="submit" class="btn btn-primary">提交</button>
	                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger ">返回</a>
              <a href="<?php echo e(route('createSpiderJob',$spiderTarget->id)); ?>" class="btn btn-success "> 生成任务</a>

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


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>