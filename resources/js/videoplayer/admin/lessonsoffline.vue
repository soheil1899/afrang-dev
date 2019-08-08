<template>

    <div>
        <modal    :overlayTransition="true" :adaptive="true" ref="modal" >
            <h5 slot="title" v-text="title"></h5>
            <template slot="body">
                <form @submit.prevent="savefrom">
                    <div class="form-group">
                        <label v-text="$lang.store.name"></label>
                        <input v-model="data.name" class="form-control">
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">

                        <multiselect  :preserve-search="true" v-model="data.video" :options="options"  :onChange="playmovie" placeholder="Select one"
                                     value="id" label="name" track-by="name"></multiselect>
                        <video></video>

                        <small class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label v-text="$lang.store.pricemode"></label>
                        <select  class="form-control" v-model="data.pricemode">
                            <option value="0" v-text="$lang.admin.Normal"></option>
                            <option value="1" v-text="$lang.admin.Free"></option>
                            <option value="2" v-text="$lang.admin.OnlyUser"></option>
                            <option value="3" v-text="$lang.admin.SpecailUser"></option>
                        </select>
                        <small class="form-text text-muted"></small>
                    </div>
                    <error class="margintop" :error="error"></error>

                    <input class="btn btn-primary tiss-cursor" type="submit" v-bind:value="$lang.admin.Save">
                    <input class="btn btn-danger tiss-cursor"   v-on:click="closeed" v-bind:value="$lang.store.close">
                </form>

            </template>
        </modal>
        <div class="margin">
            <h3>{{ classes.name }}</h3>
            <hr>
            <h6>{{ $lang.store.Professor }} : {{ classes.to_porf.name }}</h6>
        </div>
        <div>
            <input type="button" class="btn btn-primary" v-on:click="addlesson" v-bind:value="$lang.store.addLesson">
            <input type="button" class="btn btn-primary" v-on:click="loadclass" v-bind:value="$lang.admin.list">
        </div>
        <table class="table margintop">
            <tr>
                <th>{{$lang.admin.Row}}</th>
                <th>{{$lang.admin.Title}}</th>
                <th>{{$lang.store.Date}}</th>
                <th>{{$lang.store.Edit}}</th>
                <th>{{$lang.store.Del}}</th>
            </tr>
            <tr  v-for="item in classes.to_lesson">
                <th>{{ item.id }}</th>
                <th>{{ item.name }}</th>
                <th dir="rtl">{{ convert(item.startdate) }}</th>
                <th class="fa fa-edit"  @click="edit(item.id)" > </th>
                <th v-text="$lang.store.del"  > </th>
            </tr>
        </table>
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    import Modal from 'vmodal'
    import moment from 'jalali-moment'
    import Multiselect from 'vue-multiselect'

    Vue.use(VuePersianDatetimePicker, {
        name: 'custom-date-picker',
        props: {
            inputFormat: 'YYYY-MM-DD HH:mm',
            format: 'jYYYY-jMM-jDD HH:mm',
            editable: false,
            inputClass: 'form-control my-custom-class-name',
            placeholder: 'Please select a date',
            altFormat: 'YYYY-MM-DD HH:mm',
            color: '#00acc1',
            autoSubmit: false,
            //...
            //... And whatever you want to set as default
            //...
        }
    });

    export default {
        name: "lessons",
        props:['id'],
        data() {
            return {
                classes:[],
                title:null,
                videofiles:[],
                error:[],
                data:{
                    id:null,
                    value:null,
                    name:null,
                    startdate:null,
                    tokencode:null,
                    video:null,
                    pricemode:0
                },
                options: []
            }
        },
        components: {
            'modal': Modal,// <- Important part,
            datePicker: VuePersianDatetimePicker,
            Multiselect
        },
        methods: {
            loadclass(){
                let that = this;
                let data={
                    id:this.id
                }
                axios.post('/admin/VideoCenter/loadclassroomoffline',data)
                    .then(function (response) {
                        that.classes=response.data;

                    })

            },
            edit(id){
                this.$refs.modal.show();

                let that = this;
                let data={
                    id:id
                }
                axios.post('/admin/VideoCenter/EditLesson',data)
                    .then(function (response) {
                        that.data=response.data;
                        that.data.startdate=that.convert(that.data.startdate);

                    })
            },
            addlesson(){
                this.$refs.modal.show();
                this.title=this.$lang.store.lesson;
            },
            playmovie(){
                alert('fddf');
            },
            loadvideofile(){
                axios.post('/admin/VideoCenter/VideoLoadFile',data)

                    .then(function (response) {
                        consoloe.log(response.data);
                    });

                        },
            savefrom(){
                let that=this;
                let data={
                    id:this.id,
                    data:this.data
                }
                axios.post('/admin/VideoCenter/SaveLessonoffline',data)
                    .then(function (response) {
                        that.loadclass();
                        that.closeed();
                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;
                    });

            },
            loadvideofiles(){
                let that=this;

                axios.post('/admin/VideoCenter/listfile')
                    .then(function (response) {
                      console.log(response.data);
                      that.options=response.data;
                    })

            },
            closeed(){
                this.data={
                    id:null,
                    name:null,
                    startdate:null,
                    tokencode:null,
                    pricemode:0
                }
                this.$refs.modal.hide();

            },
            convert(time){
                let x=moment(time, 'YYYY-M-D HH:mm:ss')
                    .locale('fa')
                    .format('YYYY-M-D HH:mm');
                return x;

            }
        },
        mounted() {
            this.loadclass();
        this.loadvideofiles();
        }
    }
</script>

<style scoped>

</style>