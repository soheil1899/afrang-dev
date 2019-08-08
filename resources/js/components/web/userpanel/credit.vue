<template>
    <div class="container text-center" dir="rtl">
        <h4 v-html="$lang.store.CurrentCredit"></h4>

        <h4 v-html="$lang.store.AddtoCredit"></h4>
    </div>
</template>

<script>
    export default {
        name: "credit",
        methods: {
            loadcredit(){
                let that=this;
                axios.post('/getonlinelearning')
                    .then(function (response) {
                      

                    });
            }
        },
        mounted() {
            this.loadcredit();
        }
        }
</script>

<style scoped>

</style>