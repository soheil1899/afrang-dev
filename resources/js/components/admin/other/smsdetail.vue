<template>
    <div>
       <span v-on:click="smsdetail"> SMS Credit: {{ sms }} </span>
    </div>
</template>

<script>
    export default {
        name: "smsdetail.vue",
        data() {
            return {
                info: {}
            }
        },
        methods: {
            smsdetail() {
                axios.post('admin/smsdetail')
                    .then(function (response) {
                        console.log(response);
                    });
            }
        },
        mounted: function () {
            this.smsdetail();

        }
    }
</script>

<style scoped>

</style>