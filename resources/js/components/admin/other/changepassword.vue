<template>
    <div dir="rtl" class="margin-top">
        <div class="card">
            <div class="card-header">
                {{$lang.admin.profileedit}}
            </div>
            <div class="card-body">
                <form @submit='saveform($event)'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{$lang.admin.Password}}</label>
                        <input  type="password" v-model="newpass"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">{{$lang.admin.ConfrimPassword}}</label>
                        <input type="password" v-model="confrimpassword"   class="form-control" id="exampleInputPassword2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">{{$lang.admin.OldPassword}}</label>
                        <input  type="password"   v-model="oldpassword"   class="form-control" id="exampleInputPassword3" >
                    </div>

                    <button type="submit" class="btn btn-primary">{{$lang.admin.Save}}</button>
                </form>
               <errorshow :error="error"></errorshow>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "changepassword",
        data() {
            return {
                newpass:null,
                confrimpassword:null,
                oldpassword:null,
                error:[]
            }
        },
        methods: {
            saveform:function (e) {
                let that=this;
                let data = {
                    password: this.newpass,
                    password_confirmation: this.confrimpassword,
                    oldpassword: this.oldpassword,
                };
                axios.post('/admin/Savepassword',data)
                    .then(function (response) {
                        Swal.fire(response.data)
                        that.error=[];
                    })
                    .catch(error => {
                        that.error=error;
                    });
                e.preventDefault();
            }
        }
    }
</script>

<style scoped>

</style>