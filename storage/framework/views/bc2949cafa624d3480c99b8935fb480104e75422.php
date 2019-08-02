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
                  <p class="copy-right">© 2017-2019 Company Name</p>
            </div>
        </footer>
