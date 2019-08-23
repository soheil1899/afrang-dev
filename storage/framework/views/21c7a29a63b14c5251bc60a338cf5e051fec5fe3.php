

<div class="shadow-sm footertop" dir="ltr">
    <div class="container">
        <div class="row m-0">
            <div class="col-12 col-lg-5 px-4">
                <h4 class="mb-4 footertitle">
                    About Afrang
                </h4>
                <articleshow :id="14" :flag="'footer'"></articleshow>


            </div>
            <div class="col-12 col-md-5 col-lg-3 px-4">
                <h4 class="mb-4 mt-5 mt-lg-0 footertitle">
                    Keep Connected
                </h4>

                <div class="row m-0">
                    <div class="col-3 p-0">
                        <div class="py-2 text-center mb-2 mx-auto pointer footersocial">
                            <i class="fab fa-twitter fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 px-0 pt-2">
                        <label class="footersocialtext">Follow us on Twitter</label>
                    </div>

                </div>
                <div class="row m-0">
                    <div class="col-3 p-0">
                        <div class="py-2 text-center mb-2 mx-auto pointer footersocial">
                            <i class="fab fa-instagram fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 px-0 pt-2">
                        <label class="footersocialtext">Follow us on Instagram</label>
                    </div>

                </div>
                <div class="row m-0">
                    <div class="col-3 p-0">
                        <div class="py-2 text-center mb-2 mx-auto pointer footersocial">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 px-0 pt-2">
                        <label class="footersocialtext">Like us on Facebook</label>
                    </div>

                </div>
                <div class="row m-0">
                    <div class="col-3 p-0">
                        <div class="py-2 text-center mb-2 mx-auto pointer footersocial">
                            <i class="fab fa-google-plus-g fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 px-0 pt-2">
                        <label class="footersocialtext">Add us on Google Plus</label>
                    </div>

                </div>

                <div class="row m-0">
                    <div class="col-3 p-0">
                        <div class="py-2 text-center mb-2 mx-auto pointer footersocial">
                            <i class="fab fa-telegram-plane fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 px-0 pt-2">
                        <label class="footersocialtext">Join us on Telegram</label>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-7 col-lg-4 px-4">
                <h4 class="mb-4 mt-5 mt-lg-0 footertitle">
                    Contact Information
                </h4>

                <div class="row mx-0 mb-3">
                    <div class="col-2 p-0 text-center">
                        <i class="fas fa-map-marked-alt fa-2x colorwhite"></i>
                    </div>
                    <div class="col-10 px-0 pt-1">
                        <label class="footersocialtext">
                            <?php echo e(\App\setting::first()->address); ?>

                        </label>
                    </div>
                </div>

                <div class="row mx-0 mb-3">
                    <div class="col-2 p-0 text-center">
                        <i class="fas fa-phone-alt fa-2x colorwhite"></i>
                    </div>
                    <div class="col-10 px-0 pt-1">
                        <label class="footersocialtext">
                            <?php echo e(\App\setting::first()->phone); ?>

                        </label>
                    </div>
                </div>

                <div class="row mx-0 mb-3">
                    <div class="col-2 p-0 text-center">
                        <i class="fas fa-mobile-alt fa-2x colorwhite"></i>
                    </div>
                    <div class="col-10 px-0 pt-1">
                        <label class="footersocialtext">
                            <?php echo e(\App\setting::first()->otherphone); ?>

                        </label>
                    </div>
                </div>

                <div class="row mx-0 mb-3">
                    <div class="col-2 p-0 text-center">
                        <i class="far fa-envelope fa-2x colorwhite"></i>
                    </div>
                    <div class="col-10 px-0 pt-1">
                        <label class="footersocialtext">
                            <?php echo e(\App\setting::first()->email); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="py-3 footerbottom" dir="ltr">
    <div class="row mx-5">
        <div class="col-12 col-lg-6">
            <p class="m-0 footersocialtext">&copy; 2019 <?php echo e(\App\setting::first()->websitename); ?>. All rights reserved.</p>
        </div>
        <div class="col-12 col-lg-6 text-right footersocialtext">
            <a class="mr-2"> Afrang Information </a>
            |
            <a class="mx-2"> Privacy Policy </a>
            |
            <a class="mx-2"> Term and Condition </a>
        </div>
    </div>
</div>