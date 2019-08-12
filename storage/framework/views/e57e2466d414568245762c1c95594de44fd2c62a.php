<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layout 后台大布局 - Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


  <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Default Description'); ?>">
  <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Anthony Rappa'); ?>">
  <?php echo $__env->yieldContent('meta'); ?>
  <link rel="stylesheet" href="/admin/css/animate.css"  media="all">
  <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/admin/css/bootstrap.css"  media="all">
  <link rel="stylesheet" href="/admin/css/app.css"  media="all">

   <?php echo $__env->yieldContent('before-body'); ?>


</head>

<body>
<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs">
  <a href class="navbar-brand block m-t"><?php echo e(config('app.name')); ?></a>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>App后台管理系统</strong>
    </div>
    <form name="form" class="form-validation" method="post" action="<?php echo e(route('admin.login')); ?>">
      <div class="text-danger wrapper text-center" >
          
      </div>
      <div class="list-group list-group-sm">
        <div class="list-group-item">
          <input type="email" placeholder="邮箱地址" class="form-control no-border" name="email" required>

        </div>

        <div class="list-group-item">
           <input type="password" placeholder="密码" class="form-control no-border" name="password" required>
        </div>

         <div class="list-group-item">

           <input type="text" placeholder="验证码" class="form-control no-border" name="captcha" required style="width:50%;display:inline-block">
           <img style="vertical-align:middle;cursor:pointer;float:right" id="captcha_img" src="<?php echo e(captcha_src()); ?>" onclick="this.src ='/captcha/default?'+Math.random() ">
        </div>
  
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  

        


      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" >登录</button>


          <?php if(count($errors) > 0): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>

          <?php endif; ?>





      <div class="text-center m-t m-b"><a>忘记密码？</a></div>
      <div class="line line-dashed"></div>
     
      <a ui-sref="access.signup" class="btn btn-lg btn-default btn-block">申请账号</a>
    </form>
  </div>
  <div class="text-center">
    <p>

    <p class="copy-right">© Copyright 2017 umoit.com   <br><a href="http://www.beian.miit.gov.cn/">粤ICP备17025826号 </a></p>

</p>
  </div>
</div>


</div>


</body>


  
</html>