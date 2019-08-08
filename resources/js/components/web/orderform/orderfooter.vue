<template>
    <div  dir="rtl">
        <form v-if="sendmail==false" class="form" @submit="sendarticle">

            <input required class="form-control form-control-sm my-2" v-bind:placeholder="$lang.admin.YourName" v-model="name">
            <input required class="form-control form-control-sm my-2" v-bind:placeholder="$lang.admin.YourEmail" v-model="email">
            <input required class="form-control form-control-sm my-2" v-bind:placeholder="$lang.admin.YourPhoneNumber" v-model="phone">
            <textarea required class="form-control form-control-sm my-2" v-bind:placeholder="$lang.admin.YourMessege" v-model="messege"></textarea>
            <input type="submit" class="form-control btn btn-success form-control-sm" v-bind:value="$lang.admin.SendRequest">

        </form>
        <div  v-if="sendmail==true" class="text-white">
            درخواست شما ارسال گردید
        </div>
    </div>

</template>

<script>
    window.Swal=require('sweetalert2');

    export default {
      //  props:['id'],
        data(){
            return{
                name:null,
                email:null,
                phone:null,
                messege:null,
                sendmail:false
            }
        },
        methods: {
            sendarticle:function (e) {
                let that=this;
                let data={
                    name:this.name,
                    email:this.email,
                    phone:this.phone,
                    messege:this.messege,


                };

                axios.post('/sendrequest',data)
                    .then(function (response) {
                        if(response.data.accept==0){
                            Swal ( "خطا" , response.data.messege.email[0],  "error" )

                        }
                        if(response.data.accept==1) {

                            that.sendmail=true;
                        }
                    });
                e.preventDefault();
            }

        },
        mounted: function () {

        }
    }

</script>
