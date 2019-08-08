<template>
    <div class="container text-center">

        <vue-recaptcha sitekey="6LeZd6QUAAAAACd7FvdKA4xzMnPg-Z3K3CZ0h4Ri">
            <div class="mt-5 p-5 documentsshow  m-5 ">
                <articleshow :id="3"></articleshow>

                <div class="text-right">
                    <label v-text="$lang.store.YourPhoneNumber"></label>
                    <div>
                        <input readonly class="form-control"  v-bind:value="userinforamtion.mobile">
                    </div>
                    <label v-text:placeholder="$lang.store.TypeYourConfirmCode"  class="mt-2"></label>
                    <div>
                        <input class="form-control" v-model="confirmcode" v-bind:placeholder="$lang.store.TypeYourConfirmCode">
                        <a class="mt-3 btn btn-primary tiss-cursor"  v-on:click="acceptcode" v-text="$lang.store.CheckYourCode"></a>
                        <a class="mt-3 btn btn-danger tiss-cursor"    v-text:value="$lang.store.SubmitNewNumber"></a>
                        <error class="margintop" :error="error"></error>

                    </div>

                </div>

            </div>
        </vue-recaptcha>

    </div>
</template>

<script>
    import VueRecaptcha from 'vue-recaptcha';


    export default {
        name: "checkmobilephone",
        components: {VueRecaptcha},
        data() {
            return {
                error:[],

                userinforamtion: [],
                confirmcode:null,
                error:null,

            }
        },

        methods: {
            loadprofiel() {
                let that=this;
                axios.post('/profiledetail')
                    .then(function (response) {
                            that.userinforamtion=response.data;
                    });
            },
            acceptcode(){
                let that=this;
                let data={
                    confirmcode:this.confirmcode
                };
                axios.post('/checkmobilephone',data)
                    .then(function (response) {
                            location.reload();
                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;
                    });

            }

        },
        mounted: function () {
            this.loadprofiel();

        }
    };

</script>

<style scoped>
.tiss-cursor{ cursor: pointer;}
</style>