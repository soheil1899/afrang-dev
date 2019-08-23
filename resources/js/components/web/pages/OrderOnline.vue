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

                    <div class="col-12 order-lg-0 order-1 col-lg-7 px-2 px-lg-5 py-4 sendmessage">
                        <h5 class="mb-5 mt-3 fontRambla">
                            Send us Your Request
                        </h5>

                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Full Name
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Phone
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Email
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Location
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm">
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
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                           value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                           value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Mobile App</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                           value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Portal</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                           value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-4 pt-1">
                                Description
                            </div>
                            <div class="col-8">
                                <textarea class="form-control form-control-sm noresize" rows="4"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-success px-4 mt-3 float-right">
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
    export default {
        name: "OrderOnline",
        data() {
            return {
                countrylist: [],
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
        },
        mounted() {
            this.reloadpage()
        }
    }
</script>

<style scoped>

</style>