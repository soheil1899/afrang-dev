<template>
    <div class="container mt-5 mb-5 text-right " dir="rtl">
        <div class="row">
            <div class="card col-md-4 align-self-center col-xs-12">
                <div class="card-body">
                    <h4 class="card-title">تغییر شماره همراه</h4>
                    <p class="card-text" dir="rtl">{{ $lang.store.YourCurrentMobilePhone }} {{ userinforamtion.mobile }}</p>
                    <p><input class="form-control" v-model="mobile" v-bind:placeholder="userinforamtion.mobile" ></p>
                    <p><input v-on:click="changemiblenumber" type="button" class="btn btn-primary" v-bind:value="$lang.store.ChangeNumber"> </p>
                    <error :error="error"></error>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "changemobile",
        data() {
            return {
                userinforamtion: [],
                mobile:null,
                error:[]
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
            changemiblenumber(){

                let that=this;
                let data={
                    mobile:this.mobile
                };
                axios.post('/profiledetail',data)

                    .then(function (response) {
                       location.href="/profiledetail";
                    })
                    .catch(function (error) {
                        // handle error
                        that.error= error.response.data.errors;

                    });

            }
        },
        mounted: function () {
            this.loadprofiel();

        }
    }
</script>

<style scoped>

</style>