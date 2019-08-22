<template>
    <div>
        <div dir="ltr" class="shadow-sm container-fluid py-5" style="background-color: #fff;">
            <articleshow :id="25" :flag="'portfoliotop'"></articleshow>
        </div>


        <div class="container" dir="ltr">


            <div class="light-row row justify-content-center">


                <div class="col-4 col-md-3 circle-light">
                    <div style="width: fit-content" class="pointer mx-auto">
                        <div class="light-cable d-block mx-auto"></div>
                        <a :href="'/portalportfolio'">
                            <div class="light-bubble p-4 mx-auto">
                                <img src="/media/test-folder/protal.png" width="50px">
                            </div>
                        </a>
                        <div class="text-center light-title mt-2">
                            <h5 style="font-family: Rambla; font-weight: bold; color: #444">
                                Portal
                            </h5>
                        </div>
                    </div>
                </div>


                <div class="col-4 col-md-3 active circle-light">
                    <div style="width: fit-content" class="pointer mx-auto">
                        <div class="light-cable d-block mx-auto"></div>
                        <a :href="'/webportfolio'">
                            <div class="light-bubble p-4">
                                <img src="/media/test-folder/webdevelop.png" width="50px">
                            </div>
                        </a>
                        <div class="text-center light-title mt-2">
                            <h5 style="font-family: Rambla; font-weight: bold; color: #444">
                                Website
                            </h5>
                        </div>
                    </div>
                </div>


                <div class="col-4 col-md-3 circle-light">
                    <div style="width: fit-content" class="pointer mx-auto">
                        <div class="light-cable d-block mx-auto"></div>
                        <a :href="'/mobileportfolio'">
                            <div class="light-bubble p-4">
                                <img src="/media/test-folder/mobileapp.png" width="50px">
                            </div>
                        </a>
                        <div class="text-center light-title mt-2">
                            <h5>
                                Mobile App
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-3">
                <h3 class="mb-3"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 30px">
                    Website
                </h3>
                <articleshow :id="26" :flag="'afrangteamdes'"></articleshow>
            </div>

            <portfolioshow :groupid="7"></portfolioshow>


        </div>
    </div>


</template>

<script>
    export default {
        name: "WebPortfolio"
    }
</script>

<style scoped>

    .sampleweb:hover .sampleweb-image {
        background-color: rgba(0, 0, 0, 0);
    }

    .sampleweb:hover .sampleweb-image img {
        opacity: 1;
    }

    @media (min-width: 992px) {
        .sampleweb:hover .webtext {
            margin: 0 -30px;
        }

        .webtext {
            width: 160%;
            background-color: #fff;
            z-index: 2;
            box-shadow: 0 0 10px 4px #ccc;
            margin: 0 70px;
            transition: margin 3.5s;
        }
    }

    .webtext-title {
        font-family: Rambla;
        font-weight: bold;
        text-shadow: 0 0 1px;
        color: #ef586a;
        font-size: 25px;
    }

    .sampleweb-image {
        background-color: rgba(0, 0, 0, 0.3);
        width: 100%;
        transition: background-color 1.5s;
    }

    .sampleweb-image img {
        box-shadow: 0 0 10px 4px #ccc;
        opacity: 0.8;
        transition: opacity 1.5s;
    }

    .light-row {
        height: 250px;
    }

    .circle-light {
        height: fit-content;
    }

    .circle-light.active .light-title h5 {
        color: #d8bf16 !important;
    }

    .circle-light.active .light-bubble {
        background-image: radial-gradient(circle, #f4fff3, #fdfdbe) !important;
        box-shadow: 0 0 10px 5px #fdf29d !important;
    }

    .circle-light > div:hover .light-cable {
        height: 95px;
    }

    /*.circle-light > div:hover .light-title {*/
    /*    opacity: 1;*/
    /*}*/

    /*.light-title {*/
    /*    opacity: 0;*/
    /*    transition: opacity 500ms;*/
    /*}*/

    .light-title h5 {
        font-family: Rambla;
        font-weight: bold;
        color: #444;
    }

    .light-cable {
        width: 2px;
        height: 80px;
        background-color: #cfd6c0;
        transition: height 500ms;
    }

    .light-bubble {
        border-radius: 50%;
        background-image: radial-gradient(circle, #f8ffff, #d8d3d5);
        width: fit-content;
        box-shadow: 0 0 10px 5px #d1d5d5;
    }


</style>