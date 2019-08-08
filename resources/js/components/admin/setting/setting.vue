<template>
    <div class="container margintop" style="padding-bottom: 100px;">

        <h2>{{$lang.admin.Setting}}</h2>
        <hr>
        <form  name="setting" @submit.prevent="saveform">
            <label>{{$lang.admin.Language}}</label>
            <select class="form-control" v-on:change="getdata()" v-model="lang">
                <option v-for="item in language"  v-bind:value="item.id">{{ item.orgianlname }}</option>
            </select>
            <label>{{$lang.admin.WebsiteName}}</label>
            <input class="form-control" v-model="data.websitename">
            <label>{{$lang.admin.keywords}}</label>
            <textarea class="form-control" v-model="data.keywords"></textarea>
            <label>{{$lang.admin.description}}</label>
            <textarea class="form-control" v-model="data.description"></textarea>
            <label>{{$lang.admin.googlemap}}</label>
            <textarea class="form-control" v-model="data.googlemap"></textarea>
            <label>{{$lang.admin.phone}}</label>
            <input class="form-control" v-model="data.phone">
            <label>{{$lang.admin.email}}</label>
            <input class="form-control" type="email" v-model="data.email">
            <label>{{$lang.admin.fax}}</label>
            <input class="form-control"  v-model="data.fax">
            <label>{{$lang.admin.supportphone}}</label>
            <input class="form-control"  v-model="data.supportphone">
            <label>{{$lang.admin.otherphone}}</label>
            <input class="form-control"  v-model="data.otherphone">
            <div class="row">
                <div class="col-sm-6">
                    <label>{{$lang.admin.facebook}}</label>
                    <input class="form-control"  v-model="data.facebook">
                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.twitter}}</label>
                    <input class="form-control"  v-model="data.twitter">
                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.telegram}}</label>
                    <input class="form-control"  v-model="data.telegram">
                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.telegramchanal}}</label>
                    <input class="form-control"  v-model="data.telegramchanal">
                </div>
            </div>
            <label>{{$lang.admin.address}}</label>
            <textarea class="form-control" v-model="data.address"></textarea>
            <div class="row">
                <div class="col-sm-6">
                    <label>{{$lang.admin.googleplus}}</label>
                    <input class="form-control"  v-model="data.googleplus">
                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.instagram}}</label>
                    <input class="form-control"  v-model="data.instagram">
                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.logo}}</label>

                    <input class="form-control"   @change="savelogo"  ref="logo"   type="file">
                    <img v-if="data.favicon!=null" v-bind:src="'/media/Layout/'+data.logo">


                </div>
                <div class="col-sm-6">
                    <label>{{$lang.admin.favicon}}</label>

                    <input class="form-control" @change="savefavicon"   ref="favicon"  type="file" >
                    <img v-if="data.logo!=null" v-bind:src="'/media/Layout/'+data.favicon">


                </div>
            </div>
            <div class="form-group margintop">
            <input class="form-control btn  btn-primary" type="submit" v-bind:value="$lang.admin.Save">
            </div>
        </form>
    </div>

</template>
<script>
    window.axios=require('axios');
    export default {
        //props: ['id','method','token','insertitemParent'],
        data(){
            return {
                data:[],
                favicon:[],
                logo:[],
                lang:null,
                language:[],
            }
        },
        methods: {
            loadpage:function(){
                let that=this;
                axios.post('/getlang')
                    .then(function (response) {
                        that.language=response.data;
                        that.lang=1;
                        that.getdata();
                    });


            },
            getdata:function(){
                let that=this;

                let data={
                    lang:that.lang,


                };
                axios.post('/admin/setting',data)
                    .then(function (response) {
                        that.data=response.data;

                    });
            },
            saveform(){
                let that=this;
                let data={
                    lang:this.lang,
                    data:this.data,
                }
                axios.post('/admin/SaveSetting',data)
                    .then(function (response) {
                        that.loadpage();

                    })
                    .catch((error) => {
                        console.log(error.response.data.status);
                    });

            },
            savefavicon(){
                let that=this;

                let formData = new FormData();
                formData.append('lang',this.lang);
                formData.append('favicon',this.$refs.favicon.files[0]);
                axios.post('/admin/SaveFav'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(function (response) {
                        that.loadpage();

                    })
                    .catch((error) => {
                        console.log(error.response.data.status);
                    });
            },
            savelogo:function (e) {
                let that=this;
                let formData = new FormData();
                formData.append('lang',this.lang);
                formData.append('logo',this.$refs.logo.files[0]);
                axios.post('/admin/Savelogo'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(function (response) {
                        that.loadpage();

                    })
                    .catch((error) => {
                        console.log(error.response.data.status);
                    });


            }
        },
        mounted: function () {
            this.loadpage();
        }

    }

</script>