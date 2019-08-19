 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $__env->yieldContent('title', ''); ?>尤木科技-Wordpress Magento文章分享</title>
  
  <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', ''); ?>尤木科技,Wordpress Magento文章分享,Wordpress Magento网站设计，Wordpress Magento网站建设 web方案">
  <meta name="description" content="<?php echo $__env->yieldContent('description', ''); ?>尤木科技,Wordpress Magento文章分享,Wordpress Magento网站设计,Wordpress Magento网站建设,Magento Wordpress方案">
 
  
  <link rel="stylesheet" href="<?php echo e(asset('bootstrap-4.3.1/css/bootstrap.css')); ?>"  />

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/global.css')); ?>"  />
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font.css')); ?>"  />
  
  <link rel="shortcut icon" href="<?php echo e(asset('frontend/css/font.css')); ?>"/>
  
	<?php echo $__env->yieldContent('before-content'); ?>
</head>

<body>

<?php echo $__env->make('frontend.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('frontend.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo e(asset('bootstrap-4.3.1/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('bootstrap-4.3.1/js/bootstrap.min.js')); ?>"></script>


<?php echo $__env->yieldContent('after-content'); ?>


</body>

</html>