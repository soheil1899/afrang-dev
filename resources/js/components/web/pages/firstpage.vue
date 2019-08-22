<template>
    <div>

        <div dir="ltr" class="shadow-sm container-fluid"
             style="padding-top: 60px; padding-bottom: 100px;background-color: #fff;">
            <div class="row mx-0">
                <div class="col-12 order-1 order-lg-0 col-lg-5" style=" padding-top: 60px; padding-left: 60px; ">
                    <h3 class="mb-5 text-center text-lg-left"
                        style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 40px">
                        {{toppage.data1}}
<!--                        CREATE YOUR OWN BUSINESS-->
                    </h3>
                    <h3 class="mb-3 text-center text-lg-left"
                        style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #1b75bb; font-size: 25px">
                        {{toppage.data2}}
<!--                        Special Offer For Summer-->
                    </h3>
                    <a :href="'/orderonline'" class="text-center text-lg-left d-block">
                        <button style="font-family: ACME;" type="button"
                                class="btn btn-lg btn-outline-primary">
                            <i class="far fa-hand-point-right"></i>
                            Order Now
                        </button>
                    </a>
                </div>
                <div class="col-12 order-0 order-lg-1 col-lg-7">
                    <img :src="toppage.header" width="100%">
                </div>
            </div>
        </div>





<!--          Section works  -->
        <section-works></section-works>





<!--          Section options  -->
        <section-options></section-options>



<!--          Section aboutus  -->
        <articleshow :id="5" :flag="'firstpageaboutus'"></articleshow>



        <!--          Section team  -->
        <div style="padding-bottom: 150px; padding-top: 150px;" class="shadow-sm" dir="ltr">
            <div class="container">
                <div class="row mt-0 mb-5 justify-content-around">
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="12" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="7" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="8" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="9" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="10" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="11" :flag="'firstpageteampic'"></articleshow>
                    </div>
                    <div class="team-info col-6 col-lg-3 p-3 text-center">
                        <articleshow :id="13" :flag="'firstpageteampic'"></articleshow>
                    </div>




                    <div class="px-4">
                        <articleshow :id="6" :flag="'firstpageteamdes'"></articleshow>
                    </div>
                </div>


            </div>

        </div>

<!--         Section offer -->
        <div style="padding-bottom: 80px; padding-top: 80px; background-color: #f1f3f5" class="shadow-sm" dir="ltr">
            <div class="container text-center">
                <h1 style="text-shadow: 0 0 2px;font-family: ACME;font-weight: bold; font-size: 35pt;">
                    {{toppage.data3}}
<!--                    SPECIAL OFFER FOR IRANIAN CUSTOMER-->
                </h1>
                <a :href="'/orderonline'" class="mt-5 d-block mx-auto" style="width: fit-content">
                    <button type="button" class="btn btn-lg btn-outline-success px-5" style="font-family: Rambla;">
                        <i class="fas fa-check"></i>
                        ORDER NOW
                    </button>
                </a>

            </div>
        </div>


    </div>


</template>

<script>
    export default {
        name: "firstpage",

        data() {
            return {
                toppage: {
                    data1: null,
                    data2: null,
                    data3: null,
                    data4: '',
                    data5: null,
                    data6: null,
                    data7: null,
                    searchbox: null,
                    header: null,
                },
                aboutus: [],
            }
        },
        methods: {
            loadfirtspage() {
                let that = this;
                axios.post('/Loadfirstpage')
                    .then(function (response) {
                        response.data.forEach(function (element) {
                            let data2 = element.name;
                            that.toppage[data2] = element.data;
                        });
                        // that.toppage = response.data;
                    });


            }
        },
        mounted: function () {
            this.loadfirtspage();

        }

    }
</script>

<style scoped>

</style>