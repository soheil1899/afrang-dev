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
                                <input type="text" v-model="fullname" placeholder="Full Name"
                                       class="form-control form-control-sm mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="email" v-model="emailaddress" placeholder="Email Address"
                                       class="form-control form-control-sm mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" v-model="phonenumber" placeholder="Phone"
                                       class="form-control form-control-sm mb-3">
                            </div>
                            <div class="col-12 col-md-6 px-2 ">
                                <input type="text" v-model="subject" placeholder="Subject"
                                       class="form-control form-control-sm mb-3">
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="px-2 col-12">
                                    <textarea v-model="message" class="form-control form-control-sm"
                                              placeholder="Your Message ..."
                                              rows="5"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-success px-4 float-right" @click="sendemail">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>


                    </div>


                    <div class="contactinfo col-12 col-lg-5 order-lg-1 order-0 p-5">
                        <h5 class="mb-5 mt-3 fontRambla">
                            Contact Information
                        </h5>


                        <div class="row mx-0 mb-3">
                            <i class="fas fa-phone-alt fa-lg mr-2 mt-1 icons"></i>

                            <label class="icons">
                                {{mobile}}
                            </label>
                        </div>

                        <div class="row mx-0 mb-3">
                            <i class="fas fa-mobile-alt fa-lg mr-2 mt-1 icons"></i>

                            <label class="icons">
                                {{phone}}
                            </label>
                        </div>

                        <div class="row mx-0 mb-3">
                            <i class="far fa-envelope fa-lg mr-2 mt-1 icons"></i>

                            <label class="icons">
                                {{email}}
                            </label>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
        name: "ContactUs",
        data() {
            return {
                mobile: null,
                phone: null,
                email: null,

                fullname: null,
                subject: null,
                emailaddress: null,
                phonenumber: null,
                message: null,
            }
        },
        methods: {
            sendemail(e) {
                let data = {
                    title: 'message',
                    name: this.fullname,
                    email: this.emailaddress,
                    phone: this.phonenumber,
                    subject: this.subject,
                    mymessage: this.message,
                };

                axios.post('/sendrequest', data)
                    .then(function (response) {
                        if (response.data[1] == true) {
                            Swal.fire({
                                type: 'success',
                                title: "Thank's. Your Message Send for us",
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                    }).catch((error) => {
                    Swal.fire({
                        type: 'error',
                        title: 'Please Complete All Filed',
                        showConfirmButton: false,
                        timer: 3000
                    })
                });
            },

            loading() {
                axios.post('/getmysetting')
                    .then(function (response) {
                        this.mobile = response.data.phone;
                        this.phone = response.data.otherphone;
                        this.email = response.data.email;
                    }.bind(this));
            }
        },
        mounted() {
            this.loading();
        }
    }
</script>

<style scoped>

</style>