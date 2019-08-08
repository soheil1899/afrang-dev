<template>
    <div class="container margintop">
        <div dir="rtl">
            <a class="iconmenu iconsmind-Folder tiss-cursor " v-on:click="GroupSlider"></a>
            <a class="iconmenu iconsmind-Add tiss-cursor" v-on:click="AddSlider"></a>
        </div>
        <hr>
        <div class="row ">

                <div class=" col-12" v-if="method=='slidergroup'">
                    <h3>{{$lang.admin.Group}}</h3>
                    <ul class="list-group">
                        <li v-for="item in group" class="list-group-item">
                            <a  v-on:click="galleryshow(item.id)" class="iconmenu iconsmind-Photos tiss-cursor font-05x"></a>  |

                            <a  v-on:click="removegalleryshow(item.id)"  class="iconmenu iconsmind-Remove  tiss-cursor font-05x"></a> |
                            <a   v-on:click="editgroup(item.id)"  class="iconmenu iconsmind-Edit tiss-cursor font-05x"></a> |

                            {{ item.name }}
                        </li>
                    </ul>
                </div>
                <div v-if="method=='editgroup'">
                    <h3>{{$lang.admin.Editgroup}}</h3>

                    <form @submit="savegroup">

                        <label>{{$lang.admin.name}}</label>
                        <input  class="form-control" v-model="groupname">
                        <input type="submit" v-bind:value="$lang.admin.save" class="forn-control btn btn-success margin" >
                    </form>
                </div>
            <div v-if="method=='gallerymode'">
                <div class="row" style="width: 100%;">
                    <div class="col-12">
                            <span  v-on:click="loaditemgallery">
                      <a class="iconmenu right font-15x iconsmind-Reload tiss-cursor" ></a>
                    </span>

                    </div>

                    <h3>{{ groupname }}</h3>

                    <div class="clearfix col-sm-12">
                        <ul class="list-group">
                            <li v-for="item in slidelist" class="list-group-item">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <img v-bind:src="item.picture" style="height: 100px;">
                                  </div>
                                  <div class="col-sm-8">
                                      <form class="form" v-bind:name="'formname'+item.id" @submit='saveform($event,item.id)'>
                                          <label>{{$lang.admin.name}}</label>
                                          <input v-model:name="nameslider[item.id]" name="name" class="form-control">
                                          <label>{{$lang.admin.link}}</label>
                                          <input v-model:name="linkslider[item.id]"   name="link" class="form-control">
                                          <label>{{$lang.admin.text}}</label>
                                          <input v-model:name="titrslider[item.id]"  name="titr" class="form-control">
                                          <input type="submit" class="btn btn-primary margintop" v-bind:value="$lang.admin.Save">
                                          <input type="button"  v-bind:value="$lang.admin.Removed" class="btn btn-primary margintop" v-on:click="delitemsslide(item.id)">
                                      </form>
                                  </div>
                                  </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix col-sm-12">
                        <filemanager v-bind:insertitemParent="insertitem" :id="groupid" :token="token"  :method="'slider'" ></filemanager>
                    </div>
                    <div>
                   </div>
                <hr>
                </div>
            </div>

            </div>
    </div>
</template>

<script>
    window.axios=require('axios');
    const Swal = require('sweetalert2')

    export default {
       props: ['token'],
        data(){
            return {
                data:[],
                method:'slidergroup',
                groupid:null,
                groupname:null,
                group:[],
                slidelist:[],
                nameslider:[],
                linkslider:[],
                titrslider:[]

            }
        },
        methods: {
            saveform:function(e,id){
                let form=$('form[name="formname'+id+'"]');
                let data=form.serialize()+"&id="+id;
                axios.post('/admin/SaveOptionsSliders',data)
                .then(function (response) {
                    Swal.fire(
                        'Success',
                        '',
                        'success'

                    )
                });

                e.preventDefault();
            },
            delitemsslide(id){
                let that=this;
                let data={
                    id:id,
                }
                axios.post('/admin/DelSlider',data)
                    .then(function (response) {
                        that.loaditemgallery();

                    });
            },
            loaditemgallery:function(){
                let that=this;
                let data={
                    id:this.groupid,
                }
                axios.post('/admin/LoadSliders',data)
                    .then(function (response) {
                        that.slidelist=response.data;
                    });

            },
            removegalleryshow:function(id){
                let that=this;

                Swal.fire({
                    title: that.$lang.admin.Areyousure,
                    text:  that.$lang.admin.Youwontbeabletorevertthis,
                    type: that.$lang.admin.warning,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:that.$lang.admin.Cancel,
                    confirmButtonText: that.$lang.admin.Yesdeleteit
                }).then((result) => {

                    if (result.value) {
                        Swal.fire(
                            that.$lang.admin.Deleted,
                            that.$lang.admin.Yourgrouphasbeendeleted,
                            that.$lang.admin.success
                        );
                        let data={
                            id:id,
                        }
                        axios.post('/admin/DelGroupSlider',data)
                            .then(function (response) {
                                that.loadpage();;
                            });
                    }
                })

            },
            insertitem:function(file,method,extension){
                let that=this;
                let data={
                    file:file,
                    id:this.groupid,
                }
                axios.post('/admin/AddToSlider',data)
                    .then(function (response) {
                        that.loaditemgallery();
                    });
            },
            AddGallery:function(){

            },
            AddSlider:function(){
                this.method='editgroup';
                this.groupid=null;
                this.groupname=null;

            },
            galleryshow:function(id){
                let that=this;
                this.groupid=id;
                let data={
                    id:this.groupid,
                };
                axios.post('/admin/LoadSliderGroupInfo',data)
                    .then(function (response) {
                        that.groupname=response.data.name;
                        that.loaditemgallery();
              });
                this.method='gallerymode';


            },
            editgroup:function(id){
                this.groupid=id;
                let that=this;
                let data={
                    id:this.groupid,
                };

                axios.post('/admin/LoadSliderGroupInfo',data)
                    .then(function (response) {
                      that.groupname=response.data.name;
                 });
                this.method='editgroup';

            },
            GroupSlider:function () {
                this.method='slidergroup';
                this.loadpage();
            },
            loadpage:function(){
                let that=this;

                axios.post('/admin/LoadSliderGroup')
                    .then(function (response) {
                        that.group=response.data;
                    });
            },
            savegroup:function(e){
                let that=this;
                let data={
                    name:this.groupname,
                    id:this.groupid,
                };
                axios.post('/admin/SlideGroupSave',data)
                    .then(function (response) {
                        if(response.data.success==1){
                            that.method='slidergroup';
                            that.loadpage();
                        };
                      });
                e.preventDefault();
            }
        },

        mounted: function () {
           this.loadpage();
        }

    }

</script>