<template>
    <div class="container m-t3">
            <input @click="loadvideo" class="btn btn-primary" value="دوباره خوانی">
        <video v-if="src"  controls :src="src"></video>
        {{ src }}

    </div>
</template>

<script>
    export default {
        name: "playmovie",
        props:['id'],
        data(){
            return{
                url:[],
                src:null
            }
        },
        methods:{
            loadvideo() {
                let that=this;
                let data={
                    id:this.id
                }
                axios.post('/loadvideourl',data)
                    .then(function (response) {
                       let url=response.data;
                       that.src='/play/'+url.id+'/'+url.tokennumber;
                    });
            }
        },
        mounted:function () {
            this.loadvideo();
        }
    }
</script>

<style scoped>

</style>