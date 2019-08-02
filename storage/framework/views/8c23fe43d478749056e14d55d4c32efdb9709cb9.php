
    <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- user -->
          <div class="clearfix hidden-xs text-center hide" id="aside-user">
            <div class="dropdown wrapper">
              <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="img/a0.jpg" class="img-full" alt="...">
                </span>
              </a>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">John.Smith</strong> 
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">Art Director</span>
                </span>
              </a>
              <!-- dropdown -->
              <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                  <span class="arrow top hidden-folded arrow-info"></span>
                  <div>
                    <p>300mb of 500mb used</p>
                  </div>
                  <div class="progress progress-xs m-b-none dker">
                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                  </div>
                </li>
                <li>
                  <a href>Settings</a>
                </li>
                <li>
                  <a href="page_profile.html">Profile</a>
                </li>
                <li>
                  <a href>
                    <span class="badge bg-danger pull-right">3</span>
                    Notifications
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="page_signin.html">Logout</a>
                </li>
              </ul>
              <!-- / dropdown -->
            </div>
            <div class="line dk hidden-folded"></div>
          </div>
          <!-- / user -->

          <!-- nav -->
          <nav id="left-nav" class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>aa</span>
              </li>
              <li class="<?php echo e(Request::is('admin/dashboard*') ? 'active' : ''); ?>">
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                  </span>
                  <i class="fa fa-dashboard"></i>
                  <span class="font-bold">主面板</span>
                </a>
                
              </li>
              <li>
                <a href="mail.html">
                  <b class="badge bg-info pull-right">9</b>
                  <i class="fa fa-snowflake-o"></i>
                  <span class="font-bold">Email</span>
                </a>
              </li>
              <li class="line dk"></li>

              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>新闻资讯</span>
              </li>

              <li class="<?php echo e(Request::is('admin/article*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/category*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/tag*') ? 'active' : ''); ?>">
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right">3</b>
                  <i class="fa fa-list"></i>
                  <span>文章管理</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href="<?php echo e(route('article.index')); ?>">
                      <span>文章列表</span>
                    </a>
                  </li>
                   <li class="<?php echo e(Request::is('admin/article') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('article.index')); ?>">
                      <span>文章列表</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/article/*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('article.create')); ?>">
                      <span>添加文章</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('category.index')); ?>">
                      <span>文章分类</span>
                    </a>
                  </li>

                   <li class="<?php echo e(Request::is('admin/tag*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('tag.index')); ?>">
                      <span>标签</span>
                    </a>
                  </li>
                      
                </ul>
              </li>


              <li class="<?php echo e(Request::is('admin/match*') ? 'active' : ''); ?> ">
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right">3</b>
                  <i class="fa fa-gamepad"></i>
                  <span>赛事管理</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href="<?php echo e(route('match.index')); ?>">
                      <span>赛事列表</span>
                    </a>
                  </li>
                   <li class="<?php echo e(Request::is('admin/match') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('match.index')); ?>">
                      <span>赛事列表</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/match/*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('match.create')); ?>">
                      <span>添加赛事</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('category.index')); ?>">
                      <span>赛事分类</span>
                    </a>
                  </li>
                      
                </ul>
              </li>

               <li class="<?php echo e(Request::is('admin/spider*') ? 'active' : ''); ?>">
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right">3</b>
                  <i class="fa fa-list"></i>
                  <span>采集系统</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href="<?php echo e(route('spiderTarget.index')); ?>">
                      <span>采集系统</span>
                    </a>
                  </li>
                   <li class="<?php echo e(Request::is('admin/spiderTarget') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('spiderTarget.index')); ?>">
                      <span>采集目标</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/spiderJob*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('spiderJob')); ?>">
                      <span>任务列表</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/spiderTarget*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('spiderTarget.index')); ?>">
                      <span>产品分类</span>
                    </a>
                  </li>
                      
                </ul>
              </li>
              




              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>社区模块</span>
              </li>  
               <li class="<?php echo e(Request::is('admin/topic*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right">3</b>
                  <i class="fa fa-list"></i>
                  <span>话题管理</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href="<?php echo e(route('topic.index')); ?>">
                      <span>话题列表</span>
                    </a>
                  </li>
                   <li class="<?php echo e(Request::is('admin/topic') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('topic.index')); ?>">
                      <span>话题列表</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/topic/*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('topic.create')); ?>">
                      <span>添加话题</span>
                    </a>
                  </li>
                  <li class="<?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('category.index')); ?>">
                      <span>产品分类</span>
                    </a>
                  </li>
                      
                </ul>
              </li>

            </ul>
          </nav>
          <!-- nav -->

          <!-- aside footer -->
          <div class="wrapper m-t">
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">60%</span>
              <span class="hidden-folded">Milestone</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-info" style="width: 60%;">
              </div>
            </div>
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">35%</span>
              <span class="hidden-folded">Release</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-primary" style="width: 35%;">
              </div>
            </div>
          </div>
          <!-- / aside footer -->
        </div>
      </div>
  </aside>
  <!-- / aside --> 