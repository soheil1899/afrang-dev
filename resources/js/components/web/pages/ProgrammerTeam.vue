<template>

    <div class="team-details shadow-sm" dir="ltr">
        <div class="container">
            <h3 class="mb-5 team-title">
                The Afrang Programmer Team
            </h3>
            <articleshow :id="22" :flag="'afrangteamdes'"></articleshow>


            <div class="row mx-0 myteam-info justify-content-around">
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="15" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="16" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="17" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="18" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="19" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="20" :flag="'afrangteam'"></articleshow>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <articleshow :id="21" :flag="'afrangteam'"></articleshow>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProgrammerTeam"
    }
</script>

<style scoped>

</style>