<template>
    <div>
        <form @submit.prevent="savefrom">
            <div v-on:click="loadpage">Reload</div>
            <div>
            <label>{{  $lang.store.Server }}</label>
            <div class="input-group mb-3 w-50"  dir="ltr">
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="basic-addon1"><span class="fa fa-check"></span></span>
                </div>
                <input  v-model="setting.url" type="text" class="form-control" placeholder="url" aria-label="Username" aria-describedby="basic-addon1">

            </div>
            <pre> {{ errors.checkdomain }}</pre>
            </div>
            <label>{{  $lang.store.secret }}</label>
            <div class="input-group mb-3 w-50"  dir="ltr">
             <input  v-model="setting.secret" type="text" class="form-control" placeholder="secret" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <label>{{  $lang.store.meetingID }}</label>
                    <input  v-model="setting.meetingID" type="text" dir="ltr" class="form-control">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>{{  $lang.store.recordID }}</label>
                    <input  v-model="setting.recordID" type="text" dir="ltr"  class="form-control">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>name</label>
                    <input  v-model="setting.name" type="text" dir="ltr"  class="form-control">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>attendeePW</label>
                    <input  v-model="setting.attendeePW" type="text" dir="ltr"  class="form-control">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>moderatorPW</label>
                    <input  v-model="setting.moderatorPW" type="text" dir="ltr"  class="form-control">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>voiceBridge</label>
                    <input  v-model="setting.voiceBridge" type="text" dir="ltr"  class="form-control">
                </div>
                <div class="col-sm-12 col-xs-12">
                    <label>{{  $lang.store.welcome }} </label>
                    <textarea v-model="setting.welcome"  class="form-control"></textarea>
                </div>
                <div class="col-sm-4">
                    <label>record </label>
                    <select  v-model="setting.record" class="form-control">
                        <option value="false">false</option>
                        <option value="true">true</option>
                    </select>

                </div>
                <div class="row">
                <div class="col-sm-4">
                    <label>autoStartRecording </label>
                    <select  v-model="setting.autoStartRecording" class="form-control">
                        <option value="false">false</option>
                        <option value="true">true</option>
                    </select>

                </div>
                <div class="col-sm-4">
                    <label>allowStartStopRecording </label>
                    <select  v-model="setting.allowStartStopRecording" class="form-control">
                        <option value="false">false</option>
                        <option value="true">true</option>
                    </select>

                </div>
                <div class="col-sm-4">
                    <label>publish </label>
                    <select  v-model="setting.publish" class="form-control">
                        <option value="false">false</option>
                        <option value="true">true</option>
                    </select>

                </div>
                <div class="col-sm-4">
                    <label>redirect </label>
                    <select  v-model="setting.redirect" class="form-control">
                        <option value="false">false</option>
                        <option value="true">true</option>
                    </select>

                </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="modal-body">
                    <h5>سایر تنظیمات</h5>
                    <div class="col-sm-4">
                        <label>dialNumber </label>
                        <input  v-model="setting.dialNumber" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>webVoice </label>
                        <input  v-model="setting.webVoice" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>logoutURL </label>
                        <input  v-model="setting.logoutURL" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>maxParticipants </label>
                        <input  v-model="setting.maxParticipants" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>duration </label>
                        <input  v-model="setting.duration" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>createTime </label>
                        <input  v-model="setting.createTime" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>webVoiceConf </label>
                        <input  v-model="setting.webVoiceConf" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>clientURL </label>
                        <input  v-model="setting.clientURL" type="text" dir="ltr"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>configToken </label>
                        <input  v-model="setting.configToken" type="text" dir="ltr"  class="form-control">
                    </div>
                </div>
            </div>
            <input class="mt-2 btn btn-primary" type="submit" v-bind:value="$lang.store.Save">
            <input class="mt-2 btn btn-danger" type="button" v-bind:value="$lang.store.CreateRoom" v-on:click="createroom">
            <input class="mt-2 btn btn-success" type="button" v-bind:value="$lang.store.LogintestAdmin" v-on:click="LoginAdminUser">
            <input class="mt-2 btn btn-success" type="button" v-bind:value="$lang.store.getMeetingInfo" v-on:click="LoginAdminUser">
            <a v-bind:href="link">Link</a>
        </form>
<!--
        <pre>{{ setting }}</pre>
-->
    </div>
</template>

<script>

    export default {
        name: "onlineSetting",
        data() {
            return {
               setting:{
                   url:null,
                   secret:null,
                   meetingID:null,
                   recordID:null,
                   name:null,
                   attendeePW:null,
                   moderatorPW:null,
                   welcome:null,
                   voiceBridge:null,
                   record:null,
                   autoStartRecording:null,
                   dialNumber:null,
                   webVoice:null,
                   logoutURL:null,
                   maxParticipants:null,
                   userID:null,
                   createTime:null,
                   duration:null,
                   webVoiceConf:null,
                   clientURL:null,
                   configToken:null,
                   publish:null,
                   redirect:null,
                   allowStartStopRecording:false
               },
                error:[],
                errors:{
                    checkdomain:null,

                },
                link:null
            }
        },
        components: {
        },
        methods: {
            createroom(){
     var sha1 = require('sha1');
    var x='allowStartStopRecording='+this.setting.allowStartStopRecording+'&attendeePW='+ this.setting.attendeePW +'&autoStartRecording=' +this.autoStartRecording +'&meetingID=r' + this.setting.meetingID +'&moderatorPW='+ this.setting.attendeePW + '&name=' + this.setting.name +'&record='+this.record+'&voiceBridge='+this.voiceBridge+'&welcome='+this.voiceBridge;
        let createURL = this.setting.url + "api/create?" + x + "&checksum=" + sha1("create" + x + this.setting.secret);
                this.link=createURL;


            },
            savefrom(){
                let that=this;
                axios.post('/admin/VideoCenter/SaveSetting',that.setting)
                    .then(function (response) {
                        that.classes=response.data;
                    })
            },
            loadpage(){
                let that=this;
                axios.post('/admin/VideoCenter/loadsetting')
                    .then(function (response) {
                        that.setting=response.data;
                    })
            },
            LoginAdminUser(){
                let that=this;
                axios.post('/admin/VideoCenter/LoginAdminUser',that.setting)
                    .then(function (response) {
                        console.log(response.data);
                    })
            }
        },
        mounted() {
            this.loadpage();

        }
    }
</script>

<style scoped>


</style>