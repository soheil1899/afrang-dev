<template>
    <div  class="text-center">

            <video controls autoplay v-bind:src="'/admin/VideoCenter/getWatch/'+id+'/640'"></video>
        <div>
            <input v-model="name" class="form-control text-center">
            <input type="button" class="btn btn-primary" v-on:click="loadfile" v-bind:value="$lang.admin.Reload">
            <input type="button" v-on:click="rename"  class="btn btn-primary"  v-bind:value="$lang.admin.Save">

        </div>

    </div>
</template>

<script>

    export default {
        name: "player",
        props: ['token','id'],

        data(){
            return{
                sections:[],
                id:null,
                video:null,
                name:null
            }
        },
        methods: {
            rename:function(){
                let that=this;
                let data={
                    video:this.id,
                    name:this.name

                };
                axios.post('/admin/VideoCenter/RenameVideoFile',data)
                    .then(function (response) {
                        that.name=response.data.name;
                    })
            },
            loadfile:function () {
                let that=this;
                let data={
                    video:this.id,

                };
                axios.post('/admin/VideoCenter/LoadVideoFile',data)
                    .then(function (response) {
                        that.name=response.data.name;
                    })


            }
        },
        mounted: function () {
            this.loadfile();
        }

    }
</script>

<style scoped>
.g-box-full{ background-color: red;}
</style>
