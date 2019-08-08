<template>
    <div>
        <div>
            <input type="button" v-on:click="loadfiles" value="Reload">
            <hr>
            <div class="row">
                <div class="col-sm-4 card tiss-cursor" v-for="item in listfile"  >

                    <a   v-bind:href="'/admin/VideoCenter/play/'+item.id+'/'+item.vidoefilename">
                        <img class="card-img-top margin-top"  v-bind:src="'/media/video/'+item.id+'.jpg'" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{  item.name }}</p>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['token'],
        data(){
            return{
                listfile:[],
                filename:[]
            }
        },
        methods: {

            loadfiles:function () {
                let that=this;
                axios.post('/admin/VideoCenter/listfile')
                    .then(function (response) {
                        console.log(response.data);
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
    .margin-top{ margin-top: 20px;}
</style>
