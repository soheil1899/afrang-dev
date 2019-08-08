<template>
    <div>
        <div  v-on:click="loadfiles"><span class="fa fa-refresh"></span>Reloaded </div>
        <select v-on:change="loadfiletoplayer" v-model="fileselect" class="form-control">
            <option value="">Select Video</option>
            <option v-for="item in listfile" v-bind:value="item">{{ item }}</option>
        </select>
        <div class="text-center">
            <video v-if="src" width="320" height="240" controls :src="src"></video>
            <br>

            <input v-if="src" v-on:click="converted" type="button" class="btn btn-success" value="Converted">

        </div>
    </div>
</template>

<script>

    export default {
        name: "convertor",
        props: ['token'],
        data(){
            return{
                listfile:[],
                fileselect:null,
                src:null
            }
        },
        methods: {
            converted:function(){
                let that=this;

               let data={
                    video:this.fileselect
                };

                axios.post('/admin/VideoCenter/Convertor',data)
                    .then(function (response) {
                       console.log(response.data);
                    });

            },
            loadfiletoplayer:function(){

                this.src='/admin/VideoCenter/master/'+this.fileselect;
            },
            loadfiles:function () {
                let that=this;



                axios.post('/admin/VideoCenter/listfileseraw')
                    .then(function (response) {
                       that.listfile=response.data;
                    });
            }
        },
        mounted: function () {
            this.loadfiles();
        }


    }
</script>

<style scoped>

</style>
