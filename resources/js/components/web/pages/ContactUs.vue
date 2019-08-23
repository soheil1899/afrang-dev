<template>
    <div>

        <div dir="ltr" class="top-contact text-center shadow-sm contacttop">
            <h3 class="contact-title">
                Contact Us
            </h3>
            <label>
                Drop us a message and we'll back to you.
            </label>
        </div>


        <div class="position-relative container contactus-item">
            <div class="row position-absolute">
                <div dir="ltr" class="row col-10 mx-auto p-0">

                    <div class="sendmessage col-12 order-lg-0 order-1 col-lg-7 p-5">
                        <h5 class="mb-5 mt-3 fontRambla">
                            Send us a Message
                        </h5>

                        <div class="row">
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Full Name"
                                       class="form-control form-control-sm mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="email" placeholder="Email Address"
                                       class="form-control form-control-sm mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Phone" class="form-control form-control-sm mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" placeholder="Subject" class="form-control form-control-sm mb-3">
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="px-2 col-12">
                                    <textarea class="form-control form-control-sm" placeholder="Your Message ..."
                                              rows="5"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-success px-4 float-right">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>


                    </div>


                    <div class="contactinfo col-12 col-lg-5 order-lg-1 order-0 p-5">
                        <h5 class="mb-5 mt-3 fontRambla">
                            Contact Information
                        </h5>


                        <div class="row mx-0 mb-3">
                            <i class="fas fa-map-marked-alt fa-lg mr-2 icons"></i>
                            <label class="icons">
                                Iran Tehran Valiasr Alley No.14
                            </label>
                        </div>

                        <div class="row mx-0 mb-3">
                            <i class="fas fa-phone-alt fa-lg mr-2 icons"></i>

                            <label class="icons">
                                021-32552698-9
                            </label>
                        </div>

                        <div class="row mx-0 mb-3">
                            <i class="fas fa-mobile-alt fa-lg mr-2 icons"></i>

                            <label class="icons">
                                09123456789 - 09358005862
                            </label>
                        </div>

                        <div class="row mx-0 mb-3">
                            <i class="far fa-envelope fa-lg mr-2 icons"></i>

                            <label class="icons">
                                Info@afrang.com
                            </label>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "ContactUs"
    }
</script>

<style scoped>

</style>