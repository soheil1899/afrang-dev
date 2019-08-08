<template>
    <div>
        <div id="myId" class="btn btn-primary"  >{{$lang.admin.UploadFile}}</div>


    </div>
</template>

<script>
    window.Dropzone=require('dropzone');

    export default {

        name: "uploader",
        props: ['token'],
        data(){
            return{
                listfiles:[]
            }
        },
        methods: {
            loadfiles:function () {

                let that=this;

                var myDropzone = new Dropzone("div#myId", {
                    url: "/admin/VideoCenter/uploadvideofile",
                    chunking: true,
                    method: "POST",
                    maxFilesize: 4000000000000,
                    chunkSize: 50000,
                    parallelChunkUploads: true,
                    headers: {'X-CSRF-TOKEN': that.token}

                });

                myDropzone.on('sending', function(file, xhr, formData){
                   // formData.append('id', that.id);
                });
                myDropzone.on('complete', function(file){
                    $('[id="myId"]').html('Upload');


                });

            }

        }
        ,
        mounted: function () {
            this.loadfiles();
        }

        }
</script>

<style scoped>

</style>
