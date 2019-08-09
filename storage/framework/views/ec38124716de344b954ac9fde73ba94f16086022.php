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

<section class="service text-center">

  <div class="container">

          <div class="home-title">
                  <h2>我们的服务</h2>
          </div>
        

        
          <div class="row">

            <div class="col-md-4">
                    
              <div class="info">
                <div class="icon ">
                  <i class="icon-magento"></i>
                </div>
                <h4 class="info-title">Magento</h4>
                <p>Magento是一款新的专业开源电子商务平台，采用php进行开发，使用Zend Framework框架。设计得非常灵活，具有模块化架构体系和丰富的功能。易于与第三方应用系统无缝集成。</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon ">
                  <i class="icon-wordpress"></i>
                </div>
                <h4 class="info-title">Wordpress</h4>
                <p>WordPress是一款个人博客系统，并逐步演化成一款内容管理系统软件，它是使用PHP语言和MySQL数据库开发的,用户可以在支持 PHP 和 MySQL数据库的服务器上使用自己的博客。</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon ">
                  <i class="icon-laravel"></i>
                </div>
                <h4 class="info-title">Laravel</h4>
                <p>Laravel是一套简洁、优雅的PHP Web开发框架。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。</p>
              </div>
            </div>
          </div>
       
    
  </div>


</section>


<section class="show text-center">


        <div class="container">

        <div class="home-title">
                  <h2>形象展示</h2>
          </div>
        

            <div class="row">
                <div class="col-md-4">
                    <i class="am-icon-users"></i>
                    <div class="info">
                        <h3>319次</h3>
                        <p>下载量</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <i class="am-icon-users"></i>
                    <div class="info">
                        <h3>7217次</h3>
                        <p>安装量</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <i class="am-icon-users"></i>
                    <div class="info">
                        <h3>6319次</h3>
                        <p>更新量</p>
                    </div>
                </div>
            </div>
        </div>

</section>



  <section class="article text-center">
    <div class="container">
      

          <div class="home-title">
                  <h2>最新文章</h2>
          </div>
        



            
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