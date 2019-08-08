<template>

    <div>
        <div class="card">
            <div class="card-header">{{$lang.admin.FileManager}}</div>
            <div class="card-body">
                <div class="btn btn-danger" v-on:click="listfile" >{{$lang.admin.ReloadFile}}</div>
                <div id="myId" class="btn btn-primary"  >{{$lang.admin.UploadFile}}</div>
                <ul class="row listfiles" id="filelist" >
                    <li  v-for="item in listfiles" class="card text-center"  >
                        <div style="height: 130px; overflow: hidden;">
                            <img  v-on:click="insertitems('/media/'+item.method+'/'+item.idifield+'/'+item.filename,item.extension)" v-if="item.extension.includes('image') == true" v-bind:src="'/media/'+item.method+'/'+item.idifield+'/'+item.filename" class="imguploader" >
                            <div  v-if="item.extension.includes('text') == true"  class="iconmenu iconsmind-File-TextImage"></div>
                            <div  v-if="item.extension.includes('pdf') == true"  class="iconmenu iconsmind-File-TextImage"></div>
                            <div  v-if="item.extension.includes('video') == true"  class="iconmenu iconsmind-Video"></div>
                        </div>
                        <div class="row"  v-bind:id="item.id">

                            <slot name="event"></slot>
                            <div class="col-sm-12" style="font-size: 12px;">{{ item.extension }}</div>
                            <div v-on:click="delitem(item.id)" class="col-sm-12 tiss-cursor  margin" style="font-size: 12px;">{{$lang.admin.Deleted}}</div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    window.axios=require('axios');
    window.Dropzone=require('dropzone');
    export default {
        props: ['id','method','token','insertitemParent'],
        data(){
            return{
                listfiles:[]
            }
        },
        methods: {
            insertitems:function(file,extension){
                this.insertitemParent(file,this.method,extension);
            },
            listfile:function (){
                let that=this;
                let data={
                    articleid:this.id,
                    method:this.method,

                };
                axios.post('/admin/FileManager/listFile',data)
                    .then(function (response) {
                        that.listfiles=response.data;
                    });

            },
            delitem:function(id){
                let that=this;
                let data={
                    id:id,

                };
                axios.post('/admin/FileManager/Delitem',data)
                    .then(function (response) {
                        that.listfile();
                    });
            },
            loadfiles:function () {
                this.listfile();

                let that=this;

                var myDropzone = new Dropzone("div#myId", {
                    url: "/admin/FileManager/UploadFile",
                    chunking: true,
                    method: "POST",
                    maxFilesize: 400000000,
                    chunkSize: 100000,
                    parallelChunkUploads: false,
                    headers: {'X-CSRF-TOKEN': that.token}

                });

                myDropzone.on('sending', function(file, xhr, formData){
                    formData.append('id', that.id);
                    formData.append('method', that.method);
                });
                myDropzone.on('complete', function(file){
                    $('[id="myId"]').html('Upload');

                    that.loadfiles();

                });

            }
        },
        mounted: function () {

            this.loadfiles();
        }
    }

</script>
