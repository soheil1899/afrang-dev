<template>
    <div style="padding-top: 150px; padding-bottom: 150px; background-color: #f1f3f5" class="shadow-sm" dir="ltr">
        <div class="container">
            <div class="row firstpage-works">

                <div class="col-12 mb-5 mb-lg-0 col-md-4 px-5 text-center firstpage-works">
                    <articleshow :id="1" :flag="'firstpagework'"></articleshow>
                </div>
                <div class="col-12 mb-5 mb-lg-0 col-md-4 px-5 text-center firstpage-works">
                    <articleshow :id="2" :flag="'firstpagework'"></articleshow>
                </div>
                <div class="col-12 mb-5 mb-lg-0 col-md-4 px-5 text-center firstpage-works">
                    <articleshow :id="3" :flag="'firstpagework'"></articleshow>
                </div>
            </div>
        </div>


    </div>

</template>

<script>

    export default {
        name: "Works",
    }
</script>

<style scoped>


</style>