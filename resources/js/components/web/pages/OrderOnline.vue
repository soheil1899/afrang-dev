<template>
    <div>
        <div dir="ltr" class="top-contact text-center shadow-sm" style="background-color: #deeaf3; height: 400px">
            <h3 class="contact-title"
                style="font-family: Rambla; text-shadow: 0 0 1px; font-weight: bold; color: #333; padding-top: 50px; font-size: 50px">
                Order Us
            </h3>
        </div>


        <div class="position-relative container orderus-item">
            <div class="row position-absolute" style=" top: -200px; width: 100%">
                <div dir="ltr" class="row col-10 mx-auto p-0"
                     style="overflow: hidden; height: fit-content; box-shadow: 0 2px 10px 5px #bbb; border-radius: 7px">

                    <div class="col-12 order-lg-0 order-1 col-lg-7 px-2 px-lg-5 py-4" style="background-color: #fff; color: #333">
                        <h5 class="mb-5 mt-3" style="font-family: Rambla">
                            Send us Your Request
                        </h5>

                        <form action="" method="post">
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
                                    <textarea class="form-control form-control-sm" rows="4" style="resize: none"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-success px-4 mt-3 float-right">
                                <i class="fas fa-paper-plane"></i>
                                Send
                            </button>
                        </form>

                    </div>


                    <div class="col-12 col-lg-5 d-none d-lg-block order-lg-1 order-0 p-0 position-relative">
                        <img src="/media/test-folder/orderus.png" width="100%" height="100%">
                        <div class="position-absolute"
                             style="width: 100%; height: 100%; top: 0; left: 0; background-color: rgba(0,0,0,0.1)"></div>

                    </div>


                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "OrderOnline",
        data(){
            return{
                countrylist: [],
            }
        },
        methods:{
            reloadpage(){
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