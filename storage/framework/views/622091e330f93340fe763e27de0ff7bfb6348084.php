<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


    <div dir="ltr" class="shadow-sm container-fluid py-5" style="background-color: #fff;">
        <div class="row mx-0">
            <div class="col-12 order-1 order-lg-0 col-lg-5" style=" padding-top: 60px; padding-left: 60px; ">
                <h3 class="mb-3"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 40px">
                    Our Portfolio
                </h3>
                <div>
                    <p class="team-desc">
                        Undoubtedly the most important factor in any job trust is its team's resume and output. User
                        behavior analysis also shows that the most visited page after the homepage is the portfolio
                        page.
                    </p>
                </div>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img src="/media/test-folder/sample.png" width="100%">
            </div>
        </div>
    </div>




    <our-portfolio></our-portfolio>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>