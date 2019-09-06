<?php $__env->startSection('page'); ?>
    <?php if(isset($id)): ?>
<editarticle :id="<?php echo e($id); ?>" :token="<?php echo e(json_encode(csrf_token())); ?>"></editarticle>
<?php else: ?>
<editarticle :token="<?php echo e(json_encode(csrf_token())); ?>"></editarticle>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>