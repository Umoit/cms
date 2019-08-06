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

<section class="service text-center">
  <div class="container">

        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Let's talk product</h2>
            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
          </div>
        </div>

        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Free Chat</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Verified Users</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Fingerprint</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
          </div>
        </div>
    
  </div>


</section>




  <section class="article">
    <div class="container">
      





            
      <div class="row">
          <?php $__currentLoopData = App\Article::getArticleByCat(0,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">

            
              <div class="card mb-4 shadow-sm">
                <a href="<?php echo e(url('article',$article->id)); ?>"><img src="<?php echo e($article->img); ?>" width="100%;" height="200px"></a>
                <div class="card-body">
                  <p class="card-text"><?php echo e($article->title); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    
                    <small class="text-muted"><?php echo e($article->created_at->format('Y-m-d')); ?></small>

                    <div class="btn-group">
                      <a href="<?php echo e(url('article',$article->id)); ?>"><button type="button" class="btn btn-sm btn-outline-secondary">浏览更多</button></a>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      </div>




    </section>


  </div>






  






<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.global', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>