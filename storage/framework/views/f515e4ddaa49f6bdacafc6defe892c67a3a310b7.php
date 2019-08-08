<?php $__env->startSection('page'); ?>
<div>
<dashboard :menu="menu"></dashboard>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>