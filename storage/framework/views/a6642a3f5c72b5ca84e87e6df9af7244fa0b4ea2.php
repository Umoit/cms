 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $__env->yieldContent('title', 'LaraBBS'); ?> - Laravel 进阶教程</title>
  
  <meta name="keywords" content="fly,layui,前端社区">
  <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
 
  
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/global.css')); ?>"  />
	<?php echo $__env->yieldContent('before-body'); ?>
</head>
<body>

<?php echo $__env->make('frontend.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('frontend.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('after-content'); ?>


</body>

</html>