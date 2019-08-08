<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


    <div dir="ltr" class="top-contact text-center" style="background-color: #6b76f7; height: 400px">
        <h3 class="contact-title"
            style="font-family: Rambla; font-weight: bold; color: #fff; padding-top: 50px; font-size: 50px">
            Contact Us
        </h3>
        <label style="color: #fff; font-size: 18px; font-family: Rambla">
            Drop us a message and we'll back to you.
        </label>
    </div>


    <div class="position-relative container" style="height: 400px">
        <div class="row position-absolute" style=" top: -200px; width: 100%">
            <div dir="ltr" class="row col-10 mx-auto p-0"
                 style="overflow: hidden; height: fit-content; box-shadow: 0 2px 10px 2px #ddd; border-radius: 7px">

                <div class="col-12 col-sm-7 p-5" style="background-color: #fff; color: #333">
                    <h5 class="mb-5 mt-3" style="font-family: Rambla">
                        Send us a Message
                    </h5>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Full Name" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="email" placeholder="Email Address" class="form-control mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Phone" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Subject" class="form-control mb-3">
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="px-2 col-12">
                                <textarea class="form-control" placeholder="Your Message ..." rows="5"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-success px-4 float-right">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>
                    </form>

                </div>


                <div class="col-12 col-sm-5 p-5" style="background-image: linear-gradient(#383d80, #030847); color: #fff">
                    <h5 class="mb-5 mt-3" style="font-family: Rambla">
                        Contact Information
                    </h5>


                    <div class="row mx-0 mb-3">
                            <i class="fas fa-map-marked-alt fa-lg mr-2" style="color: #C3C3D3"></i>
                            <label style="color: #C3C3D3; font-family: Arial">
                                Iran Tehran Valiasr Alley No.14
                            </label>
                    </div>

                    <div class="row mx-0 mb-3">
                            <i class="fas fa-phone-alt fa-lg mr-2" style="color: #C3C3D3"></i>

                            <label style="color: #C3C3D3; font-family: Arial">
                                021-32552698-9
                            </label>
                    </div>

                    <div class="row mx-0 mb-3">
                            <i class="fas fa-mobile-alt fa-lg mr-2" style="color: #C3C3D3"></i>

                            <label style="color: #C3C3D3; font-family: Arial">
                                09123456789 - 09358005862
                            </label>
                    </div>

                    <div class="row mx-0 mb-3">
                            <i class="far fa-envelope fa-lg mr-2" style="color: #C3C3D3"></i>

                            <label style="color: #C3C3D3; font-family: Arial">
                                Info@afrang.com
                            </label>
                    </div>
                </div>


            </div>
        </div>
    </div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>