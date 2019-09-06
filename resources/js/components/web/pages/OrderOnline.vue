<template>
    <div>
        <div dir="ltr" class="contacttop text-center shadow-sm">
            <h3 class="contact-title">
                Order Us
            </h3>
        </div>


        <div class="position-relative container orderus-item">
            <div class="row position-absolute">
                <div dir="ltr" class="row col-10 mx-auto p-0">

                    <div class="col-12 order-lg-0 order-1 col-lg-7 px-4 px-lg-5 py-4 sendmessage">
                        <h5 class="mb-5 mt-3 fontRambla">
                            Send us Your Request
                        </h5>

                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Full Name
                            </div>
                            <div class="col-8">
                                <input type="text" v-model="name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Phone
                            </div>
                            <div class="col-8">
                                <input type="text" v-model="phone" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Email
                            </div>
                            <div class="col-8">
                                <input type="email" v-model="email" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Location
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm" v-model="location">
                                    <option v-for="country in countrylist">{{country.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-4 border-bottom"></div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Your Request
                            </div>
                            <div class="col-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" v-model="request[0]" id="inlineCheckbox1"
                                           value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" v-model="request[1]" id="inlineCheckbox2"
                                           value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Mobile App</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" v-model="request[2]" id="inlineCheckbox3"
                                           value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Portal</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" v-model="request[3]" id="inlineCheckbox4"
                                           value="option4">
                                    <label class="form-check-label" for="inlineCheckbox4">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Description
                            </div>
                            <div class="col-8">
                                <textarea class="form-control form-control-sm noresize" rows="4" v-model="description"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-success px-4 mt-3 float-right" @click="sendemail">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>

                    </div>


                    <div class="orderonlineimage col-12 col-lg-5 d-none d-lg-block order-lg-1 order-0 p-0 position-relative">
                        <img src="/media/test-folder/orderus.png" width="100%" height="100%">
                        <div class="position-absolute"></div>

                    </div>


                </div>
            </div>
        </div>


    </div>
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
        name: "OrderOnline",
        data() {
            return {
                countrylist: [],

                name: null,
                phone: null,
                email: null,
                location: null,
                request: [],
                description: null,
            }
        },
        methods: {
            reloadpage() {
                let that = this;
                axios.post('/getcountry')
                    .then(function (response) {
                        that.countrylist = response.data;
                    });
            },
            sendemail(e) {
                let data = {
                    title: 'order',
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    location: this.location,
                    request: this.request,
                    description: this.description,
                };

                axios.post('/sendrequest', data)
                    .then(function (response) {
                        if (response.data[1] == true) {
                            Swal.fire({
                                type: 'success',
                                title: "Thank's. Your Order Send for us",
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
                    });
                });
            },
        },
        mounted() {
            this.reloadpage()
        }
    }
</script>

<style scoped>

</style>