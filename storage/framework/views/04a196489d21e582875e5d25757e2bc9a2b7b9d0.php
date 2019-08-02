
   

 <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            


    <script type="text/javascript">
      

        $.notify({
            title: '<strong>注意!</strong>',
            message: "<?php echo $error; ?><br/>"
        },{
            type: 'danger',
            offset: {
                x: 30,
                y: 20
            }
        });

    </script>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php elseif(session()->get('flash_success')): ?>
    <div class="alert alert-success">
        <?php if(is_array(json_decode(session()->get('flash_success'), true))): ?>

           
    <script type="text/javascript">
      

      	$.notify({
			title: '<strong>注意!</strong>',
			message: "<?php echo implode('', session()->get('flash_success')->all(':message<br/>')); ?>"
		},{
			type: 'success',
			offset: {
		        x: 30,
		        y: 20
	      	}
		});

    </script>

        <?php else: ?>
         <script type="text/javascript">
      $.notify({
			title: '<strong>注意!</strong>',
			message: "<?php echo session()->get('flash_success'); ?>"
		},{
			type: 'success',
			offset: {
		        x: 30,
		        y: 20
	      	}
		});

    </script>

            
        <?php endif; ?>
    </div>
<?php elseif(session()->get('flash_warning')): ?>
    <div class="alert alert-warning">
        <?php if(is_array(json_decode(session()->get('flash_warning'), true))): ?>
            <?php echo implode('', session()->get('flash_warning')->all(':message<br/>')); ?>

        <?php else: ?>
            <?php echo session()->get('flash_warning'); ?>

        <?php endif; ?>
    </div>
<?php elseif(session()->get('flash_info')): ?>
    <div class="alert alert-info">
        <?php if(is_array(json_decode(session()->get('flash_info'), true))): ?>
            <?php echo implode('', session()->get('flash_info')->all(':message<br/>')); ?>

        <?php else: ?>
            <?php echo session()->get('flash_info'); ?>

        <?php endif; ?>
    </div>
<?php elseif(session()->get('flash_danger')): ?>
    <div class="alert alert-danger">
        <?php if(is_array(json_decode(session()->get('flash_danger'), true))): ?>
            <?php echo implode('', session()->get('flash_danger')->all(':message<br/>')); ?>

        <?php else: ?>
            <?php echo session()->get('flash_danger'); ?>

        <?php endif; ?>
    </div>
<?php elseif(session()->get('flash_message')): ?>
    <div class="alert alert-info">
        <?php if(is_array(json_decode(session()->get('flash_message'), true))): ?>
            <?php echo implode('', session()->get('flash_message')->all(':message<br/>')); ?>

        <?php else: ?>
            <?php echo session()->get('flash_message'); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>

<style type="text/css">
    .alert{
        display: none;
    }
</style>