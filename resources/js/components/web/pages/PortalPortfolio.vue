<template>
    <div>
        <div dir="ltr" class="shadow-sm container-fluid py-5 backwhite">
            <articleshow :id="25" :flag="'portfoliotop'"></articleshow>
        </div>


        <div class="container" dir="ltr">


            <div class="light-row row justify-content-center">


                <div class="col-4 col-md-3 active circle-light">
                    <div class="pointer mx-auto widthfit">
                        <div class="light-cable d-block mx-auto"></div>
                        <a :href="'/portalportfolio'">
                        <div class="light-bubble p-4 mx-auto">
                            <img src="/media/test-folder/protal.png" width="50px">
                        </div>
                        </a>
                        <div class="text-center light-title mt-2">
                            <h5>
                                Portal
                            </h5>
                        </div>
                    </div>
                </div>


                <div class="col-4 col-md-3 circle-light">
                    <div class="pointer mx-auto widthfit">
                        <div class="light-cable d-block mx-auto"></div>
                        <a :href="'/webportfolio'">
                            <div class="light-bubble p-4">
                                <img src="/media/test-folder/webdevelop.png" width="50px">
                            </div>
                        </a>
                        <div class="text-center light-title mt-2">
                            <h5>
                                Website
                            </h5>
                        </div>
                    </div>
                </div>


                <div class="col-4 col-md-3 circle-light">
                    <div class="pointer mx-auto widthfit">
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

            <div class="px-3 portfoliotype">
                <h3 class="mb-3">
                    Portal
                </h3>
                <articleshow :id="28" :flag="'afrangteamdes'"></articleshow>

            </div>

            <portfolioshow :groupid="8"></portfolioshow>

        </div>
    </div>


</template>

<script>
    export default {
        name: "PortalPortfolio"
    }
</script>

<style scoped>


</style>