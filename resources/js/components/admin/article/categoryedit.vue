<template>
    <div id="geoupedit" >


        <ul class="breadcrumb"  id="groupmanager">
            <li><a href="/admin">{{$lang.admin.Dashboard}}</a> <span class="divider">/</span></li>
            <li><a href="/admin/ArticleCategory">{{$lang.admin.ArticleCategory}}</a> <span class="divider">/</span></li>
            <li class="active">{{$lang.admin.GroupEditor}}</li>
        </ul>
        <div class="container-fluid">

            <h3 v-if="id != null">{{$lang.admin.Editgroup }}</h3>
            <h3 v-if="id == null">{{$lang.admin.Newgroup }}</h3>
            <hr>
            <form class="form" >
                <select class="form-control" v-on:change="getdata()" v-model="lang">
                    <option v-for="item in language"  v-bind:value="item.id">{{ item.orgianlname }}</option>
                </select>
                <div class="row">
                    <div class="col-sm-6 col-xs-12  ">
                        <div class="form-group">
                            <label>{{$lang.admin.GroupName}}</label>
                            <input type="text" v-on:keyup="nametourl()" required v-model="name" class="form-control col-xs-12">
                        </div>
                        <div class="form-group">

                            <label>{{$lang.admin.UrlName}}</label>
                            <input type="text" required  v-on:keyup="urlnameedit()" v-model="url" dir="ltr" class="form-control col-xs-12">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <img v-bind:src="thumpload">
                        <span v-if="thumpload!=null">
                        <span class="iconmenu iconsmind-Recycling tiss-cursor" v-on:click="removeimage"></span>
                    </span>
                    </div>
                </div>

                <div class="form-group">

                    <label>{{$lang.admin.text}}</label>
                    <textarea v-model="text"   class="form-control"></textarea>
                </div>
                <div class="form-group">

                    <label>{{$lang.admin.description}}</label>
                    <textarea v-model="description" class="form-control"></textarea>
                </div>
                <div class="form-group">

                    <label>{{$lang.admin.keywords}}</label>
                    <vue-tags-input    v-model="tag" :tags="tags" @tags-changed="newTags => tags = newTags"  />
                </div>
                <div class="form-group">

                    <label>{{$lang.admin.thump}}</label>
                    <input  ref="thump" type="file" >
                </div>
                <input type="button" v-on:click="savegrouparticle($event,'/admin/ArticleCategory/SaveCategory')" class="btn btn-primary "   v-bind:value="$lang.admin.Save">
            </form>
        </div>
    </div>

</template>
<script>
    import VueTagsInput from '@johmun/vue-tags-input';
    const Swal = require('sweetalert2')

    export default {
        props:['id'],
        components: {
            VueTagsInput,

        },
        data(){
            return{
                titlepage:null,
                name:null,
                //id:null,
                url:null,
                text:null,
                description:null,
                keywords:null,
                thump:[],
                tag: '',
                thumpload:null,
                tags: [],
                lang:null,
                language:[]

            }
        },
        methods: {
            idset:function(id){
                this.id=id;
            },
            nametourl: function () {

                if (this.id == null) {

                    this.url=this.name.replace(/ /g, '-');
                    this.url=this.url.replace(/\//g, '-');
                    this.url=this.url.replace(/\?/g, '-');

                }
            },
            uploadFile:function(){

            },
            urlnameedit:function(){
                this.url=this.url.replace(/ /g, '-');
                this.url=this.url.replace(/\//g, '-');
                this.url=this.url.replace(/\?/g, '-');

            },

            loaddatagroup:function(){
                let data={
                    id:this.id,
                    lang:this.lang
                }
                let that=this;
                axios.post('/admin/ArticleCategory/LoadCategroyData',data)
                    .then(function (response) {
                        console.log(response.data);
                        that.name=response.data.name;
                        that.url=response.data.url;
                        that.description=response.data.description;
                        that.text=response.data.text;
                        that.lang=response.data.lang;

                        that.tags=JSON.parse(response.data.keywords);
                        if(response.data.thump!=null){
                            that.thumpload=response.data.thump;

                        }
                    })

            },
            removeimage:function(){

                Swal.fire({
                    title: this.$lang.messages.hello_world,
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            },
            savegrouparticle: function (e, route) {
                let that=this;
                let formData = new FormData();
                formData.append('thump', this.$refs.thump.files[0]);
                formData.append('url', this.url);
                formData.append('keywords',JSON.stringify(this.tags));
                formData.append('description',this.description );
                formData.append('text', this.text);
                formData.append('name', this.name);
                formData.append('id', this.id);
                formData.append('lang', this.lang);
                axios.post(route
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(function (response) {
                        Swal(that.$lang.admin.SavedGroup);


                    })
                    .catch((error) => {
                        console.log(error);
                    });

                e.preventDefault();
            },
            getdata:function(){
                if (this.id == null) {
                    this.titlepage = "New Group Article";

                }else{
                    this.titlepage = "Edit Group Article";
                    this.loaddatagroup();
                }
            },
            grouploadeditor: function () {
                let that=this;
                axios.post('/getlang')
                    .then(function (response) {
                        that.language=response.data;
                        that.lang=1;
                        that.getdata();
                    });


            }
        },
        mounted: function () {
            this.grouploadeditor();
        }
    }

</script>
