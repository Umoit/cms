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
    <div class="col-md-8 blog-list">

        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm ">

        <div class="article-thum">
            <?php if($article->img): ?>
            <a href="<?php echo e(url('article',$article->id)); ?>">
              <img class=" rounded" src="<?php echo e($article->img); ?>" width="160" height="100" />
            </a>
            <?php else: ?>
            <svg class="bd-placeholder-img" width="160" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"></rect></svg>
            <?php endif; ?>
          </div>

          <div class="col p-3">
            <div class="mb-1 text-muted"><?php echo e($article->created_at->format('Y-m-d')); ?></div>
            <p class="card-text mb-auto"><?php echo e($article->title); ?></p>
            <a href="<?php echo e(url('article',$article->id)); ?>">阅读全文</a>
          </div>
          
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="sidebar-info">
        <h4 class="sidebar-title">关于我们</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
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