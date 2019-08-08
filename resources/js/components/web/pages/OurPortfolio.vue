<template>

    <div class="container" dir="ltr">


        <div class="light-row row justify-content-center">


            <div class="col-3 pointer circle-light">
                <div class="light-cable d-block mx-auto"></div>
                <div class="light-bubble p-4 mx-auto">
                    <img src="/media/test-folder/protal.png" width="50px">
                </div>
            </div>


            <div class="col-3 pointer circle-light">
                <div class="light-cable d-block mx-auto"></div>
                <div class="light-bubble p-4 mx-auto">
                    <img src="/media/test-folder/webdevelop.png" width="50px">
                </div>
            </div>


            <div class="col-3 pointer circle-light">
                <div class="light-cable d-block mx-auto"></div>
                <div class="light-bubble active p-4 mx-auto">
                    <img src="/media/test-folder/mobileapp.png" width="50px">
                </div>
            </div>


        </div>

        <div>
            <h3 class="mb-3"
                style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 30px">
                Mobile App
            </h3>
            <div>
                <p class="team-desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam beatae culpa eligendi eum expedita
                    facere facilis fugit hic inventore ipsa labore laborum neque officia perferendis praesentium sint
                    suscipit tempore, tenetur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam beatae
                    culpa eligendi eum expedita
                    facere facilis fugit hic inventore ipsa labore laborum neque officia perferendis praesentium sint
                    suscipit tempore, tenetur!
                </p>
            </div>
        </div>


        <div class="row sampleweb my-5 py-5">
            <div class="col-3 position-relative pt-5">
                <div class="col-5 position-absolute p-4">
                    <h3 class="mb-3"
                        style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 25px">
                        Foodme App
                    </h3>
                </div>
            </div>
            <div class="col-9 p-0 sampleweb-image">
                <img src="/media/test-folder/sampleweb.jpg" width="100%">
            </div>

        </div>


    </div>


</template>

<script>
    export default {
        name: "OurPortfolio"
    }
</script>

<style scoped>

    .sampleweb .position-absolute {
        height: auto;
        width: 100%;
        top: 0;
        right: -100px;
        background-color: #cccccc;
    }

    .sampleweb-image {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .sampleweb-image img {
        box-shadow: 0 0 10px 4px #ccc;
        opacity: 0.8;
    }

    .light-row {
        height: 250px;
    }

    .circle-light {
        height: fit-content;
    }
    .circle-light:hover .light-cable {
        height: 95px;
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

    .active {
        background-image: radial-gradient(circle, #f4fff3, #fdfdbe) !important;
        box-shadow: 0 0 10px 5px #fdf29d !important;
    }

</style>