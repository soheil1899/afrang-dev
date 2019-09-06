<?php $__env->startSection('page'); ?>
    <?php if(isset($id)): ?>
    <<?php echo e($name); ?> :id="<?php echo e($id); ?>" :token="<?php echo e(json_encode(csrf_token())); ?>"></<?php echo e($name); ?>>
    <?php else: ?>
        <<?php echo e($name); ?> :token="<?php echo e(json_encode(csrf_token())); ?>"></<?php echo e($name); ?>>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>