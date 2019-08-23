<template>
    <div>

        <div dir="ltr" class="shadow-sm container-fluid firsttop">
            <div class="row mx-0">
                <div class="col-12 order-1 padding60 order-lg-0 col-lg-5">
                    <h3 class="mb-5 text-center text-lg-left toptitle">
                        {{toppage.data1}}
                    </h3>
                    <h3 class="mb-3 text-center text-lg-left topoffer">
                        {{toppage.data2}}
                    </h3>
                    <a :href="'/orderonline'" class="text-center text-lg-left d-block">
                        <button type="button"
                                class="btn btn-lg btn-outline-primary fontAcme">
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
        <div class="shadow-sm padding150" dir="ltr">
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
        <div class="shadow-sm bottomofer" dir="ltr">
            <div class="container text-center">
                <h1>
                    {{toppage.data3}}
                </h1>
                <a :href="'/orderonline'" class="mt-5 d-block mx-auto widthfit">
                    <button type="button" class="btn btn-lg btn-outline-success px-5 fontRambla">
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