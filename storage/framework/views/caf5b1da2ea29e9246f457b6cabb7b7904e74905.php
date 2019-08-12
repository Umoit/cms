<?php $__env->startSection('keywords'); ?><?php echo e($article->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($article->title); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



<div class="main">

<section class="banner text-center">
    <div class="container">
      <h1 class="banner-title">尤木科技</h1>
      <p class="lead text-muted">分享Magento Worpdress各种技术文章</p>
      <p>
        <a href="<?php echo e(url('magento')); ?>" class="btn btn-primary my-2">Magento</a>
        <a href="<?php echo e(url('wordpress')); ?>" class="btn btn-secondary my-2">Wordpress</a>
      </p>
    </div>
  </section>


<div class="container">
<div class="row">
    <div class="col-md-8 blog-main">


      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo e($article->title); ?></h2>
        <p class="blog-post-meta"><?php echo e($article->created_at->format("Y-m-d H:i")); ?> <?php echo e(App\Admin::getName($article->admin_id)); ?></p>

        <?php echo $article->content; ?>

      </div>

  

      <nav class="blog-pagination">

        <a class="btn btn-outline-primary <?php if(!$previous): ?>: disabled <?php endif; ?>" href="<?php echo e(url('article',$previous)); ?>">上一篇</a>
        <a class="btn btn-outline-primary <?php if(!$next): ?>: disabled <?php endif; ?>" href="<?php echo e(url('article',$next)); ?>" >下一篇</a>

      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="sidebar-info">
        <h4 class="sidebar-title">关于我们</h4>
        <p>
        尤木科技,Wordpress Magento文章分享,Wordpress Magento网站设计,Wordpress Magento网站建设,Magento Wordpress方案
        </p>
      </div>

       <div class="sidebar-menu">
        <h4 class="sidebar-title">菜单</h4>
        <ol class="list-unstyled">
            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="#" class=""><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
      </div>

      <div class="sidebar-tag">
        <h4 class="sidebar-title">标签</h4>
        <ol class="list-unstyled">
            <?php $__currentLoopData = \App\Tag::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="#" class="btn btn-sm btn-primary"><?php echo e($tag->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
      </div>

      
    </aside><!-- /.blog-sidebar -->

  </div>
</div>


</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>