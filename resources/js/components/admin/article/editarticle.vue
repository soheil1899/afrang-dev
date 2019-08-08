<template>


    <div id="articlemanager" class="container padding" >

        <ul class="breadcrumb"  id="groupmanager">
            <li><a href="/admin">{{$lang.admin.Dashboard}}</a> <span class="divider">/</span></li>
            <li><a href="/admin/Article/ArticleList">{{$lang.admin.ArticleManager}}</a> <span class="divider">/</span></li>
            <li class="active">{{$lang.admin.ArticleEditor}}</li>
        </ul>
        <div class="container-fluid">


            <form v-if="id==null" @submit="createnewarticle">
                <h2>{{$lang.admin.NewArticle}}</h2>

                <div class="form-group ">
                    <label>{{$lang.admin.ArticleName}}</label>
                    <input type="text" v-on:keyup="nametourl()"  v-model="name" required class="form-control col-xs-12">
                </div>
                <div class="form-group">
                    <label>{{$lang.admin.UrlName}}</label>
                    <input type="text"  v-on:keyup="urlnameedit()"  v-model="url" required class="form-control col-xs-12">
                </div>

                <div class="form-group">
                    <label>{{$lang.admin.GroupSelect}}</label>
                    <select  v-model="group" class="form-control col-3" >
                        <option v-for="item in listgroup" v-bind:value="item.id"  >{{ item.name }} -{{ item.to_lang.orgianlname }}</option>
                    </select>
                    <hr>

                </div>
                <input type="submit" class="btn btn-success" value="Next">
            </form>
        </div>
        <form v-if="id!=null" @submit="createnewarticle">
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group ">
                        <label>{{$lang.admin.ArticleName}}</label>
                        <input type="text" v-on:keyup="nametourl()"  v-model="name" required class="form-control col-xs-12">
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.UrlName}}</label>
                        <input type="text"  v-on:keyup="urlnameedit()"  v-model="url" required class="form-control col-xs-12">
                    </div>

                    <div class="form-group">
                        <label>{{$lang.admin.GroupSelect}}</label>
                        <select  v-model="group" class="form-control  col-12" >
                            <option  v-for="item in listgroup" v-bind:value="item.id">
                                {{ item.name }} -{{ item.to_lang.orgianlname }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.writter}}</label>
                        <input type="text"   v-model="writter"  class="form-control col-xs-12">
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.SpecialPage}}</label>
                        <select class="form-control"  v-model="special">
                            <option v-bind:value="0">{{$lang.admin.No}}</option>
                            <option v-bind:value="1">{{$lang.admin.Yes}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.reference}}</label>
                        <input type="text"   v-model="reference"  class="form-control col-xs-12">
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.keywords}}</label>
                        <textarea type="text"   v-model="keywords"  class="form-control col-xs-12"></textarea>
                    </div>
                    <div class="form-group">
                        <label>{{$lang.admin.description}}</label>
                        <textarea type="text"   v-model="description"  class="form-control col-xs-12"></textarea>
                    </div>
                    <input type="submit" class="btn btn-dark" v-bind:value="$lang.admin.save">
                </div>
                <div class="col-sm-9">
                    <h3>{{ name }}</h3>
                    <hr>
                    <div class="btn  btn-dark float-left" v-on:click="addmaster" >
                        <span   class="iconsmind  tiss-cursor iconsmind-Files tiss-cursor"></span>
                        <span style="font-size: 10px;">{{$lang.admin.MasterPictrue}}</span>
                    </div>
                    <div>
                        <ul class="listarticlemodules">

                            <li  v-for="item in listmodule"  v-on:click="loadcomponent(item.name)" v-bind:class="'iconmenu '+item.icon+' tiss-cursor'"></li>
                            <li class="iconmenu iconsmind-Reload-3 tiss-cursor" v-on:click="loadartilce"></li>

                        </ul>

                    </div>


                    <div class="clearfix"></div>
                    <div class="row margintop" >
                        <div class="col-sm-12" >
                            <div  v-if="showModal" class="editorboxs" @close="showModal = false" >
                                <h3 slot="header">{{ titlemodal }} </h3>
                                <div slot="body">


                                    <div v-if="mode=='addmaster'">
                                        <img style="width: 100%;" v-bind:src="masterpicture">
                                    </div>
                                    <div v-if="mode == 'Title'">
                                        <input class="form-control " v-model="values" >

                                    </div>
                                    <div v-if="mode == 'Paragraph'">
                                        <editor   v-model="editordata"  ref="editor" api-key="qc1sdre33bdx4lkj24aw4ffoeyx1rvbohr9ow2hzhjgfu2mi" :init="{plugins: 'wordcount','directionality': 'rtl','height':800}"></editor>

                                    </div>
                                    {{ mode }}
                                    <div v-if="mode == 'Images'">
                                        <img v-bind:src="Images" style="width: 100%;">
                                    </div>
                                    <div v-if="mode == 'Gallery'">
                                        <select  v-model="values"  class="form-control">
                                            <option  v-for="item in gallerylist" v-bind:value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                    <div slot="filemanager">
                                        <div >

                                            <filemanager v-bind:insertitemParent="insertitem" :id="id" :token="token"  :method="'article'" >

                                            </filemanager>
                                        </div>

                                    </div>
                                </div>
                                <div slot="footer">
                                    <a class="  btn btn-danger text-white " v-on:click="showModal=false" >
                                        {{$lang.admin.Close}}
                                    </a>
                                    <a class="  btn btn-primary" v-on:click="addtoarticle" >
                                        {{$lang.admin.Add}}
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12" v-for="item in ListContent">
                            <aritclesection :id="item.id">
                                <div  slot="options">
                                    <span v-on:click="editcontent(item.id)" class="iconsmind  tiss-cursor  iconsmind-Edit fontsize30" ></span>

                                    <span v-on:click="deletecontent(item.id)" class="iconsmind  tiss-cursor iconsmind-Recycling fontsize30" ></span>
                                    <div class="float-left">
                                        <span v-on:click="orderdchange('Top',item.id)" class="iconsmind  tiss-cursor iconsmind-Up fontsize20" ></span>
                                        <span v-on:click="orderdchange('Down',item.id)" class="iconsmind  tiss-cursor iconsmind-Down fontsize20" ></span>

                                    </div>
                                </div>
                                <div v-if="item.methods=='Title'" slot="body">
                                    <h1> {{ item.title }}</h1>
                                </div>
                                <div v-if="item.methods=='Paragraph'" slot="body">
                                    <div v-html="item.Text"></div>

                                </div>
                                <div v-if="item.methods=='Gallery'" slot="body">
                                    GALLERY  {{ item.title }}

                                </div>


                                <div v-if="item.methods=='Images'" slot="body">

                                    <img v-bind:src="item.title"  style="width: 100%;">

                                </div>

                            </aritclesection>

                        </div>
                    </div>

                </div>
            </div>
            <div>
            </div>
        </form>
        <ul v-for="item in error">

            <li v-for="items in item" >{{ items }}</li>
        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

