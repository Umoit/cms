

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img alt="logo"  class="logo" src="<?php echo e(asset('frontend/img/logo-dark.png')); ?>">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnav" aria-controls="topnav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="topnav">
      <ul class="navbar-nav mr-auto">
              <li class="nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('/')); ?>">主页</a>
              </li>
          <?php $__currentLoopData = App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="nav-item <?php echo e(Request::is('$category->name') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('/',$category->url_name)); ?>"><?php echo e($category->name); ?></a>
              </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      
        
      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="搜索" aria-label="Search">
      </form>
    </div>
  </div>
</nav>
</header>