<footer class="footer text-center">
            <div class="container">
                 <ul class="footer-menu ">
                          <li >
                            <a href="<?php echo e(url('/')); ?>">主页</a>
                          </li>
                      <?php $__currentLoopData = App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li>
                            <a href="#"><?php echo e($category->name); ?></a>
                          </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  
                    
                  </ul>
              <a class="logo_link" href="<?php echo e(url('/')); ?>">
                <img alt="logo"  class="logo" src="<?php echo e(asset('frontend/img/logo-dark.png')); ?>">
              </a>
                  <p class="copy-right">© Copyright 2017 umoit.com   <a href="">粤ICP备17025826号 </a></p>
            </div>
        </footer>
