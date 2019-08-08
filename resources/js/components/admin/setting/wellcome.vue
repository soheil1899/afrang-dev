<template>
    <div dir="rtl" id="wellcome">
        <nav class="navbar navbar-expand-lg navbar-light ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto text-right" dir="rtl">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$lang.admin.Settings}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/profile">{{$lang.admin.editprofile}}</a>
                            <a class="dropdown-item" href="/admin/changepassword">{{$lang.admin.ChangePassword}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item red-text" href="/logout">{{$lang.admin.Exit}}</a>
                        </div>
                    </li>

                </ul>

            </div>
            <a class="navbar-brand orangtext" href="#">{{ username}} {{$lang.admin.Wellcome}}</a>

        </nav>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                username:null,
            }
        },
        methods: {
            loadfunction:function () {
                let that=this;
                axios.post('/admin/LoadprofileInformation')
                    .then(function (response) {
                        that.username=response.data;
                    });
            },
        },
        mounted: function () {
            this.loadfunction();
        }
   }
</script>
<style scoped>
.orangtext{ color:orange; font-size: 12px;}
    .text-right{ text-align: right;}
    .red-text{ color:red;}
    .dropdown-item{ text-align: right; direction: rtl;}
</style>