<template>
    <div>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">

            <li class="dropdown order-1">
                <a id="dropdownMenu1" data-toggle="dropdown"
                   class="tiss-cursor  " @click="checklogin">کاربری <span class="caret"></span></a>
                <ul v-if="login==true" class="dropdown-menu dropdown-menu-right mt-2 text-right p-2">
                    <div dir="rtl" class="m-2">{{ $lang.website.wellcome }} {{ info.name }}</div>
                    <small><a href="/home" class="btn btn-success   w-100 mt-2" v-text="$lang.website.Profile"></a>
                    </small>
                    <small><a href="/logout" class="btn btn-danger w-100 mt-2" v-text="$lang.website.Quit"></a></small>
                </ul>
                <ul v-if="login==false" class="dropdown-menu dropdown-menu-right mt-2">
                    <li class="px-6 py-2">
                        <form class="form m-3" @submit.prevent="loginuser" role="form">
                            <div class="form-group">
                                <input id="emailInput" placeholder="ایمیل" class="form-control form-control-sm "
                                       type="email" v-model="email" required="">
                            </div>
                            <div class="form-group">
                                <input id="passwordInput" placeholder="رمز عبور"
                                       v-model="password" class="form-control form-control-sm" type="password" required="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">ورود</button>
                            </div>
                            <div class="form-group text-center">
                                <div>
                                    <small><a href="#" data-toggle="modal" data-target="#modalPassword"
                                              v-text="$lang.website.forgetpass"></a></small>
                                </div>
                                <div>
                                    <error :error="error"></error>
                                    <a href="/register" v-text="$lang.website.regsiter"></a>
                                </div>

                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>

</template>

<script>
    export default {
        name: "login",
        data() {
            return {
                login: false,
                info: [],
                error: [],
                email: null,
                password: null
            }
        },
        methods: {


            checklogin() {
                let that = this;
                axios.post('/checklogin')
                    .then(function (response) {
                        that.info = response.data;
                        that.login = true;

                    })
                    .catch(function (error) {
                        that.login = false;
                    });
            },
            loginuser:function() {
                let data = {
                    email: this.email,
                    password: this.password
                };
                let that = this;
                axios.post(`/login`, data)
                    .then(function (response) {
                        location.reload();
                    })
                    .catch(function (error) {
                        // handle error
                        that.error = error.response.data.errors;

                    });
            },
        },
        mounted: function () {
            this.checklogin();

        }
    }
</script>

<style scoped>

</style>