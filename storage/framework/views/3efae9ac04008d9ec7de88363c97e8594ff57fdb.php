<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div class="m-5">
        <checkmobilephone></checkmobilephone>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>