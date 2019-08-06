<?php $__env->startSection('content'); ?>



<div class="main">

<section class="banner text-center">
    <div class="container">
      <h1 class="banner-title">尤木科技</h1>
      <p class="lead text-muted">分享Magento Worpdress各种技术文章</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Magento</a>
        <a href="#" class="btn btn-secondary my-2">Wordpress</a>
      </p>
    </div>
  </section>


<div class="container">
<div class="row">
    <div class="col-md-8 blog-main">


      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo e($article->title); ?></h2>
        <p class="blog-post-meta"><?php echo e($article->created_at); ?> <a href="#"><?php echo e($article->admin_id); ?></a></p>

        <?php echo $article->content; ?>

      </div>

  

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="sidebar-info">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

       <div class="sidebar-menu">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled">
            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="#" class=""><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
      </div>

      <div class="sidebar-tag">
        <h4 class="font-italic">Archives</h4>
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