<?php $__env->startSection('page'); ?>
    <?php if($id==null): ?>
        <Categoryedit :id="null"></Categoryedit>

    <?php else: ?>
        <Categoryedit :id="<?php echo e($id); ?>"></Categoryedit>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>