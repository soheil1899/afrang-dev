<template>
    <div dir="rtl" class="margin-top">
        <div class="card">
            <div class="card-header">
                {{$lang.admin.profileedit}}
            </div>
            <div class="card-body">
                <form @submit='saveform($event)'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{$lang.admin.name}}</label>
                        <input  v-model="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">{{$lang.admin.email}}</label>
                        <input type="email" v-model="email"  required class="form-control" id="exampleInputPassword2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">{{$lang.admin.mobile}}</label>
                        <input  class="form-control"  v-model="mobile" id="exampleInputPassword3" >
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
        name: "ProfileEdit",
        data() {
            return {
                name:null,
                email:null,
                mobile:null,
                error:[]
            }
        },
        methods: {
            saveform:function(e){
                let that=this;
                let data = {
                    name: this.name,
                    email: this.email,
                    mobile: this.mobile,
                };
                axios.post('/admin/Saveprofileedit',data)
                    .then(function (response) {
                        Swal.fire(response.data);


                    })
                    .catch(error => {
                        that.error=error;
                    });
              e.preventDefault();


            },
            loadfunction:function () {
                let that=this;
                axios.post('/admin/LoadprofileInformations')
                    .then(function (response) {
                        console.log(response.data);
                        that.name=response.data.name;
                        that.email=response.data.email;
                        that.mobile=response.data.mobile;
                    });
            },
        },
        mounted: function () {
            this.loadfunction();
        }

    }
</script>

<style scoped>
.margin-top{ margin-top: 5%;}
</style>