</template>

<script>
    window.axios=require('axios');
    import Editor from '@tinymce/tinymce-vue';
    // var Editor = require('@tinymce/tinymce-vue').default;
    export default {
        props:['id','token'],
        data(){
            return {
                name: null,
                url: null,
                listgroup: [],
                group: null,
                error: [],
                writter: null,
                reference: null,
                blockfunction: false,
                listmodule: [],
                articleid: null,
                Images:null,
                keywords:null,
                special:0,
                description:null,
                showModal: false,
                titlemodal: null,
                values: null,
                sectionid: null,
                mode: null,
                masterpicture: null,
                editid: null,
                gallerylist:[],
                ListContent: [],
                data: [],
                editordata:null,


            };
        },
        components: {
            'editor': Editor // <- Important part
        },
        methods: {
            insertitem:function(file,method,extension){

                if(this.mode=='Images'){

                    if(extension.includes('image') == true){

                        this.Images=file;

                    }
                }


                if(this.mode=='Paragraph'){

                    if(extension.includes('image') == true){
                        //this.editorData+='<img style="width: 100%;" src="'+file+'">';
                        this.editordata=this.editordata+'<img style="width: 100%;" src="'+file+'">';
                    }
                }
                if(this.mode=='addmaster'){
                    this.masterpicture=file;

                }
            },
            filemanager:function(id,method){

            },
            orderdchange:function(ordred,id){
                let data={
                    ordred:ordred,
                    id:this.id,
                    method:id
                };
                let that=this;
                axios.post('/admin/Article/ChangeOrderSection',data)
                    .then(function (response) {
                        that.loadartilce();

                    });

            },

            loadcomponent:function(name){

                this.editid=null;
                let data={
                    articleid:this.articleid,
                    methods:name,
                };

                this.showModal=true;
                let that=this;
                axios.post('/admin/Article/LoadContentEditor',data)
                    .then(function (response) {
                        if(response.data.method=='Title'){
                            that.title();
                        }
                        if(response.data.method=='Paragraph'){
                            that.Paragraph();
                        }

                        if(response.data.method=='Gallery'){
                            that.Gallery();
                        }
                        if(response.data.method=='Image'){
                            that.Image();
                        }
                    });


            },
            Image:function(){
                this.titlemodal="Image";
                this.mode='Images';


            },
            Gallery:function(){
                this.titlemodal="Gallery";
                this.mode='Gallery';
                let that=this;

                axios.post('/admin/LoadSliderGroup')
                    .then(function (response) {
                        that.gallerylist=response.data;

                    });

            },
            Paragraph:function(){
                this.titlemodal="Paragraph";
                this.mode='Paragraph';

            },
            title:function(){
                this.titlemodal="Add Title";
                this.mode='Title';


            },

            deletecontent:function(id) {
                let data = {
                    articleid: this.id,
                    delitem: id,
                };
                let that=this;
                axios.post('/admin/Article/DelContent', data)
                    .then(function (response) {
                        that.loadpage();
                    });

            },
            editcontent:function(id){
                let data = {
                    id: id,
                };
                let that=this;
                axios.post('/admin/Article/EditSection',data)
                    .then(function (response) {
                        console.log(response.data);
                        that.mode=response.data.methods;
                        that.showModal=true;
                        if(that.mode=='Paragraph'){
                            that.editordata=response.data.Text;
                        }
                        if(that.mode=='Title'){
                            that.values=response.data.title;
                        }
                        if(that.mode=='Images'){
                            that.values=response.data.title;
                        }
                        if(that.mode=='Gallery'){


                            let seletedthis=response.data.title;

                            axios.post('/admin/ArticleCategory/LoadGroupList')
                                .then(function (response) {
                                    that.listgroup=response.data;
                                    that.values=seletedthis;

                                });

                        }
                        that.editid=response.data.id;

                    });
            },
            addmaster:function(){
                this.mode='addmaster';
                this.showModal=true;
                this.titlemodal="Master Picture";

            },
            addtoarticle:function(){

                let that=this;
                if(this.mode=='Title'){
                    this.data={
                        values:this.values,
                        id:this.id,
                        mode:this.mode,
                        edit:this.editid
                    };
                }
                if(this.mode=='Images'){
                    this.data={
                        values:this.Images,
                        id:this.id,
                        mode:this.mode,
                        edit:this.editid
                    };
                }
                if(this.mode=='Gallery'){
                    this.data={
                        values:this.values,
                        id:this.id,
                        mode:'Gallery',
                        edit:this.editid
                    };
                }

                if(this.mode=='Paragraph'){

                    this.data={
                        values:this.editordata,
                        id:this.id,
                        mode:this.mode,
                        edit:this.editid

                    };
                }
                axios.post('/admin/Article/SaveSection',this.data)
                    .then(function (response) {
                        if(response.data.method==true){
                            that.values=null;
                            // that.editorData=null;
                            that.showModal=false;
                            that.loadpage();
                        }
                    });
            },
            loadpage:function() {

                this.grouploader();
                if(this.id!=null){
                    this.loadartilce();
                };
                this.loadlistmodule();

            },

            loadlistmodule:function(){
                let that=this;
                axios.post('/admin/Article/LoadModule')
                    .then(function (response) {
                        that.listmodule=response.data;
                    });
            },
            loadartilce:function(){
                if(this.id!=null){
                    let data={
                        id:this.id
                    }

                    let that=this;
                    axios.post('/admin/Article/LoadArticleData',data)

                        .then(function (response) {
                            console.log(response.data.to_content);
                            that.writter=response.data.writter;
                            that.reference=response.data.reference;
                            that.ListContent=response.data.to_content;
                            that.name=response.data.name;
                            that.masterpicture=response.data.thump;
                            that.url=response.data.url;
                            that.group=response.data.to_group[0].id;
                            that.keywords=response.data.description;
                            that.description=response.data.description;
                            that.special=response.data.special;
                        });
                };

            },
            nametourl: function () {
                if (this.id == null) {
                    this.url=this.name.replace(/ /g, '-');
                    this.url=this.url.replace(/\//g, '-');
                    this.url=this.url.replace(/\?/g, '-');
                };
            },
            idset:function(id){
                if(this.blockfunction==false){
                    this.id=id;
                    this.blockfunction=true;
                    this.loadartilce();

                }
            },
            urlnameedit:function(){
                this.url=this.url.replace(/ /g, '-');
                this.url=this.url.replace(/\//g, '-');
                this.url=this.url.replace(/\?/g, '-');
            },
            createnewarticle:function(e){
                let data={
                    name:this.name,
                    url:this.url,
                    group:this.group,
                    id:this.id,
                    writter:this.writter,
                    reference:this.reference,
                    thump:this.masterpicture,
                    keywords:this.keywords,
                    description:this.description,
                    special:this.special


                }
                let that=this;
                axios.post('/admin/Article/SaveNewArticle',data)
                    .then(function (response) {
                        if(response.data.accept){
                            that.id=parseInt(response.data.backdata);
                            this.loadartilce();
                        }else{
                            that.error=response.data;

                        }
                    });
                e.preventDefault();
            },
            grouploader:function () {
                let that=this;
                axios.post('/admin/ArticleCategory/LoadGroupList')
                    .then(function (response) {
                        that.listgroup=response.data;
                    });
            }
        },
        mounted: function () {
            this.loadpage();
        }
    }
</script>

<style scoped>
    .tox-menu{
        z-index: 10000 !important;
    }
    .editorboxs{
        background-color: #eee; padding:15px; border:solid 0.5px #333; border-radius:15px;
    }
</style>